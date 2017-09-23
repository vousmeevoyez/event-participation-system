<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participant extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));

		$this->load->library('form_validation');

		$this->load->model(array('participant_auth_model','participant_model','team_model'));

	}

	// display login form
	public function login()
	{
		//form validation
		$this->form_validation->set_rules('username', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    	
    	if ($this->form_validation->run() == FALSE){
        	$this->load->view('templates/header');
        	$this->load->view('pages/login');
        	$this->load->view('templates/footer');
        }else{
        	$this->check();
        }
	}

	//display sign up form
	public function signup()
	{
		//form validation
		$this->form_validation->set_rules('user_name', 'Name', 'required');
    	$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('user_password', 'Password', 'required');
    	
    	if ($this->form_validation->run() == FALSE){
        	$this->load->view('templates/header');
        	$this->load->view('pages/signup');
        	$this->load->view('templates/footer');
        }else{
        	$this->add();
        }
	}

	// display participant details form 
	public function register_details()
	{
		if ($this->is_login() == true ) {
			// form validation
			$this->form_validation->set_rules('participant_university', 'University', 'required|alpha_numeric_spaces');
	    	$this->form_validation->set_rules('participant_msisdn', 'Phone Number', 'required|numeric|min_length[11]|max_length[12]');
	    	$this->form_validation->set_rules('participant_id', 'ID number', 'required|numeric');
	    	$this->form_validation->set_rules('participant_photo', 'Your Photo', 'callback_file_check_photo');
	    	$this->form_validation->set_rules('participant_doc', 'Document', 'callback_file_check_doc');

	    	// checking whether the submitted data is valid or not
	    	if ($this->form_validation->run() == FALSE){
	    		//render page
	        	$this->load->view('templates/header-participant');
	        	$this->load->view('pages/register-details');
	        	$this->load->view('templates/footer');
	        }else{
	        	$this->update_details();
	        }
		}else{
			redirect('/participant/login');
		}

	}
	
	//display dashboard for participant
	public function dashboard()
	{
		if($this->is_login() == true){
			//GET PK PARTICIPANT FROM SESSION
			$pk_participant   = $this->session->userdata['logged_in']['pk_participant'];
			//GET PARTICIPANT INFORMATION such as fk_team and status
			$participant_data = $this->participant_model->get_by_id($pk_participant);
			$fk_team          = $participant_data->fk_team;
			$status           = $participant_data->participant_status;

			//KEY DEFINITION FOR TEMPLATING
			$view['participant_name']  		= $participant_data->participant_name;
			$view['participant_email'] 		= $participant_data->participant_email;
			$view['team']              = 'Belum ada';
			$view['status'] 		   = 'Telah Diverifikasi';

			//CHECK THE PARTICIPANT STATUS (1 is Verified and 0 is not verified)
			if($status == 0){
				//redirect to another method
				$this->register_details();
			}else{
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

					/**
					*		DASHBOARD LEVEL 
							0 = It means he join a team
							1 = it means he isn't join any team or create any team yet
							2 = it means he is create a team  
					*/

					//team leader level
					if($team_leader == $pk_participant){
						$this->load->view('pages/participant-dashboard-lvl2',$view);
					}else{
					//Member team level
						$this->load->view('pages/participant-dashboard-lvl0',$view);
						
					}
				}else{
					// New member level doesnt have a team or join a team
					$this->load->view('pages/participant-dashboard-lvl1',$view);
				}
			}	

				$this->load->view('templates/header-participant');
				$this->load->view('templates/footer');
		}else{
			redirect('/participant/login');
		}
	}

	// Display account information details
	public function account_info()
	{
		if($this->is_login() == true){
			//GET PK PARTICIPANT FROM SESSION
			$pk_participant   = $this->session->userdata['logged_in']['pk_participant'];
			//GET PARTICIPANT INFORMATION such as fk_team and status
			$participant_data = $this->participant_model->get_by_id($pk_participant);
			$fk_team          = $participant_data->fk_team;
			$status           = $participant_data->participant_status;

			//KEY DEFINITION FOR TEMPLATING
			$view['participant_name']  		= $participant_data->participant_name;
			$view['participant_email'] 		= $participant_data->participant_email;
			$view['participant_university'] = $participant_data->participant_univ 	;
			$view['participant_msisdn']     = $participant_data->participant_msisdn;
			$view['participant_idcard']     = $participant_data->participant_idcard;
			$view['team']              		= 'Belum ada';
			$view['status'] 		   		= 'Telah Diverifikasi';
			$view['position']				= 'Belum ada';

			if($fk_team != 0 ){
				//Get the team where the participant belongs
				$team_data    = $this->team_model->get_by_fk($fk_team);
				$view['team'] = $team_data->team_name;
				$leader_id = $team_data->fk_participant;
				if($leader_id == $pk_participant){
					$view['position'] = 'Ketua Tim';
				}else{
					$view['position'] = 'Anggota Tim';
				}			
			}

			//render page
			$this->load->view('templates/header-participant');
			$this->load->view('pages/participant-details',$view);
			$this->load->view('templates/footer');
		}else{
			redirect('/participant/login');
		}
	}

	//Display add new team form
	public function add_team_form()
	{
		if($this->is_login() == true){
			//render page
	        $this->load->view('templates/header-participant');
	        $this->load->view('pages/team-form');
	        $this->load->view('templates/footer');
		}else{
			redirect('/participant/login');
		}
	}

	//Display add new member form
	public function add_member_form()
	{
		if($this->is_login() == true){
		//form validation
			$this->form_validation->set_rules('participant_name', 'Email', 'required|alpha_numeric_spaces');
	    	$this->form_validation->set_rules('participant_email', 'Password', 'required|valid_email');
	    	$this->form_validation->set_rules('participant_university', 'University', 'required|alpha_numeric_spaces');
	    	$this->form_validation->set_rules('participant_msisdn', 'Phone Number', 'required|numeric|min_length[11]|max_length[12]');
	    	$this->form_validation->set_rules('participant_id', 'ID number', 'required|numeric');
	    	$this->form_validation->set_rules('participant_photo', 'Your Photo', 'callback_file_check_photo');
	    	$this->form_validation->set_rules('paritcipant_doc', 'Document', 'callback_file_check_doc');
	    	
	    	if ($this->form_validation->run() == FALSE){
	        	$this->load->view('templates/header-participant');
	        	$this->load->view('pages/team-member');
	        	$this->load->view('templates/footer');
	        }else{
	        		$this->add_member();
	        }
		}else{
			redirect('/participant/login');
		}

	}

	// Display team management page
	public function team_management()
	{
		if($this->is_login() == true){
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

			//count member
			$view['member_count'] = $this->participant_model->count_member($pk_team);

			//get leader information
			$view['team_leader'] = $participant_data->participant_name;
			//get pk team
			$view['pk_team']     = $pk_team;
			//get team status
			$view['team_status'] = 'Menunggu Pembayaran';
			//get team name
			$view['team_name']   = $team_data->team_name;
			$view['team_doc']    = $team_data->team_doc;

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
			}

			// render page
	        $this->load->view('templates/header-participant');
	        $this->load->view('pages/team-management',$view);
	        $this->load->view('templates/footer');
			}else{
				redirect('/participant/login');
			}
	}

	// display team information page only for a team member
	public function team_info()
	{
		if($this->is_login() == true){
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
		}else{
			redirect('/participant/login');
		}
	}

	// Display payment page
	public function payment()
	{
		if($this->is_login() == true){
			//get pk participant from session
			$pk_participant   = $this->session->userdata['logged_in']['pk_participant'];
			//get participant information based on pk participant
			$participant_data = $this->participant_model->get_by_id($pk_participant);
			$fk_team          = $participant_data->fk_team;

			//get team data based on fk team
			$team_data 		= $this->team_model->get_by_fk($fk_team);
			$team_type 		= $team_data->team_type;
			$view['team_type'] = $team_type;

			$this->load->view('templates/header-participant');
	        $this->load->view('pages/payment',$view);
	        $this->load->view('templates/footer');
		}else{
			redirect('/participant/login');
		}
	}

	//Display FAQ page
	public function faq()
	{
		if($this->is_login() == true){
	        $this->load->view('templates/header-participant');
	        $this->load->view('pages/faq');
	        $this->load->view('templates/footer');
		}else{
			redirect('/participant/login');
		}
	}

	//Dsiplay join team form page 
	public function join_team_form()
	{
		if($this->is_login() == true){
	       	//form validation
			$this->form_validation->set_rules('fk_team', 'Join Code', 'required|numeric');
	    	
	    	if ($this->form_validation->run() == FALSE){
	        	$this->load->view('templates/header-participant');
	        	$this->load->view('pages/team-join');
	        	$this->load->view('templates/footer');
	        }else{
	        	$this->join_team();
	        }
		}else{
			redirect('/participant/login');
		}
	}

	// Display submit document form page
	public function submit_form()
	{
		if($this->is_login() == true){
			//form validation
			$this->form_validation->set_rules('team_doc', 'Document', 'callback_file_check_doc_team');

			if ($this->form_validation->run() == FALSE){
	        	$this->load->view('templates/header-participant');
	        	$this->load->view('pages/proposal');
	        	$this->load->view('templates/footer');
	        }else{
	        	$this->submit();
	        }
		}else{
			redirect('/participant/login');
		}
	}

		// Display submit document form page
	public function submit_video_form()
	{
		if($this->is_login() == true){
			//form validation
			$this->form_validation->set_rules('team_doc', 'Video Link', 'required|valid_url');

			if ($this->form_validation->run() == FALSE){
	        	$this->load->view('templates/header-participant');
	        	$this->load->view('pages/submit-video-form');
	        	$this->load->view('templates/footer');
	        }else{
	        	$this->submit_video();
	        }
		}else{
			redirect('/participant/login');
		}
	}


	/*
		DATA MANIPULATION METHOD

	*/

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

		//redirect success page
		$this->load->view('templates/header');

		$this->load->view('pages/signup-success');
		$this->load->view('templates/footer');

		
	}

	//UPDATE USER ACCOUNT DETAILS like msisdn, university, id card, etc....
	public function update_details()
	{
		//get pk participant
		$pk_participant = $this->session->userdata['logged_in']['pk_participant'];

        //get all post data from user input form
		$participant_univ 		= $this->input->post('participant_university');
		$participant_msisdn 	= $this->input->post('participant_msisdn');
		$participant_idcard 	= $this->input->post('participant_id');

		$data = array(
			'participant_msisdn' 	=> $participant_msisdn,
			'participant_idcard' 	=> $participant_idcard,
		);

		//duplicate check
		$duplicate_check_rule = array('participant_msisdn','participant_idcard');
		foreach ($duplicate_check_rule as $key => $value) {
			# code...
			$duplicate_check = $this->participant_model->duplicate_check($data,$duplicate_check_rule[$key]);
			if($duplicate_check == true){
				if ($duplicate_check_rule[$key] == 'participant_msisdn'){
					$view['error_msg'] = "Duplicate entry on phone number";
				}else{
					$view['error_msg'] = "Duplicate entry on $duplicate_check_rule[$key]";
				}
					$this->load->view('templates/header-participant');
					$this->load->view('pages/register-details',$view);
					$this->load->view('templates/footer');
			}
		}

		//upload config
		$config['upload_path'] = './uploads/participants/';
		$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
		$config['max_size']      	= 2048 ;

		//load upload library and initialize config
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		//Code to run upon successful upload photo
		if($this->upload->do_upload("participant_photo")) {
			$upload_data 	   = $this->upload->data();
			$participant_photo = $upload_data['file_name'];

			//Code to run upon successful upload document
			if($this->upload->do_upload("participant_doc")){
				$upload_data 	 = $this->upload->data();
				$participant_doc = $upload_data['file_name'];

				//build data array to be inserted to database
				$data = array(
					'pk_participant'		=> $pk_participant,
					'participant_univ' 		=> $participant_univ ,
					'participant_msisdn' 	=> $participant_msisdn,
					'participant_idcard' 	=> $participant_idcard,
					'participant_photo' 	=> $participant_photo,
					'participant_doc'		=> $participant_doc,
					'participant_status'    => 1 
				);

				//check query status
				$query_status = $this->participant_model->update($data);
				if($query_status != 0){
					$this->dashboard();
				//error conditional if query failed
				}else{
					$data['error_msg'] = 'Insert Failed';		
				}
			//Error conditional if upload failed
			}else{
				$error = $this->upload->display_errors();
				$data['error_msg'] = $error;
			}
		//Error conditional if upload failed
		}else{
			$error = $this->upload->display_errors();
			$data['error_msg'] = $error;
		}
		$this->load->view('templates/header-participant');
		$this->load->view('pages/register-details',$data);
		$this->load->view('templates/footer');
	}


	//Add team member action
	public function add_member()
	{
		//get pk participant from session
		$pk_participant = $this->session->userdata['logged_in']['pk_participant'];

		//get team data using pk participant
		$team_data      = $this->team_model->get_by_id($pk_participant);
		$fk_team 		= $team_data->pk_team;

        //get all post data from user input form
        $participant_name 		= $this->input->post('participant_name');
		$participant_email 		= $this->input->post('participant_email');
		$participant_idcard 	= $this->input->post('participant_id');
		$participant_univ 		= $this->input->post('participant_university');
		$participant_msisdn 	= $this->input->post('participant_msisdn');
		$participant_idcard 	= $this->input->post('participant_id');

		//load data to array
		$data = array(
			'participant_email' 	=> $participant_email,
			'participant_msisdn' 	=> $participant_msisdn,
			'participant_idcard' 	=> $participant_idcard,
		);

		//duplicate checking
		$duplicate_check_rule = array('participant_msisdn','participant_idcard','participant_email');
		foreach ($duplicate_check_rule as $key => $value) {
			# code...
			$duplicate_check = $this->participant_model->duplicate_check($data,$duplicate_check_rule[$key]);
			if($duplicate_check == true){
				if ($duplicate_check_rule[$key] == 'participant_msisdn'){
					$view['error_msg'] = "Duplicate entry on phone number";
				}else{
					$view['error_msg'] = "Duplicate entry on $duplicate_check_rule[$key]";
				}
					$this->load->view('templates/header-participant');
					$this->load->view('pages/team-member',$view);
					$this->load->view('templates/footer');
			}
		}

		if($duplicate_check == false){
			//upload config
			$config['upload_path'] 		= './uploads/participants/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
			$config['max_size']      	= 2048 ;

			//load upload library and initialize config
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload("participant_photo")) {
				$upload_data = $this->upload->data();
				$participant_photo = $upload_data['file_name'];

				if($this->upload->do_upload("participant_doc")) {
					$upload_data = $this->upload->data();
					$participant_doc = $upload_data['file_name'];

					$data = array(
						'fk_team'				=> $fk_team,
						'participant_name' 		=> $participant_name ,
						'participant_email' 	=> $participant_email,
						'participant_univ' 		=> $participant_univ ,
						'participant_msisdn' 	=> $participant_msisdn,
						'participant_idcard' 	=> $participant_idcard,
						'participant_photo' 	=> $participant_photo,
						'participant_doc' 	    => $participant_doc,
						'participant_status'    => 1 
					);

					$status = $this->participant_model->add($data);

					if($status != 0){
						redirect('/participant/team_management','refresh');
					}else{
						$view['error_msg'] = $status;	
					}

				}else{
					$view['error_msg'] = $this->upload->display_errors();	
				}
			}else{
				$view['error_msg'] = $this->upload->display_errors();
			}

			$this->load->view('templates/header-participant');
			$this->load->view('pages/team-member',$view);
			$this->load->view('templates/footer');
		}
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
					$view['error_msg'] = "Login Gagal, Username atau kata sandi anda salah";					
				}
			}
			$this->load->view('templates/header');
		    $this->load->view('pages/login',$view);
		    $this->load->view('templates/footer');
	}

	public function is_login()
	{
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}

	//JOIN TEAM METHOD
	public function join_team()
	{
		//get pk participant from session
		$pk_participant = $this->session->userdata['logged_in']['pk_participant'];
		//retrieve fk team
		$fk_team = $this->input->post('fk_team');

		$count_member = $this->participant_model->count_member($fk_team);

		if($count_member < 3){
			//define array
			$data = array(
				'pk_participant' => $pk_participant,
				'fk_team' => $fk_team 
			);

			//update operation
			$this->participant_model->update_team($data);
			//redirect page
			redirect('/participant/dashboard','refresh');
		}else{
			$view['error_msg'] = 'Team Telah Penuh, silahkan bergabung dengan tim lain';
		}
			$this->load->view('templates/header-participant');
	        $this->load->view('pages/team-join',$view);
	        $this->load->view('templates/footer');
	}

	//SUBMIT DOCUMENT METHOD
	public function submit()
	{
		//upload config
		$config['upload_path'] 		= './uploads/teams/';
		$config['allowed_types'] 	= 'doc|docx|pdf';
		$config['max_size']      	= 5120 ;

		//load upload library and initialize config
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		//get pk participant from session
		$pk_participant = $this->session->userdata['logged_in']['pk_participant'];

		//get team data using pk participant
		$team_data      = $this->team_model->get_by_id($pk_participant);
		$pk_team 		= $team_data->pk_team;

		if($this->upload->do_upload("team_doc")) {

			$upload_data = $this->upload->data();
			$team_doc 	 = $upload_data['file_name'];

			$data = array(
				'pk_team'  => $pk_team,
				'team_doc' => $team_doc
			);

			$query_status = $this->team_model->update_document($data);

			if($query_status != 0){
				redirect('participant/team_management','refresh');
				//error conditional if query failed
			}else{
				$view['error_msg'] = 'Insert Failed';	
			}

		}else{
			$error = $this->upload->display_errors();
			$view['error_msg'] = $error;
		}
		$this->load->view('templates/header-participant');
		$this->load->view('pages/proposal',$view);
		$this->load->view('templates/footer');	
		
	}

	//SUBMIT VIDEO METHOD
	public function submit_video()
	{
		//get pk participant from session
		$pk_participant = $this->session->userdata['logged_in']['pk_participant'];

		//get team data using pk participant
		$team_data      = $this->team_model->get_by_id($pk_participant);
		$pk_team 		= $team_data->pk_team;

		$team_doc = $this->input->post('team_doc');

		$data = array(
			'pk_team'  => $pk_team,
			'team_doc' => $team_doc
		);

		$query_status = $this->team_model->update_document($data);

		if($query_status != 0){
			redirect('participant/team_management','refresh');
			//error conditional if query failed
		}else{
			$view['error_msg'] = 'Insert Failed';	
		}

		$this->load->view('templates/header-participant');
		$this->load->view('pages/proposal',$view);
		$this->load->view('templates/footer');	
		
	}

	//FILE CHECKING photo
	public function file_check_photo($str){
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['participant_photo']['name']);
        if(isset($_FILES['participant_photo']['name']) && $_FILES['participant_photo']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_photo', 'Harap hanya masukan file dengan jenis pdf/gif/jpg/png.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_photo', 'Harap upload pas foto.');
            return false;
        }
    }

    	//FILE CHECKING document
	public function file_check_doc($str){
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['participant_doc']['name']);
        if(isset($_FILES['participant_doc']['name']) && $_FILES['participant_doc']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_doc', 'Harap hanya masukan file dengan jenis pdf/gif/jpg/png.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_doc', 'Harap upload berkas dokumen yang diperlukan.');
            return false;
        }
    }

        	//FILE CHECKING document
	public function file_check_doc_team($str){
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['team_doc']['name']);
        if(isset($_FILES['team_doc']['name']) && $_FILES['team_doc']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_doc_team', 'Harap hanya masukan file dengan jenis pdf/gif/jpg/png.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_doc_team', 'Harap upload berkas dokumen yang diperlukan.');
            return false;
        }
    }

	//LOGOUT METHOD
	public function logout()
	{
		$session_data = array(
			'username' => '',
		);
		$this->session->unset_userdata('logged_in',$session_data);
		redirect('/participant/login');
	}
}
	