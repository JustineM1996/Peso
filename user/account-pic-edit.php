<?php include 'session.php';?>

<?php

include '../database/database.php';

$profile_error = array();

if (isset($_POST["profile"])) {

// for lagres files 
ini_set('upload_max_filesize', '3000M');
ini_set('post_max_size', '3000M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 600);

$fileName = $_FILES["image"]["name"]; 
$fileTmpLoc = $_FILES["image"]["tmp_name"];
$fileSize = (($_FILES["image"]["size"] < 2000000 )); 

    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[0];
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["image"]["tmp_name"])) {
        $profile_error['fileinfo'] = "Choose image file to upload.";
    }    

    else if ($width >= "1200" && $height >= "1200") {
        $profile_error['fileinfo'] = "Image dimension should be within 1200 X 1200";
    } else {

    if (count($profile_error) === 0) {

        if ($fileName == $fileName) {   

            if($fileSize) {
               $file = explode('.', $fileName);
               $end = end($file);
               $allowed_ext = array('jpeg', 'jpg', 'JPG', 'JPEG', 'png', 'PNG');

                if (in_array($end, $allowed_ext)) {
                    $code = rand(999999, 111111);
                    $image = '../images/'.$fileName.$code.".".$end;
                    
                    if(move_uploaded_file($fileTmpLoc, $image)) {
            
                        mysqli_query($con, "UPDATE account SET image = '$image' WHERE id = '$id_acc' ");

                        echo "<script>alert('Image uploaded successfully.')</script>";
                        echo "<script>window.location = '/peso/user/account-view.php?id=$id_acc'</script>";

                    } else {
                      $profile_error['fileName'] = "Problem in uploading image files";
                    }
                        
                } else {
                  $profile_error['fileTmpLoc'] = "Upload valid image. Only PNG and JPEG are allowed.";
                } 

            }  else {
               $profile_error['fileSize'] = "File must not exceed 2mb";
            }

       }  else {
       $profile_error['fileName'] = "Choose image file to upload.";
       }

    }

  }

}

?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  
  <!-- LINK -->
  <?php include 'link.php';?>

  <!-- TITLE -->
  <title> PESO - Profile update </title>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-../assets/icons@1.10.4/font/bootstrap-../assets/icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <style type="text/css">

  div.gallery{
        display: flex;
        width: 100%;
        height: 100%;
        background: none;
        border-radius: 10px;
    }

    div.gallery img{
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

</style>

<style type='text/css'>

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

include '../database/database.php';

date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d h:i:s A');

$query = mysqli_query($con,"SELECT * FROM account where id = '$id_acc' ");
while($row = mysqli_fetch_array($query)){

?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='account-view.php?id=<?php echo $row['id']?>' style="text-decoration: none; background: none ;" onclick='return cancel()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function cancel() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> PROFILE <p> | Update profile  </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->


<div class="container mt-3">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

        <div class="ps-md-0 mt-md-0 col-lg-12 mx-auto">
        <div class="row">

                <!-- FORM START -->
                <form action="" method="POST" enctype="multipart/form-data">

                          <input id="files" type="file" name="image" accept="image/*" value="<?php echo $row['image']; ?>" hidden>

                          <div style="text-align: center; align-items: center;">

                              <p class="btn btn-primary" style=" box-shadow: none; color: black; font-size: 11PX; background: none; pointer-events: none;"> JPEG or PNG only </p>
                              <a  id="profile" class="btn btn-success " style="color: white; font-size: 11px; background: #333; box-shadow: none"> SELECT FILE </a>

                              <div class="gallery ms-lg-10 ms-7">
                                
                                <?php 

                                     if ($profile_acc == '') {
                                        echo "<img class='w-50 border-radius-md shadow' id='previewHolder' src='../images/default-avatar.png' style='width: 50px; border-radius: 100%'>";
                                      } else {
                                        echo "<img class='w-50 border-radius-md shadow' id='previewHolder' src='$profile_acc' style='width: 50px; border-radius: 100%'>";
                                     }

                                ?>
                              </div>    

                              <?php if(count($profile_error) == 1) { ?>

                                  <span style="color: red; font-size: 12px; background: none;">
                                      <?php foreach ($profile_error as $showerror) { ?>
                                           <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                      <?php } ?>
                                  </span>

                              <?php } else if (count($profile_error) > 1) { ?>

                                  <span style="color: red; font-size: 12px; background: none;">
                                      <?php foreach ($profile_error as $showerror) { ?>
                                          <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                      <?php } ?>
                                  </span>

                              <?php } ?>

                          </div>

                          <div style="text-align: center; align-items: center;">
                          <button type="submit" name="profile" class="btn btn-success mt-4" style="color: white; font-size: 12px;"  disabled> Save </button>
                          </div>

                            <!-- SELECT FILE -->
                            <script type="text/javascript">
                                document.getElementById('profile').addEventListener('click', select_file);
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

<?php } ?>

</div>
</div>
</div>

</section>
<!-- END -->

<script language="javascript" type="text/javascript">
      //this code disables F5/Ctrl+F5/Ctrl+R and mouse in Chrome, Firefox and Explorer
      document.onkeydown = disableF5
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}
      function disableF5(e) { if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82 && e.ctrlKey)) e.preventDefault(); };
      $(document).on("keydown", disableF5);
</script>



</body>
</html>

