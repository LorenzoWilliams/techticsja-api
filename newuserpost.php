<?php 
    use techticsja\Database\Connection;
    use techticsja\Data\UsersData;

    require_once 'includes/sessions.php';
    require_once 'v1/src/Database/Connection.php';
    require_once 'includes/auth_check.php';
    require_once 'v1/src/Data/UsersData.php';
    $conn = new Connection;

    //get values from post operation
    if(isset($_POST['submit'])){
        $user = new UsersData($conn);
        $email = $_POST['Email'];

        $result = $user->getUserByEmail($email);
        if($result['num']>0){
           echo "User Already Exist!";
        }else{
        //extract values from the $_POST array
        $role = $_POST['Role'];
        $firstname = $_POST['FirstName'];
        $lastname = $_POST['LastName'];
        $gender = $_POST['Gender'];
        $dob = $_POST['DOB'];
        $phone = $_POST['Phone'];
        $addressline1 = $_POST['AddressLine1'];
        $addressline2 = $_POST['AddressLine2'];
        $state = $_POST['State'];
        $country = $_POST['Country'];
        $password = $_POST['Password'];
        
        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/UsersAvatar';
        $destination = "$target_dir$phone.$ext";
        move_uploaded_file($orig_file,$destination);
        $member_since = '';

        //call funcation to insert and track if success or not
            $issuccess = $user->addNewUser(array(
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
            "Avatar_path" => $destination,
            "Member_Since" => $member_since)
        );
 
        //Redirect to list
        if($result){
            header("Location: user_list.php");
        }
        else{
            include 'includes/errormessage.php';
        }
        }
    }
    else{
        include 'includes/errormessage.php';
    }


?>