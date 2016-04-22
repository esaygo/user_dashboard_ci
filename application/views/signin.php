<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>User Dashboard - Signin</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="/user_dashboard/assets/css/materialize.min.css" media="screen,projection"/>
  <link href="/user_dashboard/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation>
   <div class="nav-wrapper-container">
     <a href="#" class="brand-logo">Test App</a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a href="#">Home</a></li>
       <li><a href="#">Sign in</a></li>
     </ul>
   </div>
 </nav>
 <?php echo validation_errors(); ?>
 <?php if ($this->session->flashdata('login_error')) {
   echo $this->session->flashdata('login_error');
 }?>
 <div class="row">
   <form class="col s6" action="process_signin" method="post">
     <div class="row">
       <div class="input-field col s6">
         <input id="email" type="email" name="email" class="validate">
         <label for="email">Email</label>
       </div>
     </div>
     <div class="row">
       <div class="input-field col s6">
         <input id="password" type="password" name="password" class="validate">
         <label for="password">Password</label>
       </div>
     </div>
     <button class="btn waves-effect waves-light" type="submit">Sign In
    <i class="material-icons right">send</i>
  </button>
   </form>
 </div>
 <div class="row"><a href="register">Don't have an account? Register</a></div>
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
