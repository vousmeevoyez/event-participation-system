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
		if($this->is_login() == true){
			$data['participants']=$this->participant_model->get_all_participants();
			$this->load->view('templates/header-dashboard');
			$this->load->view('admin/participant',$data);
			$this->load->view('templates/footer-dashboard');
		}else{
			redirect('admin/login');
		}
	}

	public function login()
	{
		//form validation
		$this->form_validation->set_rules('username', 'Username', 'required|alpha');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    	
    	if ($this->form_validation->run() == FALSE){
        	$this->load->view('admin/login');
        }else{
        	$this->check();
        }
	}

	public function is_login(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}

	public function dashboard()
	{
		if($this->is_login() == true){
			$data['teams']=$this->team_model->get_all_team();
			$this->load->view('templates/header-dashboard');
			$this->load->view('admin/team',$data);
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

	public function logout()
	{
		$session_data = array(
			'username' => '',
		);
		$this->session->unset_userdata('logged_in',$session_data);
		redirect('/admin/login');
	}

	public function add()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
				'username' => $username,
				'password' => MD5($password),
				'status' => '1',
		);

		$insert = $this->admin_model->auth_add($data);

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

	public function check()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->is_login() == true){
			redirect('/admin/dashboard', 'refresh');
		}else{
				$data = array(
					'username' =>$username,
					'password' =>MD5($password),
					'status' => '0',
				);

				$result = $this->admin_model->auth_check($data);
				
				if($result == true){
					$session_data = array(
						'username' => 'ADMIN',
					);
					$this->session->set_userdata('logged_in', $session_data);
					redirect('/admin/dashboard', 'refresh');
				}else{
					$view['error_msg'] = 'Incorrect Login';
				}
				$this->load->view('admin/login',$view);
		}
	}

	public function get_participant($id){
		$participant_data = $this->participant_model->get_by_id($id);
		$fk_team = $participant_data->fk_team;

		$team_data = $this->team_model->get_by_fk($fk_team);

		$data = json_encode(array(
						'status' => 0,
						'message' => 'GET_PARTICIPANT_SUCCESS',
						'data_participant' => $participant_data,
						'data_team'	=> $team_data
		));
		return 	$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output($data);
	}
}
