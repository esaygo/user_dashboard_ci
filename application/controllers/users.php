<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('User');
		$this->load->library("form_validation");
	}

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

	//$this->load->library("form_validation");

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
	 //$this->load->model('User');
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
				$this->session->set_userdata('login_info', $user);

				$all_users = $this->User->get_all_users();

				if($user['user_level'] === "admin") {
					$this->load->view('admin', ['info_users'=> $all_users]);
				} elseif ($user['user_level'] === "normal") {
					$this->load->view('dashboard', ['info_users'=> $all_users]);
				}

		} else {
			$this->session->set_flashdata("loggin_error", "No such user, please go to registration");
			redirect('register');
		}

	 }

}

public function new_user() {
	$this->load->view('new');
	//the new user - create button will call the register method
}

public function edit_own_profile($id) {
	//from the dashboard page

	$loggedin_user = $this->session->userdata('login_info');

	if($id === $loggedin_user['id']) {
		$this->load->view('edit',[
															'user_info'=>$loggedin_user
														]);
	} else {
		$this->session->set_flashdata("edit_error", "You can only edit your own profile");
		redirect('users/loadDashboard');
	}
}

public function loadDashboard(){
	$this->load->model('User');
	$all_users = $this->User->get_all_users();
	$this->load->view('dashboard',['info_users'=>$all_users]);
}

public function editUserProfile() {
	//$this->load->library("form_validation");

	$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');

	if($this->form_validation->run() === FALSE) {
	$this->session->set_flashdata("editProfile_error", validation_errors());
	} else {
		//UPDATE db
	 //$this->load->model('User');
   $new_profile = $this->input->post(NULL, TRUE);
	 $this->User->updateUserProfile($new_profile);
	 $loggedin_user = $this->session->userdata('login_info');
 		$this->User->get_updated_user($loggedin_user['id']);
 		$updated_info = $this->User->get_updated_user($loggedin_user['id']);

 		//UPDATE the session data with new info???
		$this->session->set_userdata('login_info', $updated_info);
	}
	//and redirect back to edit profile
	$updated_session = $this->session->userdata('login_info');

	$this->User->get_updated_user($updated_session['id']);
	$this->load->view('edit',['user_info'=>$updated_session]);
	//redirect($this->uri->uri_string(), 'refresh');
}

public function editUserPassword() {
	$new_profile = $this->input->post();
	//var_dump($new_profile);
	//die();
	//$this->load->library("form_validation");
	$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required|matches[confirm_password]|md5');
	$this->form_validation->set_rules('confirm_password', 'Confirm_Password', 'trim|required|md5');

	if($this->form_validation->run() === FALSE) {
	$this->session->set_flashdata("editProfile_error", validation_errors());

} else {
	//update db
	//$this->load->model('User');
	$new_profile = $this->input->post(NULL, TRUE);
	$this->User->updateUserPassword($new_profile);
	}
	//and redirect back to edit profile
	$loggedin_user = $this->session->userdata('login_info');
	$this->load->view('edit',['user_info'=>$loggedin_user]);
}

public function editUserDescription() {
	$new_profile = $this->input->post();
	$this->User->updateUserDescription($new_profile);
	//var_dump($new_profile);
	//die();
	//update users session
	$loggedin_user = $this->session->userdata('login_info');
	 $this->User->get_updated_user($loggedin_user['id']);
	 $updated_info = $this->User->get_updated_user($loggedin_user['id']);
	 $this->session->set_userdata('login_info', $updated_info);
	 //and redirect back to edit profile
 	$loggedin_user = $this->session->userdata('login_info');
 	$this->load->view('edit',['user_info'=>$loggedin_user]);

}

public function adminEditUser($id) {
	$selected_user = $this->User->get_updated_user($id);
	$this->load->view('admin_edit',['user_info'=>$selected_user]);
}

public function adminEditUserInfo() {
	$edited_by_admin = $this->input->post(NULL, TRUE);
	$this->User->adminUpdateProfile($edited_by_admin);

	//redirect back to edit user_info (after updating session) - it's not actually the logged in user, but the user admin is editing
	$loggedin_user = $edited_by_admin['id'];
	// var_dump($loggedin_user);
	// die();
	 $this->User->get_updated_user($loggedin_user);
	 $updated_info = $this->User->get_updated_user($loggedin_user);

	 //UPDATE the session data with new info???
	 $this->session->set_userdata('login_info', $updated_info);
	 $updated_session = $this->session->userdata('login_info');

 	 $this->User->get_updated_user($updated_session['id']);
 	 $this->load->view('admin_edit',['user_info'=>$updated_session]);
}

public function adminEditUserPassword() {
	$edited_by_admin = $this->input->post(NULL, TRUE);
	$this->User->adminUpdatePassword($edited_by_admin);

	$data = $this->User->get_updated_user($edited_by_admin['id']);
 	$this->load->view('admin_edit',['user_info'=>$data]);

}

public function confirm_remove($id) {
	//from the admin page - then load the confirmation box
	$this->load->view('confirm_remove', ['id'=>$id]);
}

public function remove_user($id) {
	//action from confirm_remove
$this->User->delete_user($id);
$info_users = $this->User->get_all_users();
// var_dump($info_users);
// die();
$this->load->view('../views/admin', ['info_users'=> $info_users]);
}

public function post_message() {
	$message = $this->input->post();
	//var_dump($message);
	//die();
	$this->User->insert_message($message);
	$id = $message['wall_user'];
	$get_user = $this->User->get_updated_user($id);
	$wall_messages = $this->User->show_messages($id);
	$this->load->view('show', [
														'user_info'=> $get_user,
														'messages'=>$wall_messages
													]);
}

public function show($id) {
	$loggedin_user = $this->session->userdata('login_info');
	$get_user = $this->User->get_updated_user($id);
	$wall_messages = $this->User->show_messages($id);

	$this->load->view('show', [
														'user_info'=> $get_user,
														'messages'=>$wall_messages
													]);
}

public function post_comment() {
$comment = $this->input->post();
// var_dump($comment);
// die();
$this->User->insert_comment($comment);
}

public function logout() {
	if($this->session->userdata()) {
		$this->session->session_destroy();
	}
	//redirect($uri=base_url());

	redirect('users');
}

}
