<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlAuthentification extends CI_Controller 

	{ private $usrMail="";
    private $pwd="";
    
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


public function pwd_check($pwd) 
{    $usrMail = $this->input->post('usrMail');
      $this->load->model('covoitureur_model');
      $res=array();
      $res=$this->covoitureur_model->liste_covoitureurs($usrMail);       
        if (count($res)!=0 && password_verify($pwd,$res[0]->password_covoit))
          {$this->session->set_userdata('nom',$res[0]->nom_covoit);
           $this->session->set_userdata('prenom',$res[0]->prenom_covoit);
           $this->session->set_userdata('communaute',$res[0]->communaute_covoit);
           $this->session->set_userdata('id_covoit_connecte',$res[0]->id_covoit);
           $this->session->set_userdata('password_crypte',$res[0]->password_covoit);
            $this->session->set_userdata('usrMail',$usrMail);
            $this->session->set_userdata('compteCree',"OK");
              $this->session->set_userdata('identCovoit', $this->session->nom." ".$this->session->prenom);
           return TRUE;
          }
        else
          {$this->session->set_userdata('nom',"");
           $this->session->set_userdata('prenom',"");
           $this->session->set_userdata('communaute',0);
           $this->session->set_userdata('id_covoit_connecte',0);
           $this->session->set_userdata('password_crypte',"");
           $this->session->set_userdata('usrMail',"");

           $this->form_validation->set_message('pwd_check', 'Mot de passe ou adresse email erronés');
          return FALSE;
           }
}

 public function accueil()

{
  $this->load->library('layout');
  $this->layout->ajouter_css('jumbotron');
  $this->layout->set_theme('defaultConnexion');
  //  Chargement de la bibliothèque de gestion de formulaire
  $this->load->library('form_validation');
  $this->form_validation->set_rules('usrMail', '"Votre adresse de courrier électronique:"', 'required|valid_email',
                                                                    array('required' =>"adressél attendu",
                                                                        'valid-email'=>"Format non valide d'adressél"));
   $this->form_validation->set_rules('pwd', '"Votre mot de passe :"', 'trim|required|stripslashes|htmlspecialchars|min_length[8]|max_length[10]|callback_pwd_check',
                                                                    array('required' =>"Prénom attendu",
                                                                      'min_length'=>"Mot de passse trop petit",
                                                                          'max_length'=>"Mot de passse trop long",
                                                                          'trim'=>"Format non valide du mot de passe 1",
                                                                          'htmlspecialchars'=>"Format non valide du mot de passe 2",
                                                                          'stripslashes'=>"Format non valide du mot de passe 3"));

   
    if($this->form_validation->run())
    { //  Le formulaire est valide

      
      
       
      $this->layout->views('themes/enteteConnexion')
                     ->view('vueValidAuthentification');
        
      }
    else
    {  
        //  Le formulaire est invalide ou vide
        $this->layout->views('themes/enteteConnexion')
                     ->view('vueAuthentification');
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
