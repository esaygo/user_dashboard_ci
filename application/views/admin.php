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
  <style>
  form {
    margin-top: 5%;
    margin-left: 40%;
  }
  </style>
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
    <form class="col s4>
      <div class="row">
 <a class="waves-effect waves-light btn-large"><i class="material-icons right">cloud</i>Add new</a>
 </div>
 </form>
 </div>
 <div class="row">
   <div class="col l6 s12">
     <table>
       <thead>
         <th>ID</th>
         <th>Name</th>
         <th>email</th>
         <th>created_at</th>
         <th>user_level</th>
         <th>actions</th>
       <thead>
       <tbody>
         <tr>
           <td>1</td>
           <td><a href="#">Michael Choi</a></td>
           <td>micheal@village88.com</td>
           <td>Dec 24th 2012</td>
           <td>admin</td>
           <td>
             <a href="edit"><img src="assets/img/edit_icon.gif"></a>
             <a href="confirm_remove"><img src="assets/img/delete_icon.gif"></a>
            <td/>
         </tr>

       </tbody>
     </table>
     <div class=".row .col.m12" id="login_offset"></div>
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
