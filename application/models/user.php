<?php

class User extends CI_Model {
  function add_user($new_user) {
      $query = 'INSERT INTO users (first_name, last_name,email, password, created_at,updated_at) VALUES (?,?,?,?,NOW(),NOW())';
      $values = array($new_user['first_name'], $new_user['last_name'], $new_user['email'], $new_user['password']);
      return $this->db->query($query, $values);
  }

  function get_user($new_user) {
      $query = "SELECT * FROM users WHERE email = ?";
      $user_info = $this->db->query($query,$new_user['email'])->row_array();
      return $user_info;
    }
  function get_user_login($existing_user) {
    $query = "SELECT * FROM users WHERE email = ? AND password = ? ";
    $values = array($existing_user['email'], $existing_user['password']);
    $user_info = $this->db->query($query, $values)->row_array();
    return $user_info;
}

  }

?>
