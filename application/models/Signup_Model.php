<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_Model extends CI_Model{
public function index($fname,$lname,$emailid,$password){
$data=array(
'FirstName'=>$fname,
'LastName'=>$lname,
'Email'=>$emailid,
'Password'=>hash($password));
$query=$this->db->insert('tblusers',$data);
if($query){
$this->session->set_flashdata('success','Kayıt Başarılı, Artık Giriş Yapabilirsin.');
redirect('signup');
} else {
$this->session->set_flashdata('error','Bir Şeyler Ters Gitti. Lütfen Tekrar Deneyin.');
redirect('signup');	
}
}}