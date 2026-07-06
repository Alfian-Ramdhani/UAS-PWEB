<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use Dompdf\Dompdf;

class Dompdf_lib {
	public $dompdf;

	public function __construct() {
		$this->dompdf = new Dompdf();
	}
}
