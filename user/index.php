<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO </title>
  
</head>

<body> 

<section class="my-0 py-8">




<!-- START -->
<header class="header-2 py-5">

  <div class="page-header min-vh-75 relative" >
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-black pt-3 mt-n5" style="color:black;"> P E S O </h1>
          <img src="../images/LOGO.png" style="width: 40%; height: 70%;">
          <p class="lead text-black mt-3" style="font-size: 30px; color: black;"> Public Employment Service Office </p>
        </div>
      </div>
    </div>

  </div>

</header>
<!-- END -->








<!-- START -->
<section class="py-0">

<!-- START -->
  <div class="container">
    <div class="row">
      <div class="row text-center my-sm-5">
        <div class="col-lg-6 mx-auto">
          <h4 class="text-black" style="color: black; "> Find Jobs </h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

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

  div .card-profile {
    background: none;
    box-shadow: none;
    color: black;
    
  } 

  div .card-profile:hover {
    background-color: whitesmoke;
    box-shadow: none;
    color: black;
    transition: 0.2s;
  }

</style>


<!-- START -->
<div class="container">
<div class="row">

<?php

$job_hiring = array();

include '../database/database.php';

$q = mysqli_query($con,"SELECT * FROM applicant WHERE Account_Id = '$id_acc' ");
while($row = mysqli_fetch_assoc($q)) {

  $job_hiring[] = $row['job_id'];

}

date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

$query = mysqli_query($con, "SELECT * FROM company LEFT JOIN job ON job.company_id = company.id WHERE 
job_status = 'Active' and date_ended >= '$date' and job.id NOT IN ( '" . implode( "', '" , $job_hiring ) . "' ) order by job.id desc limit 12");

while($row = mysqli_fetch_array($query)){ 


?>

<div class="col-lg-4">
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-4" style="box-shadow: none; border-radius: 5PX; border:none;">

    <div class="ps-0 ps-md-0 mt-3 mt-md-0" style="background: none ;">
    <div class="row">

              <div class="col-lg-3 col-md-3 col-3 ms-3">
                  <div class="card-body p-0 pe-md ps-lg-0 mt-3"> 
                    <?php if ($row['images'] == '') { ?>
                            <a href="job-info.php?id=<?php echo $row['id'];?>" style="text-decoration: none; color: black;">
                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='../images/default-avatar.png' alt='image'>
                            </a>
                     <?php  } else { ?>
                            <a href="job-info.php?id=<?php echo $row['id'];?>" style="text-decoration: none; color: black;">
                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='<?php echo $row['images'] ;?>' alt='image'>
                            </a>
                     <?php } ?>
                  </div>
              </div>

                <div class="col-lg-8 col-md-8 col-8 my-auto">
                <div class="card-body ps-lg-0">
                <a href="job-info.php?id=<?php echo $row['id'];?>" style="text-decoration: none; color: black;">

                    <h4 style="font-size: 15px;"><?php echo $row['job_title'];?></h4>
                    <h5 class="text-black" style="font-size: 15px; color: black;"> <?php echo $row['company'];?> - 
                      <span style="font-weight: normal; font-size: 14px"><?php echo $row['Province'];?></span>
                    </h5>    


                    <h6 style="font-weight: normal; font-size: 13px; color: black;"> 
                      Posted on . <?php echo date("F d, Y", strtotime ($row['date_posted']));?>
                    </h6>

                </a>
                </div>
                </div>

      </div>
      </div>

</div>
</div>

<?php } ?>

  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as job_count, date_ended FROM job WHERE job_status = 'Active' and date_ended >= '$date'  ");

  while($row = mysqli_fetch_array($query)){

   $job_count = $row['job_count'];

  ?>  

  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } else { ?>  

    <div class="mt-3">
      <a href="job.php" style="text-decoration: none;" class="text-secondary icon-move-right"> 
         <h5 style="font-size: 13px; font-weight: normal; color: #000066;"> See all jobs 
          <i style="color: #000066;" class="fas fa-arrow-right ms-2"></i>
        </h5> 
      </a>
    </div>

  <?php } } ?> 

  </div>
