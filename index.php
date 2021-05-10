<?php
    require_once("init.php");   
     $error='';
     if($_POST)
     {
         if (!$_POST['email'])
         {
              $error.='EMAIL is required';
         }
         else if(!$_POST['password'])
         {
             $error.='Password is required';
         }
         else
         {
             $email=$_POST['email'];
             $password=md5($_POST['password']);
             $user=new User();
             $error=$user->find_user_by_email_pass($email,$password);
			 if(!$error)
             {
                 $session->login($user);
                header('Location: mingleSelect.php');
                }
             else
             {
                 echo "<script> document.getElementById('error').innerHTML='Invalid user name or password' </script>";
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
    
    <link rel="stylesheet" href="css/homepageStyle.css">

    <title>Mingle</title>
</head>
<body>
    <header class = "my-header">
        <div class = "logo">
            <h3 class = logo-name>Mingle</h3>
        </div>

    </header>

    <main>

        
        <div class = "intro-text">
            <p>Who drinks alone dies alone</p>
        </div>


        <div class="big-wrap">
            <div class = "intro-img" style = "background-image: url('images/Pajamas.jpg')">
            </div>

            <form method = "POST">
            <div class = "form-container">
                <div class = "input-select">
                    <h3>Enter Email</h3>
                    <input id="email" class = "form-input" type="text" name = "email" placeholder = "Enter Email">
                </div>

                <div class = "input-select">
                    <h3>Enter Password</h3>
                    <input type = "password" id = "password" class = "form-input" type="text" name = "password" placeholder = "Enter Password">
                </div>

                <div class = "input-select">
                    <button class="login-btn" type = "submit" value= "submit" name = "submit">Share your pajamas</button>
                </div>
                
                <div class = "input-select">
                    <p>Haven't signed up yet? <a href = "register.html"> Click here!<a><p>
                </div>
                
            </div>
        </form>
        </div>

        <div class = "intro-text">
            <p>Share your coffee with others</p>
        </div>

        
    </main>

    <footer>
        <div class="footer">
            <ul>
                <li>About</li>
                <li>Blog</li>
                <li>Careers</li>
            </ul>            
            <ul>
                <li>Branches</li>
                <li>Address</li>
                <li>Careers</li>
            </ul>            
            <ul>
                <li>Support</li>
                <li>FAQ</li>
                <li>Help Docs</li>
            </ul>
        </div>
    <div class="copyright"><b>©  2021  Copyright: G T A <b></div>

  </footer>
</body>
</html>