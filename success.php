<?php 

    use techticsja\Database\Connection;
    use techticsja\Data\GendersData;
    use techticsja\Data\RolesData;
    use techticsja\Data\UsersData;


    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/UsersData.php';
    require_once 'v1/src/Data/RolesData.php';
    require_once 'v1/src/Data/GendersData.php';
    $conn = new Connection;

/*     require_once 'sendemail.php'; */
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
        $addressLine1 = $_POST['AddressLine1'];
        $addressLine2 = $_POST['AddressLine2'];
        $state = $_POST['State'];
        $country = $_POST['Country'];
        $address="$addressLine1 $addressLine2, $state, $country";
        $password = md5($_POST['Password']);
        
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
            "Address" => $address, 
            "Password" => $password,
            "Avatar_path" => $destination,
            "Member_Since" => $member_since)
        );
        }
    }

    if($result['num']<0) {
?>

    <img src="<?php echo empty($destination) ? "uploads/blank.png": $destination?>" class="rounded" style="width: 20%; height: 20%"/>
     <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['FirstName'].' '. $_POST['LastName'];?>
            </h5>
            <p class="card-text">
                Role: <?php echo $_POST['Role'];?>
            </p>
            <p class="card-text">
                Date Of Birth: <?php echo $_POST['DOB'];?>
            </p>
            <p class="card-text">
                Email Address: <?php echo $_POST['Email'];?>
            </p>
            <p class="card-text">
                Phone Number: <?php echo $_POST['Phone'];?>
            </p>
        </div>
    </div> 


    <br>
    <br>
    <br>
    <br>

    <?php  } require_once 'includes/footer.php';?>