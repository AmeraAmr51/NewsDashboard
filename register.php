<?php 
session_start();
include 'inc/header.php';

?>


<section class="ftco-appointment">
<!-- Page Content -->
    <div class="container"><div class="row no-gutters d-md-flex align-items-center">
	    	<div style="margin-left:30%" class="col-md-6 appointment ftco-animate">
            <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            <h1 class="mb-4">Welcome in News</h1>
            </div>
            </div>
                <h4 class="mb-3">Register</h4>

        <form action="" method="POST"> 
        <div class="form-group">
            <label>User Name</label>
            <input type="name" class="form-control" name="username">
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control"name="email"  aria-describedby="emailHelp" required>
           
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="phone" class="form-control"name="phone" aria-describedby="phoneHelp" required>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1"required>
           
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" name="password2" id="exampleInputPassword1"required>
            <small id="exampleInputPassword1" class="form-text text-muted">must two Password matched.</small>
        </div>
        

        <div class="form-group form-check">
            <input type="checkbox" name="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="reg" class="btn btn-primary">Submit</button>
        <a href="index.php"> Have an account  </a>
        
        </form>
            </div>
            </section>
            <?php

if(isset($_POST['reg']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $password_2=$_POST['password2'];
    $hash = password_hash($password_2, PASSWORD_DEFAULT);
    if($password == $password_2){
    $qeury="INSERT INTO `users`(username, password, email, phone ) VALUES ('$username','$hash','$email','$phone' )";
    $result=mysqli_query($Connect,$qeury);

    if(!$result)
        {
            echo"faild".mysqli_error($Connect);
        }
        $_SESSION['username']= $username;
        header('location: home.php');
}
else {
    $error="Two Password not Confirm";
    echo"<div class='form-group text-danger fa-align-left'>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    $error</div>  ";
}
}


?>


<hr>

</div>
<!-- Footer -->
<?php include 'inc/footer.php';?>











