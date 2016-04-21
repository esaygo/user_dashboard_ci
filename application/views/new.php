<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>User Dashboard</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<style>
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
       <li><a href="logout">Log off</a></li>
     </ul>
   </div>
 </nav>
 <?php echo validation_errors(); ?>
 <?php if ($this->session->flashdata('registration_error')) {
   echo $this->session->flashdata('registration_error');
 }?>
 <div class="row">
   <div class="row">

     <a onclick="goBack()" id="go_back" class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>Return to dashboard</a>
     <script>
     function goBack() {
       window.history.back();
     }
   </script>
   </div>
   <h5>Add new user</h5>
   <form class="col s6" action="process_register" method="post">
     <div class="row">
       <div class="input-field col s6">
         <input id="email" type="email" name="email" class="validate">
         <label for="email">Email</label>
       </div>
     </div>
     <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" name="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" name="last_name" class="validate">
          <label for="last_name">Last Name</label>
        </div>
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
     <button class="btn waves-effect waves-light" type="submit" >Create
       <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
 <div class="row"><a href="signin">Already have an account? Login</a></div>
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
  <script src="assets/js/init.js"></script>

  </body>
</html>
