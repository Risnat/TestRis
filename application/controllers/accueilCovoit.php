<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccueilCovoit extends CI_Controller 

	{ 
    public function __construct()

    {

        parent::__construct();
		$this->session->set_userdata('pas', '0.02');
    $this->session->liste_trajets_trouves=array();
    }

    

    public function index()

    {

        $this->accueil();

    }


     private function determineIdentCovoit()

    {

      if (!isset($this->session->compteCree))
         {$this->session->set_userdata('identCovoit',"? à votre compte");}
         elseif ($this->session->compteCree=="")
             {$this->session->set_userdata('identCovoit',"Echec à l'inscription"); }
                elseif ($this->session->compteCree=="OK" )
                     {if (isset ($this->session->nom) && isset($this->session->prenom))
                         {if ($this->session->nom!="" || $this->session->prenom!="") 
                            {$this->session->set_userdata('identCovoit',$this->session->nom." ".$this->session->prenom);
                            }   
                             else
                            {$this->session->prenom="";
                             $this->session->nom="";
                             $this->session->set_userdata('identCovoit',"? à votre compte");
                            } 
                          }
                      }
                     else
                    {$this->session->set_userdata('identCovoit',"? à votre compte");}

    }

 public function accueil()

{
  $this->load->library('layout');
   $this->layout->set_theme('default');
  $this->layout->ajouter_css('jumbotron');
  
  $data=array();
  $data['identCovoit']=$this->determineIdentCovoit();

  $this->layout->views('themes/barreNav')
		           ->views('themes/jumbo')
                ->view('themes/footer');
	  
    //$this->load->model('news_model', 'newsManager');

/*déjà essayés
    $resultat = $this->newsManager->ajouter_news('Arthur',

                             'Un super titre',

                             'Un super contenu !');

    var_dump($resultat);
$resultat = $this->newsManager->editer_news(4,'Un nul titre',

                             'Un nul contenu !');
 var_dump($resultat);

  $resultat = $this->newsManager->supprimer_news(6);
   
   $nb_news = $this->newsManager->count();
print_r($nb_news)  ;
    $nb_news_de_bob = $this->newsManager->count(array('auteur' => 'toto'));
   var_dump($nb_news_de_bob);*/
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
