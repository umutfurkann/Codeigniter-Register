<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signin extends CI_Controller{
public function index(){
//Validation for login form
$this->form_validation->set_rules('emailid','Email id','required|valid_email');
$this->form_validation->set_rules('password','Password','required');
if($this->form_validation->run()){
$email=$this->input->post('emailid');
$password=$this->input->post('password');
$this->load->model('Signin_Model');
$validate=$this->Signin_Model->index($email,$password);
if($validate){
$this->session->set_userdata('uid',$validate->id);	
$this->session->set_userdata('fname',$validate->FirstName);	
redirect('welcome');
} else {
$this->session->set_flashdata('error','Hatalı Giriş.Tekrar Deneyiniz.');
redirect('signin');
}
} else{
$this->load->view('signin');	
}
}}