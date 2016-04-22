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
  }

  function updateUserPassword($new_profile) {
    $query = " UPDATE users SET password='" . $new_profile["password"]. "' WHERE id=" .$new_profile["id"]. ";";
    $this->db->query($query);
  }

  function updateUserDescription($new_profile) {
    $query = " UPDATE users SET description='" . $new_profile["description"]. "' WHERE id=" .$new_profile["id"]. ";";
    $this->db->query($query);
  }

  function adminUpdateProfile($edited_by_admin) {
    $query = " UPDATE users SET email='" . $edited_by_admin["email"]. "', first_name='" . $edited_by_admin["first_name"]. "', last_name='".$edited_by_admin["last_name"]."', user_level='".$edited_by_admin['user_level']."' WHERE id=" .$edited_by_admin["id"]. ";";
    $this->db->query($query);
  }
  function adminUpdatePassword($edited_by_admin) {
    $query = " UPDATE users SET password='" . $edited_by_admin["password"]. "' WHERE id=" .$edited_by_admin["id"]. ";";
    $this->db->query($query);
  }
  function delete_user($id) {
    $query = "DELETE FROM users WHERE id = ?";
    $values = array($id);
    $this->db->query($query,$values);
  }

  function insert_message($message) {
    $query = 'INSERT INTO messages (content, created_at, updated_at, users_id,creator_id) VALUES (?, NOW(), NOW(), ?, ?)';
    $values = array($message['message'], $message['wall_user'], $message['loggedin_user']);
    $this->db->query($query, $values);
  }

  function show_messages($id) {
    $query = "SELECT * FROM messages WHERE users_id = ? ";
    $values = array($id);
    $user_messages = $this->db->query($query,$values)->result_array();
    return $user_messages;
  }
  function insert_comment($comment) {
    $query = 'INSERT INTO comments (content, created_at, updated_at, messages_id,users_id) VALUES (?, NOW(), NOW(), ?, ?)';
    $values = array($comment['comment'], $comment['msg_id'], $comment['loggedin_user']);

    var_dump($comment);
    // die();
    var_dump($query);
    die();
    $this->db->query($query, $values);
  }
}
?>
