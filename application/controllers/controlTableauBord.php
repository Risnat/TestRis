<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlTableauBord extends CI_Controller 

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
  $this->layout->ajouter_css('jumbotron');
  $this->layout->set_theme('default');
  //  Chargement de la bibliothèque de gestion de formulaire
 
		$this->layout->views('themes/barreNav')
               ->views('vueTableauBord')
                ->view('themes/footer');
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
