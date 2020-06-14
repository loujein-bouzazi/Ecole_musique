<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>EM | Login</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body style="margin:8%; background-image: url('../assets/img/header-bg.jpg')">

  <div class="text-center header">
  	<h2 class="section-heading text-uppercase">Login</h2>
  </div>
	 
  <form class="text-center login-form" method="post" action="login.php">
  	<?php include('errors.php'); ?>

<div style="display: flex; flex-direction: column; align-items: center;">
  	<div class="mb-4">
  		<label>Username</label>
  
  		<input class="form-control" type="text" name="username" >
  	</div>

  	<div class="">
  		<label>Password</label>
  		<input class="form-control" type="password" name="password">
  	</div>

  	<div class="">
  		<button type="submit" class="btn btn-primary mt-4 mb-2"  name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>

  </div>
  </form>
</body>
</html>