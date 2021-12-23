<?php 
    
    $title = 'Home'; 
    require_once 'includes/sessions.php';
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
                     <hr>
                  </div>
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                           Welcome <?php echo $result['Role'];?> !
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
               </div>
            <?php include 'includes/footer-dashboard.php' ?>