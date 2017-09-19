<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

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

     public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
    }

    public function index(){
    	$this->load->view('templates/header');
    	$this->load->view('pages/proposal',array('error'=>''));
    	$this->load->view('templates/footer');
    }

     public function do_upload() { 
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'ppt|pptx|doc|docx|pdf'; 
         $config['max_size']      = 2048000; 

         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('templates/header');
            $this->load->view('pages/proposal', $error);
            $this->load->view('templates/footer');
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('templates/header');
            $this->load->view('pages/proposal', $data);
            $this->load->view('templates/footer');
         } 
      } 

}
