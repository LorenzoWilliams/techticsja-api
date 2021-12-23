<?php 
    use techticsja\Database\Connection;
    use techticsja\Data\UsersData;
    use techticsja\Data\GendersData;
    use techticsja\Data\RolesData;

    require_once 'includes/sessions.php';
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/UsersData.php';
    require_once 'v1/src/Data/GendersData.php';
    require_once 'v1/src/Data/RolesData.php';
    require_once 'includes/auth_check.php';

    $conn = new Connection;
    $userdata = new UsersData($conn);
    $gendersdata = new GendersData($conn);
    $genders = $gendersdata->getAllGenders();
    $rolesdata = new RolesData($conn);
    $roles = $rolesdata->getAllRoles();
    if(!isset($_SESSION['id'])){
      include 'includes/errormessage.php';

   }else{
      $id=$_SESSION['id'];
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
      <!-- DataTables CSS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css-dashboard/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css-dashboard/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css-dashboard/custom.css" />
      <!-- jquery css -->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
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
                           <h6><?php echo $result['FirstName']." ".$result['LastName']?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Menu</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                     <a href="dashboard.php"><i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a>
                     </li>

                     <li>
                        <a href="#project" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-layer-group"></i> <span>Project</span></a>
                        <ul class="collapse list-unstyled" id="project">
                        <?php if($_SESSION['Role_id'] == 1): ?>
                        <li><a href="new_project.php"> <span>> Add New</span></a></li>
                        <?php endif; ?>
                        <li><a href="project_list.php"> <span>> List</span></a></li>
                        </ul>
                     </li>  

                     <li><a href="project-dashboard.php"><i class="fas fa-tasks white_color"></i> <span>Task</span></a></li>

                     <?php if($_SESSION['Role_id'] == 2): ?>    
                     <li><a href="report-dashboard.php"><i class="far fa-list-alt"></i> <span>Report</span></a></li>
                     <?php endif; ?>

                     <?php if($_SESSION['Role_id'] == 1): ?>    
                     <li><a href="price-dashboard.php"><i class="far fa-list-alt"></i> <span>Price Table</span></a></li>
                     <?php endif; ?>

                     <li><a href="#payment" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-file-invoice-dollar"></i> <span>Payment</span></a>
                        <ul class="collapse list-unstyled" id="payment">
                        <?php if($_SESSION['Role_id'] == 1): ?>
                           <li><a href="invoice.php"> <span>> Invoice</span></a></li>
                           <?php endif; ?>
                           <li><a href="payment_history.php"> <span>> History</span></a></li>
                        </ul>
                     </li>  
                     <?php if($_SESSION['Role_id'] == 2): ?>                     
                     <li><a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users"></i> <span>User</span></a>
                        <ul class="collapse list-unstyled" id="users">
                           <li><a href="new_user.php"> <span>> Add New</span></a></li>
                           <li><a href="user_list.php"> <span>> List</span></a></li>
                        </ul>
                     </li>
                     <?php endif; ?> 
 
                     <li><a href="settings.php"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
           
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
               <?php }?>
               <!-- end topbar -->