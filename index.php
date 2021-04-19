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
                <h4 class="mb-3">Sig In</h4>

        <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">username</label>
            <input type="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
       
        <button type="submit" name="login" class="btn btn-primary">Submit</button>
        <a href="register.php">Dont Have an account</a>
        </form>
            </div>
            </section>


<?php

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

        $sql="SELECT password FROM users WHERE username= '$username' ";
        $result=mysqli_query($Connect,$sql);
        if(mysqli_num_rows($result)==0)
        {
            echo "
           
            <h6 style='color:white'>  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp
            Worng Username / password Confirmed</h6>
            ";
            //      
        }

        else
        {
            while($row=mysqli_fetch_assoc($result)):
                $password_v=$row['password'];
                if (password_verify($password, $password_v))
                {
                    $_SESSION['username']= $username;
                    header('location: home.php');

                    if ($password=="root"){
                        header('location: admin/index.php');

                    }
                
                } 
                endwhile;
            
           
        }
        




    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header("location:index.php");
    }
}

?>
<hr>

</div>
<!-- Footer -->
<?php include 'inc/footer.php';?>











