<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - Account Overview </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

<style type='text/css'>

  .btn-secondary {
    background: none;
    box-shadow: none;
    color: black;
    padding: 2px 10px;
  }                        

  .btn-secondary:hover {
    background-color: darkgray;
    box-shadow: none;
    color: black;
    padding: 2px 10px;
  }

  i {
    background: none;
    box-shadow: none;
    color: black;
  }     

  i:hover {
    background-color: darkgray;
    box-shadow: none;
    color: black;
  }

  a i {
    background: none;
    box-shadow: none;
    color: black;
  }     

  a i:hover {
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

<style>

.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: lightgray;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 4px;
  bottom: 3px;
  background-color: gray;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: lightgray;
}

input:focus + .slider {
  box-shadow: 0 0 1px black;
}

input:checked + .slider:before {
  -webkit-transform: translateX(18px);
  -ms-transform: translateX(18px);
  transform: translateX(18px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 35px;
}

.slider.round:before {
  border-radius: 50%;
}

.profilepic {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 100%;
  overflow: hidden;}

.profilepic:hover .profilepic__content {
  opacity: .8;
  background: #111;

}

.profilepic:hover .profilepic__image {
  opacity: .8;
  background: #111;

}

.profilepic__image {
  object-fit: cover;
  opacity: 1;
  transition: opacity .2s ease-in-out;
}

.profilepic__content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: white;
  opacity: 0;
  transition: opacity .2s ease-in-out;
}

</style>

</head>

<body >

<!-- START -->
<section class="my-0 py-8">


<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-8 ms-lg-11">
  
<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
while($row = mysqli_fetch_array($query)){

?>

<!-- START -->
  <div class="container">
    <div class="row">
      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> Account <p> | Overview </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" style="border: 1px solid lightgray;">

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
                  <a href="account-view.php?id=<?php echo $row['id'];?>" style="text-decoration: none;" >

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
                      <span style="float: right; font-weight: 500; font-size: 13px;"> View Details <i class='fas fa-angle-right ms-2'></i></span>
                     </span>
                    </h6>

                  </a>
                </div>
                </div>

        </div>
        </div>

    </div>
    </div>

</div>
</div>

<?php } ?>

<div class="container mt-4">
<div class="row">

      <div class="col-lg-12 position-relative bg-cover px-0" >
      <div class="p-1 ps-sm-4 position-relative">

                <div class="col-lg-12 mx-auto">
                  <h4 class="" style="color: black; "> Information </h4>
                </div>

<div class="col-lg-12 col-md-12 col-12 my-auto">
<div class="card-body ps-lg-0">

<div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" >
<div class="col-lg-12 col-md-12 col-12">
<div class="p-0 pe-md-0 ">

<!-- PESO RESUME -->
<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account LEFT JOIN personal ON personal.personal_id = account.id WHERE account.id =  '$id_acc' ");
while($row = mysqli_fetch_array($query)) {

$account = ($row['id']);
$personal = ($row['personal_id']);
$personal_date = date("F d, Y - h:i A" , strtotime ($row['Update_date']));

if ($account = $personal) { ?>
  
<a href="peso-resume-view.php"  style="text-decoration: none;">

        <h4 style='color: black; font-size: 15px'><i class="far fa-file-alt" style="font-size:25px;"></i><span class="ms-2"> PESO resume </span> </h4>
        <h6 style='color: black; font-size: 14px; font-weight: normal'><span style="font-weight: normal;">  Updated on . <?php echo $personal_date ;?>  </span>
          <span style="float: right; font-weight: 500; font-size: 13px;">  <i class='fas fa-angle-right'></i></span> 
        </h6>

</a> 

<?php } else { ?>

<a href="peso-resume-view.php"  style="text-decoration: none;">

        <h4 style='color: black; font-size: 15px'><i class="far fa-file-alt" style="font-size:25px;"></i><span class="ms-2"> PESO resume </span> </h4>
        <h6 style='color: black; font-size: 14px; font-weight: normal'><span style="font-weight: normal;"> No updated peso resume  </span>
          <span style="float: right; font-weight: 500; font-size: 13px;"><i class='fas fa-angle-right ms-2'></i></span> 
        </h6>

</a>

<?php } } ?>

</div>
</div>
</div>

</div>
</div>




<div class="col-lg-12 col-md-12 col-12 my-auto">
<div class="card-body ps-lg-0">

<div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" >
<div class="col-lg-12 col-md-12 col-12">
<div class="p-0 pe-md-0 ">

