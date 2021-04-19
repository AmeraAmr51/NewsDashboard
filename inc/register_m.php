<?php
session_start();

// if(isset($_POST['register']))
// {
//     $username=$_POST['username'];
//     $email=$_POST['email'];
//     $phone=$_POST['phone'];
//     $password=$_POST['password'];
//     $password_2=$_POST['password2'];
//     $checkout=$_POST['checkout'];

//     // if(empty( $username))
//     //     {
//     //         array_push($errors,"username is required ");
//     //     }

//     // if(empty( $email))
//     //     {
//     //         array_push($errors,"Email is required ");
//     //     }
//     // if(empty( $phone))
//     //     {
//     //         array_push($errors,"Phone is required ");
//     //     }
//     // if(empty( $password))
//     //     {
//     //         array_push($errors,"Password is required ");
//     //     }
//     // if($password != $password_2)
//     // {
//     //     array_push($errors,"The two Password not match ");
//     // }   
//     // if(sizeof($errors)==0){
//         $qeury="INSERT INTO users (username,password,email,phone,checkout)";
//         $qeury .="VALUES('$username','$password_2','$email',$phone,$checkout)";
//         $result=mysqli_query($Connect,$qeury);
//         if(!$result)
//             {
//                 echo"faild".mysqli_error($connect);
//             }
//             $_SESSION['username']= $username;
//             header('location: home.php');


//     // }



// }
// // function errros()
// // {
// //     global $errors;
// //     if(count($errors)> 0)
// //     {
// //         foreach($errors as $error)
// //         {
// //             echo
// //             "<div class='error'>
// //             <p>$error</p>
// //             </div>
// //             ";
// //         }
// //     }
// // }
// if(isset($_POST['reg']))
// {
// //     $username=$_POST['username'];
// //     $email=$_POST['email'];
// //     $phone=$_POST['phone'];
// //     $password=$_POST['password'];
// //     $password_2=$_POST['password2'];
// //     $checkout=$_POST['checkout'];
// //     echo $username;

// // $qeury="INSERT INTO `users`(`username`, `password`, `email`, `phone`, `checkout`) VALUES ('$username','$password_2','$email',$phone,$checkout)";
// // $result=mysqli_query($Connect,$qeury);
// // // if(!$result)
// // //     {
// // //         echo"faild".mysqli_error($Connect);
// // //     }
// //     $_SESSION['username']= $username;
// //     header('location: home.php');
// }

function success_login()
{
    if(isset($_SESSION['success']))
    {
      echo$_SESSION['success'];
      
    }
    else {
        unset($_SESSION['success']);
    }
    
      if(isset($_SESSION['username']))
         {
             echo $_SESSION['username'];
         }


}




?>