<?php $title = "Contact us"; include 'includes/header.php'?>

<div class="container-md" > 
  <br>
      <h5 style="text-align: center;">CONTACT US</h5>
      <div>
      <form action="index.php" enctype="multipart/form-data">

            <label for="fname">First Name</label><br>
            <input type="text" id="fname" name="firstname" placeholder="Your name.." ><br>
        
            <label for="lname">Last Name</label><br>
            <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>

            <label for="email">Email Address</label><br>
            <input type="text" id="email" name="email" placeholder="techtics.ja@gmail.com"><br>

            <label for="phone_number">Telephone Number</label><br>
            <input type="text" id="Telephone" name="phone_number"  placeholder="(876)371-6518"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required><br>
        
            <label for="country">Country</label><br>
            <select id="country" name="country"placeholder="Select Country">
              <option placeholder="Select Country"><p >Select Country</p></option>
              <option value="canada">Canada</option>
              <option value="Jamaica">Jamaica</option>
              <option value="usa">USA</option>
              <option value="UK">UK</option>
            </select><br><br><br>

            <label for="Services">Services you’re interested in:</label><br><br>

            <input type="checkbox" name="Services" value="brochure" /> Brochure<br />
            <input type="checkbox" name="Services" value="business-card" /> Business Card Design<br />
            <input type="checkbox" name="Services" value="Logo" /> Logo Design<br />
            <input type="checkbox" name="Services" value="poster" /> Poster<br />
            <input type="checkbox" name="Services" value="flyers" /> Flyer<br />
            <input type="checkbox" name="Services" value="web" /> Website Design<br />
            <input type="checkbox" name="Services" value="web" /> Website Hosting<br />
            <input type="checkbox" name="Services" value="drafting" /> Building Design<br />
            <input type="checkbox" name="Services" value="drafting" /> Application Development<br />
            <br>
        
            <label for="subject">Subject</label><br>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea><br><br>

        
            Select a file to upload: <input type="file" name="selectedfile" /><br><br>
            
        
            <input type="submit" value="Submit">
        
      </form>
    </div>
  </div>

<br><br><br><br>

<?php include 'includes/footer.php' ?>