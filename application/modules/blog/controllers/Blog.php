<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Blog extends MX_Controller {

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
		$client = new Client();
		$keyword = "";
		$page = $this->input->get('page') ? $this->input->get('page', TRUE) : 1;
		$per_page = 6*$page;

		if ($this->input->get('search', TRUE)) {
			$response = $client->request('GET', $this->config->item('rest_api_default') . '/posts',
				[
					'query' => [
						'page' => 1,
						'per_page' => $per_page,
						'search' => $this->input->get('search', TRUE)
					]
				]
			);
			$keyword = $this->input->get('search', TRUE);
		} else {
			$response = $client->request('GET', $this->config->item('rest_api_default') . '/posts',
				[
					'query' => [
						'page' => 1,
						'per_page' => $per_page
					]
				]
			);
			$keyword = $this->input->get('search', TRUE);
		}
		$data['keyword'] = $keyword;
		$data['page'] = $page;
		$data['total_post'] = $response->getHeaders()['X-WP-Total'];
		$data['blog'] = json_decode($response->getBody()->getContents());
		$data['banner'] = json_decode($this->curl->simple_get($this->config->item('rest_api_inoy') . '/big-banner/?slug=blogs'),true);
		$data['header_title'] = 'News';
		$data['header_description'] = 'Dapatkan article tentang gaya hidup, keuangan, motivasi, bisnis properti, publik speaking dan sales & marketing';
		$data['view'] = 'profile/main';
		$data['view'] = 'blog/main';
		$this->load->view('template/template', $data);
	}

	public function category($slug) {
		$parent = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?slug=blog'), true);
		$blog = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?slug=' . $slug), true);
		$data['blog'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts?categories=' . $blog[0]['id']),true);
		$data['list_category'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?parent=' . $parent[0]['id']),true);
		$data['current_category'] = $blog[0]['id'];
		$data['header_title'] = 'Artikel Kategori';
		$data['header_description'] = 'menyajikan kategori artikel tentang gaya hidup, keuangan, motivasi, bisnis properti, publik speaking dan sales & marketing';
		$data['view'] = 'blog/main';
		$this->load->view('template/template', $data);
	}

	public function detail($id) {
		$client = new Client();
		//increment posts view
		$client->request('GET', $this->config->item('rest_api_inoy') . '/countview/' . $id);
		// get article
		$detail_post = $client->request('GET', $this->config->item('rest_api_default') . '/posts/' . $id);
		$data['post'] = json_decode($detail_post->getBody()->getContents());
		$author = $client->request('GET', $this->config->item('rest_api_default') . '/users/' . $data['post']->author);
		$data['author'] = json_decode($author->getBody()->getContents());
		$data['blog'] = json_decode($detail_post->getBody()->getContents());
		$data['banner'] = json_decode($this->curl->simple_get($this->config->item('rest_api_inoy') . '/big-banner/?slug=blogs'),true);
		$data['header_title'] = $data['post']->yoast_meta->yoast_wpseo_title ? $data['post']->yoast_meta->yoast_wpseo_title : $data['post']->title->rendered;
		$data['header_description'] = $data['post']->yoast_meta->yoast_wpseo_metadesc;
		$data['header_image'] = $data['post']->featured_image->url ? $data['post']->featured_image->url : false;
		$data['view'] = 'blog/detail';
		$data['css'] = array(
			'assets/themes/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
			'assets/themes/js/jssocials-1.4.0/dist/jssocials.css',
			'assets/themes/js/jssocials-1.4.0/dist/jssocials-theme-flat.css'
		);
		$data['js'] = array(
			'assets/custom_js/contact_us_inquiry.js', 
			'assets/themes/js/jssocials-1.4.0/dist/jssocials.min.js',
			'assets/custom_js/social_share_link.js'
		);
		$this->load->view('template/template', $data);
	}

	public function post_comment() {
		if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
		}
		$data = array(
			'author_name' => $this->input->post('author_name'),
			'author_email' => $this->input->post('author_email'),
			'content' => $this->input->post('content'),
			'post' => $this->input->post('post')
		);
		$csrf = array(
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash()
		);
		$post = $this->curl->simple_post($this->config->item('rest_api_default') . '/comments', $data);
		if ( $post ) {
			$response = array(
				'status'=>200, 
				'message' => 'Your Comment is success submited'
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
