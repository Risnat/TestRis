<?php

class User extends CI_Controller

{

    public function accueil()

    {

        //  Chargement du modèle de gestion des news

        $this->load->model('news_model');


        $data = array();


        //  On lance une requête

        $data['user_info'] = $this->news_model->get_info();
 var_dump($data);

        //  On inclut une vue

$this->load->view('vue', $data);

/*inclusion de vues avec layout
$this->load->library('layout');
	
	$this->layout->views('premiere_vue')
		     ->views('deuxieme_vue')
		     ->view('derniere_vue');*/
}
        
    }
