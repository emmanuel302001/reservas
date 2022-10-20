<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salas extends CI_Controller {

	public function __construct(){
        $this->datos = array('mensaje' => '',
        'error' => 0,
        'datos' => array());
        
        parent::__construct();
        $this->load->helper('curlconfig');
    }
	public function index()
	{	

	}

	public function crearReserva(){
        $id_comprador = $this->input->post("lst_comprador");
        $id_sala = $this->input->post("id_sala");
        $cantreserva = $this->input->post("cantreserva");

        $url = 'http://apiboletos.test/api/reserva';

        $ch = array('url' => $url,
			'datos' => array('id_sala' => $id_sala,
                'id_comprador' => $id_comprador,
                'cant_boletas' => $cantreserva));
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
