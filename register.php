
<?php
    require_once('init.php');
    global $session;
     $error='';

        $urlContents=file_get_contents('php://input');
        $urlarray = json_decode($urlContents,true);
        $flag=0;

         if (!($urlarray['email']))
          {
            $error.='Invalid Email <br>';
            $flag=1;
          }
        // else
        // {
        //     if(!(strpos($urlarray['email'], '@')) && strpos(($urlarray['email'], '.') && (!strpos(($urlarray['email'], ' ')) )
        //     {
        //         $error = " * EMAIL must include '@' and '.' without spaces";
        //         $flag = 1;
        //     }
        // }
        else
        {
            $user=new User();
            $res=$user->find_if_exist($urlarray['email']);
            if(!$res)
            {
               $error='email already in use';
               echo $error;
               exit;
            }
        }
        if(!$urlarray['firstName'])
        {
            $error.='First Name is required <br>';
            $flag=1;

        }
        if(!$urlarray['lastName'])
        {

            $error.='Last Name is required <br>';
            $flag=1;

        }

         if(!$urlarray['password'])
        {

            $error.='Password is required <br>';
            $flag=1;

        }
        if ($flag==0)
        {
            $email=$urlarray['email'];
            $firstName=$urlarray['firstName'];
            $lastName=$urlarray['lastName'];
            $password= md5($urlarray['password']);

            $user=new User();
            $error=$user->add_user($email,$firstName,$lastName,$password);
            if (!$error)
            {
                $error = 'Register Successfully'."<a href = 'mingleSelect.php'>Click here to proceed</a>";
            }
        }
        echo $error;
?>