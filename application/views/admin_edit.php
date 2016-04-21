<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Edit profile</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="/user_dashboard/assets/css/materialize.min.css" media="screen,projection"/>
  <link href="/user_dashboard/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
  .inline_forms {
    display: inline-block;
    width: 40%;
    margin: 2%;
    margin-bottom: 8%;
  }
  #go_back {
    float:right;
  }
  </style>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation>
   <div class="nav-wrapper-container">
     <a href="#" class="brand-logo">Test App</a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a href="loadDashboard">Dashboard</a></li>
       <li><a href="logout">Log off</a></li>
     </ul>
   </div>
 </nav>
 <?php echo validation_errors(); ?>
 <?php if ($this->session->flashdata('editProfile_error')) {
   echo $this->session->flashdata('editProfile_error');
 }?>
 <div class="row">
   <a onclick="goBack()" id="go_back" class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>Return to dashboard</a>
  <script>
   function goBack() {
     window.history.back();
   }
 </script>
 </div>

 <div class="inline_forms">
   <form class="col s6" action="/user_dashboard/users/adminEditUserInfo" method="post">
     <fieldset><legend>Edit Information</legend>
     <input type="hidden" name="id" value="<?php echo $user_info['id']; ?>" >
     <div class="row">
       <div class="input-field col s6">
         <input id="email" type="email" name="email" placeholder="<?php echo $user_info['email']; ?>" class="validate" required>
         <label for="email">Email</label>
       </div>
     </div>
        <div class="input-field col s6">
          <input id="first_name" name="first_name" placeholder="<?php echo $user_info['first_name']; ?>" type="text" class="validate" required>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" name="last_name" placeholder="<?php echo $user_info['last_name']; ?>" class="validate" required>
          <label for="last_name">Last Name</label>
        </div>
        <div class="input-field col s12 m6">
          <select class="icons" name="user_level">
            <option value="Normal" data-icon="/user_dashboard/assets/img/normal.png" class="circle">Normal</option>
            <option value="Admin" data-icon="/user_dashboard/assets/img/admin.gif" class="circle">Admin</option>
          </select>
            <label>User level</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Save
          <i class="material-icons right">send</i>
        </button>
      </fieldset>
    </form>
  </div>
      <!-- end of first profile edit section -->

    <div class="inline_forms">
      <form class="col s6" action="/user_dashboard/users/adminEditUserPassword" method="post">
        <fieldset><legend>Change Password</legend>
        <input type="hidden" name="id" value="<?php echo $user_info['id']; ?>" >
        <div class="row">
          <div class="input-field col s6">
            <input id="password" type="password" name="password" class="validate">
            <label for="password">Password</label>
       </div>
     </div>
     <div class="row">
       <div class="input-field col s6">
         <input id="password" type="password" name="confirm_password" class="validate">
         <label for="password">Password Confirmation</label>
       </div>
     </div>
     <button class="btn waves-effect waves-light" type="submit">Update Password
    <i class="material-icons right">send</i>
    </button>
  </fieldset>
   </form>
</div>

  <footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
        Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize feat. ES</a>
      </div>
    </div>

  </footer>

  <!--  Scripts-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
  <script src="../assets/js/init.js"></script>
  <script>
    $(document).ready(function() {
    $('select').material_select();
  });
  </script>

  </body>
</html>
