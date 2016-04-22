<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>User Dashboard</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="/user_dashboard/assets/css/materialize.min.css" media="screen,projection"/>
  <link href="/user_dashboard/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<style>
#go_back {
  float:right;
}
form {
  border: 1px solid grey;
  margin-left: 20px;
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
 <div class="row">
   <div class="row">
     <a onclick="goBack()" id="go_back" class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>Return to dashboard</a>
    <script>
     function goBack() {
       window.history.back();
     }
   </script>
   </div>

   <?php $loggedin_user = $this->session->userdata('login_info'); ?>

   <h5><?= $user_info['first_name']; ?></h5>
   <p>Registered at: <?= $user_info['created_at']; ?></p>
   <p>User Id: <?= $user_info['id']; ?></p>
   <p>Email address: <?= $user_info['email']; ?></p>
   <p>Description: <?= $user_info['description']; ?></p>
   <h6>Leave a message for <?= $user_info['first_name']; ?> </h6>

   <form class="col s10" action="/user_dashboard/users/post_message" method="post">
       <div class="row">
         <input type="hidden" name="loggedin_user" value="<?= $loggedin_user['id']; ?>" >
         <input type="hidden" name="wall_user" value="<?= $user_info['id']; ?>" >
           <div class="input-field col s10">
             <textarea id="textarea1" class="materialize-textarea" name="message" placeholder="<?= $user_info['description']; ?>"></textarea>
             <label for="textarea1">Message</label>
           </div>
         </div>
         <button class="btn waves-effect waves-light" type="submit">Post
         </button>
   </form>
 </div>
<div>
    <?php foreach($messages as $message) {
      ?>
        <p><?=$message['created_at']; ?></p>
        <div><?= $message['content']; ?></div>
    <form action="/user_dashboard/users/post_comment" method="post">
      <input type="text" name="comment">
      <input type="hidden" name="msg_id" value="<?= $message['id']; ?>">
      <input type="hidden" name="loggedin_user" value="<?= $loggedin_user['id']; ?>" >
      <button type="submit">Post</button>
    </form>
  <?php } ?>
</div>


  <!--  Scripts-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
  <script src="assets/js/init.js"></script>

  </body>
</html>
