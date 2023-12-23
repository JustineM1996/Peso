<?php include 'session.php';?>

<?php

include '../database/database.php';

$add_resume_error = array();

if(isset($_POST['add_peso'])) {

// for lagres files 
ini_set('upload_max_filesize', '3000M');
ini_set('post_max_size', '3000M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 600);

$peso_resume_id = $_POST['peso_resume_id'];    
$fileName = $_FILES["Peso_Resume"]["name"]; // The file name
$fileTmpLoc = $_FILES["Peso_Resume"]["tmp_name"]; // File in the PHP tmp folder
$fileSize = $_FILES["Peso_Resume"]["size"]; // File size in bytes

if($fileName !== '') {

    if($fileSize) {

       $file = explode('.', $fileName);
       $end = end($file);
       $allowed_ext = array('PDF', 'pdf');

        if (in_array($end, $allowed_ext)) {
            $code = rand(999, 111);
            $db_filename_peso_resume = $F_acc."_".$M_acc."_".$L_acc."_".'peso_form'."_".$code.".".$end;
            $filename_peso_resume = '../files/'.$F_acc."_".$M_acc."_".$L_acc."_".'peso_form'."_".$code.".".$end;
            
            if(move_uploaded_file($fileTmpLoc, $filename_peso_resume)) {
    
                mysqli_query($con, "INSERT INTO peso_resume (Peso_Resume, peso_resume_id) 
                                                VALUES ('$db_filename_peso_resume', '$peso_resume_id')");

                    echo "<script>alert('Successfull upload peso resume')</script>";
                    echo "<script>window.location = '/peso/user/personal-resume-view.php'</script>"; 
                }
                
        } else {
          $add_resume_error['fileSize'] = "Upload valid file. Only docx are allowed";
        }

    } else {
      $add_resume_error['fileSize'] = "Image size exceeds 2MB";
    }

} else {
  $add_resume_error['fileName'] = "Please fill before upload";
}

}



$edit_resume_error = array();

if(isset($_POST['edit_peso'])) {

// for lagres files 
ini_set('upload_max_filesize', '3000M');
ini_set('post_max_size', '3000M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 600);

$peso_id = $_POST['peso_id'];         
$fileName = $_FILES["Peso_Resume"]["name"]; // The file name
$fileTmpLoc = $_FILES["Peso_Resume"]["tmp_name"]; // File in the PHP tmp folder
$fileSize = $_FILES["Peso_Resume"]["size"]; // File size in bytes


if($fileName !== '') {

    if($fileSize) {

       $file = explode('.', $fileName);
       $end = end($file);
       $allowed_ext = array('PDF', 'pdf');

        if (in_array($end, $allowed_ext)) {
            $code = rand(999, 111);
            $db_filename_peso_resume = $F_acc."_".$M_acc."_".$L_acc."_".'peso_form'."_".$code.".".$end;
            $filename_peso_resume = '../files/'.$F_acc."_".$M_acc."_".$L_acc."_".'peso_form'."_".$code.".".$end;
            
            if(move_uploaded_file($fileTmpLoc, $filename_peso_resume)) {
    
                $query = mysqli_query($con,"SELECT * FROM peso_resume WHERE peso_id = '$peso_id'");
                while($row = mysqli_fetch_assoc($query)) {

                $file = '../files/'.$row['Peso_Resume'];;

                if (file_exists($file)) {
                    unlink($file);
                }

                }

                mysqli_query($con, "UPDATE peso_resume SET peso_id = '$peso_id',
                                                           Peso_Resume = '$db_filename_peso_resume'
                                                     WHERE peso_id = '$peso_id' ");

                    echo "<script>alert('Successfull update peso resume')</script>";
                    echo "<script>window.location = '/peso/user/personal-resume-view.php'</script>"; 
                }
                
        } else {
          $edit_resume_error['fileSize'] = "Upload valid file. Only docx are allowed";
        }

    } else {
      $edit_resume_error['fileSize'] = "Image size exceeds 2MB";
    }

} else {
  $add_resume_error['fileName'] = "Please fill before update";
}

}

// DELETE RESUME
if(isset($_GET['delete'])) {

$delete = $_GET['delete'];

    $query = mysqli_query($con,"SELECT * FROM peso_resume WHERE peso_id = '$delete'");
    while($row = mysqli_fetch_assoc($query)) {

    $file = '../files/'.$row['Peso_Resume'];;

    if (file_exists($file)) {
        unlink($file);
    }

    }

    mysqli_query($con,"DELETE FROM peso_resume WHERE peso_id = '$delete'");

    echo "<script>alert('Successfull delete peso resume')</script>";
    echo "<script>window.location = '/peso/user/personal-resume-view.php'</script>"; 

}

?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - Personal Resume | Add </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

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

<style type='text/css'>

  a .back{
    background: none;
    box-shadow: none;
    color: black;
  }     

  a .back:hover {
    background-color: darkgray;
    box-shadow: ;
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
<section class="my-0 py-5">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-8 ms-lg-11">

<?php 

// ADD RESUME
include '../database/database.php';

if(isset($_GET['add'])) {
  $add = $_GET['add'];

$query = mysqli_query($con,"SELECT * FROM account WHERE id = '$add' ");
while($row = mysqli_fetch_array($query)) {

?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='personal-resume-view.php?id=<?php echo $id_acc ;?>' style="text-decoration: none;" onclick='return cancel()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

  <script type="text/javascript">
      window.history.forward();
      function cancel() {
      return confirm ('Are you sure you want to cancel');
      }
  </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> REGISTRATION FORM <p> | Upload </p> </h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100" style="border: 1px solid lightgray;">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

                <div class="col-lg-2 col-md-12 col-12 mt-3">
                <div class="p-0 pe-md-0 ">
                      <?php
                         if ($profile_acc == '') {
                            echo "<img class='w-100 border-radius-md shadow' src='../images/default-avatar.png' style='border-radius: 50%;' alt='image'> ";
                          } else {
                            echo "<img class='w-100 border-radius-md shadow' src='$profile_acc' style='border-radius: 50%;' alt='image'>";
                         }
                      ?>
                </div>
                </div>
                
                <!-- information -->
                <div class="col-lg-10 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">

                    <h6 style="font-size: 15px; color: black; ">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['email'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                      <span class="ms-2">
                      <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?> </span>
                    </h6>          


                    <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                      </svg>
                      <span class="ms-2">
                      <span style="font-weight: normal;"> Date Create </span>: <?php echo date("F d, Y", strtotime ($row['date_time']));?>
                     </span>
                    </h6>    

                </div>
                </div>
          </div>
          </div>

      </div>
      </div>

</div>
</div>

<!-- START -->
<div class="container mt-3">
<div class="row">

<div class="col-lg-12">
<div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

    <div class="ps-md-0 mt-md-0 col-lg-12">
    <div class="row">

        <div class="col-lg-12 mx-auto ms-2">
          <h4 class="" style="color: black; "> PESO Registration Form  </h4>
        </div>


                <!-- resume  -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">

            <!-- FORM START -->
            <form action="#" method="POST" enctype="multipart/form-data">

                <div class="nav-wrapper position-relative mt-3">

                <input type="int" name="peso_resume_id" value="<?php echo $row['id'];?>" hidden>
                <input type="file" name="Peso_Resume" id="upload" class="file" accept=".pdf" hidden >

                <div style="float: right;">
                    <h6 style="font-size: 13px; font-weight: 500; color: gray;"> PDF file only
                     <input type="button" id="select_file_add" value="SELECT FILE" class="btn btn-primary ms-2 mt-2" style="box-shadow: none; color: white; font-size: 12px;" >
                    </h6>
                </div>

                <!-- SELECT FILE -->
                <script type="text/javascript">
                    document.getElementById('select_file_add').addEventListener('click', select_file);
                      function select_file() {
                        document.getElementById('upload').click();
                      }
                </script>

                  <ul class="nav nav-pills nav-fill" style="background: none;">
                      <li class="nav-item">
                        <div class="form-label-group">

                          <?php if(count($add_resume_error) == 1) { ?>

                              <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                  <?php foreach ($add_resume_error as $showerror) { ?>
                                       <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                  <?php } ?>
                              </span>

                          <?php } else if (count($add_resume_error) > 1) { ?>

                              <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                  <?php foreach ($add_resume_error as $showerror) { ?>
                                      <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                  <?php } ?>
                              </span>

                          <?php } ?>

                        </div>
                      </li>      
                  </ul>

                  </div>

                 <style type="text/css">
                  .thumb-image {
                    height: 100px;
                    width: auto;
                  }
                  </style>

                  <div id="image-holder" class="list mt-6"></div>

                  <script type="text/javascript">
                    // VIEW PDF
                    function readURL(input, imgno) {

                    let file = input.files[0];
                    var reader = new FileReader();

                    reader.onload = function(e) {

                      let src = file.type.startsWith("image") ? e.target.result : defaultImage;
                      let size = (file.size / 1024).toFixed(0);
                      let date = new Date(file.lastModified).toLocaleDateString();
                    
                      $("#image-holder").append(`
                        <div id="image-holder-${imgno}" class="list mt-6">
                          <div class="row">

                            <div class="col-4 col-lg-2 col-md-3">
                              <img src="${src}" class="thumb-image">
                            </div>

                            <div class="col-8 col-lg-10 col-md-9" >
                              <ul style="font-size:small">
                                <li>Filename: ${file.name}</li>
                                <li>Type: ${file.type}</li>
                                <li>Size: ${size} kb</li>
                                <li>Date: ${date}</li>
                              </ul>
                              <button class="btn btn-danger ms-3" style="box-shadow: none; color: white; font-size: 12px;" onclick="resetFile()"> Remove </button>
                            </div>

                          </div>
                        </div>
                      `);

                    }
                    reader.readAsDataURL(file);
                  }

                  let defaultImage = "../images/png1.png";

                  upload.addEventListener("change", function(e) {
                    readURL(this, 0);
                  });

                  // REMOVE FILES
                  function resetFile() {
                    const file = document.querySelector('.file');
                    file.value = '';
                  }
              
                  </script>

                  <div class='accordion col-12 col-md-12 col-lg-12 mt-3 view' id='accordionPanelsStayOpenExample'>
                    <div class='accordion-item card col-lg-12 col-md-12 col-12 my-auto' style='box-shadow: none;'>

                    <button class='accordion-button shadow-none collapsed col-lg-3' disabled id="accordion" style="font-size: 14px; font-weight: 500" 
                            type='button' 
                            data-bs-toggle='collapse' 
                            data-bs-target='#panelsStayOpen-collap_1' 
                            aria-expanded='false' 
                            aria-controls='panelsStayOpen-collap_1' 
                            onclick="preview_pdf_edit()"> View

                    </button>

                        <div id='panelsStayOpen-collap_1' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingTwo'>
                          <div class='accordion-body' style='color: black'>
                                 
                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <iframe id="add_viewer" class="mt-2" style="overflow: hidden; height: 800px; width: 100%; " frameborder="0" scrolling="no"></iframe>

                            <script type="text/javascript">
                            function preview_pdf_edit() {
                                pdffile=document.getElementById("upload").files[0];
                                pdffile_url=URL.createObjectURL(pdffile);
                                $('#add_viewer').attr('src',pdffile_url);
                            }
                            </script>

                          </div>
                        </div>

                    </div>
                  </div>
                  <h6 class="mt-2" style="font-size: 13px; font-weight: 500; color: gray;"> Upload PDF file before click view button </h6>

                  <input type="submit" name="add_peso" id="submit" value="UPLOAD" class="btn btn-success mt-4" style="box-shadow: none; color: white; font-size: 12px;" disabled> 

                  <script type="text/javascript">
                  $(document).ready(
                      function(){
                          $('#upload').change(
                              function(){
                                  if ($(this).val()) {
                                      $('#submit').removeClass('.btn-success').prop('disabled', 0);
                                      $('#accordion').removeClass('.accordion-button ').prop('disabled', 0);
                                      $('#select_file_add').addClass('.btn-primary').prop('disabled', 1);
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
      </div>

</div>
</div>

<?php } } ?>





































<?php

// EDIT SUMMARY
include '../database/database.php';

if(isset($_GET['edit'])) {
  $edit = $_GET['edit'];

?>

<?php
    include '../database/database.php';
    $query = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
    while($row = mysqli_fetch_array($query)){
?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='personal-resume-view.php?id=<?php echo $id_acc ;?>' style="text-decoration: none;" onclick='return cancel()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

  <script type="text/javascript">
      window.history.forward();
      function cancel() {
      return confirm ('Are you sure you want to cancel');
      }
  </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> REGISTRATION FORM <p> | Update </p> </h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 " style="border: 1px solid lightgray;">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

                <div class="col-lg-2 col-md-12 col-12 mt-3">
                <div class="p-0 pe-md-0 ">
                      <?php
                         if ($profile_acc == '') {
                            echo "<img class='w-100 border-radius-md shadow' src='../images/default-avatar.png' style='border-radius: 50%;' alt='image'> ";
                          } else {
                            echo "<img class='w-100 border-radius-md shadow' src='$profile_acc' style='border-radius: 50%;' alt='image'>";
                         }
                      ?>
                </div>
                </div>
                
                <!-- information -->
                <div class="col-lg-10 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">

                    <h6 style="font-size: 15px; color: black; ">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['email'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['Contant_Number'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                      <span class="ms-2">
                      <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?> </span>
                    </h6>          


                    <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                      </svg>
                      <span class="ms-2">
                      <span style="font-weight: normal;"> Date Create </span>: <?php echo date("F d, Y", strtotime ($row['date_time']));?>
                     </span>
                    </h6>     

                </div>
                </div>
          </div>
          </div>

      </div>
      </div>

</div>
</div>

<?php }

$query = mysqli_query($con,"SELECT * FROM peso_resume WHERE peso_id = '$edit' ");
while($row = mysqli_fetch_array($query)) {

?>

<!-- START -->
<div class="container mt-3">
<div class="row">

<div class="col-lg-12">
<div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

    <div class="ps-md-0 mt-md-0 col-lg-12">
    <div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="ms-2" style="color: black;"> PESO Registration Form  </h4>
        </div>


                <!-- resume  -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">

        <!-- FORM START -->
        <form action="#" method="POST" enctype="multipart/form-data">



                <div class="nav-wrapper position-relative mt-3">

                <input type="text" name="peso_id" value="<?php echo $row['peso_id']; ?>" hidden >
                <input type="file" name="Peso_Resume" id="upload" value="<?php echo $row['Peso_Resume'];?>" accept=".pdf" hidden >

                <div style="float: right;">
                    <h6 style="font-size: 13px; font-weight: 500; color: gray;"> PDF file only
                     <input type="button" id="select_file_edit" value="SELECT FILE" class="btn btn-primary ms-2 mt-2" style="box-shadow: none; color: white; font-size: 12px;" >
                    </h6>
                </div>

                  <!-- SELECT FILE -->
                  <script type="text/javascript">

                      document.getElementById('select_file_edit').addEventListener('click', select_file);
                        function select_file() {
                          document.getElementById('upload').click();
                        }

                  </script>

                    <ul class="nav nav-pills nav-fill" style="background: none;">
                        <li class="nav-item">
                          <div class="form-label-group">
                            <?php if(count($edit_resume_error) == 1) { ?>

                                <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                    <?php foreach ($edit_resume_error as $showerror) { ?>
                                         <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                    <?php } ?>
                                </span>

                            <?php } else if (count($edit_resume_error) > 1) { ?>

                                <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                    <?php foreach ($edit_resume_error as $showerror) { ?>
                                        <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                    <?php } ?>
                                </span>

                            <?php } ?>
                          </div>
                        </li>      
                    </ul>
                  </div>

               <style type="text/css">
                  .thumb-image {
                    height: 100px;
                    width: auto;
                  }
                  </style>

                  <div id="image-holder" class="list mt-6"></div>

                  <script type="text/javascript">
                    // VIEW PDF
                    function readURL(input, imgno) {

                    let file = input.files[0];
                    var reader = new FileReader();

                    reader.onload = function(e) {

                      let src = file.type.startsWith("image") ? e.target.result : defaultImage;
                      let size = (file.size / 1024).toFixed(0);
                      let date = new Date(file.lastModified).toLocaleDateString();
                    
                      $("#image-holder").append(`
                        <div id="image-holder-${imgno}" class="list mt-6">
                          <div class="row">

                            <div class="col-4 col-lg-2 col-md-3">
                              <img src="${src}" class="thumb-image">
                            </div>

                            <div class="col-8 col-lg-10 col-md-9" >
                              <ul style="font-size:small">
                                <li>Filename: ${file.name}</li>
                                <li>Type: ${file.type}</li>
                                <li>Size: ${size} kb</li>
                                <li>Date: ${date}</li>
                              </ul>
                              <button class="btn btn-danger ms-3" style="box-shadow: none; color: white; font-size: 12px;" onclick="resetFile()"> Remove </button>
                            </div>

                          </div>
                        </div>
                      `);

                    }
                    reader.readAsDataURL(file);
                  }

                  let defaultImage = "../images/png1.png";

                  upload.addEventListener("change", function(e) {
                    readURL(this, 0);
                  });

                  // REMOVE FILES
                  function resetFile() {
                    const file = document.querySelector('.file');
                    file.value = '';
                  }
              
                  </script>

                  <div class='accordion col-12 col-md-12 col-lg-12 mt-3 view' id='accordionPanelsStayOpenExample'>
                    <div class='accordion-item card col-lg-12 col-md-12 col-12 my-auto' style='box-shadow: none;'>

                    <button class='accordion-button shadow-none collapsed col-lg-3' disabled id="accordion" style="font-size: 14px; font-weight: 500" 
                            type='button' 
                            data-bs-toggle='collapse' 
                            data-bs-target='#panelsStayOpen-collap_1' 
                            aria-expanded='false' 
                            aria-controls='panelsStayOpen-collap_1' 
                            onclick="preview_pdf_edit()"> View

                    </button>

                        <div id='panelsStayOpen-collap_1' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingTwo'>
                          <div class='accordion-body' style='color: black'>
                                 
                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <iframe id="edit_viewer" class="mt-2" style="overflow: hidden; height: 800px; width: 100%; " frameborder="0" scrolling="no"></iframe>

                            <script type="text/javascript">
                            function preview_pdf_edit() {
                                pdffile=document.getElementById("upload").files[0];
                                pdffile_url=URL.createObjectURL(pdffile);
                                $('#edit_viewer').attr('src',pdffile_url);
                            }
                            </script>

                          </div>
                        </div>

                    </div>
                  </div>
                  <h6 class="mt-2" style="font-size: 13px; font-weight: 500; color: gray;"> Upload PDF file before click view button </h6>

                  <input type="submit" name="edit_peso" id="submit" value="UPDATE" class="btn btn-success mt-4" style="box-shadow: none; color: white; font-size: 12px;" disabled> 

                  <script type="text/javascript">
                  $(document).ready(
                      function(){
                          $('#upload').change(
                              function(){
                                  if ($(this).val()) {
                                      $('#submit').removeClass('.btn-success').prop('disabled', 0);
                                      $('#accordion').removeClass('.accordion-button ').prop('disabled', 0);
                                      $('#select_file_edit').addClass('.btn-primary').prop('disabled', 1);
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
      </div>

</div>
</div>

<?php } } ?>


</div>
</div>
</div>
</section>


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

