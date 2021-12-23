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


      <!-- jQuery -->
      <script src="https://kit.fontawesome.com/373c402c31.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- wow animation -->
      <script src="js-dashboard/animate.js"></script>
      <!-- pricing jf -->
      <script type="text/javascript" src="js-dashboard/pricingJquery.js"></script>
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
             <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
      <!-- DataTables JS -->
      <script src=
      "https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
      </script>
      <script>
      $( function() {
         $( "#dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange:"-100:+0",
            dateFormat: "yy-mm-dd"
         });
      } );
      </script>
      <script>
      // Initialize the DataTable
      $(document).ready(function () {
         $('#list').DataTable({

            // Set the pagination length menu
            // to the given allowed sizes
            lengthMenu: [ 5, 10, 15 ]
         });
      }); 
      </script>
      <script>          
      $(document).ready(function () {

      $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
      });

      });
      </script>
      
   </body>
</html>