</div>
<!-- END -->


</section>
<!-- END -->









<!-- START -->
<section class="py-0">

<div class="container">
    <div class="row">
      <div class="row text-center my-sm-5 mt-5">
        <div class="col-lg-6 mx-auto">
          <h4 class="text-black" style="color: black; "> Announcements </h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<div class="container">
<div class="row">

<!-- START -->
<div class="container">
  <div class="row">

<?php

include '../database/database.php';

date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
$active = "Active";

$query = mysqli_query($con,"SELECT * FROM image WHERE image_status = '$active' AND  date_ended >= '$date' order by id desc limit 6 ");
while($row = mysqli_fetch_array($query)){

?>

<div class="col-lg-4" >
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto" style="box-shadow: none; border-radius: 5PX; border:none;">

                <div class="col-lg-12 col-md-12 col-12 my-auto">
                  <div class="card-body ps-lg-0">

                    <div class="col-lg-12 col-md-12 col-12">
                      <div class="card-body p-0 pe-md ps-lg-4">
                        <a href="image-zoom.php?id=<?php echo $row['id'] ?>"> 

                         <?php if ($row['image'] == '') { ?>

                                <img class="ceo_image w-100 border-radius-md shadow-lg" src='../images/default-avatar.png' alt='image'>

                         <?php  } else { ?>
                          
                                <img class="ceo_image w-100 border-radius-md shadow-lg" src='<?php echo $row['image'] ;?>' alt='image'>

                         <?php } ?>

                        </a>
                      </div>
                    </div>

                      <style type="text/css">
                      #more6 {
                        display: none;
                      }
                      .scroll::-webkit-scrollbar {
                         display: none;
                       }

                       .scroll_A::-webkit-scrollbar
                      {
                         width: 5px;
                      }

                      .scroll_A::-webkit-scrollbar-thumb
                      {
                         height: 50px;
                         background: #333;
                         border: 8px solid transparent;
                         border-radius: 5PX;
                      }

                      .scroll_A::-webkit-scrollbar-thumb:active
                      {
                          background: #333;
                      }
                                            
                      </style>
                
                    <div class="card6 ms-4 mt-4">

                    <h4 style="font-size: 15px;"><?php echo $row['image_name'];?></h4> 

                      <span style="font-weight: normal; font-size: 14px;" id="dots6">
                        <textarea class="scroll col-lg-12 col-md-3 col-12" rows="5" 
                                  style="border: none; background: none; resize: none; overflow: hidden;" disabled><?php echo $row['image_descriptions'];?>
                        </textarea>
                      </span>

                      <span style="font-weight: normal; font-size: 14px;" id="more6">
                        <textarea class="scroll_A col-lg-12 col-md-3 col-12" 
                                  style="border: none; background: none; resize: none; " disabled><?php echo $row['image_descriptions'];?>
                        </textarea>
                      </span>

                      <div class="col-lg-5 col-md-3 col-5">
                        <button class="btn btn-secondary" style="box-shadow: none;" onclick="myFunction6(event)" id="button6"> 
                           <i class='fas fa-angle-down'></i> 
                        </button>
                      </div>


                    </div>

                  <script type="text/javascript">
                    window.setTimeout( function() {
                      $("textarea.scroll_A").height( $("textarea")[0].scrollHeight );
                    }, 1);
                  </script>


                  <script type="text/javascript">
                      function myFunction6(event) {
                        var card = event.target.closest(".card6");
                        var dots = card.querySelector("#dots6");
                        var moreText = card.querySelector("#more6");
                        var btnText = card.querySelector("#button6");

                        if (dots.style.display === "none") {
                          dots.style.display = "inline";
                          btnText.innerHTML = "<i class='fas fa-angle-down''></i>";
                          moreText.style.display = "none";

                        } else {
                          dots.style.display = "none";
                          btnText.innerHTML = "<i class='fas fa-angle-up''></i>";
                          moreText.style.display = "inline";
                        }
                      }
                  </script>

                  </div>
                </div>

    </div>

  </div>



