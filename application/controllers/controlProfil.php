<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlProfil extends CI_Controller 

{ 
       public function __construct()

    {

        parent::__construct();
		   
    }

    

    public function index()

    {

        $this->accueil();

    }


    
     public function test_input($data)
      {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       print_r($data);
       return $data;
      }
     
    
 public function dateNaiss_check($date)
      {      
         if ($date>'1950-06-25' && $date<'2010-06-25' )  
            {$this->session->set_userdata('dateNaiss',$date); 
           return TRUE;}
            else 
               {$this->form_validation->set_message('dateNaiss_check', "Date non valide, choisir une date entre le 25 juin 1950 et le 25 juin 2010");
                return FALSE;}
      }
 
 

 public function accueil()

{  	$this->load->model('covoitureur_model');
	$res=array();

	$res=$this->covoitureur_model->trouve_info_covoit($this->session->id_covoit_connecte,$this->session->password_crypte);
  //prise en compte des valeurs des inos actuelles dans la base 
  
	$this->session->set_userdata('nom',$res[0]->nom_covoit);
	$this->session->set_userdata('prenom',$res[0]->prenom_covoit); 
	$this->session->set_userdata('dateNaiss',$res[0]->date_naissance);
	$this->session->set_userdata('communaute',$res[0]->communaute_covoit); 
	$this->session->set_userdata('niveau',$res[0]->niveau);
	$this->session->set_userdata('entre_communaute',$res[0]->entre_communaute);
	$this->session->set_userdata('peut_conduire',$res[0]->peut_conduire);
  $this->session->set_userdata('tel',$res[0]->telephone_covoit);
  $this->session->set_userdata('identCovoit', $this->session->nom." ".$this->session->prenom);
  // préparation des infos à fournir au formulaire
    $this->load->library('form_validation');
  	$this->form_validation->set_rules('nom', '"Votre nom :"', 'trim|required|max_length[56]|stripslashes|htmlspecialchars',
                                                                    array('required' =>"Nom attendu ",
                                                                           'trim' =>"Mauvais format nom ",
                                                                           'stripslashes' =>"Mauvais format nom",
                                                                           'htmlspecialchars' =>"NMauvais format nom",
                                                                           'max_length' =>"Nom trop long"));
    $this->form_validation->set_rules('prenom', '"Votre prénom : "', 
      'trim|required|max_length[56]|stripslashes|htmlspecialchars',
                                                                    array('required' =>"Prénom attendu ",
                                                                           'trim' =>"Mauvais format prénom ",
                                                                           'stripslashes' =>"Mauvais format prénom",
                                                                           'htmlspecialchars' =>"Mauvais format prénom",
                                                                           'max_length' =>"Prénom trop long"));
   
    $this->form_validation->set_rules('dateNaiss', '"Votre date de naissance : "', 'required|callback_dateNaiss_check',
                                                                    array('required' =>"Date attendue " ));

   $this->form_validation->set_rules('communaute', '"Communauté de covoiturage : "', 'required',
                                                                    array('required' =>"Communauté attendue " ));
  
    
    $this->form_validation->set_rules('telCovoit', '"Votre numéro de mobile :"','required|numeric|min_length[10]|max_length[10]',
                                                                    array('required' =>"Num tel attendu attendu ",
                                                                          'numeric' =>"Le numéro de mobile est sous forme numérique",
                                                                           'min_length' =>"Num mobile trop court",
                                                                           'max_length' =>"Num mobile trop long"));
    
    $this->form_validation->set_rules('accept_comm', '"Acceptez-vous de covoiturer avec des personnes d\'autres communautés : "');
    
    $this->form_validation->set_rules('peut_conduire', '"Etes-vous titulaire du permis de conduire: "');
    
    
      if($this->form_validation->run())
    {//  Le formulaire est valide, prise e compte des I° saisies
    
      $this->session->set_userdata('nom', $this->input->post('nom'));
      $this->session->set_userdata('prenom',$this->input->post('prenom'));
      $this->session->set_userdata('dateNaiss',$this->input->post('dateNaiss'));
     $this->session->set_userdata('communaute',$this->input->post('communaute'));
      if ($this->input->post('accept_comm')=="on") 
        {$this->session->set_userdata('entre_communaute',1);} 
        else {$this->session->set_userdata('entre_communaute',0);}
      if ($this->input->post('peut_conduire')=="on")
          {$this->session->set_userdata('peut_conduire',1);} 
           else {$this->session->set_userdata('peut_conduire',0);}
      $this->session->set_userdata('tel',$this->input->post('telCovoit'));
 
      //modification de la base selon les I° précédentes
        $this->load->model('covoitureur_model');
      $res1=$this->covoitureur_model->modifie_profil($this->session->id_covoit_connecte,$this->session->nom,$this->session->prenom,$this->session->dateNaiss,$this->session->communaute,$this->session->entre_communaute,$this->session->peut_conduire,$this->session->tel);
       $this->load->library('layout');
       $this->layout->set_theme('default');
       $this->layout->ajouter_css('jumbotron');
        
       $this->layout->views('themes/barreNav')
               ->views('vueConfirmeProfil')
                ->view('themes/footer');
    }
    else
    {  
        //  Le formulaire est invalide ou vide
  $this->load->library('layout');
   $this->layout->set_theme('default');
  $this->layout->ajouter_css('jumbotron');

  $this->layout->views('themes/barreNav')
               ->views('vueDemandeProfil')
                ->view('themes/footer');
    }  
   
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
