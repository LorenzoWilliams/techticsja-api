<?php 

    require_once 'includes/header-dashboard.php';
    require_once 'includes/auth_check.php';

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location: user_list.php");
  
     }else{
        $id=$_GET['id'];

        //call delete function
        $results = $userdata->deleteUserByID($id);
        //redirect to list

        if(!$results){
            header("Location: user_list.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }


?>