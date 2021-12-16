<?php 
    use techticsja\Database\Connection;
    use techticsja\Data\UsersData;
    use techticsja\Data\GendersData;
    use techticsja\Data\RolesData;


    $title = 'View User'; 
    
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/UsersData.php';
    require_once 'v1/src/Data/GendersData.php';
    require_once 'v1/src/Data/RolesData.php';
/*     require_once 'includes/auth_check.php'; */

    $conn = new Connection;
    $userdata = new UsersData($conn);
    $gendersdata = new GendersData($conn);
    $genders = $gendersdata->getAllGenders();
    $rolesdata = new RolesData($conn);
    $roles = $rolesdata->getAllRoles();

    if(!isset($_GET['id'])){
      include 'includes/errormessage.php';

   }else{
      $id=$_GET['id'];
      $result = $userdata->getUserByID($id);
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>TechticsJa -<?php echo $title ?></title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->

      <link rel="apple-touch-icon" sizes="76x76" href="uploads/Favicon/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="180x180" href="uploads/Favicon/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="uploads/Favicon/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="96x96" href="uploads/Favicon/favicon-96x96.png">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css-dashboard/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="css-dashboard/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css-dashboard/responsive.css" />

      <!-- select bootstrap -->
      <link rel="stylesheet" href="css-dashboard/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css-dashboard/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css-dashboard/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
         img#cimg{
            height: 15vh;
            width: 15vh;
            object-fit: cover;
            border-radius: 100% 100%;
         }
      </style>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="uploads/techticsja.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" style="width: 74px; height:74px" src="<?php echo empty($result['Avatar_path'])? "uploads/blank.png":$result['Avatar_path'];?>"/></div>
                        <div class="user_info">
                           <h6><?php 
                                    echo $result['FirstName']." ".$result['LastName']?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Menu</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                     <a href="client-dashboard.php?id=<?php echo $result['id'] ?>"><i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a>
                     </li>
                     <li>
                        <a href="#project" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-layer-group"></i> <span>Project</span></a>
                        <ul class="collapse list-unstyled" id="project">
                        <li><a href="invoice.php?id=<?php echo $result['id'] ?>"> <span>> Add New</span></a></li>
                           <li><a href="payment_history.php?id=<?php echo $result['id'] ?>"> <span>> List</span></a></li>
                        </ul>
                     </li>  
                     <li><a href="project-dashboard.php?id=<?php echo $result['id'] ?>"><i class="fas fa-tasks white_color"></i> <span>Task</span></a></li>

                     <li><a href="report-dashboard.php?id=<?php echo $result['id'] ?>"><i class="far fa-list-alt"></i> <span>Report</span></a></li>
                     <li>
                        <a href="#payment" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-file-invoice-dollar"></i> <span>Payment</span></a>
                        <ul class="collapse list-unstyled" id="payment">
                           <li><a href="invoice.php?id=<?php echo $result['id'] ?>"> <span>> Invoice</span></a></li>
                           <li><a href="payment_history.php?id=<?php echo $result['id'] ?>"> <span>> History</span></a></li>
                        </ul>
                     </li>                       
                     <li>
                        <a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users"></i> <span>User</span></a>
                        <ul class="collapse list-unstyled" id="users">
                        <li><a href="new_user.php?id=<?php echo $result['id'] ?>"> <span>> Add New</span></a></li>
                           <li><a href="user_list.php?id=<?php echo $result['id'] ?>"> <span>> List</span></a></li>
                        </ul>
                     </li> 
 
                     <li><a href="settings.php?id=<?php echo $result['id'] ?>"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
           
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="#"><img class="img-responsive" src="uploads/techticsja.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fas fa-bell"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fas fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fas fa-envelope"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                       <a class="dropdown-toggle" data-bs-toggle="dropdown"><img class="img-responsive rounded-circle" style="width: 35px; height:35px" src="<?php echo empty($result['Avatar_path'])? "uploads/blank.png":$result['Avatar_path'];?>"/><span class="name_user"><?php echo $result['FirstName']." ".$result['LastName'];?></span></a>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="profile.php">My Profile</a>
                                          <a class="dropdown-item" href="settings.php">Settings</a>
                                          <a class="dropdown-item" href="help.php">Help</a>
                                          <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                       </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <br>
               <!-- end topbar -->
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
                                    <select id="Role" name="Role" >
                                    <?php 
                                       foreach($roles as $role) { ?> 
                                          <option value ="<?php echo $role['id']; ?>"><?php echo $role['Role']; ?> </option>
                                       <?php } ?>
                                    </select><br>

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

                                          <div class="form-group">
                                             <label for="" class="control-label">Avatar</label>
                                             <div class="custom-file">
                                                   <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
                                                </div>
                                          </div><br>
                                          <div class="form-group d-flex  align-items-center">
                                             <img src="<?php echo isset($avatar) ? 'assets/uploads/'.$avatar :'' ?>" alt="Avatar" id="cimg" class="img-fluid img-thumbnail ">
                                          </div><br>

                                          <div class="col-lg-12 text-right justify-content-center d-flex">
                                             <button class="btn btn-primary mx-3">Save</button>
                                             <button class="btn btn-secondary mx-3" type="button" onclick="location.href = 'index.php?page=user_list'">Cancel</button>
                                          </div>
                              </form>
                           </div>
                  </div><br><br><br><br>
                  <!-- footer -->
                  <div class="fixed-bottom container-sm;">
                     <div class="footer ">
                        <footer class="d-flex flex-wrap justify-content-between align-items-center">
                           <div class="col-md-5 d-flex align-items-center ">
                           <span style="margin-left: 70px; margin-right:20px">Copyright &copy; - <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                           <img src="uploads/techticsja.png" alt="techticsja" height="50px"; width="50px">
                           </a>TechticsJa <?php echo date('Y');?></span>
                           </div>
                           <ul class="nav col-md-6 list-unstyled d-flex align-items-center">
                           <li class="ms-3">Connect With Us - <a href="https://www.facebook.com/Techtics_ja-346086749335138/"><img src="uploads/social/facebook.png" alt="" width="45px"; height="45px" /></a></li>
                              <li class="ms-3"><a href="mailto:techtics.ja@gmail.com?"><img src="uploads/social/Gmail.png" alt="" width="45px"; height="45px" /></a></li>
                              <li class="ms-3"><a href="https://www.instagram.com/techticsja/"><img src="uploads/social/instagram.png" alt="" width="45px"; height="45px"/></a></li>
                              <li class="ms-3"><a href="https://wa.me/18763716518"><img src="uploads/social/whatsapp.png" alt="" width="45px"; height="45px"/></a></li>
                              <li class="ms-3"><a href="https://www.youtube.com/channel/UCK7feUh0MtVUs3gF6YYIB4Q"><img src="uploads/social/Youtube.png" alt="" width="45px"; height="45px"/></a></li>
                           </ul>
                        </footer>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php }?>
      <!-- jQuery -->
      <script src="https://kit.fontawesome.com/373c402c31.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- wow animation -->
      <script src="js-dashboard/animate.js"></script>

      <!-- nice scrollbar -->
      <script src="js-dashboard/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script>
         function displayImg(input,_this) {
            if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function (e) {
                     $('#cimg').attr('src', e.target.result);
               }

               reader.readAsDataURL(input.files[0]);
            }
         }
      </script>

      <script src="https://kit.fontawesome.com/373c402c31.js" crossorigin="anonymous"></script>
   </body>
</html>
