<?php 


    $title = 'Client Dashboard'; 

    require_once 'includes/header-dashboard.php';
    require_once 'includes/auth_check.php';

    if(!isset($_GET['id'])){
      include 'includes/errormessage.php';

   }else{
      $id=$_GET['id'];
      $result = $userdata->getUserID($id);
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
      <!-- pricing jf -->
      <script type="text/javascript" src="js-dashboard/pricingJquery.js"></script>
      <!-- custom js -->
      <script src="js-dashboard/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js-dashboard/semantic.min.js"></script>
      <script></script>
   </body>
</html>