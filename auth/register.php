<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body style="margin:8%; background-image: url('../assets/img/header-bg.jpg')">
  <div class="text-center header">
    <h2 class="section-heading text-uppercase">Sign up</h2>
  </div>
   
  <form class="text-center login-form" method="post" action="register.php">
  	<?php include('errors.php'); ?>
<div style="display: flex; flex-direction: column; align-items: center;">
    <div class="mb-4">

<input type="radio" name="role"
<?php if (isset($role) && $role=="1") echo "checked";?>
value="1">Etudiant
<input type="radio" name="role"
<?php if (isset($role) && $role=="2") echo "checked";?>
value="2">Enseignant
</div>
<div style="display: flex; flex-direction: column; align-items: center;">
    <div class="mb-4">

      <label>First Name</label>
      <input class="form-control"  type="text" name="firstname" value="<?php echo $firstname; ?>">
    </div> 
    <div class="mb-4">

     <div class="">
      <label>Last Name</label>
      <input class="form-control"  type="text" name="lastname" value="<?php echo $lastname; ?>">
    </div>
    </div>
        <div class="mb-4">

  	<div class="">
  	  <label>Username</label>
  	  <input  class="form-control" type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  </div>
      <div class="mb-4">

  	<div class="">
  	  <label>Email</label>
  	  <input class="form-control"  type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  </div>
      <div class="mb-4">

  	<div class="">
  	  <label>Password</label>
  	  <input class="form-control"  type="password" name="password_1">
  	</div>
  </div>
      <div class="mb-4">

  	<div class="">
  	  <label>Confirm password</label>
  	  <input class="form-control"   type="password" name="password_2">
  	</div>
  </div>
      <div class="mb-4">

  	<div class="">
  	  <button type="submit" class="btn btn-primary mt-4 mb-2" name="reg_user">Register</button>
  	</div></div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </div>
  </form>
</body>
</html>