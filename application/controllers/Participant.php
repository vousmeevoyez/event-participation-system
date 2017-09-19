<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participant extends CI_Controller {

	public function __construct()
	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('participant_auth_model');
	 		$this->load->model('participant_model');
	 		$this->load->model('team_model');
	}

	public function competition_list()
	{
        
        $this->load->view('templates/header');
        $this->load->view('pages/competition');
        $this->load->view('templates/footer');
	}
	
	public function dashboard()
	{
		//Checking user session
		if(isset($this->session->userdata['logged_in'])){
			//GET PK PARTICIPANT FROM SESSION
			$pk_participant   = $this->session->userdata['logged_in']['pk_participant'];
			//GET PARTICIPANT INFORMATION such as fk_team and status
			$participant_data = $this->participant_model->get_by_id($pk_participant);
			$fk_team          = $participant_data->fk_team;
			$status           = $participant_data->participant_status;

			//KEY DEFINITION FOR TEMPLATING
			$view['participant_name']  = $participant_data->participant_name;
			$view['participant_email'] = $participant_data->participant_email;
			$view['team']              = 'Belum ada';
			$view['status']            = 'Belum Diverifikasi';

			//CHECK THE PARTICIPANT STATUS (1 is Verified and 0 is not verified)
			if($status != 0){
				$view['status'] = 'Telah Diverifikasi';
			}

			//check the fk_team for the participant if is 0 it means participant does't join any team yet
			if($fk_team != 0 ){
				//Get the team where the participant belongs
				$team_data    = $this->team_model->get_by_fk($fk_team);
				$view['team'] = $team_data->team_name;
				$team_type    = $team_data->team_type;
				$team_leader  = $team_data->fk_participant;

				// convert team code to team competition type
				if($team_type == 'sd'){
					$view['team_type'] = 'Software Development';
				}else if($team_type == 'bp'){
					$view['team_type'] = 'Business Plan';
				}else if($team_type == 'sm'){
					$view['team_type'] = 'Short Movie';
				}else{
					$view['team_type'] = 'Futsal';
				}

				//team leader level
				if($team_leader == $pk_participant){
					$this->load->view('templates/header-participant');
					$this->load->view('pages/participant-dashboard-lvl2',$view);
					$this->load->view('templates/footer');
				}else{
				//Member team level
					$this->load->view('templates/header-participant');
					$this->load->view('pages/participant-dashboard-lvl0',$view);
					$this->load->view('templates/footer');
				}

			}else{
				$this->load->view('templates/header-participant');
				$this->load->view('pages/participant-dashboard-lvl1',$view);
				$this->load->view('templates/footer');
			}
		}else{
			//Redirect to login form
			redirect('pages/view/login');
		}
        
	}

	//Routing to add new team form
	public function add_team_form()
	{
        $this->load->view('templates/header-participant');
        $this->load->view('pages/team-form');
        $this->load->view('templates/footer');
	}

	//Routing to add new member form
	public function add_member_form()
	{
        $this->load->view('templates/header-participant');
        $this->load->view('pages/team-member');
        $this->load->view('templates/footer');
	}

	public function team_management()
	{
		//get PK participant from session 
		$pk_participant   = $this->session->userdata['logged_in']['pk_participant'];
		//get participant data based on pk participant
		$participant_data = $this->participant_model->get_by_id($pk_participant);
		//get team data based on pk participant
		$team_data  = $this->team_model->get_by_id($pk_participant);
		$pk_team    = $team_data->pk_team;
		$status     = $team_data->team_status;
		$team_type  = $team_data->team_type;

		//get member data based on pk participant
		$member_data = $this->participant_model->get_by_team($pk_team);
		$view['member_data'] = $member_data;

		$view['team_leader'] = $participant_data->participant_name;
		$view['pk_team']     = $pk_team;
		$view['team_status'] = 'Belum Diverifikasi';
		$view['team_name']   = $team_data->team_name;

		//Checking team status
		if($status != 0){
			$view['team_status'] = 'Telah Diverifikasi';
		}

		// convert team code to team competition type
		if($team_type == 'sd'){
			$view['team_type'] = 'Software Development';
		}else if($team_type == 'bp'){
			$view['team_type'] = 'Business Plan';
		}else if($team_type == 'sm'){
			$view['team_type'] = 'Short Movie';
		}else{
			$view['team_type'] = 'Futsal';
		}

        $this->load->view('templates/header-participant');
        $this->load->view('pages/team-management',$view);
        $this->load->view('templates/footer');
	}

	public function team_info()
	{
		//get pk participant from session
		$pk_participant   = $this->session->userdata['logged_in']['pk_participant'];
		//get participant information based on pk participant
		$participant_data = $this->participant_model->get_by_id($pk_participant);
		$fk_team          = $participant_data->fk_team;

		//get team data based on fk team
		$team_data 		= $this->team_model->get_by_fk($fk_team);
		$pk_team   		= $team_data->pk_team;
		$status    		= $team_data->team_status;
		$team_type 		= $team_data->team_type;
		$fk_participant = $team_data->fk_participant;

		//get leader information
		$leader_data 	= $this->participant_model->get_by_id($fk_participant);
		$team_leader 	= $leader_data->participant_name;

		// get member data based on pk team
		$member_data = $this->participant_model->get_by_team($pk_team);
		$view['member_data'] = $member_data;

		$view['team_leader'] = $team_leader;
		$view['pk_team']     = $pk_team;
		$view['team_status'] = 'Belum Diverifikasi';
		$view['team_name']   = $team_data->team_name;

		// checking team status
		if($status != 0){
			$view['team_status'] = 'Telah Diverifikasi';
		}

		// convert team code to team competition type
		if($team_type == 'sd'){
			$view['team_type'] = 'Software Development';
		}else if($team_type == 'bp'){
			$view['team_type'] = 'Business Plan';
		}else if($team_type == 'sm'){
			$view['team_type'] = 'Short Movie';
		}else{
			$view['team_type'] = 'Futsal';
		}

        $this->load->view('templates/header-participant');
        $this->load->view('pages/team-info',$view);
        $this->load->view('templates/footer');
	}

	//FAQ Page routing
	public function faq()
	{
        $this->load->view('templates/header-participant');
        $this->load->view('pages/faq');
        $this->load->view('templates/footer');
	}

	//ADD PARTICIPANT ACTION
	public function add()
	{
		//get all post data from user input form
		$user_name 		= $this->input->post('user_name');
		$user_email 	= $this->input->post('user_email');
		$user_password 	= MD5($this->input->post('user_password'));

		//define array to be inserted to participant table
		$data1 = array(
				'participant_name' 	 => $user_name,
				'participant_email'  => $user_email,
				'participant_status' => '0',
				'fk_team'            => '0',
		);

		//inserting data to db and get result id
		$result_id = $this->participant_model->add($data1);

		//define array to be inserted to participant_auth table
		$data2 = array(
				'username'       => $user_email,
				'password'       => $user_password,
				'fk_participant' => $result_id,
				'status'         => '1',
		);

		//inserting data to db
		$this->participant_auth_model->add($data2);

		//json response
		$response = json_encode(array(
					'status' => 0,
					'message' => 'ADD_USER_SUCCESS',
					'data' => []
		));

		return 	$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output($response);
	}

	//Add team member action
	public function add_member()
	{
		//get pk participant from session
		$pk_participant = $this->session->userdata['logged_in']['pk_participant'];
		//get team data using pk participant
		$team_data      = $this->team_model->get_by_id($pk_participant);
		$fk_team 		= $team_data->pk_team;

		//retrieve user input
		$participant_name 	= $this->input->post('participant_name');
		$participant_email 	= $this->input->post('participant_email');

		//define array
		$data = array(
			'participant_name' 		=> $participant_name ,
			'participant_email' 	=> $participant_email,
			'participant_status' 	=> 0,
			'fk_team' 				=> $fk_team, 
		);

		//insert operation
		$this->participant_model->add($data);

		redirect('/participant/team_management','refresh');
	}

	//ROUTING TO JOIN TEAM FORM
	public function join_team_form()
	{
		$this->load->view('templates/header-participant');
        $this->load->view('pages/team-join');
        $this->load->view('templates/footer');
	}

	public function proposal()
	{
		$this->load->view('templates/header-participant');
        $this->load->view('pages/proposal');
        $this->load->view('templates/footer');
	}

	//JOIN TEAM METHOD
	public function join_team()
	{
		//get pk participant from session
		$pk_participant = $this->session->userdata['logged_in']['pk_participant'];
		//retrieve fk team
		$fk_team = $this->input->post('fk_team');

		//define array
		$data = array(
			'pk_participant' => $pk_participant,
			'fk_team' => $fk_team 
		);

		//update operation
		$this->participant_model->update_team($data);
		//redirect page
		redirect('/participant/dashboard','refresh');
	}

	//AUTH METHOD
	public function check()
	{
		//RETRIEVE USER INPUT FROM LOGIN FORM
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//check first if its already login skip
		if(isset($this->session->userdata['logged_in'])){
			redirect('/participant/dashboard', 'refresh');
		}else{
				//define array
				$data = array(
					'username' => $username,
					'password' => MD5($password),
					'status'   => '0',
				);
				//check data to database
				$result = $this->participant_auth_model->check($data);
				
				if($result == true){

					$email            = $username;
					$participant_data = $this->participant_model->get_by_email($email);
					$pk_participant   = $participant_data->pk_participant;

					//define session array
					$session_data = array(
						'pk_participant' => $pk_participant
					);

					// set session data
					$this->session->set_userdata('logged_in', $session_data);

					//redirect 
					redirect('/participant/dashboard');

				}else{
					redirect('/pages/view/login');
				}
			}
	}

	//LOGOUT METHOD
	public function logout()
	{
		$session_data = array(
			'username' => '',
		);
		$this->session->unset_userdata('logged_in',$session_data);
		redirect('/pages/view/login');
	}
}
