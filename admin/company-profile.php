<?php include 'session.php';?>

<?php

include '../database/database.php';

$company_profile_error = array();

if (isset($_POST["add_company_profile"])) {

// for lagres files 
ini_set('upload_max_filesize', '3000M');
ini_set('post_max_size', '3000M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 600);

$id = $_POST['id'];

$fileName = $_FILES["images"]["name"]; 
$fileTmpLoc = $_FILES["images"]["tmp_name"];
$fileSize = (($_FILES["images"]["size"] )); 

    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["images"]["tmp_name"]);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["images"]["tmp_name"])) {
        $company_profile_error['fileinfo'] = "Choose image file to upload.";
    } else {

    if (count($company_profile_error) === 0) {

        if ($fileName == $fileName) {   

            if($fileSize) {
               $file = explode('.', $fileName);
               $end = end($file);
               $allowed_ext = array('jpeg', 'jpg', 'JPG', 'JPEG', 'png', 'PNG');

                if (in_array($end, $allowed_ext)) {
                    $code = rand(999999, 111111);
                    $images = '../images/'.$fileName.$code.".".$end;
                    
                    if(move_uploaded_file($fileTmpLoc, $images)) {
            
                        $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$id'");
                        while($row = mysqli_fetch_assoc($query)) {

                        $imagess = '../images/'.$row['images'];;

                        if (file_exists($imagess)) {
                            unlink($imagess);
                        }

                        }

                        mysqli_query($con, "UPDATE company SET id = '$id',
                                                               images = '$images' WHERE id = '$id' ");


                            echo "<script>alert('Image uploaded successfully.')</script>";
                            echo "<script>window.location = '/peso/admin/company-info.php?id=$id'</script>";

                    } else {
                      $company_profile_error['fileName'] = "Problem in uploading image files";
                    }
                        
                } else {
                  $company_profile_error['fileTmpLoc'] = "Upload valid image. Only PNG and JPEG are allowed.";
                } 

            } 

       }  else {
       $company_profile_error['fileName'] = "Choose image file to upload.";
       }

    }

  }

}

?>

<?php

include '../database/database.php';

$ceo_profile_error = array();

if (isset($_POST["add_ceo_profile"])) {

// for lagres files 
ini_set('upload_max_filesize', '3000M');
ini_set('post_max_size', '3000M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 600);

$id = $_POST['id'];

$fileName = $_FILES["images"]["name"]; 
$fileTmpLoc = $_FILES["images"]["tmp_name"];
$fileSize = (($_FILES["images"]["size"] )); 

    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["images"]["tmp_name"]);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["images"]["tmp_name"])) {
        $ceo_profile_error['fileinfo'] = "Choose image file to upload.";
    } else {

    if (count($ceo_profile_error) === 0) {

        if ($fileName == $fileName) {   

            if($fileSize) {
               $file = explode('.', $fileName);
               $end = end($file);
               $allowed_ext = array('jpeg', 'jpg', 'JPG', 'JPEG', 'png', 'PNG');

                if (in_array($end, $allowed_ext)) {
                    $code = rand(999999, 111111);
                    $images = '../images/'.$fileName.$code.".".$end;
                    
                    if(move_uploaded_file($fileTmpLoc, $images)) {
            
                        $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$id'");
                        while($row = mysqli_fetch_assoc($query)) {

                        $imagess = '../images/'.$row['ceo_profile'];;

                        if (file_exists($imagess)) {
                            unlink($imagess);
                        }

                        }            
                        
                        mysqli_query($con, "UPDATE company SET id = '$id',
                                                               ceo_profile = '$images' WHERE id = '$id' ");


                            echo "<script>alert('Image uploaded successfully.')</script>";
                            echo "<script>window.location = '/peso/admin/company-info.php?id=$id'</script>";

                    } else {
                      $ceo_profile_error['fileName'] = "Problem in uploading image files";
                    }
                        
                } else {
                  $ceo_profile_error['fileTmpLoc'] = "Upload valid image. Only PNG and JPEG are allowed.";
                } 

            } 

       }  else {
       $ceo_profile_error['fileName'] = "Choose image file to upload.";
       }

    }

  }

}

