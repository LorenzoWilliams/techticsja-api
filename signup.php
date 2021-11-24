<?php 

    use techticsja\Database\Connection;
    use techticsja\Data\GendersData;

    $title = "Signup"; 
    require_once 'includes/header.php';
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/GendersData.php';

    $conn = new Connection;
    $gendersdata = new GendersData($conn);

 
    $genders = $gendersdata->getAllGenders();
?>

<div class="container-md" > 
  <br>
      <h5 style="text-align: center;"><?php echo $title ?></h5>
      <div>
      <form action="index.php" enctype="multipart/form-data">



            <br>

            <label for="FirstName"><b>First Name</b></label><br>
            <input type="text" id="Firstname" name="Firstname" placeholder="Firstname" required><br>
            
            <label for="LastName"><b>Last Name</b></label><br>
            <input type="text" id="Lastname" name="Lastname" placeholder="Lastname" required><br>

            <label for="Gender"><b>Gender</b></label><br>
            <select id="gender" name="gender">
              <?php 
                foreach($genders as $gender) { ?> 
                    <option value ="<?php echo $gender['id']; ?>"><?php echo $gender['Gender']; ?> </option>
                <?php } ?>
            </select><br>
           
            <label for="DOB"><b>Date Of Birth</b></label><br>
            <input type="text" id="dob" name="dob" placeholder="Date of Birth" required><br>

            <label for="Password"><b>Password</b></label><br>
            <input type="password" placeholder="Password" name="psw" required><br>

            <label for="Email"><b>Email Address</b></label><br>
            <input type="text" id="email" name="email" placeholder="Email" required><br>

            <label for="phone"><b>Phone Number</b></label><br>
            <input type="text" placeholder="Phone" name="phone" required><br>

            <label for="avatar" class="form-label">Upload Image(Optional)</label><br>
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar"><br><br>

            <input type="submit" value="Submit">
        
      </form>
    </div>
  </div>

<br><br><br><br>

<?php include 'includes/footer.php' ?>