<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->helper('curlconfig');
		$this->datos = array('mensaje' => '',
        'error' => 0,
        'datos' => array());
    }
	public function index()
	{
		$url = 'http://apiboletos.test/api/salas';
		$urlComp = 'http://apiboletos.test/api/comprador';
		$ch = array('url' => $url,
			'datos' => array(''));
		$chComp = array('url' => $urlComp,
			'datos' => array(''));

		$result['salas'] = executeCurlGet($ch);
		$result['compradores'] = executeCurlGet($chComp);

        $this->load->view('welcome_message',$result);
	}
}