?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>



  <!-- TITLE -->
  <title> PESO - Profile | Update </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-../assets/icons@1.10.4/font/bootstrap-../assets/icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<!-- Core JQUERY Files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 <style type="text/css">

    div.gallery{
        display: flex;
        width: 100%;
        height: 100%;
        background: none;
    }

    div.gallery img{
        width: 100%;
        height: 100%;
    }

    div.gallery_ceo{
        display: flex;
        width: 100%;
        height: 100%;
        background: none;
        border-radius: 10px;  
    }

    div.gallery_ceo img{
        width: 100%;
        height: 100%;
    }

  a i {
    background: none;
    box-shadow: none;
    color: black;
  }     

  a i:hover {
    background-color: darkgray;
    box-shadow: none ;
    color: black;
  } 

  .card-profile {
    background: none;
    box-shadow: none;
    color: black;
    
  } 

  .card-profile:hover {
    background-color: whitesmoke;
    box-shadow: none;
    color: black;
    transition: 0.2s;
  }

</style>

</head>

<body>


<!-- START -->
<section class="my-3 py-7">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-8 ms-lg-11">


<?php

// COMPANY PROFILE
include '../database/database.php';

if(isset($_GET['company'])) {
  $company = $_GET['company'];

  $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$company'");
  while($row = mysqli_fetch_array($query)){

$Company_profile = $row['images'];
$ceo_profile = $row['ceo_profile'];
$ceo = $row['ceo'];
$company_size = $row['company_size'];
$email = $row['email'];
$contact_number = $row['contact_number'];
$link = $row['link'];

?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='company-info.php?id=<?php echo $row['id'];?>' style="text-decoration: none; background: none ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function apply() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> COMPANY <p> | Update company profile  </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->


<!-- START -->
<div class="container mt-3">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

        <div class="ps-md-0 mt-md-0 col-lg-12 mx-auto">
        <div class="row">

                    <!-- FORM START -->
                    <form action="" method="POST" enctype="multipart/form-data" class="mt-3">

                        <input id="files" type="file" name="images" accept="image/*" value="<?php echo $row['images']; ?>" hidden >
                        <input type="int" name="id" value="<?php echo $row['id']; ?>" hidden>

                        <div style="text-align: center; align-items: center;">

                              <p class="btn btn-primary" style=" box-shadow: none; color: black; font-size: 11PX; background: none; pointer-events: none;"> JPEG or PNG only </p>
                              <a  id="company_profile" class="btn btn-success " style="color: white; font-size: 11px; background: #333; box-shadow: none"> SELECT FILE </a>

                              <div class="gallery ms-lg-10 ms-7">
                                <?php
                                 $company_profile = $row['images'];

                                     if ($company_profile == '') {
                                        echo "<img class='w-50 border-radius-md shadow' id='previewHolder' src='../images/default-avatar.png'>";
                                      } else {
                                        echo "<img class='w-50 border-radius-md shadow' id='previewHolder' src='$company_profile'>";
                                     }

                                ?>
                              </div>                          

                              <?php if(count($company_profile_error) == 1) { ?>

                                  <span class="ms-lg-4" style="color: red; font-size: 12px; background: none;">
                                      <?php foreach ($company_profile_error as $showerror) { ?>
                                           <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                      <?php } ?>
                                  </span>

                              <?php } else if (count($company_profile_error) > 1) { ?>

                                  <span class="ms-lg-4" style="color: red; font-size: 12px; background: none;">
                                      <?php foreach ($company_profile_error as $showerror) { ?>
                                          <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                      <?php } ?>
                                  </span>

                              <?php } ?>

                        </div>

                          <div style="text-align: center; align-items: center;">
                          <button type="submit" name="add_company_profile" class="btn btn-success mt-4" style="color: white; font-size: 12px;"  disabled> Save </button>
                          </div>

                            <!-- SELECT FILE -->
                            <script type="text/javascript">

                                document.getElementById('company_profile').addEventListener('click', select_file);
                                  function select_file() {
                                    document.getElementById('files').click();
                                  }

                                function readURL(input) {

                                  if (input.files && input.files[0]) {
                                      var reader = new FileReader();
                                      reader.onload = function(e) {
                                        $('#previewHolder').attr('src', e.target.result);
                                      }
                                      reader.readAsDataURL(input.files[0]);
                                    } 
                                  }

                                  $("#files").change(function() {
                                    readURL(this);
                                  });

                            </script>

                            <!-- HIDE BUTTON -->
                            <script type="text/javascript">
                            $(document).ready(
                                function(){

                                    $('input:file').change(
                                        function(){

                                            if ($(this).val()) {
                                                $('button:submit').attr('disabled',false); 

                                            } 
                                         }

                                        );
                                });
                            </script>

                    </form>                   

            </div>
            </div>

      </div>
      </div>

</div>
</div>





























<?php } }

