<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_m extends CI_Model {

	public function get_navigation() {

		$lang = LANG;

		$this->db->select(["{$lang}_title as title", 'slug']);
		$this->db->where(array(SLUG.' !=' => '', 'navigation' => 1));
		$r = $this->db->get(PAGES);
		return $r->result_array();
	}

	public function get_pages() {
		$this->db->where(array(SLUG.' !=' => ''));
		$r = $this->db->get(PAGES);
		return $r->result_array();
	}

	public function get_page($slug) {

		$lang = LANG;

		$this->db->select(['*', "{$lang}_title as title", "{$lang}_body as body"]);
		$this->db->where(array(SLUG => $slug));
		$r = $this->db->get(PAGES);
		return $r->row_array();
	}

	public function get_children($slug) {

		$lang = LANG;

		$parent = $this->get_page($slug);

		if(empty($parent)) {
			return [];
		}

		$this->db->select(['*', "{$lang}_title as title", "{$lang}_body as body"]);
		$this->db->where([
			'parent' => $parent['id'],
			'active' => 1,
		]);
		
		return $this->db->get(PAGES)->result_array();
	}

	public function update($data, $slug) {

		if(@$data['active'] !== '1') {
			$data['active'] = 0;
		}

		if(@$data['navigation'] !== '1') {
			$data['navigation'] = 0;
		}

		$this->db->where(array(SLUG => $slug));
		return $this->db->update(PAGES, $data);
	}

}

/* End of file Pages_m.php */
/* Location: ./application/models/Pages_m.php */