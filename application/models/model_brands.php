<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_brands extends CI_Model {

	function get_all_brands() { 

		return $this->db->get('brands')->result();

	} # End get_all_brands
	
	function get_brand_by_id($id) { 

		$this->db->where('brand_url', $id);

		return $this->db->get('brands')->row();

	} # End get_brand_by_id
	
} # End get_all_brands