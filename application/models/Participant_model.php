<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Participant_model extends CI_Model
{
 
	var $table = 'participants';
 
 
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
 
 
	public function get_all_participants()
	{
		$this->db->from($this->table);
		$query=$this->db->get();
		return $query->result();
	}

	public function get_by_team($fk_team)
	{
		$this->db->from($this->table);
		$this->db->where('fk_team',$fk_team);
		$query=$this->db->get();
		return $query->result();
	}
 
 	public function get_by_email($email)
	{
		$this->db->from($this->table);
		$this->db->where('participant_email',$email);
		$query = $this->db->get();
 
		return $query->row();
	}
 
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('pk_participant',$id);
		$query = $this->db->get();
 
		return $query->row();
	}

	public function add($data)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('participant_email',$data['participant_email']);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 0){
			$this->db->insert($this->table, $data);	
			return $this->db->insert_id();
		}
		
	}
 
	public function update($data)
	{
		$this->db->set($data);
		$this->db->	where('pk_participant',$data['pk_participant']);
		$this->db->update($this->table);
		return $this->db->affected_rows();
	}

	public function update_team($data)
	{
		$this->db->set('fk_team',$data['fk_team']);
		$this->db->	where('pk_participant',$data['pk_participant']);
		$this->db->update($this->table);
		return $this->db->affected_rows();
	}
 
	public function delete($id)
	{
		$this->db->where('pk_participant', $id);
		$this->db->delete($this->table);
	}

	public function count_member($fk_team)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('fk_team',$fk_team);
		$query = $this->db->get();

		return $query->num_rows();
	}
 
 
}