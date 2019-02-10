



<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Trajet_model extends CI_Model

{   protected $table = 'trajet';

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

     *  @param string $pwd    Mot de passe crypté du covoituruer

     * les autres valeurs sont crées par défaut en attendant que le covoitureur
     * complète son profil

    * */ 
public function ajoute_trajet($date,$heure,$place_id,$vers_lycee,$accepteArret )
    {return $this->db->set('date_trajet',$date)
             ->set('heure_trajet',   $heure)
            ->set('vers_lycee',$vers_lycee)
            ->set('id_destination',$place_id)
             ->set('accepte_arret',$accepteArret)
            ->insert($this->table);
   }

   

   


  /**
 *  Retourne le nombre de trajet correspondant aux caractéristiques proposés par l'utilisateur.
 *  
 *  @param array $where Tableau associatif permettant de définir des conditions
 *  @return integer     Le nombre de trajets satisfaisant la condition
 */
  public function existe_trajet($date,$heure,$place_id,$vers_lycee,$accepteArret,$id_covoitureur)
  {   
      $this->db->select ('*');
      $this->db->from($this->table);
      $this->db->join('realise','trajet.id_trajet=realise.id_trajet');
      $this->db->where (array('date_trajet'=>$date,'heure_trajet'=>$heure,'vers_lycee'=>$vers_lycee,'accepte_arret'=>$accepteArret,'id_conducteur'=>$id_covoitureur));
      $this->db->where ('nbre_passagers>=', 1);
      return $this->db->get()->result();
      
   }
    /**
 *  Retourne le nombre de trajet correspondant aux caractéristiques proposés par l'utilisateur.
 *  
 *  @param array $where Tableau associatif permettant de définir des conditions
 *  @return integer     Le nombre de trajets satisfaisant la condition
 */
  public function trouve_id_trajet($date,$heure,$place_id,$vers_lycee,$accepteArret)
  {   
      $this->db->select ('id_trajet');
      $this->db->from($this->table);
      $this->db->where (array('date_trajet'=>$date,'heure_trajet'=>$heure,'vers_lycee'=>$vers_lycee,'accepte_arret'=>$accepteArret));
      $query=$this->db->get();
      return $query->result_array();
   }

    public function liste_trajet($date,$heure,$place_id,$vers_lycee,$accepteArret,$id_covoitureur)
  {  
      $this->db->select ('adresse_formatee,vers_lycee,date_trajet,heure_trajet,accepte_arret,nbre_passagers');
      $this->db->from($this->table);
      $this->db->join('realise','trajet.id_trajet=realise.id_trajet');
      $this->db->join('destination','destination.id_destination=trajet.id_destination');
      $this->db->where ('id_conducteur='.$id_covoitureur.' AND date_trajet>=NOW()');
      $query=$this->db->get();
      return $query->result_array();
      
   }
   private function modifie_heure($heure,$ecart)
   {
    list($partieHeure, $partieMinute) = explode(":", $heure);
    $partieHeure=(int)$partieHeure;
    $partieMinute=(int)$partieMinute;
    $nbMinuteTotal=(int)$partieHeure*60+(int)$partieMinute;
    
    $nbMinuteTotalModifie=$nbMinuteTotal+$ecart;
    
    $partieHeure=intval($nbMinuteTotalModifie/60);
    $partieMinute=$nbMinuteTotalModifie%60;
    return $partieHeure.":".$partieMinute;
   }
   public function recherche_trajet($date,$heure,$place_id,$vers_lycee)
  {   
      $this->db->select ('trajet.id_trajet,adresse_formatee,nom_communaute,niveau,vers_lycee,date_trajet,heure_trajet,id_conducteur,email_covoit,accepte_arret');
      $this->db->from($this->table);
      $this->db->join('realise','trajet.id_trajet=realise.id_trajet');
      $this->db->join('destination','destination.id_destination=trajet.id_destination');
      $this->db->join('covoitureur','covoitureur.id_covoit=realise.id_conducteur');
      $this->db->join('communaute','covoitureur.communaute_covoit=communaute.id_communaute');
      // recherche des trajets avec 20 minutes d'avance ou de retard
      $heuremin=$this->modifie_heure($heure,-20);
      $heuremax=$this->modifie_heure($heure,20);
      $where_heure="heure_trajet BETWEEN ".'"'.$heuremin.'" AND "'.$heuremax.'"';
      $where="date_trajet=".'"'.$date.'"'." AND ".$where_heure." AND vers_lycee=".$vers_lycee." AND destination.id_destination= ".$place_id. " AND nbre_passagers>= 1 AND ((entre_communaute=0 AND communaute_covoit=".$this->session->communaute.") OR entre_communaute=1)";
      $this->db->where($where);
    
      return $this->db->get()->result();
   }

  }