<!-- PERSONAL RESUME -->
<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account LEFT JOIN resume ON resume.resume_id = account.id WHERE account.id =  '$id_acc'  ");
while($row = mysqli_fetch_array($query)) {

$account_b = ($row['id']);
$resume = ($row['resume_id']);
$resume_date = date("F d, Y - h:i A" , strtotime ($row['Update_date']));

if ($account_b = $resume) { ?>

<a href="personal-resume-view.php"  style="text-decoration: none;">

        <h4 style='color: black; font-size: 15px'><i class="fa fa-file-word-o" style="font-size:25px;"></i> <span class="ms-2"> PESO Employment Information System Registration Form </span></h4>
        <h6 style='color: black; font-size: 14px; font-weight: normal'><span style="font-weight: normal;">  Updated on . <?php echo $resume_date ;?>  </span>
          <span style="float: right; font-weight: 500; font-size: 13px;"><i class='fas fa-angle-right'></i></span> 
        </h6>    

</a>

<?php } else { ?>


<a href="personal-resume-view.php"  style="text-decoration: none;">

        <h4 style='color: black; font-size: 15px'><i class="fa fa-file-word-o" style="font-size:25px;"></i> <span class="ms-2"> PESO Employment Information System Registration Form </span></h4>
        <h6 style='color: black; font-size: 14px; font-weight: normal'><span style="font-weight: normal;"> No updated personal resume  </span>
          <span style="float: right; font-weight: 500; font-size: 13px;"><i class='fas fa-angle-right ms-2'></i></span> 
        </h6>  
</a>

<?php } } ?>

</div>
</div>

</div>
</div>
</div>


            <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-20 mt-2 mt-4" style="border: 1px solid lightgray;">
            <div class="col-lg-12 col-md-12 col-12">
            <div class="p-0 pe-md-0">

              <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Account Guidelines </span></h6>
              <h6 style="font-size: 14px; color: black; font-weight: normal;" class="mt-3"> 
               Welcome to your Account! Please read the following guidelines below to help you set up your account.
              </h6>

              <h6 style="font-size: 14px; color: black; font-weight: normal;" class="mt-3">
                1.  In order to apply to any jobs, you must need to complete your PESO Resume and Peso Employment Information System Registration Form. <br><br>
                2.  When filling up forms, please make sure that you will input correct information so that you won’t suffer on any application rejection. <br><br>
                3.  Uploading correct information will further help our PESO Sta. Maria staffs to process your application.
              </h6>

            </div>
            </div>
            </div>    






























<?php

  if(isset($_GET['JOBS'])) {
  $jobs = $_GET['JOBS'];
  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $active = "Active";
  $query = mysqli_query($con,"SELECT * FROM company JOIN job ON job.company_id = company.id WHERE job_status = '$active' AND  date_ended >= '$date' and job.id = '$jobs' ");
  while($row = mysqli_fetch_array($query)){
  $job_id = ($row['id']);

?>

<!-- FORM START -->
<form  enctype="multipart/form-data" method="POST" action="add/apply-add.php">  

<div class="container" hidden>
<!-- JOB AND COMPANY ID -->
JOB AND COMPANY ID
<br>
<input type="text" name="company_id" value="<?php echo $row['company_id'];?>" readonly>
<input type="text" name="job_id" value="<?php echo $job_id ?>" readonly>
<br><br>
<?php } } ?>







<?php
  include '../database/database.php';
  if(isset($_GET['JOBS'])) {
  $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN personal ON personal.personal_id = account.id WHERE account.id = '$id_acc' ");
  while($row = mysqli_fetch_array($query)){
?>
<!-- PERSONAL -->
PERSONAL
<br>
<input type="text" name="Status" value="1" readonly>
<input type="text" name="Account_Id" value="<?php echo $row['personal_id'];?>" readonly>
<input type="text" name="First_Name" value="<?php echo $row['First_Name'];?>" readonly>
<input type="text" name="Middel_Name" value="<?php echo $row['Middel_Name'];?>"readonly>
<input type="text" name="Last_Name" value="<?php echo $row['Last_Name'];?>"readonly>
<br>
<input type="text" name="Month" value="<?php echo $row['Month'];?>"readonly>                 
<input type="text" name="Day" value="<?php echo $row['Day'];?>"readonly>
<input type="text" name="Year" value="<?php echo $row['Year'];?>"readonly> 
<input type="text" name="Age" value="<?php echo $row['Age'];?>"readonly>  
<br>
<input type="text" name="Gender" value="<?php echo $row['Gender'];?>"readonly>
<input type="text" name="Birth_Place" value="<?php echo $row['Birth_Place'];?>"readonly>      
<br>
<input type="text" name="Email" value="<?php echo $row['email'];?>"readonly>                 
<input type="text" name="Contact_Number" value="<?php echo $row['Contant_Number'];?>"readonly>
<br>
<input type="text" name="Region" value="<?php echo $row['Region'];?>"readonly>
<br>
<input type="text" name="Province" value="<?php echo $row['Province'];?>"readonly>
<br>
<input type="text" name="City" value="<?php echo $row['City'];?>"readonly>
<br>
<input type="text" name="Barangay" value="<?php echo $row['Barangay'];?>"readonly>
<br>
<input type="text" name="Street" value="<?php echo $row['Street'];?>"readonly>
<br><br>
<?php } } ?>




