<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_m extends CI_Model {

	public function get_list($page = 1) {

		$page = ((int) $page > 0) ? (int) $page : 1;

		$this->db->limit(OFFERS_PER_PAGE, --$page * OFFERS_PER_PAGE);
		$this->db->select(['*', LANG.'_title as title']);

		return $this->db->get('photo_events')->result_array();
	}

	public function get_all() {
		return $this->db->get('photo_events')->result_array();
	}

	public function get_by_slug($slug) {
		$this->db->select(['*', LANG.'_title as title']);
		return $this->db->get_where('photo_events', ['slug' => $slug])->row_array();
	}

	public function get($id) {
		return $this->db->get_where('photo_events', ['id' => $id])->row_array();
	}

	public function get_files($event) {
		return $this->db->get_where('event_photos', ['event' => $event])->result_array();
	}

	public function add_photo($event) {
		$image = $this->upload();

		if(!$image) return NULL;

		return $this->db->insert('event_photos', ['image' => $image, 'event' => $event]);
	}

	public function add($data) {

		$data['image'] = $this->upload();

		if(!$data['image']) return NULL;

		$data['slug'] = slug($data['en_title'], 'photo_events');

		return $this->db->insert('photo_events', $data);
	}

	public function edit($data) {

		$this->db->where('id', $data['id']);
		$result = $this->db->get('photo_events')->row_array();

		if($result) {
			$image = $this->upload();

			if($image) {
				$this->delete_image($result['image']);
				$data['image'] = $image;
			}

			$this->db->where('id', $data['id']);
			return $this->db->update('photo_events', $data);
		}

		return FALSE;
	}

	public function delete($id) {

		$this->db->where('id', $id);
		$result = $this->db->get('photo_events')->row_array();

		if($result) {
			$this->delete_image($result['image']);
			$this->db->where('id', $id);
			return $this->db->delete('photo_events');
		}

		return FALSE;
	}

	public function delete_photo($id) {
		
		$result = $this->db->get_where('event_photos', ['id' => $id])->row_array();

		if($result) {
			$this->delete_image($result['image']);
			$this->db->where('id', $id);
			return $this->db->delete('event_photos');
		}

		return FALSE;
	}

	public function count() {
		return $this->db->get('photo_events')->num_rows();
	}

	private function delete_image($filename) {
		$image = "uploads/events/{$filename}";
		if(file_exists($image) && !is_dir($image))
			unlink($image);
		$image = "uploads/events/thumb_{$filename}";
		if(file_exists($image) && !is_dir($image))
			unlink($image);
	}

	private function upload() {

		$config = [
			'upload_path' => 'uploads/events',
			'allowed_types' => 'gif|png|jpg',
			'max_size' => 2048
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

/* End of file Photo_m.php */
/* Location: ./application/models/Photo_m.php */
