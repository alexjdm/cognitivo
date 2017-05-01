<?php
/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 07-04-2016
 * Time: 0:13
 */


    class AccountLoginModel
    {
        var $Email;
        var $Password;
        var $ReturnUrl;
        var $RememberMe;

        public function __construct($email, $password){
            $this->Email = $email;
            $this->Password = $password;
        }
    }

?>