<?php

  include '../database/database.php';
  if(isset($_GET['JOBS'])) {
  $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN work_experience ON work_experience.work_experience_id = account.id WHERE account.id = '$id_acc' ");
  while($row = mysqli_fetch_array($query)){

?>
<!-- WORK -->
WORK
<br>
<input type="text" name="Job_Title" value="<?php echo $row['Job_Title'];?>"readonly> 
<input type="text" name="Company" value="<?php echo $row['Company'];?>"readonly>
<br>
<input type="text" name="Company_Address"
value="<?php echo $row['Region'];?>,<?php echo $row['Province'];?> <?php echo $row['City'];?> <?php echo $row['Barangay'];?> <?php echo $row['Street'];?> "readonly> 
<br>
<input type="text" name="Work_From_Date_Month" value="<?php echo $row['Work_From_Date_Month'];?>"readonly>
<input type="text" name="Work_From_Date_Year" value="<?php echo $row['Work_From_Date_Year'];?>"readonly>
<br>
<input type="text" name="Work_From_To_Month" value="<?php echo $row['Work_From_To_Month'];?>"readonly>
<input type="text" name="Work_From_To_Year" value="<?php echo $row['Work_From_To_Year'];?>"readonly>
<br><br>
<?php } } ?>




<?php

  include '../database/database.php';
  if(isset($_GET['JOBS'])) {
  $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN education ON education.education_id = account.id WHERE account.id = '$id_acc' ");
  while($row = mysqli_fetch_array($query)){

?>
<!-- EDUCATION -->
EDUCATION
<br>
<input type="text" name="Education" value="<?php echo $row['Education'];?>"readonly> 
<input type="text" name="Field_Of_Study" value="<?php echo $row['Field_Of_Study'];?>"readonly>
<input type="text" name="School_Name" value="<?php echo $row['School_Name'];?>"readonly> 
<br>
<input type="text" name="School_Address"
value="<?php echo $row['Region'];?>,<?php echo $row['Province'];?> <?php echo $row['City'];?> <?php echo $row['Barangay'];?> <?php echo $row['Street'];?> "readonly> 
<br>
<input type="text" name="School_From_Date_Month" value="<?php echo $row['School_From_Date_Month'];?>"readonly>
<input type="text" name="School_From_Date_Year" value="<?php echo $row['School_From_Date_Year'];?>"readonly>
<br>
<input type="text" name="School_From_To_Month" value="<?php echo $row['School_From_To_Month'];?>"readonly>
<input type="text" name="School_From_To_Year" value="<?php echo $row['School_From_To_Year'];?>"readonly>
<br>
<?php } } ?>

</div>


















<?php
  
  include '../database/database.php';

  if(isset($_GET['JOBS'])) {

  $query = mysqli_query($con,"SELECT * FROM account 
                                       LEFT JOIN personal ON personal.personal_id = account.id
                                       LEFT JOIN education ON education.education_id = account.id
                                       LEFT JOIN work_experience ON work_experience.work_experience_id = account.id
                                       LEFT JOIN resume ON resume.resume_id = account.id 
                                       LEFT JOIN peso_resume ON peso_resume.peso_resume_id = account.id 
                                       WHERE account.id = '$id_acc' limit 1 ");

  while($row = mysqli_fetch_array($query)){

  $account = ($row['id']);
  $personal = ($row['personal_id']);
  $education = ($row['education_id']);
  $work_experience = ($row['work_experience_id']);
  $resume = ($row['resume_id']);
  $peso_resume = ($row['peso_resume_id']);

if ($account = $personal &&
    $account = $education &&
    $account = $work_experience &&
    $account = $resume &&
    $account = $peso_resume  ) { ?>
  
<button type='submit' name='submit' class='btn btn-success mt-4' style='color: white; font-size: 12px;'> APPLY </button>

<?php } else { ?>

<a href='#' class='btn btn-success mt-4' style='color: white; font-size: 12px;' onclick='return apply()'> APPLY </a>

<?php  } } }?>

<script>
    function apply() {
      return confirm ('Complete the PESO requirements and upload Personal resume before applying');
    }
</script>   
             
</form>

</div>
</div>
</div>
</div>

</div>
</div>
</div>
</section>
<!-- END -->


</body>
</html>