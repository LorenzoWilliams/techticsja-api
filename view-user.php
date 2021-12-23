<?php 
    $title = 'View User'; 

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
                     <div class="col-lg-10">
                     <div class="card">
                     <div class="card-body">
                        <div class="card card-widget widget-user shadow">
                           <div class="widget-user-header bg-dark">
                              <div class="card-body center mx-1">
                              <div class="widget-user-image mx-2">
                                 <img src="<?php echo empty($result['Avatar_path'])? "uploads/blank.png":$result['Avatar_path'];?>" style="width: 300px;height:300px"/>
                                 </div>
                                 <div class="card mx-2" style="width: 35rem;">
                                    <div class="card-body">
                                          <h4 class="card-title">
                                             <?php echo $result['FirstName'].' '. $result['LastName'];?>
                                          </h4>
                                          <p class="card-text">
                                             Role: <b><?php echo $result['Role'];?></b>
                                          </p>
                                          <p class="card-text">
                                             Date Of Birth: <?php echo $result['DOB'];?>
                                          </p>
                                          <p class="card-text">
                                             Gender: <?php echo $result['Gender'];?>
                                          </p>
                                          <p class="card-text">
                                             Email Address: <?php echo $result['Email'];?>
                                          </p>
                                          <p class="card-text">
                                             Phone Number: <?php echo $result['Phone'];?>
                                          </p>
                                          <p class="card-text">
                                             Address: <?php echo $result['AddressLine1'].', '.$result['AddressLine2'].', '.$result['State'].', '.$result['Country'];?>
                                          </p>
                                          <p class="card-text">
                                             Member Since: <?php echo $result['Member_since'];?>
                                          </p>
                                       </div>
                                    </div>
                              </div>
                           </div> 
                     </div> 
                  </div>
                  </div>
                  </div>
                  <div>
                     <a href="user_list.php" class="btn btn-info">Back to List</a>
                     <a href="edit-user.php?id=<?php echo $r['id'] ?>" class="btn btn-warning">Edit</a>
                     <a onclick="return confirm ('Are you sure you want to delete this record?');" href="delete_user.php?id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>  
                  </div>
                  <br><br>
                  <?php } ?>
 <?php include 'includes/footer-dashboard.php' ?>