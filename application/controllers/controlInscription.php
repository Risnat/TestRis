<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlInscription extends CI_Controller 

	{ private $usrMaili="";
    private $pwdi="";
    private $pwdConf="";
   
    public function __construct()

    {

        parent::__construct();
		
    
    }

    

    public function index()

    {

        $this->accueil();

    }


private function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




public function pwd_check_force($pwd) 
{if ($pwd!="" && preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $pwd)==0) 
             { $this->pwdi="";
             return FALSE;}
        else {$this->pwdi=$pwd;
              return TRUE;}
}

public function pwd_check_equality($pwdConf) 
{
 if ($this->pwdi!="" && $this->pwdi!=$pwdConf)  //test de l'égalité des mots de passe
                    {$this->pwdConf=="";
                      return false;}
                else {$this->pwdConf=$pwdConf;
                      return true;}
}



 public function accueil()

{
  $this->load->library('layout');
  $this->layout->ajouter_css('jumbotron');
  $this->layout->set_theme('defaultConnexion');
  //  Chargement de la bibliothèque de gestion de formulaire
  $this->load->library('form_validation');
  $this->form_validation->set_rules('usrEmail', '"Saisir email"', 'required|valid_email',
                                                                    array('required' =>"Adresse mail attendue",
                                                                          'valid_email'=>"Adresse email non valide"));
   $this->form_validation->set_rules('pwd','"Nouveau mot de passe"','trim|required|min_length[8]|max_length[10]|stripslashes|htmlspecialchars|callback_pwd_check_force',
                                                                    array('required' =>"Mot de passe attendu ",
                                                                          'min_length'=>"Mot de passse trop petit",
                                                                          'max_length'=>"Mot de passse trop long",
                                                                           'pwd_check_force'=>"Mot de passe trop faible"));
    $this->form_validation->set_rules('pwdConf','"Confirmer le mot de passe"','trim|required|min_length[8]|max_length[10]|stripslashes|htmlspecialchars|callback_pwd_check_equality',
                                                                    array('required' =>"Mot de passe attendu ",
                                                                          'min_length'=>"Mot de passse trop petit",
                                                                          'max_length'=>"Mot de passse trop long",
                                                                           'pwd_check_equality'=>"Mots de passe différents"));
 //');
    if($this->form_validation->run())
    { 
        //  Le formulaire est valide
        $this->usrMaili = $this->input->post('usrEmail');
        $this->load->model('covoitureur_model');
        $pwdCrypte=password_hash($this->pwdi,PASSWORD_BCRYPT);
        $this->session->set_userdata('nom',"");
           $this->session->set_userdata('prenom',"");
           $this->session->set_userdata('communaute',0);

        try
        {
          $result=$this->covoitureur_model->ajoute_covoitureur($this->usrMaili,$pwdCrypte);
           $this->layout->views('themes/enteteValidInscription')
                     ->view('vueValidInscription');
                     $this->session->set_userdata('compteCree',"OK");
        }
        catch (Exception $e)
       { 
    
            $this->layout->views('themes/enteteInscriptionARecommencer')
                     ->view('vueInscription');
        }
      }
    else
    {  
        //  Le formulaire est invalide ou vide
        $this->layout->views('themes/enteteInscription')
                     ->view('vueInscription');
    }
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
