<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class News_model extends CI_Model

{   protected $table = 'news';

    public function get_info()

    {

        //  On simule l'envoi d'une requête

        return array('auteur' => 'Chuck Norris',

                 'date' => '24/07/05',

                     'email' => 'email@ndd.fr');

    }
 
 /**

     *  Ajoute une news

     *

     *  @param string $auteur   L'auteur de la news

     *  @param string $titre    Le titre de la news

     *  @param string $contenu  Le contenu de la news

     *  @return bool        Le résultat de la requête

     */
public function ajouter_news($auteur, $titre, $contenu)

{

    return $this->db->set('auteur',  $auteur)

            ->set('titre',   $titre)

            ->set('contenu', $contenu)

            ->set('date_ajout', 'NOW()', false)

            ->set('date_modif', 'NOW()', false)

            ->insert($this->table);

}

    

    /**

     *  Édite une news déjà existante

     */

   public function editer_news($id, $titre = null, $contenu = null)
{
    //  Il n'y a rien à éditer
    if($titre == null AND $contenu == null)

    {
        return false;
    }

    //  Ces données seront échappées

    if($titre != null)
    {
        $this->db->set('titre', $titre);
    }

    if($contenu != null)
    {
        $this->db->set('contenu', $contenu);
    }

    //  Ces données ne seront pas échappées
    $this->db->set('date_modif', 'NOW()', false); 
    //  La condition
    $this->db->where('id', (int) $id);  

    return $this->db->update($this->table);

}

    

    /**

     *  Supprime une news

     */

    public function supprimer_news($id)

    {

    return $this->db->where('id', (int) $id)

            ->delete($this->table);

}

    

   

/**
 *	Retourne le nombre de news.
 *	
 *	@param array $where	Tableau associatif permettant de définir des conditions
 *	@return integer		Le nombre de news satisfaisant la condition
 */
public function count($where = array())
{
	return (int) $this->db->where($where)
			      ->count_all_results($this->table);
}

    

    /**

     *  Retourne une liste de news

     */

    public function liste_news()

    {

        

    }

}