// COMPANY PROFILE
include '../database/database.php';

if(isset($_GET['ceo'])) {
  $ceo = $_GET['ceo'];

  $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$ceo'");
  while($row = mysqli_fetch_array($query)){

?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='company-info.php?id=<?php echo $row['id'];?>' style="text-decoration: none; background: none ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function apply() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> COMPANY <p> | Update ceo profile  </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->


<!-- START -->
<div class="container mt-3">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

        <div class="ps-md-0 mt-md-0 col-lg-12 mx-auto">
        <div class="row">

                    <!-- FORM START -->
                    <form action="" method="POST" enctype="multipart/form-data" class="mt-3">

                        <input id="files" type="file" name="images" accept="image/*" value="<?php echo $row['ceo_profile']; ?>" hidden >
                        <input type="int" name="id" value="<?php echo $row['id']; ?>" hidden>

                        <div style="text-align: center; align-items: center;">

                              <p class="btn btn-primary" style=" box-shadow: none; color: black; font-size: 11PX; background: none; pointer-events: none;"> JPEG or PNG only </p>
                              <a  id="company_profile" class="btn btn-success " style="color: white; font-size: 11px; background: #333; box-shadow: none"> SELECT FILE </a>

                              <div class="gallery_ceo ms-lg-10 ms-7">
                                <?php $ceo_profile = $row['ceo_profile'];

                                     if ($ceo_profile == '') {
                                        echo "<img class='w-50 border-radius-md shadow' id='previewHolder' src='../images/default-avatar.png'>";
                                      } else {
                                        echo "<img class='w-50 border-radius-md shadow' id='previewHolder' src='$ceo_profile'>";
                                     }

                                ?>

                              </div>                          

                              <?php if(count($ceo_profile_error) == 1) { ?>

                                  <span  style="color: red; font-size: 12px; background: none;">
                                      <?php foreach ($ceo_profile_error as $showerror) { ?>
                                           <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                      <?php } ?>
                                  </span>

                              <?php } else if (count($ceo_profile_error) > 1) { ?>

                                  <span  style="color: red; font-size: 12px; background: none;">
                                      <?php foreach ($ceo_profile_error as $showerror) { ?>
                                          <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                      <?php } ?>
                                  </span>

                              <?php } ?>

                        </div>

                          <div style="text-align: center; align-items: center;">
                          <button type="submit" name="add_ceo_profile" class="btn btn-success mt-4" style="color: white; font-size: 12px;"  disabled> Save </button>
                          </div>

                            <!-- SELECT FILE -->
                            <script type="text/javascript">

                                document.getElementById('company_profile').addEventListener('click', select_file);
                                  function select_file() {
                                    document.getElementById('files').click();
                                  }

                                function readURL(input) {

                                  if (input.files && input.files[0]) {
                                      var reader = new FileReader();
                                      reader.onload = function(e) {
                                        $('#previewHolder').attr('src', e.target.result);
                                      }
                                      reader.readAsDataURL(input.files[0]);
                                    } 
                                  }

                                  $("#files").change(function() {
                                    readURL(this);
                                  });

                            </script>

                            <!-- HIDE BUTTON -->
                            <script type="text/javascript">
                            $(document).ready(
                                function(){

                                    $('input:file').change(
                                        function(){

                                            if ($(this).val()) {
                                                $('button:submit').attr('disabled',false); 

                                            } 
                                         }

                                        );
                                });
                            </script>

                    </form>                   

            </div>
            </div>

      </div>
      </div>

</div>
</div>

<?php } } ?>











</div>
</div>
</div>

</section>
<!-- END -->




<!-- DISABLE KEY BUTTON FOR REFRESH -->
<script language="javascript" type="text/javascript">
      //this code disables F5/Ctrl+F5/Ctrl+R and mouse in Chrome, Firefox and Explorer
      document.onkeydown = disableF5
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}
      function disableF5(e) { if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82 && e.ctrlKey)) e.preventDefault(); };
      $(document).on("keydown", disableF5);
</script>



</body>
</html>

