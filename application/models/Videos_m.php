<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos_m extends CI_Model {

	public function get_videos($slug) {
		$this->db->select(['*', LANG.'_text as text']);
		$this->db->where(array(SLUG => $slug));
		$r = $this->db->get(VIDEOS);
		return $r->result_array();
	}

	public function add($data) {
		$result = array(
			'success' => FALSE,
			'error_message' => NULL
		);

		$this->load->library('upload');

		$config = array(
			'upload_path' => 'uploads/videos',
			'allowed_types' => 'mp4'
		);

		$this->upload->initialize($config);

		if(!$this->upload->do_upload('name')) {
			$result['error_message'] = lang('video').': '.$this->upload->display_errors();
			return $result;
		}

		else {
			$data[NAME] = $this->upload->data('file_name');
		}

		$config = array(
			'upload_path' => 'uploads/videos/posters',
			'allowed_types' => 'gif|png|jpg'
		);

		$this->upload->initialize($config);

		if(!$this->upload->do_upload('poster')) {
			$result['error_message'] = lang('poster').': '.$this->upload->display_errors();
			return $result;
		}

		else {
			$data[POSTER] = $this->upload->data('file_name');
		}

		$config = array(
			'upload_path' => 'uploads/videos/subtitles',
			'allowed_types' => 'vvt'
		);

		$this->upload->initialize($config);

		if($this->upload->do_upload('subtitles')) {
			$data[SUBTITLES] = $this->upload->data('file_name');
		}

		if($this->db->insert(VIDEOS, $data)) {
			$result['success'] = TRUE;
		}

		return $result;
	}

	public function delete($id) {
		$this->db->where(array(ID => $id));
		$r = $this->db->get(VIDEOS);

		if($r->num_rows() === 1) {
			$video = $r->row_array();

			if($video[NAME]) {
				unlink('uploads/videos/'.$video[NAME]);
			}

			if($video[POSTER]) {
				unlink('uploads/videos/posters/'.$video[POSTER]);
			}

			if($video[SUBTITLES]) {
				unlink('uploads/videos/subtitles/'.$video[SUBTITLES]);
			}

			$this->db->where(array(ID => $id));
			return $this->db->delete(VIDEOS);
		}
	}

}

/* End of file Videos_m.php */
/* Location: ./application/models/Videos_m.php */