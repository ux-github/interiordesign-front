<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MX_Controller {

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
		$data['banner'] = json_decode($this->curl->simple_get($this->config->item('rest_api_inoy') . '/big-banner/?slug=services'),true);
		$data['services'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages/?slug=services'),true);
		$data['header_title'] = 'Services';
		$data['header_description'] = strip_tags($data['services'][0]['excerpt']['rendered']);
		$data['view'] = 'service/main';
		$data['css'] = array(
			'assets/themes/fonts/font-awesome-4.7.0/css/font-awesome.min.css'
		);
		$this->load->view('template/template', $data);
	}
}
