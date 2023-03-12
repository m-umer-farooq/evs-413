<?php include('header.php');?>

<?php
    $error_message = '';

    if($_POST){

       extract($_POST);

       if($first_name == ''){ $error_message .= 'First Name is required. <br/>';}
       if($last_name == ''){ $error_message .= 'Last Name is required. <br/>';}
       if($username == ''){ $error_message .= 'Username is required. <br/>';}
       if($email == ''){ $error_message .= 'Email is required. <br/>';}
       if($password == ''){ $error_message .= 'Password is required. <br/>';}

       if($error_message == ''){

            $sql = "INSERT INTO `users` SET 
            `first_name` = '$first_name', 
            `last_name` = '$last_name',
            `username` = '$username',
            `email` = '$email',
            `password` = '".sha1($password)."'";

            try {
                $response = mysqli_query($conn,$sql);
                
                if($response){
                    header("Location: users_list.php?message=User Added Successfully&type=success");
                }else{
                    $error_message .= 'Unable to add User.';
                }

            } catch (Exception $e) {
                $error_message .= $e->getMessage();
            } 
       }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
        <h3>User Add</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

        <?php
            if($error_message != ''){
                echo '<div class="alert alert-danger">'.$error_message.'</div>';
            }
        ?>

            <form action="user_add.php" method="POST">
                
                <div class="mb-3">
                    <label for="first_name" class="form-lable">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="<?=@$_POST['first_name']?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-lable">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="<?=@$_POST['last_name']?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-lable">Username</label>
                    <input type="text" id="username" name="username" value="<?=@$_POST['username']?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-lable">Email</label>
                    <input type="email" id="email" name="email" value="<?=@$_POST['email']?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-lable">Password</label>
                    <input type="password" id="password" name="password" value="" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="sumbmit" id="btn_submit" name="btn_submit" value="submit" class="btn btn-primary">Add</button>
                    <a href="users_list.php" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
    


</div>


<?php include('footer.php');?>