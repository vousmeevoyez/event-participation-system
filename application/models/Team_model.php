<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Team_model extends CI_Model
{
 
	var $table = 'teams';
 
 
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
 
 
	public function get_all_team()
	{
		$this->db->from('teams');
		$query=$this->db->get();
		return $query->result();
	}
 
 
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('fk_participant',$id);
		$query = $this->db->get();
 
		return $query->row();
	}

	public function get_by_fk($id)
	{
		$this->db->from($this->table);
		$this->db->where('pk_team',$id);
		$query = $this->db->get();
 
		return $query->row();
	}
 
	public function add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
 
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('pk_team', $id);
		$this->db->delete($this->table);
	}


 
 
}