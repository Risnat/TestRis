<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlRechercherTrajet extends CI_Controller 

	{ private  $place_id_lycee='ChIJOcUjxYorEkgRADTmNs2lDAQ';
  

    public function __construct()

    {

        parent::__construct();
    }

    

    public function index()

    {

        $this->accueil();

    }


   

 public function dateRech_check($dateRech)
      {      
         if ($dateRech<"2019-06-25" && $dateRech>"2018-08-22" )  
          {$this->dateRech=$dateRech; 
            return TRUE;}
            else 
               {$this->form_validation->set_message('dateRech_check', "Date non valide, choisir une date pendant l'année scolaire.");
             return False;}
      }
 
 

 public function accueil()

{
   
        //  Le formulaire est invalide ou vide
  $this->load->library('layout');
  $this->layout->set_theme('default');
  $this->layout->ajouter_css('jumbotron');
 
  $this->layout->views('themes/barreNav')
               ->view('vueChoixTrajet');
                
   
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
