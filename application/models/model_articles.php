<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_articles extends CI_Model {

    public function getArticles(){
        $query = $this->db->query('
                        SELECT article_title, article_content
                        FROM articles'
                    );
        return $query->result();
    }

}
?>