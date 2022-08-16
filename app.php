<?php
session_start(); //Optional if you know how to start your session outside this file

function loadClasses($class) {
    $path = "./classes/";
    require_once("{$path}{$class}.php");
}

spl_autoload_register('loadClasses');

//Instantiating the CRUD Class
$crud = new CRUD("localhost", "root", "", "eprotech");

//Making Connection to Database
$conn = $crud->connect();

//Add Company
if(isset($_POST['addCompBtn'])) {
    $add_comp = $crud->add($conn, "tbl_suppliers", $_POST, [], [], true);

    if($add_comp) {
        $crud->redirect("suppliers.php?stat=1");
    }
}

/**
 * Add User 
 */
if(isset($_POST['addUserBtn'])) {
    $add_user = $crud->add($conn, "tbl_users", $_POST, [], [], true );
    if($add_user) {
        $crud->redirect("users.php?stat=1");
    }
}

/*
Add User Group
*/
if(isset($_POST['addGroupBtn'])) {
    $add_user_group = $crud->add($conn, "tbl_user_groups", $_POST, [], ['active'=>'i'], true);
    if($add_user_group) {
        $crud->redirect("user-groups.php?stat=1");
    }
}

if(isset($_GET['task']) && isset($_GET['comp_id']) && $_GET['task']=="comp_details") {
    $get_comp_details = $crud->get($conn, "SELECT * FROM tbl_suppliers WHERE id={$_GET['comp_id']}");
    $company = $get_comp_details->fetch_assoc();
}

//Login Handler
$msg = "";
if(isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = $crud->login($conn, "SELECT * FROM tbl_users WHERE email='{$username}' AND `password`='{$password}'");

    if($login) {
        if($login === false) {
            $msg = "Invalid Username and Password combination";
            $_SESSION['loginErr'] = $login;
            $crud->redirect("login.php?{$_SESSION['loginErr']}");
        } else {
            $_SESSION['login_status'] = "loggedin";
            $crud->redirect("index.php");
        }
    }
}

//Unlock Handler
$msg = "";
if(isset($_POST['unlockBtn'])) {
    if($_SESSION['login_status'] == "locked") {
        $password = $_POST['password'];

    $unlock = $crud->get($conn, "SELECT email, `password` FROM tbl_staffs WHERE `password`='{$password}' AND email='{$_SESSION['email']}'");
    $unlocked = $unlock->fetch_assoc();
//print_r($unlocked); exit;
        if($unlock) {
            if($unlock === false) {
                $msg = "Invalid Password combination";
                $_SESSION['loginErr'] = "true";
                $crud->redirect("login.php?{$_SESSION['loginErr']}");
            } else {
                if($_SESSION['email'] == $unlocked['email']) {
                    $_SESSION['login_status'] = "loggedin";
                    $crud->redirect("index.php");
                }
            }
        }
    }
}

//Logout Action
if(isset($_GET['action']) && isset($_GET['check'])) {
    $action = $_GET['action'];
    $check = $_GET['check'];
    $logout = $crud->logout($action, $check);
    if($logout) {
        $crud->redirect("login.php");
    }
}

//Lock Action
if(isset($_GET['action']) && isset($_GET['check'])) {
    $action = $_GET['action'];
    $check = $_GET['check'];
    if($action == "lock" && $check == "true") {
        $_SESSION['login_status'] = "locked";
        $_SESSION['password'] = "";

        //unset
        unset($_SESSION['password']);
    }

    if($_SESSION['login_status'] == "locked") {
        $crud->redirect("lock.php");
    }
}