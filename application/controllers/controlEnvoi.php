        
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlEnvoi extends CI_Controller 

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

{ 
         $this->load->library('layout');
         $this->layout->set_theme('defaultConnexion');
         $this->layout->ajouter_css('jumbotron');
        $this->load->view(vueEnvoiFinal);
       }
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
