<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

function __construct()

{

parent::__construct();

$this->load->helper('url');

$this->load->model('users_model');

}

public function index()
{

$data['user_list'] = $this->users_model->get_all_users();

$this->load->view('show_users', $data);

}

public function add_form()
{

$this->load->view('insert');

}
#

public function edit(){
$id = $this->uri->segment(3);
 $data['user'] = $this->users_model->getById($id);
$this->load->view('edit', $data);
}

#
public function update()

{

$mdata['name']=$_POST['name'];

$mdata['email']=$_POST['email'];

$mdata['address']=$_POST['address'];

$mdata['mobile']=$_POST['mobile'];

$res=$this->users_model->update_info($mdata, $_POST['id']);

if($res){

header('location:'.base_url()."index.php/users/".$this->index());

}

}
#
public function delete($id)

{

$this->users_model->delete_a_user($id);

$this->index();

}


#
public function insert_new_user()
{

$udata['name'] = $this->input->post('name');

$udata['email'] = $this->input->post('email');

$udata['address'] = $this->input->post('address');

$udata['mobile'] = $this->input->post('mobile');

$res = $this->users_model->insert_users_to_db($udata);

if($res){

header('location:'.base_url()."index.php/users/".$this->index());

}

}
}
