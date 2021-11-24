<?php
    use techticsja\Database\Connection;
    use techticsja\Data\UsersData;


    $title = 'Login'; 

    require_once 'includes/header.php'; 
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/UsersData.php'; 

    $conn = new Connection;
    $userdata = new UsersData($conn);
 
    $users = $usersdata->getloginUser($loginData);

    
    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = strtolower(trim($_POST['Email']));
        $password = $_POST['Password'];
        $new_password = md5($password.$email);

        $result = $staff->getloginStaff($email,$new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['Email'] = $$email;
            $_SESSION['id'] = $result['id'];
            header("Location: viewrecords.php");
        }

    }
?>


<div class="container-md" > 
  <br>
      <h5 style="text-align: center;"><?php echo $title ?></h5>
      <div>
  
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"   text-align="center">
        <img src="uploads/clients.png" alt="Avatar" class="avatar"><br>

        <label for="username"><b>Username</b></label><br>
        <input type="text" id="username" name="username" placeholder="Username" required><br>

        <label for="psw"><b>Password</b></label><br>
        <input type="password" placeholder="Password" name="psw" required><br>

        <input type="submit" value="Submit"><br><br>
        <span class="psw">Forgot <a href="#">password?</a></span>

      </form>
    </div>
  </div>

<br><br><br><br>

<?php include 'includes/footer.php' ?>