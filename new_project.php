<?php 


    $title = 'New Project'; 
    

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
            <form method="post" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6">
                  <label for="Name"><b>Name</b></label><br>
                  <input type="text" id="Name" name="Name" placeholder="name" required><br>
                  </div>
                  <div class="col-md-6">
                  <label for="Status"><b>Status</b></label><br>
                  <select id="Status" name="Status">
                  <?php 
                     foreach($status as $status) { ?> 
                        <option value ="<?php echo $status['id']; ?>"><?php echo $status['Status']; ?> </option>
                     <?php } ?>
                  </select><br>
                  </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label for="Start_date" class="control-label">Start Date</label>
                        <input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" >
                        </div>
                     <div class="col-md-6">
                        <label for="" class="control-label">End Date</label>
                        <input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="<?php echo isset($end_date) ? date("Y-m-d",strtotime($end_date)) : '' ?>">
                        </div>
                     </div>
                  </div>

                  </form>
               </div>
                  </div><br><br><br><br>
                  <?php }?>
                  
<?php include 'includes/footer-dashboard.php' ?>