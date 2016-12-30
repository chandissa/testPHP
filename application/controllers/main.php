<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
	public function index()
	{
		$this->load->model("model_form");
		$data["fetch_data"]= $this->model_form->fetch_data();
		//$this->load->view('view_form');
		$this->load->view("view_form" , $data);
	}

	public function form_validation()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name" , "Your Name" , 'required');
		$this->form_validation->set_rules("age" , "Your Age" , 'required');

		if($this->form_validation->run())
		{
			$this->load->model("model_form");
			$data= array(
				"name" => $this->input->post("name"),
				"age" => $this->input->post("age"),

				);
			$this->model_form->insert_data($data);

			redirect(base_url()."main/inserted");

		}
		else
		{
			$this->index();
		}
	}

	public function inserted()
	{
		$this->index();

	}

	public function delete_data()
	{

		$id = $this->uri->segment(3); //cant understand
		$this->load->model("model_form");
		$this->model_form->delete_data($id);
		redirect(base_url() . "main/deleted");
		

	}
	public function deleted(){
		$this->index();
	}
}
