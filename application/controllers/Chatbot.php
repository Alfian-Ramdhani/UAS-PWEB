<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatbot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) {
			echo json_encode(['error' => 'Unauthorized']);
			exit;
		}
		if ($this->session->userdata('membership') !== 'premium') {
			echo json_encode(['error' => 'Fitur ini hanya untuk premium member']);
			exit;
		}
		$this->load->config('chatbot');
	}

	public function ask()
	{
		$input = json_decode(file_get_contents('php://input'), true);
		$message = trim($input['message'] ?? '');

		if (empty($message)) {
			echo json_encode(['reply' => 'Silakan masukkan pesan terlebih dahulu.']);
			return;
		}

		// Coba Grok dulu
		$reply = $this->_ask_grok($message);

		// Jika Grok gagal, fallback ke Gemini
		if ($reply === null) {
			$reply = $this->_ask_gemini($message);
		}

		// Jika kedua gagal, beri pesan error
		if ($reply === null) {
			$reply = 'Maaf, layanan AI sedang tidak tersedia. Silakan coba lagi nanti.';
		}

		echo json_encode(['reply' => $reply]);
	}

	private function _ask_grok($message)
	{
		$api_key = $this->config->item('grok_api_key');
		if (!$api_key) return null;

		$url = $this->config->item('grok_api_url');

		$payload = [
			'model' => $this->config->item('grok_model'),
			'messages' => [
				[
					'role' => 'system',
					'content' => 'Kamu adalah asisten AI untuk platform belajar coding LearnBase. Jawab pertanyaan tentang coding, pemrograman, algoritma, dan teknologi. Berikan penjelasan yang jelas, ringkas, dan dalam Bahasa Indonesia. Jika ada kode, berikan contoh yang relevan.'
				],
				[
					'role' => 'user',
					'content' => $message
				]
			],
			'max_tokens' => 1024,
			'temperature' => 0.7,
		];

		$result = $this->_curl_post($url, $payload, [
			'Authorization: Bearer ' . $api_key,
			'Content-Type: application/json',
		]);

		if (!$result) return null;

		$data = json_decode($result, true);
		if (isset($data['choices'][0]['message']['content'])) {
			return $data['choices'][0]['message']['content'];
		}

		return null;
	}

	private function _ask_gemini($message)
	{
		$api_key = $this->config->item('gemini_api_key');
		if (!$api_key || $api_key === 'AIzaSyDx_xxxx') return null;

		$url = $this->config->item('gemini_api_url') . '?key=' . $api_key;

		$payload = [
			'contents' => [
				[
					'parts' => [
						[
							'text' => 'Kamu adalah asisten AI untuk platform belajar coding LearnBase. Jawab pertanyaan tentang coding, pemrograman, algoritma, dan teknologi. Berikan penjelasan yang jelas, ringkas, dan dalam Bahasa Indonesia. Jika ada kode, berikan contoh yang relevan. Pertanyaan: ' . $message
						]
					]
				]
			],
			'generationConfig' => [
				'maxOutputTokens' => 1024,
				'temperature' => 0.7,
			]
		];

		$result = $this->_curl_post($url, $payload, [
			'Content-Type: application/json',
		]);

		if (!$result) return null;

		$data = json_decode($result, true);
		if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
			return $data['candidates'][0]['content']['parts'][0]['text'];
		}

		return null;
	}

	private function _curl_post($url, $payload, $headers)
	{
		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => json_encode($payload),
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYPEER => true,
		]);

		$result = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if ($http_code >= 200 && $http_code < 300 && $result) {
			return $result;
		}

		return null;
	}
}
