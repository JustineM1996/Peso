<?php include 'session.php';?>

<?php

include '../database/database.php';

$images_errors = array();

if(isset($_POST['submit'])) {

  // changing the upload limits
   ini_set('upload_max_filesize', '3000M');
   ini_set('post_max_size', '3000M');
   ini_set('max_input_time', 300);
   ini_set('max_execution_time', 600);

        $image_name = $_POST['image_name'];     
        $image_category = $_POST['image_category'];
        $image_status = $_POST['image_status'];
        $image_descriptions = $_POST['image_descriptions'];
        $date_ended = $_POST['date_ended'];        
        $posted_by = $_POST['posted_by'];

        $fileName = $_FILES["image"]["name"]; // The file name
        $fileTmpLoc = $_FILES["image"]["tmp_name"]; // File in the PHP tmp folder
        $fileSize = $_FILES["image"]["size"]; // File size in bytes


  if (count($images_errors) === 0) {

     if($fileName = $fileName){

        if($fileSize){
           $file = explode('.', $fileName);
           $end = end($file);
           $allowed_ext = array('jpeg', 'jpg', 'JPG', 'JPEG', 'mp4' , 'MP4');

            if (in_array($end, $allowed_ext)) {
                $code = rand(999999, 111111);
                $image = '../images/'.$image_name.$code.".".$end;

               if(move_uploaded_file($fileTmpLoc, $image)) {
    
                    mysqli_query($con, "INSERT INTO image (image, image_name, image_category, image_status, date_ended, posted_by, image_descriptions)
                                                    VALUES ('$image', '$image_name', '$image_category', '$image_status',  '$date_ended', '$posted_by', '$image_descriptions')");

                            $check_add = "SELECT * FROM image order by id desc ";
                            $view_id = mysqli_query($con, $check_add);

                            $fetch_data = mysqli_fetch_assoc($view_id);
                            $id = $fetch_data['id'];

                    echo "<script>alert('Successfull upload')</script>";
                    echo "<script>window.location = '/peso/admin/image-zoom.php?id=$id'</script>";
                }

            } else {
              $images_errors['fileTmpLoc'] = "Upload valid image. Only jpeg are allowed for company profile";
            }

        } else {
          $images_errors['fileSize'] = "Image size exceeds 2MB";
        }

    } else {
      $images_errors['fileName'] = "Upload image before save";
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
  <title> PESO - Add Announcemnet </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

  <style type="text/css">
    input.text{
      outline-color: none;
    }
  </style>

<style type="text/css">

.no-result {
  display:none;
}

body::-webkit-scrollbar
{
   width: 10px;
}

body::-webkit-scrollbar-thumb
{
   height: 80px;
   background: #333;
   border: 8px solid transparent;
   border-radius: 5PX;
}

body::-webkit-scrollbar-thumb:active
{
    background: #333;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 4px 10px;
  text-decoration: none;
  transition: background-color .3s;
}

.pagination a.active {
  background-color: #333;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

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
        border-radius: 10px;
        border: 1px solid gray;
    }

</style>

</head>

<body>

<!-- START -->
<section class="my-3 py-3">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-8 ms-lg-11">

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='announcement-edit.php' style="text-decoration: none; background: none ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function apply() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> ANNOUNCEMENT <p> | Add </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Information </h4>
        </div>

                          <!-- FORM START -->
                          <form  enctype="multipart/form-data" method="POST" > 

                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Jpg only. Image size up to 2mb </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                          <li class="nav-item">
                          <div class="form-label-group col-12 col-md-12 col-lg-12">

                              <!-- UPLOAD IMAGES -->
                              <a  id="Resume_button" class="btn btn-success " style="color: white; font-size: 12px; float: right; background: #333; box-shadow: none"> SELECT FILE </a>

                              <div class="gallery mt-3 ">
                                <img id="previewHolder">
                                <input type="file" name="image" id="files" accept="image/*" hidden>

                                    <?php if(count($images_errors) == 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($images_errors as $showerror) { ?>
                                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } else if (count($images_errors) > 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($images_errors as $showerror) { ?>
                                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } ?>   

                              </div>  
                              

                          </div>
                          </li>

                            <!-- SELECT FILE -->
                            <script type="text/javascript">

                                document.getElementById('Resume_button').addEventListener('click', select_file);
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

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative mt-4">
                          <label class="text-sm"> Title and Category </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-5 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Announcement *
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="image_name" placeholder="Enter announcemnet title" 
                                         class="form-control shadow-none" required>
                                </div>
                               </p>
                              </li>

                                <li class="nav-item ms-lg-1 col-lg-5 col-12 col-md-12">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Category *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="image_category" style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required> 
                                      <option style="color: black;" disabled selected hidden> Select </option> 

                                      <?php

                                      include '../database/database.php';

                                      $query = mysqli_query($con,"SELECT * FROM job_tips_category order by id desc");
                                      while($row = mysqli_fetch_array($query)){

                                      ?>

                                     <option style="color: black;" value="<?php echo $row['job_tips_category'];?>"required > <?php echo $row['job_tips_category']; ?> </option>


                                    <?php } ?>    

                                    </select>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <style type="text/css">
                               .scroll_A::-webkit-scrollbar
                            {
                               width: 10px;
                            }

                            .scroll_A::-webkit-scrollbar-thumb
                            {
                               height: 80px;
                               background: #333;
                               border: 8px solid transparent;
                               border-radius: 5PX;
                            }

                            .scroll_A::-webkit-scrollbar-thumb:active
                            {
                                background: #333;
                            }
                                  
                          </style>

                          <div class="nav-wrapper position-relative mt-4">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                               <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Description *
                                  <div class="form-label-group">
                                  <textarea name="image_descriptions" rows="15" cols="108" class="scroll_A form-control shadow-none" placeholder="Type description" required 
                                            style="color: black; font-size: 13PX;"></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-5 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Date Ended *
                                  <div class="form-label-group">                                
                                  <input type="date" name="date_ended" id="date_filter"  class="form-control shadow-none" 
                                         style="color: black; font-size: 13PX;" required>
                                         <span class="mt-2"  style="color: black; font-size: 13PX;"> Note : Today is not availabe for date ended </span>
                                  </div>
                                </p>
                              </li>  

                              <li class="nav-item ms-lg-1 col-lg-5 col-12 col-md-12">
                                <input type="text" style="color: black; font-size: 13PX;" name="posted_by" 
                                       value="<?php echo $F_acc ?> <?php echo $M_acc?> <?php echo $L_acc?>" 
                                       class="form-control shadow-none" readonly hidden>
                              </li>

                              <li class="nav-item ms-lg-1 col-lg-5 col-12 col-md-12">
                                <input type="text" style="color: black; font-size: 13PX;" name="image_status" 
                                       value="Active" 
                                       class="form-control shadow-none" readonly hidden>
                              </li>

                          </ul>
                          </div>

                          <!-- DATE FILTER -->
                          <script type="text/javascript">

                          // How do I restrict past dates in html5 input type Date // form datef
                          $(function(){
                              var dtToday = new Date();
                              var month = dtToday.getMonth() + 1;
                              var day = dtToday.getDate() + 1;
                              var year = dtToday.getFullYear();
                              if(month < 10)
                                  month = '0' + month.toString();
                              if(day < 10)
                                 day = '0' + day.toString();
                              var minDate= year + '-' + month + '-' + day;
                              $('#date_filter').attr('min', minDate);
                          });

                          </script>

                          <button type="submit" name="submit" class="btn btn-success mt-3" style="color: white; font-size: 12px;"> SAVE </button>
     
                  </form> 

                  </div>
                  </div>

          </div>
          </div>

</div>
</div>

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