<?php } ?>

  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as post_count, date_ended FROM image WHERE image_status = 'Active' and date_ended >= '$date'  order by id desc limit 1 ");

  while($row = mysqli_fetch_array($query)){

   $post_count = $row['post_count'];
   
  ?>  

  <?php if($post_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No announcements available </h5>

  <?php } else { ?>  

    <div class="mt-3">
      <a href="announcement.php" style="text-decoration: none;" class="text-secondary icon-move-right"> 
         <h5 style="font-size: 13px; font-weight: normal; color: #000066;"> View More Announcement 
          <i style="color: #000066;" class="fas fa-arrow-right ms-2"></i>
        </h5> 
      </a>
    </div>

  <?php } } ?>

  </div>
</div>
<!-- END -->


  </div>
</div>
<!-- END -->

</section>
<!-- END -->




<!-- START -->
<section class="py-0">

<!-- START -->
  <div class="container">
    <div class="row">
      <div class="row text-center my-sm-5">
        <div class="col-lg-6 mx-auto">
          <h4 class="text-black" style="color: black; "> Companies </h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->


<!-- START -->
<div class="container">
<div class="row">

<?php

  $query = mysqli_query($con,"SELECT company.id as com_id,
                                     company.images,
                                     company.company,
                                     company.Region,
                                     company.Province,
                                     company.Barangay,
                                     company.City,
                                     company.category,
                                     company.company_view,

                                     job.id,
                                     job.job_title,
                                     job.job_category,
                                     count(case when job.count = 1 then 1 end) as job_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     WHERE company.Status = 'Active' GROUP BY company.id order by company.id desc");  

  while($row = mysqli_fetch_array($query)){

?>

<div class="col-lg-4">
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-4" style="box-shadow: none; border-radius: 5PX; border:none;">

    <div class="ps-0 ps-md-0 mt-3 mt-md-0" style="background: none ;">
    <div class="row">

              <div class="col-lg-3 col-md-3 col-3 ms-3">
                  <div class="card-body p-0 pe-md ps-lg-0 mt-3"> 
                      <?php if ($row['images'] == '') { ?>
                            <a href="company-info.php?id=<?php echo $row['com_id'];?>" style="text-decoration: none; color: black;">
                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='../images/default-avatar.png' alt='image'>
                            </a>
                     <?php  } else { ?>
                            <a href="company-info.php?id=<?php echo $row['com_id'];?>" style="text-decoration: none; color: black;">
                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='<?php echo $row['images'] ;?>' alt='image'>
                            </a>
                     <?php } ?>
                  </div>
              </div>

                <div class="col-lg-8 col-md-8 col-8 my-auto">
                <div class="card-body ps-lg-0">
                <a href="company-info.php?id=<?php echo $row['com_id'];?>" style="text-decoration: none; color: black;">

                    <h5 class="text-black" style="font-size: 15px; color: black;"> <?php echo $row['company'];?> - 
                      <span style="font-weight: normal; font-size: 14px"><?php echo $row['Province'];?></span>
                    </h5>    

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['category'];?></h6> 
                    <h6 style="font-size: 13px; color: black;"> Total Jobs - <?php echo $row['job_count'];?> </h6>

                </a>
                </div>
                </div>

      </div>
      </div>

</div>
</div>

<?php } ?>

  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as company_count FROM company ");

  while($row = mysqli_fetch_array($query)){

   $company_count = $row['company_count'];
  ?>  

  <?php 

  if($company_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No company available </h5>

  <?php } else { ?>  

    <div class="mt-3">
      <a href="company.php" style="text-decoration: none;" class="text-secondary icon-move-right"> 
         <h5 style="font-size: 13px; font-weight: normal; color: #000066;"> See all companies 
          <i style="color: #000066;" class="fas fa-arrow-right ms-2"></i>
        </h5> 
      </a>
    </div>

  <?php } } ?>

  </div>
</div>
<!-- END -->

</section>
<!-- END -->





<!-- START -->
<section class="py-0">

<!-- START -->
  <div class="container">
    <div class="row">
      <div class="row text-center my-sm-5 mt-5">
        <div class="col-lg-6 mx-auto">
          <h4 class="mb-0" style="color: black;"> About Peso </h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<!-- START -->
  <div class="container">
    <div class="row align-items-center">

      <!-- START -->
      <div class="col-lg-5 ms-auto me-auto p-lg-0 mt-lg-0 mt-0">
        <div class="rotating-card-container">

        <video src="../video/peso.mp4" type="video/mp4" muted autoplay controls style="width:100%; height: 50%; border-radius: 10px;"></video>

        </div>
      </div>
      <!-- END -->


      <!-- START -->
      <div class="col-lg-6 ms-auto">


        <!-- START -->
        <div class="row justify-content-start">

        <h4 class="mb-0" style="color: black;"> What are the objectives of the PESO ? </h4>

          <div class="col-md-6">
            <div class="info">
              <i><!-- ICON --></i>
              <h6 class="font-weight-bolder mt-3" style="color: black;"> General Objective </h6>
              <p class="pe-5" style="color: black;">Ensure the prompt, timely and efficient delivery of employment service and provision of information on the other DOLE programs.</p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info">
              <i><!-- ICON --></i>
              <h6 class="font-weight-bolder mt-3" style="color: black;"> Specific Objectives </h6>
              <p class="pe-3" style="color: black;">Provide a venue where people could explore simultaneously various employment options and actually seek assistance they prefer.</p>
            </div>
          </div>

        </div>
        <!-- END -->

          <a href="#" style="text-decoration: none;" 
             class="text-secondary icon-move-right "> 
             <h5 style="font-size: 12px; font-weight: normal; color: #000066; ">  More about PESO
              <i style="color: #000066;" class="fas fa-arrow-right ms-1"></i></h5> 
          </a>

      </div>
      <!-- END -->

<!-- START -->
<div class="col-md-3.5 mx-auto mt-md-3">

          <h4 class="mb-0"  style="color: black;"> What are the functions of the PESO ?  </h4>

    <ul class="position-sticky" style="margin-top: 10px; color: black; font-size: 14px">

        <li class="pe-0"> <p> Encourage employers to submit to the PESO on a regular basis a list of job vacancies in their respective establishments in order to facilitate the exchange of labor market 
                                                       information services to job seekers and employers by providing employment services to job seeker, both for local and overseas employment, and recruitment assistance to employers. 
                                                        </p></li>

        <li class="pe-0"> <p> Develop and administer testing and evaluation instruments for effective job selection, training and counseling.  </p></li>

        <li class="pe-0"> <p> Provide persons with entrepreneurship qualities access to the various livelihood and self-employment programs offered by both government and non-governmental organizations at the 
                                                       provincial, city, municipal, barangay levels by undertaking referrals for such programs.  </p></li>

        <li class="pe-0"> <p> Undertake employability enhancement trainings/seminar for jobseekers as well as those who would like to change career or enhance their employability.  </p></li>

        <li class="pe-0"> <p> Provide employment and occupational counseling, career guidance, mass motivation and values development activities.  </p></li>

        <li class="pe-0"> <p> Conduct pre-employment counseling and orientation to prospective local and overseas workers.  </p></li>

        <li class="pe-0"> <p> Provide reintegration assistance services to returning Filipino migrant workers.  </p></li>

        <li class="pe-0"> <p> Perform such functions as to willfully carry out the objectives of the PESO Act. </p></li>

    </ul>


</div>
<!-- END -->

    </div>
  </div>
  <!-- END -->

</section>
<!-- END -->



</section>
<!-- END -->

</body>
</html>
