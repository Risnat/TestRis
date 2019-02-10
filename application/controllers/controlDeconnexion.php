<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlDeconnexion extends CI_Controller 

	{ 
    public function __construct()

    {

        parent::__construct();
		
    
    }

    

    public function index()

    {

        $this->accueil();

    }




 public function accueil()

{ $this->load->library('layout');
  $this->layout->set_theme('default');
   $this->session->sess_destroy();
    // null the session (just in case):
    $this->session->set_userdata(array('user_name' => '', 'is_logged_in' => ''));

  $this->layout->views('themes/enteteInscription')
                     ->view('vueDeconnexion');
 }



/*public function _output($output)

    {
      var_dump($output);
        

    }*/
    public function maintenance()

    {

        echo "Désolé, c'est la maintenance.";

    }

    
/*
    public function _remap($method)

    {

        $this->maintenance();

    }*/
}
