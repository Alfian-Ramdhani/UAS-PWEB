<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ============================================================
// Konfigurasi Chatbot AI
// Groq (API groq.com) sebagai primary, Google Gemini sebagai backup
// ============================================================

// Groq API - primary (pakai groq.com karena key-nya gsk_...)
$config['grok_api_key'] = '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';
$config['grok_api_url'] = 'https://api.groq.com/openai/v1/chat/completions'; // Groq endpoint
$config['grok_model'] = 'llama-3.3-70b-versatile'; // Model Groq yang support free

// Google Gemini API - backup
$config['gemini_api_key'] = ''; // Isi dengan API key Gemini dari https://aistudio.google.com/apikey
$config['gemini_api_url'] = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';
