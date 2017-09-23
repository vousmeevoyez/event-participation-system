<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view($page='hifest-home')
	{
        if ( !file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }


        $this->load->view('templates/header');
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');
	}

	public function download($filename = NULL) {

	    $this->load->helper('download');
	    $data = file_get_contents(base_url('/uploads/rulebook/'.$filename));
	    force_download($filename, $data);
	}
	
	public function do_upload(){
		 $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'docx|pdf'; 
         $config['max_size']      = 1000;
         $this->load->library('upload', $config);

         $file_name = 'userfile';

         if ( ! $this->upload->do_upload($file_name)) {
            $error = $this->upload->display_errors(); 
            echo json_encode(array("status" => FALSE, "error" => $error)); 
         }	
         else { 
            $data = array('upload_data' => $this->upload->data()); 
           	echo json_encode(array("status" => TRUE, $data));
         }
	}
	public function participant_page(){
		$this->load->view('pages/participant-page');
	}

	public function logout()
	{
		$session_data = array(
			'username' => '',
		);
		$this->session->unset_userdata('logged_in',$session_data);
		redirect('/pages/view/login');
	}
}
