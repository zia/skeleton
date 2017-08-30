<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	/**
    * Index
    *
    * @param
    * @return
    */
	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('home');
		$this->load->view('layouts/footer');
	}
}
