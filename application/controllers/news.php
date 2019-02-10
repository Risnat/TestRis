<?php

class News extends CI_Controller

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

    $this->load->model('news_model', 'newsManager');

//déjà essayés
    $resultat = $this->newsManager->ajouter_news('Arthur',

                             'Un super titre',

                             'Un super contenu !');

    var_dump($resultat);
/*$resultat = $this->newsManager->editer_news(4,'Un nul titre',

                             'Un nul contenu !');
 var_dump($resultat);

  $resultat = $this->newsManager->supprimer_news(6);
  
   $nb_news = $this->newsManager->count();
print_r($nb_news)  ;
    $nb_news_de_bob = $this->newsManager->count(array('auteur' => 'toto'));
   var_dump($nb_news_de_bob); */
}

}