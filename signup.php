<?php 

    use techticsja\Database\Connection;
    use techticsja\Data\GendersData;
    use techticsja\Data\RolesData;


    $title = "Signup"; 
    require_once 'includes/header.php';
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/GendersData.php';
    require_once 'v1/src/Data/RolesData.php';
    require_once 'v1/src/Data/UsersData.php';

    $conn = new Connection;
    $gendersdata = new GendersData($conn);
    $genders = $gendersdata->getAllGenders();
    $rolesdata = new RolesData($conn);
    $roles = $rolesdata->getAllRoles();


/*     $results = $crud->getSpecialties(); */
?>

<div class="container-md" > 
  <br>
      <h5 style="text-align: center;"><?php echo $title ?></h5>
      <div>
      <form method="post" action="success.php" enctype="multipart/form-data">
            <br>
            <label for="Role" hidden><b>Role</b></label>
            <select id="Role" name="Role" hidden>
              <?php 
                foreach($roles as $role) { ?> 
                    <option value ="<?php echo $role['id']; ?>"><?php echo $role['Role']; ?> </option>
                <?php } ?>
            </select>

            <label for="FirstName"><b>First Name</b></label><br>
            <input type="text" id="FirstName" name="FirstName" placeholder="Firstname" required><br>
            
            <label for="LastName"><b>Last Name</b></label><br>
            <input type="text" id="LastName" name="LastName" placeholder="Lastname" required><br>

            <label for="Gender"><b>Gender</b></label><br>
            <select id="Gender" name="Gender">
              <?php 
                foreach($genders as $gender) { ?> 
                    <option value ="<?php echo $gender['id']; ?>"><?php echo $gender['Gender']; ?> </option>
                <?php } ?>
            </select><br>
           
            <label for="DOB"><b>Date Of Birth</b></label><br>
            <input type="text" id="dob" name="DOB" placeholder="Date of Birth" required><br>

            <label for="AddressLine1"><b>Address Line1</b></label><br>
            <input type="text" id="AddressLine1" name="AddressLine1" placeholder="Address Line1" required><br>

            <label for="AddressLine2"><b>Address Line2 (optional)</b></label><br>
            <input type="text" id="AddressLine2" name="AddressLine2" placeholder="Address Line2"><br>

            <label for="State"><b>State/Parish</b></label><br>
            <input type="text" id="State" name="State" placeholder="State/Parish" required><br>

            <label for="Country"><b>Country</b></label><br>
            <select id="Country" name="Country"placeholder="Select Country">
              <option placeholder="Select Country"><p >Select Country</p></option>
              <option value="canada">Canada</option>
              <option value="Jamaica">Jamaica</option>
              <option value="usa">USA</option>
              <option value="UK">UK</option>
            </select><br>

            <label for="Password"><b>Password</b></label><br>
            <input type="Password" placeholder="Password" name="Password" required><br>

            <label for="Email"><b>Email Address</b></label><br>
            <input type="text" id="Email" name="Email" placeholder="Email" required><br>

            <label for="Phone"><b>Phone Number</b></label><br>
            <input type="text" placeholder="Phone" name="Phone" required><br>

            <div class="custom-file">
              <label for="avatar"><b>Upload Image</b>(Optional)</label><br>
              <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" ><br>
            </div>
            
            <input type="submit" name="submit" value="Submit">
        
      </form>
    </div>
  </div>

<br><br><br><br>

<?php include 'includes/footer.php' ?>