<?php

require_once('init.php');

class User{
    private $email;
    private $fname;
    private $lname;
    private $password;
    private $status;


    public static function fetch_users()
    {

        global $database;
        $result=$database->query("select * from users");
        $users=null;
        if ($result){
            $i=0;
            if ($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $user=new User();
                    $user->instantation($row);
                    $users[$i]=$user;
                    $i+=1;
                }
            }
        }
        return $users;
    }

    private function has_attribute($attribute)
    {

        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
    }

     private function instantation($user_array)
     {
         print_r($user_array);
        foreach ($user_array as $attribute=>$value)
        {
            if ($result=$this->has_attribute($attribute)){
                $this->$attribute=$value;
            }
            echo $this->$attribute;
       }
     }

     public function find_if_exist($email)
     {
        global $database;
        $error=null;
        $result=$database->query("select * from users where email='".$email."'");
        if ($result->num_rows>0) {
            $error=null;
            $found_user=$result->fetch_assoc();
            $this->instantation($found_user);
         }else{
            $error=true;
           }
         return $error;
    }

    public function check_pass_by_email($email,$password)
    {
        global $database;
        $error=null;
        $result=$database->query("select * from users where email='".$email."' and password='".$password."'");

        if (!$result){
            $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        }
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
			$this->instantation($found_user);
        }
         else{
             $error="Cannot find user by this name";
            }
        echo $this;
        return $error;
    }

     public function find_user_by_email($email)
     {
        global $database;
        $error=null;
        $result=$database->query("select * from users where email='".$email."'");

        if (!$result){
             $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        }
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
			$this->instantation($found_user);
        }
         else
             $error="Cannot find user by this email";

        return $error;

    }

    public function find_user_by_email_pass($email,$password)
    {
        global $database;
        $error=null;
        $result=$database->query("select * from users where email='".$email."' and password='".$password."'");
        if (!$result)
            $error=$database->get_connection()->error;
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
			$this->instantation($found_user);
        }
         else
             $error="Cannot find user by this name";
        return $error;
    }

    public function printUser()
    {
        global $database;
        $error=null;
        $sql="Select * from users";
        $result=$database->query($sql);
        if ($result){
        $res=array();
        if ($result->num_rows>0)
            {
                while($row=$result->fetch_assoc())
                {
                    array_push($res,$row);
                }
            }
        }
        return $res;
    }


    public function deleteUser($email)
    {
        global $database;
        $error=null;
        $sql="delete from users where email='".$email."'";
        $result=$database->query($sql);
    }


    public static function add_user($email,$fname,$lname,$password)
    {
        global $database;
        $error=null;
        $sql="Insert into users(email,password,fname,lname) values ('".$email."','".$password."','".$fname."','".$lname."')";
        $result=$database->query($sql);
        if (!$result)
            $error='Cannot add user.  Error is:'.$database->get_connection()->error;
        return $error;

    }
    public function __get($property)
    {
        if (property_exists($this,$property))
            return $this->$property;
    }

    public function __toString ()
	{
	return '<br> User name: '.$this->fname.' 
    '.$this->lname.'<br> email: '.$this->email.'';
	}

}
    $user=new User();

?>

