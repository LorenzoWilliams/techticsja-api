<?php 
    $title = 'User List'; 
    
    require_once 'includes/header-dashboard.php';
    require_once 'includes/auth_check.php';
    

      $results = $userdata->getUsers();

?>
<style>
select {
    width: 30%;  /* Full width */
  }
</style>

   <!-- dashboard inner -->
   <div class="midde_cont">
      <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title ?></h1>
         </div>
         <hr><br><br>
         <div class="col-lg-12">
               <div class="card card-outline card-success">
                  <div class="card-header">
                     <div class="card-tools" style="float: right;">
                        <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="new_user.php"><i class="fa fa-plus"></i> Add New User</a>
                     </div>
                  </div>
                  <div class="card-body">
                     <table class="table tabe-hover table-bordered" id="list" style="border: 1px solid #ddd;">
                        <thead>
                           <tr >
                              <th class="text-center">#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                           <tr>
                              <td><?php echo $r['id']?></td>
                              <td><?php echo $r['FirstName'].' ' .$r['LastName']?></td>
                              <td><?php echo $r['Email'] ?></td>
                              <td><?php echo $r['Role'] ?></td>
                              <td class="text-center">
                              <div class="dropdown">
                                 <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" >
                                       Action
                                    </button>
                                    <ul class="dropdown-menu">
                                       <li><a class="dropdown-item view_user" href="view-user.php?id=<?php echo $r['id'] ?>">View</a></li>
                                       <li><a href="edit-user.php?id=<?php echo $r['id'] ?>" class="dropdown-item edit_user">Edit</a></li>
                                       <li><a onclick="return confirm ('Are you sure you want to delete this record?');" href="delete_user.php?id=<?php echo $r['id'] ?>" class="dropdown-item delete_user">Delete</a></li>
                                    </ul>
                                    </div>
                                 </td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            
<?php include 'includes/footer-dashboard.php' ?>