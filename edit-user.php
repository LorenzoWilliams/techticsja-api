<?php 
    $title = 'Edit User'; 

    require_once 'includes/header-dashboard.php';
    require_once 'includes/auth_check.php';



    if(!isset($_GET['id'])){
      include 'includes/errormessage.php';

   }else{
      $id=$_GET['id'];
      $result = $userdata->getUserByID($id);
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
                              <form method="post" action="editpost.php" enctype="multipart/form-data">
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
                                 <input type="text" id="FirstName" name="FirstName" placeholder="Firstname"  value="<?php echo $result ['FirstName'] ?>" required><br>
                                 
                                 <label for="LastName"><b>Last Name</b></label><br>
                                 <input type="text" id="LastName" name="LastName" placeholder="Lastname" value="<?php echo $result ['LastName'] ?>" required><br>


                                 <label for="Gender"><b>Gender</b></label><br>
                                 <select id="Gender" name="Gender" placeholder="Select Gender">
                                 <option placeholder="Select Gender"><?php echo  $result ['Gender'] ?></option>
                                 <?php 
                                    foreach($genders as $gender) { ?> 
                                       <option value ="<?php echo $gender['id']; ?>"><?php echo $gender['Gender']; ?> </option>
                                    <?php } ?>
                                 </select><br>
                              
                                 <label for="dob" >Date of Birth</label>
                                 <input type="date" class="form-control" id="dob" name="DOB" value="<?php echo  $result ['DOB'] ?>"><br>


                                 <label for="AddressLine1"><b>Address Line1</b></label><br>
                                 <input type="text" id="AddressLine1" name="AddressLine1" placeholder="Address Line1" value="<?php echo  $result ['AddressLine1'] ?>" required><br>

                                 <label for="AddressLine2"><b>Address Line2 (optional)</b></label><br>
                                 <input type="text" id="AddressLine2" name="AddressLine2" placeholder="Address Line2" value="<?php echo $result ['AddressLine2'] ?>"><br>

                                 <label for="State"><b>State/Parish</b></label><br>
                                 <input type="text" id="State" name="State" placeholder="State/Parish" value="<?php echo  $result ['State'] ?>" required><br>

                                 <label for="Country"><b>Country</b></label><br>
                                 <select id="Country" name="Country" placeholder="Select Country" >
                                 <option  placeholder="Select Country"><?php echo  $result ['Country'] ?></option>
                                 <option value="canada">Canada</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="usa">USA</option>
                                 <option value="UK">UK</option>
                                 </select><br>

                                 <label for="Password"><b>Password</b></label><br>
                                 <input type="Password" placeholder="Password" name="Password" value="<?php echo $result ['Phone'] ?>" readonly><br>

                                 <label for="Email"><b>Email Address</b></label><br>
                                 <input type="text" id="Email" name="Email" placeholder="Email" value="<?php echo $result ['Email'] ?>" readonly><br>

                                 <label for="Phone"><b>Phone Number</b></label><br>
                                 <input type="text" placeholder="Phone" name="Phone" value="<?php echo $result ['Phone'] ?>" required><br>

                                 <label for="Member_since"><b>Member Since</b></label><br>
                                    <input type="text" placeholder="Member_since" name="Member_since" value="<?php echo $result ['Member_since'] ?>" readonly><br>

                                 <label for="avatar" class="form-label" hidden>Avatar (Optional)</label><br>
                                 <input type="text" placeholder="Avatar" name="Avatar_path" value="<?php echo $result ['Avatar_path'] ?>" hidden readonly><br><br><br>

                                 <div class="form-group d-flex  align-items-center">
                                    <img src="<?php echo $result ['Avatar_path'] ?>" alt="Avatar" id="cimg" class="img-fluid img-thumbnail ">
                                 </div><br>><br>



                                 <div class="col-lg-12 text-right justify-content-center d-flex">
                                    <a href="viewrecords.php" class="btn btn-info">Back To List</a>
                                    <button type="submit" class="btn btn-success btn" name="submit">Save Changes</button>
                                 </div>
                                         
                              </form>
                           </div>
                  </div><br><br><br><br>
                  <?php }?>
<?php include 'includes/footer-dashboard.php' ?>