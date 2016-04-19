<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Admin Dashboard</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
 <div class="row">
         <div class="col s12 m6">
           <div class="card blue-grey darken-1">
             <div class="card-content white-text">
               <span class="card-title">Confirm deletion</span>
               <p>Are you sure you want to delete this user?</p>
             </div>
             <div class="card-action">
               <a href="signin">No</a>
               <a href="remove">Yes, delete</a>
             </div>
           </div>
         </div>
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
  <script src="assets/js/init.js"></script>

  </body>
</html>
