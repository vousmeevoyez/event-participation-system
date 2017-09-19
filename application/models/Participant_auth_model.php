<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the User Model.
class Participant_auth_model extends CI_Model
{
 
	var $table = 'participants_auth';
 
 
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// 			USER MODEL
	public function add($data)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username',$data['username']);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows() == 0){
			$this->db->insert($this->table, $data);
			return true;
		}else{
			return false;
		}
	}

	public function check($data)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
		$this->db->where('status',1);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
		
	}

	public function get_pk($data)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username',$data['username']);
		$this->db->limit(1);
		$query = $this->db->get()->row()->pk_participant;
		return $query;
	}
 
 
}