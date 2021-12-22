<?php 


    $title = 'Price Dashboard'; 


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
                    <br><h5 style="text-align: center;">PRICING GUIDE</h5><br><br>
                      <div class="priceSubtitle" style="text-align: center;">
                          <span class="change" style="text-align: center;">Check pricing for </span>
                          <!--<span id="category_title">Logo Design</span> -->
                          <select class="form_change" >
                            <option value="Select">Select</option>
                            <optgroup label="Graphics &amp; Design">
                                    <option value="1">Brochures</option>
                                    <option value="2">Business Cards</option>
                                    <option value="3">Flyers</option>
                                    <option value="4">Logo Design</option>
                                    <option value="5">Posters</option>
                                </optgroup>
                            <optgroup label="Website &amp; Hosting">
                                    <option value="6">Website Design</option>
                                    <option value="7">Hosting</option>
                                    </optgroup>
                            <optgroup label="Building Design">
                                    <option value="8">New Building</option>
                                    <option value="9">Existing Building</option>
                            </optgroup>
                        </select>
                      </div>
                    </div>
                  <h6 style="text-align: center;">Pricing table </h6> 
                    <div class="hover-table-layout"></div>


   <?php }?>
            
<?php include 'includes/footer-dashboard.php' ?>