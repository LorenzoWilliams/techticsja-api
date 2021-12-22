<?php 
    use techticsja\Database\Connection;
    use techticsja\Data\UsersData;

    $title = 'Client Dashboard'; 
    
    require_once 'v1/src/Database/Connection.php';
    require_once 'v1/src/Data/UsersData.php';
    require_once 'includes/sessions.php';
    require_once 'includes/auth_check.php'; 

    $conn = new Connection;
    $userdata = new UsersData($conn);

    if(!isset($_GET['id'])){
      include 'includes/errormessage.php';

   }else{
      $id=$_GET['id'];
      $result = $userdata->getUserID($id);
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
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Invoice <small>( user invoice design )</small></h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- invoice section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><i class="fa fa-file-text-o"></i> Invoice</h2>
                                 </div>
                              </div>
                              <div class="full">
                                 <div class="invoice_inner">
                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                             <h4>From</h4>
                                             <p><strong>TechticsJa</strong><br>  
                                                427 Schoen Circles Suite 124<br> 
                                                Melbourne Australia<br>    
                                                <strong>Phone : </strong><a href="tel:18763716518">1(876)371-6518</a><br>  
                                                <strong>Email : </strong><a href="mailto:yourmail@gmail.com">techtics.ja@gmail.com</a>
                                             </p>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                             <h4>To</h4>
                                             <p><strong><?php echo $result['FirstName']." ".$result['LastName']?>
                                                </strong><br>  
                                                <?php echo $result['Address']?><br> 
                                                <strong>Phone : </strong><a href="#"><?php echo $result['Phone']?></a><br>  
                                                <strong>Email : </strong><a href="mailto:yourmail@gmail.com"><?php echo $result['Email']?></a>
                                             </p>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                             <h4>Invoice No - #111457 </h4>
                                             <p><strong>Order ID : </strong>5b6R9C<br> 
                                                <strong>Payment Due : </strong>July/18/2018<br> 
                                                <strong>Account : </strong>254-55847
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="full padding_infor_info">
                                 <div class="table_row">
                                    <div class="table-responsive">
                                       <table class="table table-striped">
                                          <thead>
                                             <tr>
                                                <th>Qty</th>
                                                <th>Product</th>
                                                <th>Serial #</th>
                                                <th>Description</th>
                                                <th>Subtotal</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>1</td>
                                                <td>Product One</td>
                                                <td>005-475-321</td>
                                                <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                                <td>$20.00</td>
                                             </tr>
                                             <tr>
                                                <td>2</td>
                                                <td>Product Two</td>
                                                <td>015-475-321</td>
                                                <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                                <td>$25.00</td>
                                             </tr>
                                             <tr>
                                                <td>3</td>
                                                <td>Product Three</td>
                                                <td>025-475-321</td>
                                                <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                                <td>$20.00</td>
                                             </tr>
                                             <tr>
                                                <td>4</td>
                                                <td>Product Four</td>
                                                <td>035-475-321</td>
                                                <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                                <td>$15.00</td>
                                             </tr>
                                             <tr>
                                                <td>5</td>
                                                <td>Product Five</td>
                                                <td>045-475-321</td>
                                                <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                                <td>$25.00</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <div class="col-md-6">
                           <div class="full white_shd">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Payment Methods</h2>
                                 </div>
                              </div>
                              <div class="full padding_infor_info">
                                 <ul class="payment_option">
                                    <li><img src="uploads/icons/visa.png" alt="#" /></li>
                                    <li><img src="uploads/icons/mastercard.png" alt="#" /></li>
                                    <li><img src="uploads/icons/paypal.png" alt="#" /></li>
                                 </ul>
                                 <p class="note_cont">If you use this site regularly and would like to help keep the site on the Internet.</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="full white_shd">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Total Amount</h2>
                                 </div>
                              </div>
                              <div class="full padding_infor_info">
                                 <div class="price_table">
                                    <div class="table-responsive">
                                       <table class="table">
                                          <tbody>
                                             <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>$250.30</td>
                                             </tr>
                                             <tr>
                                                <th>Tax (9.3%)</th>
                                                <td>$10.34</td>
                                             </tr>
                                             <tr>
                                                <th>Shipping:</th>
                                                <td>$5.80</td>
                                             </tr>
                                             <tr>
                                                <th>Total:</th>
                                                <td>$265.24</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <footer class="d-flex flex-wrap justify-content-between align-items-center ">
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
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
         <!-- The Modal -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Modal Heading</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     Modal body..
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end model popup -->
      </div>
      <?php }?>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>