<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class User extends CI_Controller{

		public function __construct()
	    {
	        parent::__construct();
	        $this->load->helper('form');
	        $this->load->model('userM');
	    }

	    public function index()
	    {
	        $this->load->view('welcome_message');
	    }

	    public function userAdd()
	    {
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('name', 'Name', 'trim|required');
	        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

	        if ($this->form_validation->run() == false) {
	            $response = array(
	                'status' => 'error',
	                'message' => validation_errors()
	            );
	        }
	        else {
	            $userData = array(
	                'name' => $this->input->post('name', true),
	                'email' => $this->input->post('email', true),
	                'phone' => $this->input->post('phone', true),
	            );

	            $id = $this->userM->insert_contact($userData);

	            $response = array(
	                'status' => 'success',
	                'message' => "<h3>Message send successfully.</h3>"
	            );
	        }

	        $this->output
	            ->set_content_type('application/json')
	            ->set_output(json_encode($response));
	    }
	}

?>
