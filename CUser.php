<?php

class CUser {


    public function __construct($db) {
        $this->db=$db;
    }

    function Authenticated()
    {
        if(isset($_SESSION['user'])){
            return true;
        }
        else{
            return false;
        }
    }

    function output()
    {
        $acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
        if($acronym) {
            $output = "Du är inloggad som: $acronym ({$_SESSION['user']->name})";
        }
        else {
            $output = "Du är INTE inloggad.";
        }
        return $output;
    }

    public function Login($user,$password)
    {

        $sql = "SELECT acronym, name FROM USER WHERE acronym = ? AND password = md5(concat(?, salt))";
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($_POST['acronym'], $_POST['password']));

        if(isset($res[0]))
        {
            $_SESSION['user'] = $res[0];
        }
        header('Location: login.php');

}

/**
 * Logout
 *
 * Basically just unsets the $_SESSION['user']-variable. Logging out!
 */
        public function Logout()
        {
            if(isset($_POST['logout']))
            {
                unset($_SESSION['user']);
                header('Location: logout.php');
            }

        }

    public function userLoginMenu() {
        // array with all menu items
        $menu = array(
            "login"   => "login.php?p=login",
            "status"   => "login.php",
            "logout"   => "login.php?p=logout",
        );
    }
}

