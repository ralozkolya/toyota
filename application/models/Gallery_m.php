<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_m extends CI_Model {

	public function get_images($slug) {
		$this->db->where(array(SLUG => $slug));
		$r = $this->db->get(GALLERY);
		return $r->result_array();
	}

	public function add($data) {

		$result = array(
			'success' => FALSE,
			'error_message' => NULL
		);

		$config = array(
			'upload_path' => 'uploads/gallery',
			'allowed_types' => 'gif|png|jpg',
			'max_size' => '1024'
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload('name')) {
			$imgConf = array(
				'source_image' => $this->upload->data('full_path'),
				'width' => 533,
				'height' => 300,
				'maintain_ratio' => TRUE,
				'new_image' => 'uploads/gallery/thumbs/'.$this->upload->data('file_name')
			);

			$this->load->library('image_lib', $imgConf);
			
			if(!$this->image_lib->resize()) {
				$result['error_message'] = $this->image_lib->display_errors();
				return $result;
			}

			$data[NAME] = $this->upload->data('file_name');

			if($this->db->insert(GALLERY, $data)) {
				$result['success'] = TRUE;
			}
		}

		else {
			$result['error_message'] = $this->upload->display_errors();
		}

		return $result;
	}

	public function delete($id) {
		$this->db->where(array(ID => $id));
		$r = $this->db->get(GALLERY);

		if($r->num_rows() === 1) {
			$pic = $r->row_array();
			$name = $pic[NAME];

			if($name) {
				unlink('uploads/gallery/'.$name);
				unlink('uploads/gallery/thumbs/'.$name);
			}

			$this->db->where(array(ID => $id));
			return $this->db->delete(GALLERY);
		}
	}

}

/* End of file Gallery_m.php */
/* Location: ./application/models/Gallery_m.php */