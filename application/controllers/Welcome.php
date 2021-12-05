<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('welcome_model');
	}
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
	public function index()
	{
		// echo '<pre>';
		// print_r($this->db);
		// die;
		
		$data['result'] = $this->welcome_model->getFeatures();
		$data['course']= $this->welcome_model->getCourses();
		// print_r($data['course']);
		// die;
		if($data){
            $this->load->view('index', $data);

        } else {

            echo "Fail";

        }
		
	
	}
	public function courses()
	{

		$this->load->view('courses');
		
	}
	public function contact()
	{
		$this->load->view('contact');
	}

	
	public function store()
	{  
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('website', 'website', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');

		if($this->form_validation->run())
       {
	$data=[
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'subject'=>$this->input->post('subject'),
			'website'=>$this->input->post('website'),
			'message'=>$this->input->post('message')
		];
		$this->load->model('welcome_model');
		$this->welcome_model->setValues($data);
		redirect(base_url('contact'));
	}
	else{
		$this->load->view('contact');
	}

	}
}
