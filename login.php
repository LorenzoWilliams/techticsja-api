<?php
  
    use techticsja\Database\Connection;
    use techticsja\Data\UsersData;

    $title = 'Login'; 

    
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/UsersData.php'; 
    require_once 'includes/header.php'; 

    $conn = new Connection;
    $userdata = new UsersData($conn);
 
    

   
    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = strtolower(trim($_POST['Email']));
        $password = $_POST['Password'];

        $result = $userdata->getloginUserRole(array(
          "Email" => $email, 
          "Password" => $password)
        );
        if(!$result){
            echo '<div class="alert alert-danger">Email or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['Email'] = $email;
            $_SESSION['Role_id'] = $result['Role_id'];
            $_SESSION['FirstName'] = $result['FirstName'];
            $_SESSION['id'] = $result['id'];
              header("Location: dashboard.php");
        }
    }
?>


<div class="container-md" > 
  <br>
      <h5 style="text-align: center;"><?php echo $title ?></h5>
      <div>
  
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"   text-align="center">
        <img src="uploads/clients.png" alt="Avatar" class="avatar"><br>

        <label for="Email"><b>Email</b></label><br>
        <input type="text" id="Email" name="Email" placeholder="Email" required><br>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small><br><br>

        <label for="Password"><b>Password</b></label><br>
        <input type="Password" placeholder="Password" name="Password" required><br>

        <input type="submit" value="Submit"><br><br>
        <span class="psw">Forgot <a href="forget-password.php">password?</a></span>

      </form>
    </div>
  </div>

<br><br><br><br>

<?php include 'includes/footer.php' ?>