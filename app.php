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
    $add_comp = $crud->add($conn, "tbl_suppliers", $_POST, [], ['cat_id'=>'i'], true);

    if($add_comp) {
        $crud->redirect("suppliers.php?stat=1");
    }
}