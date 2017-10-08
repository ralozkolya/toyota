<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners_m extends CI_Model {

	public function get_banners() {
		$this->db->select(['id', LANG.'_name as name']);
		return $this->db->get(BANNERS)->result_array();
	}

	public function get($id) {
		return $this->db->get_where('banners', ['id' => $id])->row_array();
	}

	public function add($data) {

		$config = array(
			'upload_path' => 'uploads/banners',
			'allowed_types' => 'gif|png|jpg'
		);

		$this->load->library('upload', $config);

		$data['ka_name'] = $this->upload('ka_name');
		$data['en_name'] = $this->upload('en_name');

		if(!$data['ka_name'] || !$data['en_name']) {
			return FALSE;
		}

		return $this->db->insert('banners', [
			'ka_name' => $data['ka_name'],
			'en_name' => $data['en_name'],
			'url' => $this->prep_url($data['url'])
		]);
	}

	public function edit($data) {
		
		$banner = $this->db->get_where('banners', ['id' => $data['id']])->row_array();

		if(!$banner) {
			return FALSE;
		}

		$ka_name = $this->upload('ka_name');
		$en_name = $this->upload('en_name');

		if($ka_name) {
			$this->delete_image($banner['ka_name']);
			$data['ka_name'] = $ka_name;
		}

		if($en_name) {
			$this->delete_image($banner['en_name']);
			$data['en_name'] = $en_name;
		}

		if($data['url']) {
			$data['url'] = $this->prep_url($data['url']);
		}

		$this->db->where('id', $data['id']);
		return $this->db->update('banners', $data);
	}

	public function delete($id) {

		$banner = $this->db->get_where('banners', ['id' => $id])->row_array();

		if(!$banner) {
			return FALSE;
		}

		if($banner['ka_name']) {
			$this->delete_image($banner['ka_name']);
		}

		if($banner['en_name']) {
			$this->delete_image($banner['en_name']);
		}

		$this->db->where(array(ID => $id));
		return $this->db->delete(BANNERS);
	}

	private function prep_url($url) {

		if(empty($url) || $url === '#') {
			return $url;
		}

		else {
			return prep_url($url);
		}
	}

	private function delete_image($filename) {
		$image = "uploads/banners/{$filename}";
		if(file_exists($image) && !is_dir($image))
			unlink($image);
	}

	private function upload($key) {

		$config = array(
			'upload_path' => 'uploads/banners',
			'allowed_types' => 'gif|png|jpg'
		);

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($key)) {
			return NULL;
		}

		return $this->upload->data('file_name');
	}
}

/* End of file Banners_m.php */
/* Location: ./application/models/Banners_m.php */