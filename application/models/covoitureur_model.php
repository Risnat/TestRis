



<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Covoitureur_model extends CI_Model

{   protected $table = 'covoitureur';

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
public function ajoute_covoitureur($usrMail, $pwdcrypte)

{ // $this->db->db_debug = FALSE; 
    //  à faire tester aux élèves
    return $this->db->set('email_covoit',  $usrMail)

             ->set('password_covoit',   $pwdcrypte)
            ->set('nom_covoit', "compléter")
            ->set('prenom_covoit', "votre profil")
            ->set('date_naissance', 'NOW()', false)
            ->set('date_inscription', 'NOW()', false)
            ->set('communaute_covoit', 1)
            ->set('telephone_covoit', "9999999999")
            ->insert($this->table);

}

   

   

    /**

     *  Recherche un covoitureur sur son adresse mail
     */

   public function liste_covoitureurs($mailUsr)
{ 
    
  return $this->db->select('nom_covoit,prenom_covoit,communaute_covoit, id_covoit, password_covoit')
			->from($this->table)
			->where ('email_covoit',$mailUsr)
			->get()
			->result();

}

/**

     *  Recherche un covoitureur sur son adresse mail
     */
 public function trouve_info_covoit($ident,$pwdCrypte)
{ 
    
  return $this->db->select('nom_covoit,prenom_covoit,date_naissance,communaute_covoit, niveau,entre_communaute,peut_conduire,telephone_covoit')
            ->from($this->table)
            ->where ('id_covoit',$ident,'password_covoit',$pwdCrypte)
            ->get()
            ->result();

}
   

    public function modifie_profil($ident,$nom,$prenom,$dateNaiss,$communaute,$entre_communaute,$peut_conduire,$tel)
  {  $this->db->set('nom_covoit', $nom);
     $this->db->set('prenom_covoit', $prenom);
     $this->db->set('date_naissance', $dateNaiss);
     $this->db->set('communaute_covoit', $communaute);
     $this->db->set('entre_communaute', $entre_communaute);
     $this->db->set('peut_conduire', $peut_conduire);
     $this->db->set('telephone_covoit', $tel);  
    //  La condition
    $this->db->where('id_covoit', (int) $ident);
    return $this->db->update($this->table);
  } 
}