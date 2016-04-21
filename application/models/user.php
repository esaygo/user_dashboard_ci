<?php

class User extends CI_Model {
  function add_user($new_user) {
    // var_dump($new_user);
    // die();
      $query = 'INSERT INTO users (first_name, last_name, email, password, created_at,user_level) VALUES (?,?,?,?,NOW(),?)';
      $values = array($new_user['first_name'], $new_user['last_name'], $new_user['email'], $new_user['password'], "normal");
      return $this->db->query($query, $values);
  }

  function get_user($new_user) {
      $query = "SELECT * FROM users WHERE email = ?";
      $user_info = $this->db->query($query,$new_user['email'])->row_array();
      return $user_info;
    }
  function get_updated_user($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $user_info = $this->db->query($query,$id)->row_array();
        return $user_info;
    }
  function get_user_login($existing_user) {
    $query = "SELECT * FROM users WHERE email = ? AND password = ? ";
    $values = array($existing_user['email'], $existing_user['password']);
    $user_info = $this->db->query($query, $values)->row_array();
    return $user_info;
}

  function get_all_users() {
    $query = "SELECT * FROM users";
    $all_users = $this->db->query($query)->result_array();
    return $all_users;
  }

  function updateUserProfile($new_profile) {
    $query = " UPDATE users SET email='" . $new_profile["email"]. "', first_name='" . $new_profile["first_name"]. "', last_name='".$new_profile["last_name"]."' WHERE id=" .$new_profile["id"]. ";";
    $this->db->query($query);
    //and redirect back to edit profile
    $loggedin_user = $this->session->userdata('login_info');
  	$this->load->view('edit',['user_info'=>$loggedin_user]);
  }

  function updateUserPassword($new_profile) {
    // var_dump($new_profile);
    // die();
    $query = " UPDATE users SET password='" . $new_profile["password"]. "' WHERE id=" .$new_profile["id"]. ";";
    $this->db->query($query);
    //and redirect back to edit profile
    $loggedin_user = $this->session->userdata('login_info');
  	$this->load->view('edit',['user_info'=>$loggedin_user]);
  }

  function updateUserDescription($new_profile) {
    // var_dump($new_profile);
    // die();
    $query = " UPDATE users SET description='" . $new_profile["description"]. "' WHERE id=" .$new_profile["id"]. ";";
    $this->db->query($query);
    //and redirect back to edit profile
    $loggedin_user = $this->session->userdata('login_info');
  	$this->load->view('edit',['user_info'=>$loggedin_user]);
  }

}
?>
