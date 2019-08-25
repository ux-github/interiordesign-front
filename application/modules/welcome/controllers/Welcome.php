<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data['view'] = 'welcome/main';
		$data['banner'] = json_decode($this->curl->simple_get($this->config->item('rest_api_inoy') . '/big-banner/?slug=homepage'),true);
		$data['top_block'] = json_decode($this->curl->simple_get($this->config->item('rest_api_inoy') . '/post-block/?slug=homepage-top'),true);
		$data['middle_block'] = json_decode($this->curl->simple_get($this->config->item('rest_api_inoy') . '/post-block/?slug=homepage-middle'),true);
		$data['ask_us'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages/?slug=need-to-you-know'),true);
		$data['testimonials'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/testimonial/?per_page=10'),true);
		$data['latest_post'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts/?page=1&per_page=3'),true);
		$this->load->view('template/template', $data);
	}

	public function email_subscript() {
		if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
		}
		$csrf = array(
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash()
		);

		$data = array(
			'email' => $this->input->post('email'),
			'date' => date('Y-m-d H:i:s')
		);

		$post = $this->curl->simple_post($this->config->item('rest_api_inoy') . '/email-subscription', $data);

		if ( $post ) {
			$response = array(
				'status'=>200, 
				'message' => 'Yay, now your are subscriber'
			);
		} else {
			$response = array(
				'status'=>400, 
				'message' => 'Oops sorry something wrong please try again later'
			);
		}
		
		echo json_encode(array_merge($response, $csrf));
	}
}
