<?php include 'session.php';?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  
  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - Update Announcemnet Details </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

  <style type="text/css">
    input.text{
      outline-color: none;
    }
  </style>


<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="./assets/img/favicon.png">

<!-- CSS Files -->
<link href="./assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />

<!-- Core JQUERY Files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

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
 
<?php

include '../database/database.php';

    $query = "SELECT * FROM image WHERE id = '".$_REQUEST['id']."'";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {

?>

<!-- START -->
<section class="my-3 py-3">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-8 ms-lg-11">

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='image.php' style="text-decoration: none; background: ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function apply() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> ANNOUNCEMENT <p> | Edit </p></h4>
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
<form  enctype="multipart/form-data" method="POST" action="update/image_edit.php">    

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                          <li class="nav-item">
                          <div class="form-label-group col-12 col-md-12 col-lg-12">
                              <div class="gallery mt-3 ">
                                <img id="previewHolder" src="<?php echo $row['image']; ?>">
                              </div>  
                          </div>
                          </li>
                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative mt-3">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-5">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Announcement *
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="image_name" placeholder="Enter announcemnet title"
                                           value="<?php echo $row['image_name'];?>" class="form-control shadow-none" required>
                                </div>
                               </p>
                              </li>

                                <li class="nav-item ms-lg-1 ms-1 col-lg-5">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Category *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="text" name="image_category" style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"required> 
                                      <option style="color: black;" value="<?php echo $row['image_category'];?>" hidden> <?php echo $row['image_category'];?> </option> 
<?php } ?>
                                      <?php

                                      include '../database/database.php';

                                      $query = mysqli_query($con,"SELECT * FROM job_tips_category order by id desc ");
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

<?php

include '../database/database.php';

$query = "SELECT * FROM image WHERE id = '".$_REQUEST['id']."'";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {

?>

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

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Description
                                  <div class="form-label-group">
                                  <textarea name="image_descriptions"  rows="15" cols="108" class="scroll_A form-control shadow-none" placeholder="Type description" required
                                            style="color: black; font-size: 13PX;"><?php echo $row['image_descriptions'];?></textarea>
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
                                  <input type="date" name="date_ended" id="date_filter" value="<?php echo $row['date_ended'];?>" class="form-control shadow-none" required
                                         style="color: black; font-size: 13PX;">
                                         <span class="mt-2"  style="color: black; font-size: 13PX;"> Note : Today is not availabe for date ended </span>
                                  </div>
                                </p>
                              </li>  

                              <li class="nav-item ms-lg-1 ms-1 col-lg-5">
                                <input type="text" style="color: black; font-size: 13PX;" name="id" 
                                       value="<?php echo $row['id'];?>" 
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

                          <button type="submit" name="submit" class="btn btn-success mt-3" style="color: white; font-size: 12px;" disabled> UPDATE </button>

                            <script type="text/javascript">
                            $(document).ready(
                                function(){

                                    $('input:text').change(
                                        function(){

                                            if ($(this).val()) {
                                                $('button:submit').attr('disabled',false); 

                                            } 
                                         }

                                        );

                                     $('textarea').change(
                                        function(){
                                            if ($(this).val()) {
                                                $('button:submit').attr('disabled',false); 
                                            } 
                                        }
                                        );


                                    $('select').change(
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

<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="./assets/js/plugins/countup.min.js"></script>
<script src="./assets/js/plugins/choices.min.js"></script>
<script src="./assets/js/plugins/prism.min.js"></script>
<script src="./assets/js/plugins/highlight.min.js"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="./assets/js/plugins/rellax.min.js"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="./assets/js/plugins/tilt.min.js"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="./assets/js/plugins/choices.min.js"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="./assets/js/plugins/parallax.min.js"></script>

</body>
</html>

