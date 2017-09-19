<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('team_model');
	 		$this->load->model('participant_model');
	 }

	public function add()
	{
		$pk_participant = $this->session->userdata['logged_in']['pk_participant'];

		$data1 = array(
				'team_name' => $this->input->post('team_name'),
				'team_type' => $this->input->post('team_type'),
				'fk_participant' => $pk_participant,
				'team_status' => '0',
		);
		
		$result_id = $this->team_model->add($data1);

		$data2 = array(
				'pk_participant' => $pk_participant,
				'fk_team' 		 => $result_id,
		);

		$this->participant_model->update_team($data2);


		redirect('/participant/dashboard','refresh');
	}

	public function get($id)
	{
		$receive = $this->team_model->get_by_id($id);
		$data = json_encode(array(
						'status' => 0,
						'message' => 'GET_TEAM_SUCCESS',
						'data' => $receive
		));
		return 	$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output($data);
	}

	public function update()
	{
			$data = array(
				'team_name' => $this->input->post('team_name'),
				'team_type' => $this->input->post('team_type'),
				'team_status' => $this->input->post('team_status'),
			);

		$this->team_model->update(array('pk_team' => $this->input->post('pk_team')), $data);

		$data = json_encode(array(
						'status' => 0,
						'message' => 'UPDATE_TEAM_SUCCESS',
						'data' => []
		));

		return 	$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output($data);
	}

	public function delete($id)
	{
		$this->team_model->delete_by_id($id);
		$data = json_encode(array(
			'status' => 0,
			'message' => 'DELETE_TEAM_SUCCESS',
			'data' => []
		));
		return 	$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output($data);
	}
}
