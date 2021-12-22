<?php 
    $title = 'New User'; 

    require_once 'includes/header-dashboard.php';
    require_once 'includes/auth_check.php';

      
?>
<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
   <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0"><?php echo $title ?></h1>
      </div>
      <hr><br><br>
      <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <div>
               <form method="post" action="success.php" enctype="multipart/form-data">
                     <br>
                     <label for="Role"><b>Role</b></label><br>
                     <select id="Role" name="Role" placeholder="Select Gender" >
                     <option placeholder="Select Role"><p >Select Role</p></option>
                     <?php 
                        foreach($roles as $role) { ?> 
                           <option placeholder="Select Role" value ="<?php echo $role['id']; ?>"><?php echo $role['Role']; ?> </option>
                        <?php } ?>
                     </select><br>

                     <label for="FirstName"><b>First Name</b></label><br>
                     <input type="text" id="FirstName" name="FirstName" placeholder="Firstname" required><br>
                     
                     <label for="LastName"><b>Last Name</b></label><br>
                     <input type="text" id="LastName" name="LastName" placeholder="Lastname" required><br>

                     <label for="Gender"><b>Gender</b></label><br>
                     <select id="Gender" name="Gender" placeholder="Select Gender">
                     <option placeholder="Select Gender"><p >Select Gender</p></option>
                     <?php 
                        foreach($genders as $gender) { ?> 
                           <option value ="<?php echo $gender['id']; ?>"><?php echo $gender['Gender']; ?> </option>
                        <?php } ?>
                     </select><br>
                  
                     <label for="DOB"><b>Date Of Birth</b></label><br>
                     <input type="date" id="dob" class="form-control" name="DOB" placeholder="Date of Birth" required><br>

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

                     <div class="form-group">
                        <label for="" class="control-label">Avatar</label>
                        <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
                           </div>
                     </div><br>
                     <div class="form-group d-flex  align-items-center">
                        <img src="<?php echo isset($avatar) ? 'uploads/UsersAvatar/'.$avatar :'' ?>" alt="Avatar" id="cimg" class="img-fluid img-thumbnail ">
                     </div><br>

                           <div class="col-lg-12 text-right justify-content-center d-flex">
                              <button class="btn btn-primary mx-3">Save</button>
                              <button class="btn btn-secondary mx-3" type="button" onclick="location.href = 'index.php?page=user_list'">Cancel</button>
                           </div>
               </form>
            </div>
   </div><br><br><br><br>

 <?php include 'includes/footer-dashboard.php' ?>