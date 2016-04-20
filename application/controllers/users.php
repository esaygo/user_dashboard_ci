<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index() {
		//login and reg - create view
		$this->load->view('welcome');
}

public function register() {

	$this->load->view('register');

}

public function process_register() {
	//insert in db user info if it does not exist already in db
	//if it's the first user, make it an admin

// var_dump($this->input->post());
// die();

	$this->load->helper(array('form','url'));
	$this->load->library("form_validation");

	$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
	$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required|matches[confirm_password]|md5');
 	$this->form_validation->set_rules('confirm_password', 'Confirm_Password', 'trim|required|md5');


	if($this->form_validation->run() === FALSE) {
	$this->session->set_flashdata("registration_error", validation_errors());
	redirect('register');

	 } else {
		//check if email exists in db
	 $this->load->model('User');
   $new_user = $this->input->post(NULL, TRUE);
	 $user = $this->User->get_user($new_user);

	if($user['email'] == $new_user['email']) {

		$this->session->set_flashdata("registration_error", "The email is already registered, please go to log in");
		redirect('register');

		} else {
		$this->User->add_user($new_user);
		redirect('signin');
		}

	}
		redirect('register');
}

public function signin() {

	$this->load->view('signin');
}

public function process_signin() {

	//if admin
	//$this->load->view('admin');

	//if normal user
	//$this->load->view('dashboard');

	$this->load->library("form_validation");
	$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
	$this->form_validation->set_rules("password", "Password", "trim|required|md5");

	if($this->form_validation->run() === FALSE) {
		$this->session->set_flashdata("loggin_error", validation_errors());
		redirect('signin');
	} else {
		//check email and password against db info
		$this->load->model('User');
		$existing_user = $this->input->post(NULL, TRUE);
		$user = $this->User->get_user_login($existing_user);


		if($user && $user['password'] == $existing_user['password']) {
			$all_users = $this->User->get_all_users();

				if($user['user_level'] == "admin") {
					$this->load->view('admin', ['info_users'=> $all_users]);
				} elseif ($user['user_level'] == "normal") {
					$this->load->view('dashboard', ['info_users'=> $all_users]);
				}

		} else {
			$this->session->set_flashdata("loggin_error", "No such user, please go to registration");
			redirect('register');
		}

	 }

}
public function edit() {
	//from the admin page
}

public function confirm_remove() {
	//from the admin page - then load the confirmation box
	$this->load->view('confirm_remove');
}

public function remove() {
	//action from confirm_remove
	echo "deleted";
}


public function logout() {
	redirect($uri=base_url());
}

}
