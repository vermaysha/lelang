<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends \Mpdf\Mpdf {
	public function __construct() {
		parent::__construct(['tempDir' => sys_get_temp_dir()]);
	}
}
