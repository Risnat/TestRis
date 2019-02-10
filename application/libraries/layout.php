<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $output = '';
	private $theme = 'default';
	private $var = array();
/*
|===============================================================================
| Constructeur
|===============================================================================
*/
	
	public function __construct()
	{//référence de l'instance de code Igniter
	$this->CI = get_instance();
		
	//initialisation du contenu du layout notamment pour le head html
	$this->var['output'] = '';
	//  Le titre est composé du nom de la méthode et du nom du contrôleur
    //  La fonction ucfirst permet d'ajouter une majuscule
    $this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());
    //  Initialisation la variable $charset avec la même valeur que
    //  la clé de configuration initialisée dans le fichier config.php
    $this->var['charset'] = $this->CI->config->item('charset');


       //inclusion de javascript et de css

    $this->var['css'] = array();
    $this->var['js'] = array();
	}

	/*
|===============================================================================
| Méthodes pour modifier les variables envoyées au layout
|	. set_titre
|	. set_charset
|===============================================================================
*/
public function set_titre($titre)
{
	if(is_string($titre) AND !empty($titre))
	{
		$this->var['titre'] = $titre;
		return true;
	}
	return false;
}

public function set_charset($charset)
{
	if(is_string($charset) AND !empty($charset))
	{
		$this->var['charset'] = $charset;
		return true;
	}
	return false;
}
/*

|===============================================================================

| Méthodes pour ajouter des feuilles de CSS et de JavaScript

|   . ajouter_css
|attention bootstrap deva $être chargé pour chaque page 

|   . ajouter_js

|===============================================================================

*/
	
	public function ajouter_css($nom)

{

    if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css'))

    {

        $this->var['css'][] = css_url($nom);

        return true;

    }

    return false;

}


public function ajouter_js($nom)

{

    if(is_string($nom) AND !empty($nom) AND file_exists('./assets/js/' . $nom . '.js'))

    {

        $this->var['js'][] = js_url($nom);

        return true;

    }

    return false;
}
/*
|===============================================================================
| Méthodes pour charger les vues
|	. view : inclure une vue dans le layout
|	. views : sauvegarder le contenu d'un ou plusiuers vues sans l'afficher immédiatement
|===============================================================================
*/
	
	public function view($name, $data = array())
	{
    //ajouter le contenu HTML à l'attribut $output
    $this->output .= $this->CI->load->view($name, $data, true);
//ajout dans les var du output modifié au fur et à mesure des chragements de vues partielles
    $this->var['output']=$this->output;
//inclusion du layout
	$this->CI->load->view('themes/' . $this->theme, $this->var);
}
	
	public function views($name, $data = array())
	{

    $this->output .= $this->CI->load->view($name, $data, true);

    return $this;

}

public function set_theme($theme)

{

    if(is_string($theme) AND !empty($theme) AND file_exists('./application/views/themes/' . $theme . '.php'))

    {

        $this->theme = $theme;

        return true;

    }

    return false;

}
}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */