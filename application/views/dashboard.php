<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Admin Dashboard</title>

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
      <li><a href="logout">Log off</a></li>
     </ul>
   </div>
 </nav>
 <div class="row">
   <?php if ($this->session->flashdata('edit_error')) {
     echo $this->session->flashdata('edit_error');
   }?>
   <h5>All users<h5>
   <div class="col l6 s12">
     <table>
       <thead>
         <th>ID</th>
         <th>Name</th>
         <th>email</th>
         <th>created_at</th>
         <th>user_level</th>
       <thead>
       <tbody>
         <?php foreach ($info_users as $user) { ?>
         <tr>
           <td><?= $user['id'];?></td>
           <td><a href="edit/<?= $user['id']; ?>"><?= $user['first_name'];?><?= $user['last_name'];?></a></td>
           <td><?= $user['email'];?></td>
           <td><?= $user['created_at'];?></td>
           <td><?= $user['user_level'];?></td>
         </tr>
         <?php } ?>

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
  <script src="/assets/js/init.js"></script>

  </body>
</html>
