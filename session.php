<?php

require_once('init.php');

class Session{
    private $signed_in;
    private $user_email;
    private $userName;


    public function __construct(){
        error_reporting(E_ERROR);

        session_start();
        $this->check_login();
    }

     private function check_login(){
        error_reporting(E_ERROR);

        if (isset($_SESSION['user_email'])){
            $this->user_email=$_SESSION['user_email'];
            $this->signed_in=true;
        }
        else{
            unset($this->user_email);
            $this->signed_in=false;
        }
    }

    public function login($user)
    {
        if($user)
        {
            $this->signed_in=true;
            $this->user=$user->firstName;
            $_SESSION['firstName']=$user->fname;
            $_SESSION['lastName']=$user->lname;
            $_SESSION['user_email']=$user->email;
        }

    }

    public function logout()
    {
        echo 'logout';
        unset($_SESSION['firstName']);
        unset($_SESSION['lastName']);
        unset($_SESSION['user_email']);
        unset($this->user_email);
        unset($this->userName);
        $this->signed_in=false;

    }

    public function __get($property)
    {
        if (property_exists($this,$property))
            return $this->$property;
    }

}
$session=new Session();

?>

