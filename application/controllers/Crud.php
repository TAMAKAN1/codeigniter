<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function mahedy()
	{
		$data['data']=$this->crud_model->getAllProducts();
		$this->load->view('crud',$data);
	}
	public function store_product(){
		 $this->form_validation->set_rules('name','Product Name','trim|required');
		 $this->form_validation->set_rules('quantity','Product Quantity','trim|required');
		 $this->form_validation->set_rules('status','Product status','trim|required');

		 if($this->form_validation->run()== false){
         $data_error=[
			'error'=>validation_errors()

		 ];
		 $this->session->set_flashdata($data_error);
		 }
		 else{
	    	$result=$this->crud_model->insertProduct([
				'name'=>$this->input->post('name'),
				'quantity'=>$this->input->post('quantity'),
				'status'=>$this->input->post('status'),
			]);
			if($result){
				$this->session->set_flashdata('success','added successfully');

			}
		 }

		 redirect('crud/mahedy');
	}

	public function update_product($id){
		$this->form_validation->set_rules('name','Product Name','trim|required');
		$this->form_validation->set_rules('quantity','Product Quantity','trim|required');
		$this->form_validation->set_rules('status','Product status','trim|required');

		if($this->form_validation->run()== false){
		$data_error=[
		   'error'=>validation_errors()

		];
		$this->session->set_flashdata($data_error);
		}
		else{
		   $result=$this->crud_model->update_product([
			   'name'=>$this->input->post('name'),
			   'quantity'=>$this->input->post('quantity'),
			   'status'=>$this->input->post('status'),
		   ],$id);
		   if($result){
			   $this->session->set_flashdata('success','updated successfully');

		   }
		}

		redirect('crud/mahedy');
	}

	public function delete($id){
		$this->crud_model->delete($id);
		redirect('crud/mahedy');

	}
}