<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlProposerTrajet extends CI_Controller 

	{ private  $place_id_lycee='ChIJOcUjxYorEkgRADTmNs2lDAQ';
   private $lat_lycee=  48.732084;
   private $long_lycee=   -3.459144;

   private $departProp= "";
   private $destinationProp = "";
   private $dateProp ;
   private $heureProp;
   private $nbpassagersProp=3;
   private $accepteArret=1;
   private $place_id;
   private $vers_lycee;

    public function __construct()

    {

        parent::__construct();
		   $this->session->set_userdata('pas', '0.02');
       $this->dateProp =date("Y-m-d");
       $this->heureProp =date("H:i");
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
     
      public function departProp_check($departProp)
      {   
         $this->departProp=$departProp;
         return TRUE;
      }

      public function destinationProp_check($destinationProp)
      {   
         $this->destinationProp=$destinationProp;
         if ( $this->departProp!="Lycée" && $this->destinationProp!="Lycée" )  
              {$this->form_validation->set_message('destinationProp_check', "Destination  ou départ obligatoire du lycée.");
              return FALSE;}
            elseif ($this->departProp=="Lycée" && $this->destinationProp=="Lycée" ) 
                       {$this->form_validation->set_message('destinationProp_check', "le départ et la destination sont le lycée.");
                        return FALSE;}
                        elseif ($this->destinationProp=="Lycée") 
                             {$this->vers_lycee=1;
                              return $this->traite_lieu(1,$this->departProp);}
                          else {$this->vers_lycee=0;
                               return  $this->traite_lieu(0,$this->destinationProp);};
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
                         else  {$this->form_validation->set_message('destinationProp_check',"un problème a été rencontré pour créer la destination"); 
                                return FALSE;}
                    }
                 }
              }
            else {$this->form_validation->set_message('destinationProp_check', "Aucun endroit avec cette description  trouv&eacute;e.");
                  return FALSE;}*/
        }

 public function dateProp_check($dateProp)
      {      
         if ($dateProp<"2019-06-25" && $dateProp>"2018-08-22" )  
          {$this->dateProp=$dateProp; 
            return TRUE;}
            else 
               {$this->form_validation->set_message('dateProp_check', "Date non valide, choisir une date pendant l'année scolaire.");
             return False;}
      }
 public function heureProp_check($heureProp)
      {      
         if ($heureProp>"06:30" && $heureProp<"18:30" )  
          {$this->heureProp=$heureProp;
            return TRUE;}
            else 
               {$this->form_validation->set_message('heureProp_check', "Choisir une heure entre 6h30 et 18h30.");
                 return FALSE;}
      }
 

 public function accueil()

{
  
	  $this->load->library('form_validation');

  $this->form_validation->set_rules('departProp', '"Lycée/Saisir le lieu de départ"', 'trim|required|stripslashes|htmlspecialchars|min_length[5]|max_length[56]|callback_departProp_check',
                                                                    array('required' =>"Lieu de départ attendu ",
                                                                           'min_length' =>"adresse trop courte",
                                                                           'max_length' =>"adresse trop longue",
                                                                           'trim' =>"Mauvais format ville départ ",
                                                                           'stripslashes' =>"Mauvais format ville départ",
                                                                           'htmlspecialchars' =>"Mauvais format ville départ"));
   $this->form_validation->set_rules('destinationProp', '"Lycée/Saisir le lieu de destination"', 'trim|required|stripslashes|htmlspecialchars|max_length[56]|callback_destinationProp_check',
                                                                    array('required' =>"Lieu de destination attendu ",
                                                                           'min_length' =>"adresse trop courte",
                                                                           'max_length' =>"adresse trop longue",
                                                                           'trim' =>"Mauvais format ville départ ",
                                                                           'stripslashes' =>"Mauvais format ville départ",
                                                                           'htmlspecialchars' =>"Mauvais format ville départ"));
                                                                    
                                                                        
    $this->form_validation->set_rules('dateProp', '"Date proposée"', 'required|callback_dateProp_check',
                                                                    array('required' =>"Date attendue " ));

   $this->form_validation->set_rules('heureProp', '"Heure proposée"', 'required|callback_heureProp_check',
                                                                    array('required' =>"Heure attendue " ));
    $this->form_validation->set_rules('nbpassagersProp', '"Nombre de places proposées"');


      
    $this->form_validation->set_rules('accepteArret', '"Accepte des arrêts"');
      if($this->form_validation->run())
    {//  Le formulaire est valide
      $this->nbpassagersProp=$this->input->post('nbpassagersProp');
         
          if ($this->input->post('accepteArret')=="on")
                 {$this->accepteArret=1;} 
            else {$this->accepteArret=0;}
      //revoir ces deux accès à des bases
      $this->load->model('trajet_model');
     // si le trajet existe dèjà il n'est pas créé
      if (count($this->trajet_model->existe_trajet($this->dateProp,$this->heureProp,$this->place_id,$this->vers_lycee,$this->accepteArret,$this->session->id_covoit_connecte))==0)
        { //création du trajet si aucun trajet ne correspond   
          $res1=$this->trajet_model->ajoute_trajet($this->dateProp,$this->heureProp,$this->place_id,$this->vers_lycee,$this->accepteArret);}
           // recherche de l'identifiant de trajet  !! par la suite ajouter une transaction
         $this->load->model('trajet_model');
         $res2=$this->trajet_model->trouve_id_trajet($this->dateProp,$this->heureProp,$this->place_id,$this->vers_lycee,$this->accepteArret);
        // création de la référence  entre le trajet et le conducteur par la relation réalise
         $this->load->model('realise_model');
         $res3=$this->realise_model->ajoute_realise($this->nbpassagersProp,$res2[0]['id_trajet'],$this->session->id_covoit_connecte);
         
         $this->load->library('layout');
         $this->layout->set_theme('default');
         $this->layout->ajouter_css('jumbotron');
        // afichage de tous les trajets à venuir pour le conducteur

         $this->load->model('trajet_model');
         
         $data['results']=$this->trajet_model->liste_trajet($this->dateProp,$this->heureProp,$this->place_id,$this->vers_lycee,$this->accepteArret,$this->session->id_covoit_connecte);
         
         $this->layout->views('themes/barreNav')
               ->views('vueConfirmeTrajetPropose',$data)
                ->view('themes/footer');
        }
              
      
    else
    {  
        //  Le formulaire est invalide ou vide
  $this->load->library('layout');
   $this->layout->set_theme('default');
  $this->layout->ajouter_css('jumbotron');
  


  $this->layout->views('themes/barreNav')
               ->views('vueProposeTrajet')
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
