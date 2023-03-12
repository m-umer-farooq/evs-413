<?php
include('functions.php');

  $error = '';

  if($_POST){

    extract($_POST);

    if($email == ''){ $error .= 'Email is required <br />';}
    if($password == ''){ $error .= 'Password is required <br />';}

    if($error == ''){
      require_once('db_conn.php');

      $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '".sha1($password)."' LIMIT 1";
      $result = mysqli_query($conn,$sql);
      $user = $result->fetch_object();

      if(isset($user) && !empty($user)){
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->first_name.' '.$user->last_name;
        redirect('dashboard.php');
      }else{
        $error = 'Invalid Login Detail.';
      } 
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/login.css" rel="stylesheet">
</head>
<body class="text-center">
    
<main class="form-signin w-100 m-auto">
 
  <form action="index.php" method="POST">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <?php if($error != ''){?>
      <div class="alert alert-danger"><?=$error?></div>
    <?php }?>

    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email">
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password">
      <label for="password">Password</label>
    </div>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
  </form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>