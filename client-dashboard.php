<?php 
    use techticsja\Database\Connection;
    use techticsja\Data\UsersData;


    $title = 'Home'; 
    
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/UsersData.php';
    require_once 'v1/src/Data/RolesData.php'; 
    require_once 'includes/sessions.php';
    require_once 'includes/auth_check.php';

    $conn = new Connection;
    $userdata = new UsersData($conn);

    if(!isset($_GET['id'])){
      include 'includes/errormessage.php';

   }else{
      $id=$_GET['id'];
      $result = $userdata->getUserID($id);
      $result2 = $userdata->getUserByID($id);
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
                     <a href="client-dashboard.php?id=<?php echo $result['id'] ?>"><i class="fa fa-clock"></i> <span>Dashboard</span></a>
                     </li>
                     <li>
                        <a href="#project" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-layer-group"></i> <span>Project</span></a>
                        <ul class="collapse list-unstyled" id="project">
                        <li><a href="invoice.php?id=<?php echo $result['id'] ?>"> <span>> Add New</span></a></li>
                           <li><a href="payment_history.php?id=<?php echo $result['id'] ?>"> <span>> List</span></a></li>
                        </ul>
                     </li>  
                     <li><a href="project-dashboard.php?id=<?php echo $result['id'] ?>"><i class="fas fa-tasks white_color"></i> <span>Task</span></a></li>

                     <li><a href="price-dashboard.php?id=<?php echo $result['id'] ?>"><i class="fas fa-table"></i> <span>Price Table</span></a></li>
                     <li>
                        <a href="#payment" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-file-invoice-dollar"></i> <span>Payment</span></a>
                        <ul class="collapse list-unstyled" id="payment">
                           <li><a href="invoice.php?id=<?php echo $result['id'] ?>"> <span>> Invoice</span></a></li>
                           <li><a href="payment_history.php?id=<?php echo $result['id'] ?>"> <span>> History</span></a></li>
                        </ul>
                     </li>             
                     <li>
                        <a href="contact.php?id=<?php echo $result['id'] ?>">
                        <i class="fas fa-file-signature"></i> <span>Contact</span></a>
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
                           <a href="index.html"><img class="img-responsive" src="uploads/techticsja.png" alt="#" /></a>
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
                     <hr>
                  </div>
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                           Welcome <?php echo $result2['Role'] ?> !
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-md-8">
                           <div class="card card-outline card-success">
                              <div class="card-header">
                                 <b>Project Progress</b>
                              </div>
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table m-0 table-hover">
                                       <colgroup>
                                          <col width="5%">
                                          <col width="30%">
                                          <col width="35%">
                                          <col width="15%">
                                          <col width="15%">
                                       </colgroup>
                                       <thead>
                                          <th>#</th>
                                          <th>Project</th>
                                          <th>Progress</th>
                                          <th>Status</th>
                                          <th></th>
                                       </thead>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>  
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
      <script src="js-dashboard/jquery.min.js"></script>
      <script src="js-dashboard/popper.min.js"></script>
      <script src="js-dashboard/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js-dashboard/animate.js"></script>
      <!-- select country -->
      <script src="js-dashboard/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js-dashboard/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js-dashboard/Chart.min.js"></script>
      <script src="js-dashboard/Chart.bundle.min.js"></script>
      <script src="js-dashboard/utils.js"></script>
      <script src="js-dashboard/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js-dashboard/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js-dashboard/chart_custom_style1.js"></script>
      <script src="js-dashboard/custom.js"></script>
      <script src="https://kit.fontawesome.com/373c402c31.js" crossorigin="anonymous"></script>
   </body>
</html>
