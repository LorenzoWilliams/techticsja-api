<?php 
    require_once 'includes/sessions.php';
    require_once 'v1/src/Database/Connection.php';
    require_once 'includes/auth_check.php';

    //get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $role = $_POST['Role'];
        $firstname = $_POST['FirstName'];
        $lastname = $_POST['LastName'];
        $gender = $_POST['Gender'];
        $dob = $_POST['DOB'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $addressline1 = $_POST['AddressLine1'];
        $addressline2 = $_POST['AddressLine2'];
        $state = $_POST['State'];
        $country = $_POST['Country'];
        $password = $_POST['Password'];
        $avatar_path = $_POST['Avatar_path'];
        $member_since = $_POST['Member_since'];

        var_dump($_POST);

        //call Crud function
        $result = $user->updateUserByID(array(
            "Role_id" => $role, 
            "FirstName" => $firstname, 
            "LastName" =>$lastname, 
            "Gender_id" => $gender, 
            "DOB" => $dob, 
            "Email" => $email, 
            "Phone" => $phone, 
            "AddressLine1" => $addressline1,
            "AddressLine2" => $addressline2, 
            "State" => $state, 
            "Country" => $country,  
            "Password" => $password,
            "Avatar_path" => $avatar_path,
            "Member_since" => $member_since)

        );
var_dump($result);
exit;
        //Redirect to list
        if($result){
            header("Location: user_list.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
    else{
        include 'includes/errormessage.php';
    }

?>