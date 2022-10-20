<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comprador extends CI_Controller {
    var $token,$user,$pass;
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('curlconfig');
        $this->datos = array('mensaje' => '',
            'error' => 0,
            'respuesta' => array());
    }

	public function index(){
        
	}

    public function crearComprador(){
        $identificacion = $this->input->post("identificacion");
        $nombres = $this->input->post("nombre");
        $apellidos = $this->input->post("apellido");
        $email = $this->input->post("email");

        $url = 'http://apiboletos.test/api/comprador';

        $ch = array('url' => $url,
			'datos' => array('identificacion' => $identificacion,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'email' => $email));
        $resp = executeCurlPost($ch);

        if ($resp === null) {
            $this->datos['error'] = 1;
            $this->datos['mensaje'] = 'Ocurrio un error.';
        }else {
            $this->datos['error'] = 0;
            $this->datos['mensaje'] = '';
        }
        echo $this->datos['error'];
    }
}