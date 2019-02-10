<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Destination_model extends CI_Model

{   protected $table = 'destination';

    public function get_info()

    {

        //  On simule l'envoi d'une requête

       /* return array('auteur' => 'Chuck Norris',

                 'date' => '24/07/05',

                     'email' => 'email@ndd.fr');*/

    }
 
 /**

     *  Ajoute une covoitureur

     *

     *  @param string $usrmail   Adrese courriel électronique

     *  @param string $pwd    LMot de passe crypté du covoituruer

     * les autres valeurs sont crées par défaut en attendant que le covoitureur
     * complète son profil

    * */ 
public function ajoute_destination($place_id,$adresse_formatee, $latitude,$longitude)

{  

    return $this->db->set('latitude',  $latitude)
             ->set('longitude',   $longitude)
            ->set('adresse_formatee', $adresse_formatee)
            ->set('place_id', $place_id;
            ->insert($this->table);}

}

   

   



/**
 *  Retourne le nombre de destination correspondante à l'identifiant Google du lieu.
 *  
 *  @param array $where Tableau associatif permettant de définir des conditions
 *  @return integer     Le nombre de news satisfaisant la condition
 */
  public function count($where = array())
  {
    return (int) $this->db->where($where)
                  ->count_all_results($this->table);
   }

    

  }