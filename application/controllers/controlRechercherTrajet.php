<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlRechercherTrajet extends CI_Controller 

	{ private  $place_id_lycee='ChIJOcUjxYorEkgRADTmNs2lDAQ';
   private $lat_lycee=  48.732084;
   private $long_lycee=   -3.459144;

   private $departRech= "";
   private $destinationRech = "";
   private $dateRech ;
   private $heureRech;
   private $place_id;
   private $vers_lycee;
  

    public function __construct()

    {

        parent::__construct();
		   $this->session->set_userdata('pas', '0.02');
       $this->dateRech =date("Y-m-d");
       $this->heureRech =date("H:i");
       $this->trajet_demande=false;
       $this->trajet_choisi=false;
       $this->formulaire1_reussi=false;
       $this->formulaire2_reussi=false;
    }

    

    public function index()

    {

        $this->accueil();

    }


    
     public function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       print_r($data);
       return $data;
}
     
      public function departRech_check($departRech)
      {   
         $this->departRech=$departRech;
         return TRUE;
      }

      public function destinationRech_check($destinationRech)
      {   
         $this->destinationRech=$destinationRech;
         if ( $this->departRech!="Lycée" && $this->destinationRech!="Lycée" )  
              {$this->form_validation->set_message('destinationRech_check', "Destination  ou départ obligatoire du lycée.");
              return FALSE;}
            elseif ($this->departRech=="Lycée" && $this->destinationRech=="Lycée" ) 
                       {$this->form_validation->set_message('destinationRech_check', "le départ et la destination sont le lycée.");
                        return FALSE;}
                        elseif ($this->destinationRech=="Lycée") 
                             {$this->vers_lycee=1;
                              return $this->traite_lieu(1,$this->departRech);}
                          else {$this->vers_lycee=0;
                               return  $this->traite_lieu(0,$this->destinationRech);};
      }
      private function traite_lieu($vers_lycee,$lieu )
      {
       $this->place_id=14;
        return true;/*
         //création de l'url a interrogé avec le web serviceL'url doit être nettoyé des caractères non adéquats
         $url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=".urlencode($lieu)."&inputtype=textquery&fields=formatted_address,geometry,place_id&key=AIzaSyAhkM3iQPspPu2ZUUb2a7b3DiEs2uU6m-k";
         //récupéation de la réponse du web services
         $raw = file_get_contents($url);
         print_r($raw);
         //décodage du contenu renvoyé par web services
         $json = json_decode($raw);
         print_r($json);
         if(!empty($json->candidates)&& ($json->status)=="OK") 
            {   
             file_put_contents('toto.json', $raw);
            foreach($json->candidates as $lieuCandidat) 
                { $this->place_id=$lieuCandidat->place_id; 
                  $adresse_formatee=$lieuCandidat->formatted_address;
                  $latitude=$lieuCandidat->geometry->location->lat; 
                  $longitude=$lieuCandidat->geometry->location->lng; 
                  $this->load->model->destination_model;
                  if ($this->destination_model->count(array('place_id'=>$place_id))==0)
                    {$result=$this->load->model->destination_model->ajoute_destination($this->place_id,$adresse_formatee, $latitude,$longitude); 
                      echo "ouf ".$res;sleep(5);
                      if($res==1)
                         {return TRUE;}
                         else  {$this->form_validation->set_message('destinationRech_check',"un problème a été rencontré pour créer la destination"); 
                                return FALSE;}
                    }
                 }
              }
            else {$this->form_validation->set_message('destinationRech_check', "Aucun endroit avec cette description  trouv&eacute;e.");
                  return FALSE;}*/
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
 public function heureRech_check($heureRech)
      {      
         if ($heureRech>"06:30" && $heureRech<"18:30" )  
          {$this->heureRech=$heureRech;
            return TRUE;}
            else 
               {$this->form_validation->set_message('heureRech_check', "Choisir une heure entre 6h30 et 18h30.");
                 return FALSE;}
      }
 



 public function accueil()

{ if ($this->trajet_demande==false && $this->formulaire1_reussi==false && count($this->session->liste_trajets_trouves)==0)
    // préparation du premier formulaire et execution de ce formulaire
        { $this->load->library('form_validation');

          $this->form_validation->set_rules('departRech', '"Lycée/Saisir le lieu de départ"', 'trim|required|stripslashes|htmlspecialchars|min_length[5]|max_length[56]|callback_departRech_check',
                                                                    array('required' =>"Lieu de départ attendu ",
                                                                           'min_length' =>"adresse trop courte",
                                                                           'max_length' =>"adresse trop longue",
                                                                           'trim' =>"Mauvais format ville départ ",
                                                                           'stripslashes' =>"Mauvais format ville départ",
                                                                           'htmlspecialchars' =>"Mauvais format ville départ"));
          $this->form_validation->set_rules('destinationRech', '"Lycée/Saisir le lieu de destination"', 'trim|required|stripslashes|htmlspecialchars|max_length[56]|callback_destinationRech_check',
                                                                    array('required' =>"Lieu de destination attendu ",
                                                                           'min_length' =>"adresse trop courte",
                                                                           'max_length' =>"adresse trop longue",
                                                                           'trim' =>"Mauvais format ville départ ",
                                                                           'stripslashes' =>"Mauvais format ville départ",
                                                                           'htmlspecialchars' =>"Mauvais format ville départ"));
                                                                                                                                       
          $this->form_validation->set_rules('dateRech', '"Date recherchée"', 'required|callback_dateRech_check',
                                                                    array('required' =>"Date attendue " ));

          $this->form_validation->set_rules('heureRech', '"Heure recherchée"', 'required|callback_heureRech_check',
                                                                    array('required' =>"Heure attendue " ));
           $this->trajet_demande=true;
        
          $this->formulaire1_reussi=$this->form_validation->run();
         }


  if($this->trajet_demande==true && $this->formulaire1_reussi==false && count($this->session->liste_trajets_trouves)==0)
    {     //  Le formulaire 1 est invalide ou vide
         $this->load->library('layout');
         $this->layout->set_theme('default');
         $this->layout->ajouter_css('jumbotron');
         $data=  array('inviteMessage'=>"Trajet recherché" );
      
         $this->layout->views('themes/barreNav')
               ->views('vueRechercherTrajet',$data)
                ->view('themes/footer');
    }
    if($this->trajet_demande==true && $this->formulaire1_reussi==true &&  count($this->session->liste_trajets_trouves)==0 && $this->formulaire2_reussi==false)
    {     //  Le formulaire 1 est valide
      //donc recherche du
      $this->load->model('trajet_model');
      
      $this->session->liste_trajets_trouves=$this->trajet_model->recherche_trajet($this->dateRech,$this->heureRech,$this->place_id,$this->vers_lycee);
      
      
      if (count( $this->session->liste_trajets_trouves)>0)
        //il existe des trajets répondant à l'attente 
        { $this->trajet_trouve=true; 
          $this->load->library('layout');
          $this->layout->set_theme('default');
          $this->layout->ajouter_css('jumbotron');
          // affichage de tous les trajets à venir pour le passager
          // préparation du formulaire de choix de trajet
          $this->load->library('form_validation');
          $this->form_validation->set_rules('choixTrajet', '"trajet sélectionné"', 'required',
                                                                    array('required' =>"Veuillez choisir un trajet " ));
     
          $this->formulaire2_reussi=$this->form_validation->run();
        }
        else //aucun trajet ne repond aux attentes
             {$this->load->library('layout');
              $this->layout->set_theme('default');
              $this->layout->ajouter_css('jumbotron');
              $this->formulaire1_reussi=false;
              $data=  array('inviteMessage'=>"Trajet recherché non trouvé avec 40 minutes d'écart,  Nouvelle recherche" );

              $this->layout->views('themes/barreNav')
               ->views('vueRechercherTrajet',$data)
                ->view('themes/footer');
             }
      }

 if ( count($this->session->liste_trajets_trouves)>0 && $this->input->post('choixTrajet')==null)
      {   //  Le formulaire 2 est invalide ou vide
      
        $this->load->library('layout');
        $this->layout->set_theme('default');
        $this->layout->ajouter_css('jumbotron');   
        $data['results']=$this->session->liste_trajets_trouves;
        $this->layout->views('themes/barreNav')
               ->views('vueConfirmeTrajetRecherche',$data)
                ->view('themes/footer');
      }
   
   if ( count($this->session->liste_trajets_trouves)>0 && !($this->input->post('choixTrajet')==null))         
      { //maj du trajet en retirant un passager et préparation 
        $this->input->post('choixTrajet');
         $num_trajet_choisi=$this->input->post('choixTrajet');
         $ligne_trajet_choisi=$this->session->liste_trajets_trouves[$num_trajet_choisi];
         $this->load->model('realise_model');
         (int) $id_conducteur=$this->session->id_covoit_connecte;
        $this->realise_model->maj_realise( $id_conducteur,(int)$ligne_trajet_choisi->id_trajet,(int) $ligne_trajet_choisi->id_conducteur);
        
        $this->load->library('layout');
        $this->layout->set_theme('default');
        $this->layout->ajouter_css('jumbotron');  
         $data['result']=$ligne_trajet_choisi; 
        $this->layout->views('themes/barreNav')
                       ->views('vueChoixTrajet',$data)
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
