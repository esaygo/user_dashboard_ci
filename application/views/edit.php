<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Edit profile</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/materialize.min.css" media="screen,projection"/>
  <link href="../assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
  .inline_forms {
    display: inline-block;
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
 <?php var_dump($user_info); ?>
 <div class="row" class="inline_forms">
   <form class="col s6" action="/user_dashboard/users/editUserProfile" method="post">
     <input type="hidden" name="id" value="<?php echo $user_info['id']; ?>" >
     <div class="row">
       <div class="input-field col s6">
         <input id="email" type="email" name="email" placeholder="<?php echo $user_info['email']; ?>" class="validate">
         <label for="email">Email</label>
       </div>
     </div>
        <div class="input-field col s6">
          <input id="first_name" name="first_name" placeholder="<?php echo $user_info['first_name']; ?>" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" name="last_name" placeholder="<?php echo $user_info['last_name']; ?>" class="validate">
          <label for="last_name">Last Name</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Save
          <i class="material-icons right">send</i>
        </button>
    </form>
  </div>
      <!-- end of fisrt profile edit section -->


    <div class="row" class="inline_forms">
      <form class="col s6" action="/user_dashboard/users/editUserPassword" method="post">
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
   </form>
</div>
 <div class="row">
   <form class="col s6" action="/user_dashboard/users/editUserDescription" method="post">
     <div class="row">
       <input type="hidden" name="id" value="<?php echo $user_info['id']; ?>" >
         <div class="input-field col s12">
           <textarea id="textarea1" class="materialize-textarea" name="description" placeholder="<?= $user_info['description']; ?>"></textarea>
           <label for="textarea1">Description</label>
         </div>
       </div>
       <button class="btn waves-effect waves-light" type="submit">Save
         <i class="material-icons right">send</i>
       </button>
   </form>
</div>

<div class=".row .col.m12" id="login_offset"></div>
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

  </body>
</html>
