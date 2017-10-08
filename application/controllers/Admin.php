<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $data = array(
		'title' => 'Admin panel - Toyota',
		ERROR_MESSAGE => NULL,
		SUCCESS_MESSAGE => NULL
	);

	public function __construct() {
		parent::__construct();

		$this->load->library('Auth_l');
		$this->load->library(['form_validation', 'user_agent']);

		$this->load->helper(['slug', 'lang']);

		set_lang();

		if(!$this->auth_l->is_logged_in()) {
			redirect(base_url().'auth/login');
			exit();
		}

		$this->load->language('admin');
		$this->load->language('general', 'georgian');
	}

	public function index()
	{
		redirect(base_url().'admin/cars');
	}

	public function pages($slug = NULL) {

		$this->load->model('Pages_m');

		if(!$slug) {
			$this->data['pages'] = $this->Pages_m->get_pages();
			$this->load->view('pages/admin/page_selector', $this->data);
			return;
		}

		if($this->input->post()) {
			$this->form_validation->set_rules('ka_title', 'lang:ka_title', 'trim|required');
			$this->form_validation->set_rules('en_title', 'lang:en_title', 'trim|required');

			if($this->form_validation->run()) {

				if($this->Pages_m->update($this->input->post(), $slug)) {
					$this->data[SUCCESS_MESSAGE] = lang('updated_successfully');
				}

				else {
					$this->data[ERROR_MESSAGE] = lang('error_occured');
				}
			}
		}

		$this->data['page'] = $this->Pages_m->get_page($slug);
		$this->data['slug'] = $slug;
		$this->load->view('pages/admin/pages', $this->data);
	}

	public function cars($slug = NULL) {

		$this->load->model('Cars_m');
		$this->load->model('Gallery_m');
		$this->load->model('Videos_m');
		$this->load->model('Accessories_m');

		if(!$slug) {
			$this->data['cars'] = $this->Cars_m->get_models();
			$this->load->view('pages/admin/car_selector', $this->data);
			return;
		}

		if($this->input->post()) {
			$this->form_validation->set_rules('name', 'lang:name', 'trim|required');

			if($this->form_validation->run()) {

				$result = $this->Cars_m->update($this->input->post(), $slug);

				if($result['success']) {
					$this->data[SUCCESS_MESSAGE] = lang('updated_successfully');
				}

				elseif($result['error_message']) {
					$this->data[ERROR_MESSAGE] = $result['error_message'];
				}

				else {
					$this->data[ERROR_MESSAGE] = lang('error_occured');
				}
			}
		}

		$this->data['car'] = $this->Cars_m->get_model_by_slug($slug);
		$this->data['configurations'] = $this->Cars_m->get_model_configurations($slug);
		$this->data['gallery'] = $this->Gallery_m->get_images($slug);
		$this->data['videos'] = $this->Videos_m->get_videos($slug);
		$this->data['accessories'] = $this->Accessories_m->get_accessories_for_car($slug);
		$this->data['categories'] = $this->Accessories_m->get_categories();
		$this->load->view('pages/admin/cars', $this->data);
	}

	public function add_car() {

		$this->load->model('Cars_m');

		if($this->input->post()) {
			$this->form_validation->set_rules('name', 'lang:name', 'trim|required');

			if($this->form_validation->run()) {

				$result = $this->Cars_m->add($this->input->post());

				if($result['success']) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				}

				elseif($result['error_message']) {
					$this->session->set_flashdata(ERROR_MESSAGE, $result['error_message']);
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}
		}

		redirect(base_url().'admin/cars');
	}

	public function delete_car() {
		if($this->input->post()) {
			$this->load->model('Cars_m');

			$this->form_validation->set_rules(SLUG, SLUG, 'required', array(
				'required' => lang('slug_required')
			));

			if($this->form_validation->run()) {
				if($this->Cars_m->delete($this->input->post(SLUG))) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('deleted_successfully'));
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}

			else {
				$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
			}
		}

		redirect(base_url().'admin/cars');
	}

	public function configuration($id) {
		$this->load->model('Cars_m');

		if($this->input->post()) {
			$this->form_validation->set_rules('name', 'lang:config_name', 'trim|required');

			if($this->form_validation->run()) {

				$result = $this->Cars_m->update_config($this->input->post(), $id);

				if($result['success']) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				}

				elseif($result['error_message']) {
					$this->session->set_flashdata(ERROR_MESSAGE, $result['error_message']);
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}
		}

		$this->data['configuration'] = $this->Cars_m->get_config($id);
		$this->load->view('pages/admin/config', $this->data);
	}

	public function add_configuration() {
		$this->load->model('Cars_m');

		if($this->input->post()) {
			$this->form_validation->set_rules('name', 'lang:config_name', 'trim|required');

			if($this->form_validation->run()) {

				$result = $this->Cars_m->add_config($this->input->post());

				if($result['success']) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				}

				elseif($result['error_message']) {
					$this->session->set_flashdata(ERROR_MESSAGE, $result['error_message']);
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}
		}

		redirect(base_url().'admin/cars/'.$this->input->post(SLUG));
	}

	public function delete_config($slug) {
		if($this->input->post()) {
			$this->load->model('Cars_m');

			$this->form_validation->set_rules(ID, ID, 'required', array(
				'required' => lang('id_required')
			));

			if($this->form_validation->run()) {
				if($this->Cars_m->delete_config($this->input->post(ID))) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('deleted_successfully'));
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}

			else {
				$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
			}
		}

		redirect(base_url().'admin/cars/'.$slug);
	}

	public function add_photo() {
		if($this->input->post()) {

			$this->form_validation->set_rules(SLUG, SLUG, 'required', array(
				'required' => lang('error_occured')
			));

			if($this->form_validation->run()) {
				$this->load->model('Gallery_m');

				$result = $this->Gallery_m->add($this->input->post());

				if($result['success']) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				}

				elseif($result['error_message']) {
					$this->session->set_flashdata(ERROR_MESSAGE, $result['error_message']);
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}
		}

		redirect(base_url().'admin/cars/'.$this->input->post(SLUG));
	}

	public function delete_photo() {

		if($this->input->post()) {

			$response = array();

			$this->load->model('Gallery_m');

			if($this->Gallery_m->delete($this->input->post(ID))) {
				$response['status'] = 'ok';
				$response['message'] = lang('deleted_successfully');
			}

			else {
				$response['status'] = 'error';
				$response['message'] = lang('error_occured');
			}

			echo json_encode($response);
		}
	}

	public function add_video() {
		if($this->input->post()) {
			$this->form_validation->set_rules(SLUG, SLUG, 'required', array(
				'required' => lang('error_occured')
			));

			if($this->form_validation->run()) {
				$this->load->model('Videos_m');

				$result = $this->Videos_m->add($this->input->post());

				if($result['success']) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				}

				elseif($result['error_message']) {
					$this->session->set_flashdata(ERROR_MESSAGE, $result['error_message']);
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}
		}

		if($this->input->post(SLUG) !== WHY_TOYOTA) {
			redirect(base_url().'admin/cars/'.$this->input->post(SLUG));
		}

		else {
			redirect(base_url().'admin/other');
		}
	}

	public function delete_video() {

		if($this->input->post()) {

			$response = array();

			$this->load->model('Videos_m');

			if($this->Videos_m->delete($this->input->post(ID))) {
				$response['status'] = 'ok';
				$response['message'] = lang('deleted_successfully');
			}

			else {
				$response['status'] = 'error';
				$response['message'] = lang('error_occured');
			}

			echo json_encode($response);
		}
	}

	public function accessory($id) {
		$this->load->model('Accessories_m');

		if($this->input->post()) {
			$this->form_validation->set_rules('ka_name', 'lang:ka_name', 'trim|required');
			$this->form_validation->set_rules('en_name', 'lang:en_name', 'trim|required');
			$this->form_validation->set_rules(CATEGORY, 'lang:category', 'numeric|required');

			if($this->form_validation->run()) {

				$result = $this->Accessories_m->update($this->input->post(), $id);

				if($result['success']) {
					$this->data[SUCCESS_MESSAGE] = lang('updated_successfully');
				}

				elseif($result['error_message']) {
					$this->data[ERROR_MESSAGE] = $result['error_message'];
				}

				else {
					$this->data[ERROR_MESSAGE] = lang('error_occured');
				}
			}
		}

		$this->data['accessory'] = $this->Accessories_m->get_accessory($id);
		$this->data['categories'] = $this->Accessories_m->get_categories();
		$this->load->view('pages/admin/accessory', $this->data);
	}

	public function add_accessory() {

		$this->load->model('Accessories_m');

		if($this->input->post()) {
			$this->form_validation->set_rules('ka_name', 'lang:ka_name', 'trim|required');
			$this->form_validation->set_rules('en_name', 'lang:en_name', 'trim|required');
			$this->form_validation->set_rules(CATEGORY, 'lang:category', 'numeric|required');

			if($this->form_validation->run()) {

				$result = $this->Accessories_m->add($this->input->post());

				if($result['success']) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				}

				elseif($result['error_message']) {
					$this->session->set_flashdata(ERROR_MESSAGE, $result['error_message']);
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}

			else {
				$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
			}
		}

		redirect(base_url().'admin/cars/'.$this->input->post(CAR));
	}

	public function delete_accessory() {

		if($this->input->post()) {

			$response = array();

			$this->load->model('Accessories_m');

			if($this->Accessories_m->delete($this->input->post(ID))) {
				$response['status'] = 'ok';
				$response['message'] = lang('deleted_successfully');
			}

			else {
				$response['status'] = 'error';
				$response['message'] = lang('error_occured');
			}

			echo json_encode($response);
		}
	}

	public function offers($id = NULL) {

		$this->load->model('Offers_m');

		if(!$id) {
			$this->data['offers'] = $this->Offers_m->get_all();
			$this->load->view('pages/admin/offers', $this->data);
			return;
		}

		$this->data['offer'] = $this->Offers_m->get($id);
		$this->load->view('pages/admin/offer', $this->data);
	}

	public function edit_offer() {

		$this->load->model('Offers_m');

		$id = $this->input->post('id');

		if($this->input->post()) {

			if($id) {
				$this->form_validation->set_rules('id', 'lang:id', 'required|numeric');
			}
			
			$this->form_validation->set_rules('ka_title', 'lang:ka_title', 'required');
			$this->form_validation->set_rules('en_title', 'lang:en_title', 'required');

			if($this->form_validation->run()) {

				$result = NULL;

				if($id) {
					$result = $this->Offers_m->edit($this->input->post());
				} else {
					$result = $this->Offers_m->add($this->input->post());
				}

				if($result) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				} else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}

			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
			}
		}

		redirect($this->agent->referrer());
	}

	public function delete_offer() {

		if($this->input->post()) {
			$this->load->model('Offers_m');

			if($this->Offers_m->delete($this->input->post(ID))) {
				$this->session->set_flashdata(SUCCESS_MESSAGE, lang('deleted_successfully'));
			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
			}
		}

		redirect(base_url('admin/offers'));
	}

	public function news($id = NULL) {

		$this->load->model('News_m');

		if(!$id) {
			$this->data['news'] = $this->News_m->get_all();
			$this->load->view('pages/admin/news', $this->data);
			return;
		}

		$this->data['post'] = $this->News_m->get($id);
		$this->load->view('pages/admin/post', $this->data);
	}

	public function edit_news() {

		$this->load->model('News_m');

		$id = $this->input->post('id');

		if($this->input->post()) {

			if($id) {
				$this->form_validation->set_rules('id', 'lang:id', 'required|numeric');
			}
			
			$this->form_validation->set_rules('ka_title', 'lang:ka_title', 'required');
			$this->form_validation->set_rules('en_title', 'lang:en_title', 'required');

			if($this->form_validation->run()) {

				$result = NULL;

				if($id) {
					$result = $this->News_m->edit($this->input->post());
				} else {
					$result = $this->News_m->add($this->input->post());
				}

				if($result) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				} else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}

			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
			}
		}

		redirect($this->agent->referrer());
	}

	public function delete_news() {

		if($this->input->post()) {
			$this->load->model('News_m');

			if($this->News_m->delete($this->input->post(ID))) {
				$this->session->set_flashdata(SUCCESS_MESSAGE, lang('deleted_successfully'));
			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
			}
		}

		redirect(base_url('admin/news'));
	}

	public function photos($id = NULL) {

		$this->data['modify_url'] = 'photo_event';
		$this->data['delete_file'] = 'delete_event_photo';

		$this->load->model('Photo_m');

		if(!$id) {
			$this->data['events'] = $this->Photo_m->get_all();
			$this->load->view('pages/admin/events', $this->data);
			return;
		}

		$this->data['event'] = $this->Photo_m->get($id);
		$this->data['files'] = $this->Photo_m->get_files($id);
		$this->load->view('pages/admin/event', $this->data);
	}

	public function edit_photo_event() {

		$this->load->model('Photo_m');

		$id = $this->input->post('id');

		if($this->input->post()) {

			if($id) {
				$this->form_validation->set_rules('id', 'lang:id', 'required|numeric');
			}
			
			$this->form_validation->set_rules('ka_title', 'lang:ka_title', 'required');
			$this->form_validation->set_rules('en_title', 'lang:en_title', 'required');

			if($this->form_validation->run()) {

				$result = NULL;

				if($id) {
					$result = $this->Photo_m->edit($this->input->post());
				} else {
					$result = $this->Photo_m->add($this->input->post());
				}

				if($result) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				} else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}

			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
			}
		}

		redirect($this->agent->referrer());
	}

	public function delete_photo_event() {

		if($this->input->post()) {
			$this->load->model('Photo_m');

			if($this->Photo_m->delete($this->input->post(ID))) {
				$this->session->set_flashdata(SUCCESS_MESSAGE, lang('deleted_successfully'));
			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
			}
		}

		redirect(base_url('admin/photos'));
	}

	public function videos($id = NULL) {

		$this->data['modify_url'] = 'video_event';

		$this->load->model('Video_m');

		if(!$id) {
			$this->data['events'] = $this->Video_m->get_all();
			$this->load->view('pages/admin/events', $this->data);
			return;
		}

		$this->data['event'] = $this->Video_m->get($id);
		$this->load->view('pages/admin/event', $this->data);
	}

	public function edit_video_event() {

		$this->load->model('Video_m');

		$id = $this->input->post('id');

		if($this->input->post()) {

			if($id) {
				$this->form_validation->set_rules('id', 'lang:id', 'required|numeric');
			}
			
			$this->form_validation->set_rules('ka_title', 'lang:ka_title', 'required');
			$this->form_validation->set_rules('en_title', 'lang:en_title', 'required');

			if($this->form_validation->run()) {

				$result = NULL;

				if($id) {
					$result = $this->Video_m->edit($this->input->post());
				} else {
					$result = $this->Video_m->add($this->input->post());
				}

				if($result) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				} else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}

			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
			}
		}

		redirect($this->agent->referrer());
	}

	public function delete_video_event() {

		if($this->input->post()) {
			$this->load->model('Video_m');

			if($this->Video_m->delete($this->input->post(ID))) {
				$this->session->set_flashdata(SUCCESS_MESSAGE, lang('deleted_successfully'));
			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
			}
		}

		redirect(base_url('admin/videos'));
	}

	public function add_event_photo() {

		$this->load->model('Photo_m');

		$response = [ 'success' => FALSE ];
		
		if($this->input->post()) {
			$this->form_validation->set_rules('id', 'lang:id', 'trim|required|numeric');

			if($this->form_validation->run()) {

				if($this->Photo_m->add_photo($this->input->post('id'))) {
					$response['success'] = TRUE;
				}

			} else {
				$response['error_message'] = strip_tags(validation_errors());
			}
		}

		echo json_encode($response);
	}

	public function add_event_video() {

	}

	public function delete_event_photo($id) {

		$this->load->model('Photo_m');

		if($this->Photo_m->delete_photo($id)) {
			$this->session->set_flashdata(SUCCESS_MESSAGE, lang('deleted_successfully'));
		} else {
			$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
		}

		redirect($this->agent->referrer());
	}

	public function other() {
		$this->load->model(['Banners_m', 'Videos_m', 'Config_m']);

		$this->data['banners'] = $this->Banners_m->get_banners();
		$this->data['videos'] = $this->Videos_m->get_videos(WHY_TOYOTA);
		$this->data['mails'] = $this->Config_m->get_mails();

		$this->load->view('pages/admin/other', $this->data);
	}

	public function banner($id) {
		$this->load->model('Banners_m');
		$banner = $this->data['banner'] = $this->Banners_m->get($id);

		if(!$banner) {
			show_404();
		}

		$this->load->view('pages/admin/banner', $this->data);
	}

	public function edit_banner() {

		$this->load->model('Banners_m');

		$id = $this->input->post('id');

		if($this->input->post()) {

			if($id) {
				$this->form_validation->set_rules('id', 'lang:id', 'required|numeric');
			}

			if(!$id || $this->form_validation->run()) {

				$result = NULL;

				if($id) {
					$result = $this->Banners_m->edit($this->input->post());
				} else {
					$result = $this->Banners_m->add($this->input->post());
				}

				if($result) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				} else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}

			} else {
				$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
			}
		}

		redirect($this->agent->referrer());
	}

	public function delete_banner() {

		if($this->input->post()) {
			$response = array();

			$this->load->model('Banners_m');

			if($this->Banners_m->delete($this->input->post(ID))) {
				$response['status'] = 'ok';
				$response['message'] = lang('deleted_successfully');
			}

			else {
				$response['status'] = 'error';
				$response['message'] = lang('error_occured');
			}

			echo json_encode($response);
		}
	}

	public function change_mail() {
		if($this->input->post()) {
			$this->form_validation->set_rules('contact_email', 'lang:contact_email', 'required|valid_email');
			$this->form_validation->set_rules('test_drive_email', 'lang:test_drive_email', 'required|valid_email');
			$this->form_validation->set_rules('service_email', 'lang:service_email', 'required|valid_email');

			if($this->form_validation->run()) {
				$this->load->model('Config_m');

				if($this->Config_m->edit($this->input->post())) {
					$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
				}
				
				else {
					$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
				}
			}
		}

		redirect(base_url().'admin/other');
	}

	public function user() {

		if($this->input->post()) {
			$this->form_validation->set_rules(USERNAME, 'lang:username', 'required|min_length[5]');

			if($this->form_validation->run()) {

				$this->db->where(array(
					ID => $this->session->userdata(USER)[ID]
				));

				$this->db->update(USERS, array(
					USERNAME => $this->input->post(USERNAME)
				));

				$this->db->where(array(ID => $this->session->userdata(USER)[ID]));
				$r = $this->db->get(USERS);
				
				if($r->num_rows() === 1) {
					$user = $r->row_array();
					unset($user[PASSWORD]);
					$this->session->set_userdata(USER, $user);
				}

				$this->data[SUCCESS_MESSAGE] = lang('updated_successfully');
			}
		}

		$this->load->view('pages/admin/user', $this->data);
	}

	public function change_password() {
		if($this->input->post()) {

			$r = $this->db->get_where(USERS, array(
				USERNAME => $this->session->userdata(USER)[USERNAME]
			));

			$user = $r->row_array();

			$old = $this->input->post('old_password');

			if(password_verify($old, $user[PASSWORD])) {
				$this->form_validation->set_rules('new_password', 'lang:new_password',
					'required|min_length[5]');

				$this->form_validation->set_rules('repeat_password', 'lang:repeat_password',
					'matches[new_password]');

				if($this->form_validation->run()) {
					if($this->auth_l->change_current_password($this->input->post('new_password'))) {
						$this->session->set_flashdata(SUCCESS_MESSAGE, lang('updated_successfully'));
					}

					else {
						$this->session->set_flashdata(ERROR_MESSAGE, lang('error_occured'));
					}
				}

				else {
					$this->session->set_flashdata(ERROR_MESSAGE, validation_errors());
				}
			}

			else {
				$this->session->set_flashdata(ERROR_MESSAGE, lang('incorrect_old_password'));
			}
		}

		redirect(base_url().'admin/user');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */