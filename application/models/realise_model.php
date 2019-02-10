<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Realise_model extends CI_Model

{   protected $table = 'realise';

    public function get_info()

    {

        //  On simule l'envoi d'une requête

       /* return array('auteur' => 'Chuck Norris',

                 'date' => '24/07/05',

                     'email' => 'email@ndd.fr');*/

    }
 
 /**

     *  Ajoute une association realise entre trajet conducteur

     *

     *  @param l   Adrese courriel électronique

     *  @param string $pwd    LMot de passe crypté du covoituruer

     * les autres valeurs sont crées par défaut en attendant que le covoitureur
     * complète son profil

    * */ 
public function ajoute_realise($nb_places,$id_trajet, $id_conducteur)
{  
    return $this->db->set('nbre_passagers',  $nb_places)
             ->set('id_trajet',   $id_trajet)
            ->set('id_conducteur', $id_conducteur)
            ->insert($this->table);
}

   public function maj_realise($id_passager,$id_trajet, $id_conducteur)
{  
    $this->db->set('nbre_passagers',  'nbre_passagers-1');
    $this->db->where('id_trajet',   $id_trajet);
    $this->db->where('id_conducteur', $id_conducteur);
    $this->db->where('id_passager1', $id_passager);
    return $this->db->update($this->table);
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