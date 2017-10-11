<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	private $data = array();

	public function __construct() {
		parent::__construct();

		$this->load->model(['Pages_m', 'Config_m', 'Cars_m']);
		$this->load->helper('lang');
		$this->load->library(['session', 'user_agent']);

		set_lang();

		$this->load->language('general', lang_file());

		$this->data['title'] = $this->lang->line('toyota');
		$this->data['pages'] = $this->Pages_m->get_navigation();
		$this->data['current_page'] = NULL;
		//$this->data['contact_mail'] = $this->Config_m->get_mail();
		$this->data['mails'] = $this->Config_m->get_mails();
		$this->data['models'] = $this->Cars_m->get_models();

		date_default_timezone_set('Asia/Tbilisi');
	}

	public function index() {
		$this->view('home');
	}

	public function view($slug) {
		
		$this->data['current_page'] = $slug;
		$this->data['sidebar_active'] = $slug;

		if($slug === 'home') {
			$this->load->model(['Banners_m', 'Videos_m']);

			$this->data['banners'] = $this->Banners_m->get_banners();
			$this->data['videos'] = $this->Videos_m->get_videos(WHY_TOYOTA);

			$this->load->view('pages/home', $this->data);
			return;
		}

		elseif($slug === 'catalog') {
			$this->load->model('Videos_m');
			
			$this->data['videos'] = $this->Videos_m->get_videos(WHY_TOYOTA);
			$this->data['page'] = $this->Pages_m->get_page($slug);
			$this->data['title'] = $this->data['page']['title'].' - '.$this->data['title'];

			$this->load->view('pages/catalog', $this->data);
			$this->data['title'] = $this->lang->line('catalog') . ' - ' . $this->data['title'];
			return;
		}

		elseif($slug === 'service') {

			$this->data['page'] = $this->Pages_m->get_page($slug);
			$this->data['title'] = $this->data['page']['title'] . ' - ' . $this->data['title'];
			$this->load->view('pages/service', $this->data);
			return;
		}

		elseif($slug === 'contact') {
			$this->data['page'] = $this->Pages_m->get_page($slug);
			$this->data['title'] = $this->data['page']['title'] . ' - ' . $this->data['title'];
			$this->load->view('pages/contact', $this->data);
			return;
		}

		elseif($slug === 'about-us') {
			$this->data['page'] = $this->Pages_m->get_page($slug);
			$this->data['children'] = $this->Pages_m->get_children('about-us');
			$this->data['title'] = $this->data['page']['title'].' - '.$this->data['title'];
			$this->load->view('pages/generic_sidebar', $this->data);
			return;
		}

		elseif($slug === 'legal') {
			$this->data['page'] = $this->Pages_m->get_page('operational-leasing');
			$this->data['children'] = $this->Pages_m->get_children('legal');
			$this->data['title'] = $this->data['page']['title'].' - '.$this->data['title'];
			$this->data['current_page'] = 'legal';
			$this->data['sidebar_active'] = 'operational-leasing';
			$this->load->view('pages/generic_sidebar', $this->data);
			return;
		}

		elseif($slug === 'operational-leasing') {
			$this->data['page'] = $this->Pages_m->get_page('operational-leasing');
			$this->data['children'] = $this->Pages_m->get_children('legal');
			$this->data['title'] = $this->data['page']['title'].' - '.$this->data['title'];
			$this->data['current_page'] = 'legal';
			$this->load->view('pages/generic_sidebar', $this->data);
			return;
		}

		elseif($slug === 'tco') {
			$this->data['page'] = $this->Pages_m->get_page($slug);
			$this->data['children'] = $this->Pages_m->get_children('legal');
			$this->data['title'] = $this->data['page']['title'].' - '.$this->data['title'];
			$this->data['current_page'] = 'legal';
			$this->load->view('pages/generic_sidebar', $this->data);
			return;
		}

		elseif($slug === 'customer-promise') {
			$this->data['page'] = $this->Pages_m->get_page($slug);
			$this->data['children'] = $this->Pages_m->get_children('legal');
			$this->data['title'] = $this->data['page']['title'].' - '.$this->data['title'];
			$this->data['current_page'] = 'legal';
			$this->load->view('pages/generic_sidebar', $this->data);
			return;
		}

		$this->data['page'] = $this->Pages_m->get_page($slug);
		$this->data['title'] = $this->data['page']['title'] . ' - ' . $this->data['title'];
		$this->load->view('pages/general', $this->data);
	}

	public function gallery($type, $page = 1) {
		$model = $type === 'photos' ? 'Photo_m' : 'Video_m';
		$this->load->model($model);
		$this->data['children'] = $this->Pages_m->get_children('about-us');
		$this->data['title'] = lang('gallery').' - '.$this->data['title'];
		$this->data['events'] = $this->$model->get_list($page);
		$this->data['sidebar_active'] = $type;

		$this->config->load('pagination');
		$config = $this->config->item('pagination');

		$config['base_url'] = base_url("pages/{$type}");
		$config['total_rows'] = $this->$model->count();
		$config['per_page'] = OFFERS_PER_PAGE;

		$this->load->library('pagination', $config);

		$this->data['gallery_type'] = $type;
		$this->data['current_page'] = 'about-us';
		$this->load->view('pages/gallery', $this->data);
	}

	public function photos($slug) {

		$this->load->model('Photo_m');

		$this->data['event'] = $this->Photo_m->get_by_slug($slug);

		if(!$this->data['event']) {
			show_404();
		}

		$this->data['children'] = $this->Pages_m->get_children('about-us');
		$this->data['title'] = $this->data['event']['title'].' - '.$this->data['title'];
		$this->data['files'] = $this->Photo_m->get_files($this->data['event']['id']);
		$this->data['current_page'] = 'about-us';
		$this->data['sidebar_active'] = 'photos';
		$this->load->view('pages/photos', $this->data);
	}

	public function videos($slug) {

		$this->load->model('Video_m');

		$this->data['event'] = $this->Video_m->get_by_slug($slug);

		if(!$this->data['event']) {
			show_404();
		}

		$this->data['children'] = $this->Pages_m->get_children('about-us');
		$this->data['title'] = $this->data['event']['title'].' - '.$this->data['title'];
		$this->data['files'] = $this->Video_m->get_files($this->data['event']['id']);
		$this->data['current_page'] = 'about-us';
		$this->data['sidebar_active'] = 'videos';
		$this->load->view('pages/videos', $this->data);
	}

	public function offers($page = 1) {

		$this->load->model('Offers_m');

		$this->data['offers'] = $this->Offers_m->get_list($page);
		$this->data['current_page'] = 'offers';
		$this->data['title'] = lang('offers').' - '.$this->data['title'];

		$this->config->load('pagination');
		$config = $this->config->item('pagination');

		$config['base_url'] = base_url('pages/offers');
		$config['total_rows'] = $this->Offers_m->count();
		$config['per_page'] = OFFERS_PER_PAGE;

		$this->load->library('pagination', $config);

		$this->load->view('pages/offers', $this->data);
	}

	public function offer($slug = NULL) {

		$this->load->model('Offers_m');
		$this->data['offer'] = $this->Offers_m->get_by_slug($slug);

		if(!$this->data['offer']) {
			show_404();
		}

		$this->data['title'] = $this->data['offer']['title'].' - '.$this->data['title'];
		$this->data['current_page'] = 'offers';
		$this->load->view('pages/offer', $this->data);
	}

	public function news($page = 1) {

		$this->load->model('News_m');

		$this->data['news'] = $this->News_m->get_list($page);
		$this->data['current_page'] = 'about-us';
		$this->data['children'] = $this->Pages_m->get_children('about-us');
		$this->data['page'] = $this->Pages_m->get_page('news');
		$this->data['title'] = lang('news').' - '.$this->data['title'];
		$this->data['sidebar_active'] = 'news';

		$this->config->load('pagination');
		$config = $this->config->item('pagination');

		$config['base_url'] = base_url('pages/news');
		$config['total_rows'] = $this->News_m->count();
		$config['per_page'] = OFFERS_PER_PAGE;

		$this->load->library('pagination', $config);

		$this->load->view('pages/news', $this->data);
	}

	public function post($slug = NULL) {

		$this->load->model('News_m');
		$this->data['children'] = $this->Pages_m->get_children('about-us');
		$this->data['post'] = $this->News_m->get_by_slug($slug);
		$this->data['sidebar_active'] = 'news';

		if(!$this->data['post']) {
			show_404();
		}

		$this->data['title'] = $this->data['post']['title'].' - '.$this->data['title'];
		$this->data['current_page'] = 'about-us';
		$this->load->view('pages/post', $this->data);
	}

	public function cars($slug) {

		$this->load->model('Accessories_m');
		$this->load->model('Gallery_m');
		$this->load->model('Videos_m');

		$this->data['model'] = $this->Cars_m->get_model_by_slug($slug);
		$this->data['configurations'] = $this->Cars_m->get_model_configurations($slug);
		$this->data['accessories'] = $this->Accessories_m->get_accessories_for_car($slug);
		$this->data['accessory_categories'] = $this->Accessories_m->get_categories();
		$this->data['current_page'] = 'catalog';
		$this->data['gallery'] = $this->Gallery_m->get_images($slug);
		$this->data['videos'] = $this->Videos_m->get_videos($slug);

		$this->load->view('pages/model', $this->data);
	}

	public function schedule_service() {
		if($this->input->post()) {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('first-name', 'lang:first_name', 'trim|required');
			$this->form_validation->set_rules('last-name', 'lang:last_name', 'trim|required');
			$this->form_validation->set_rules('phone', 'lang:phone', 'trim|required|min_length[7]');
			$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email');
			$this->form_validation->set_rules('date', 'lang:date', 'trim|required');
			$this->form_validation->set_rules('service_type', 'lang:service_type', 'trim|required');
			$this->form_validation->set_rules('model', 'lang:model', 'trim|required', array(
				'required' => lang('model_required')
			));

			if($this->form_validation->run()) {

				$config = array();
				
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['newline'] = "\r\n";

				$this->load->library('email', $config);

				$name = $this->input->post('first-name');
				$name .= ' '.$this->input->post('last-name');

				$post = array(
					'post' => $this->input->post()
				);

				$message = $this->load->view('elements/service_form_message',
					$post, TRUE);

				$this->email->from($this->input->post('email'), $name);
				$this->email->to($this->data['mails']['service_email']);
				$this->email->reply_to($this->input->post('email'));
				$this->email->subject(lang('service_schedule_form'));
				$this->email->message($message);

				if($this->email->send(FALSE)) {
					echo 'ok';
					return;
				}

				else {
					//echo lang('error_occured');
					echo $this->email->print_debugger();
					return;
				}
			}

			echo validation_errors();
		}
	}

	public function schedule_test_drive() {
		if($this->input->post()) {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('first-name', 'lang:first_name', 'trim|required');
			$this->form_validation->set_rules('last-name', 'lang:last_name', 'trim|required');
			$this->form_validation->set_rules('phone', 'lang:phone', 'trim|required|min_length[7]');
			$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email');
			$this->form_validation->set_rules('model', 'lang:model', 'trim|required', array(
				'required' => lang('error_occured')
			));

			if($this->form_validation->run()) {

				$config = array();

				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['newline'] = "\r\n";

				$this->load->library('email', $config);

				$name = $this->input->post('first-name');
				$name .= ' '.$this->input->post('last-name');

				$post = array(
					'post' => $this->input->post()
				);

				$message = $this->load->view('elements/test_drive_message',
					$post, TRUE);

				$this->email->from($this->input->post('email'), $name);
				$this->email->to($this->data['mails']['test_drive_email']);
				$this->email->reply_to($this->input->post('email'));
				$this->email->subject(lang('test_drive_form'));
				$this->email->message($message);

				if($this->email->send(FALSE)) {
					echo 'ok';
					return;
				}

				else {
					//echo lang('error_occured');
					echo $this->email->print_debugger();
					return;
				}
			}

			echo validation_errors();
		}
	}

	public function contact_form() {
		if($this->input->post()) {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('first-name', 'lang:first_name', 'trim|required');
			$this->form_validation->set_rules('last-name', 'lang:last_name', 'trim|required');
			$this->form_validation->set_rules('phone', 'lang:phone', 'trim|required|min_length[7]');
			$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email');

			if($this->form_validation->run()) {

				$config = array();

				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['newline'] = "\r\n";

				$this->load->library('email', $config);

				$name = $this->input->post('first-name');
				$name .= ' '.$this->input->post('last-name');

				$post = array(
					'post' => $this->input->post()
				);

				$message = $this->load->view('elements/contact_form_message',
					$post, TRUE);

				$this->email->from($this->input->post('email'), $name);
				$this->email->to($this->data['mails']['contact_email']);
				$this->email->reply_to($this->input->post('email'));
				$this->email->subject(lang('contact_form'));
				$this->email->message($message);

				if($this->email->send(FALSE)) {
					echo 'ok';
					return;
				}

				else {
					//echo lang('error_occured');
					echo $this->email->print_debugger();
					return;
				}
			}

			echo validation_errors();
		}
	}

	public function change_language($lang = 'ka') {
		if($lang === 'ka' || $lang === 'en') {
			$this->session->set_userdata('language', $lang);
		}
		redirect($this->agent->referrer());
	}

}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */