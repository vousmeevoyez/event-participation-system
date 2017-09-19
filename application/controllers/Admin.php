<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	 		parent::__construct();
			$this->load->helper('url');
			$this->load->model('admin_model');
	 		$this->load->model('participant_model');
	 		$this->load->model('team_model');
	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$data['participants']=$this->participant_model->get_all_participants();
			$this->load->view('templates/header-dashboard');
			$this->load->view('admin/participant',$data);
			$this->load->view('templates/footer-dashboard');
		}else{
			redirect('admin/login');
		}

		
	}

	public function manage_team()
	{
		if(isset($this->session->userdata['logged_in'])){
			$data['teams']=$this->team_model->get_all_team();
			$this->load->view('templates/header-dashboard');
			$this->load->view('admin/team',$data);
			$this->load->view('templates/footer-dashboard');
		}else{
			redirect('admin/login');
		}
	}
	
	public function manage_proposal()
	{
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('admin/proposal');
		}else{
			redirect('admin/login');
		}
	}

	public function login()
	{
		$this->load->view('admin/login_form');
	}

	public function logout()
	{
		$session_data = array(
			'username' => '',
		);
		$this->session->unset_userdata('logged_in',$session_data);
		redirect('/admin/login');
	}

	public function auth_add()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
				'username' => $username,
				'password' => MD5($password),
				'status' => '1',
		);

		$insert = $this->auth_model->auth_add($data);
		if($insert == true){
			$data = json_encode(array(
						'status' => 0,
						'message' => 'ADD_USER_AUTH_SUCCESS',
						'data' => []
				));
			
		}else{
			$data = json_encode(array(
						'status' => 0,
						'message' => 'ADD_USER_AUTH_FAILED',
						'data' => 'DUPLICATE_USERNAME'
				));
		}
		return 	$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output($data);	
		
	}

	public function auth_check()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if(isset($this->session->userdata['logged_in'])){
			redirect('/admin', 'refresh');
		}else{
				$data = array(
					'username' =>$username,
					'password' =>MD5($password),
					'status' => '0',
				);

				$result = $this->admin_model->auth_check($data);
				
				if($result == true){
					$response = json_encode(array(
							'status' => 0,
							'message' => 'AUTH_SUCCESS',
							'data' => ''
					));
					$session_data = array(
						'username' => 'ADMIN',
					);
					$this->session->set_userdata('logged_in', $session_data);
				}else{
						$response = json_encode(array(
								'status' => 0,
								'message' => 'AUTH_FAILED',
								'data' => 'RECORD_NOT_FOUND'
						));
				}
			}
			return 	$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output($response);
	}
}
