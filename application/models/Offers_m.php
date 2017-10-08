<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers_m extends CI_Model {

	public function get_list($page = 1) {

		$page = ((int) $page > 0) ? (int) $page : 1;

		$this->db->limit(OFFERS_PER_PAGE, --$page * OFFERS_PER_PAGE);
		$this->db->select(['*', LANG.'_title as title', LANG.'_body as body']);

		return $this->db->get('offers')->result_array();
	}

	public function get_all() {
		return $this->db->get('offers')->result_array();
	}

	public function get_by_slug($slug) {
		$this->db->select(['*', LANG.'_title as title', LANG.'_body as body']);
		return $this->db->get_where('offers', ['slug' => $slug])->row_array();
	}

	public function get($id) {
		return $this->db->get_where('offers', ['id' => $id])->row_array();
	}

	public function add($data) {

		$data['image'] = $this->upload();

		if(!$data['image']) {
			return FALSE;
		}

		$data['slug'] = slug($data['en_title'], 'offers');

		return $this->db->insert('offers', $data);
	}

	public function edit($data) {

		$this->db->where('id', $data['id']);
		$result = $this->db->get('offers')->row_array();

		if($result) {
			$image = $this->upload();

			if($image) {
				$this->delete_image($result['image']);
				$data['image'] = $image;
			}

			$this->db->where('id', $data['id']);
			return $this->db->update('offers', $data);
		}

		return FALSE;
	}

	public function delete($id) {

		$this->db->where('id', $id);
		$result = $this->db->get('offers')->row_array();

		if($result) {
			$this->delete_image($result['image']);
			$this->db->where('id', $id);
			return $this->db->delete('offers');
		}

		return FALSE;
	}

	public function count() {
		return $this->db->get('offers')->num_rows();
	}

	private function delete_image($filename) {
		$image = "uploads/offers/{$filename}";
		if(file_exists($image) && !is_dir($image))
			unlink($image);
		$image = "uploads/offers/thumb_{$filename}";
		if(file_exists($image) && !is_dir($image))
			unlink($image);
	}

	private function upload() {

		$config = [
			'upload_path' => 'uploads/offers',
			'allowed_types' => 'gif|png|jpg'
		];

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('image')) {
			return NULL;
		}

		$config = [
			'source_image' => $this->upload->data('full_path'),
			'new_image' => $this->upload->data('file_path').'thumb_'.$this->upload->data('file_name'),
			'width' => 300,
			'height' => 200,
			'maintain_ratio' => TRUE
		];

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();

		return $this->upload->data('file_name');
	}

}

/* End of file Offers_m.php */
/* Location: ./application/models/Offers_m.php */