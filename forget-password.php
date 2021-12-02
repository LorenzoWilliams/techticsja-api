<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use techticsja\Database\Connection;
    use techticsja\Data\UsersData;


    $title = 'Forget Password'; 

    require_once 'includes/header.php'; 
    require_once 'v1/src/Database/Connection.php';

    if (isset($_POST["Email"]) && (!empty($_POST["Email"]))) {
        $email = $_POST["Email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $error .="Invalid email address";
        } else {
            $sel_query = "SELECT * FROM `signup` WHERE email='" . $email . "'";
            $results = mysqli_query($con, $sel_query);
            $row = mysqli_num_rows($results);
            if ($row == "") {
                $error .= "User Not Found";
            }
        }
        if ($error != "") {
            echo $error;
        } else {

            $output = '';

            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
            $expDate = date("Y-m-d H:i:s", $expFormat);
            $key = md5(time());
            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
            $key = $key . $addKey;
            // Insert Temp Table
            mysqli_query($con, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


            $output.='<p>Please click on the following link to reset your password.</p>';
            //replace the site url
            $output.='<p><a href="http://localhost/Techticsja-api/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/Techticsja-api/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
            $body = $output;
            $subject = "Password Recovery";

            $email_to = $email;


            //autoload the PHPMailer
            require("vendor/autoload.php");
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = "smtp.gmail.com"; // Enter your host here
            $mail->SMTPAuth = true;
            $mail->Username = "techtics.ja@gmail.com"; // Enter your email here
            $mail->Password = ""; //Enter your passwrod here
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->From = "techtics.ja@gmail.com";
            $mail->FromName = "TechticsJA";

            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($email_to);
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "An email has been sent";
            }
        }
    }
?>
<div class="container-md" > 
  <br>
      <h5 style="text-align: center;"><?php echo $title ?></h5>
      <div>
  
      <form method="post" action="" name="reset">

        <label for="email"><b>Email</b></label><br>
        <input type="text" id="email" name="email" placeholder="Email" required><br>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small><br><br>
        
        <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/><br><br>


      </form>
    </div>
  </div>

<br><br><br><br>

<?php include 'includes/footer.php' ?>
