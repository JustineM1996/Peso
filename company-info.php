<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>


  <!-- TITLE -->
  <title> PESO - Company Information </title>

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
<section class="my-0 py-8">


<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-10 ms-lg-7">



<?php

include 'database/database.php';
$query = mysqli_query($con,"SELECT * FROM company  WHERE id = '".$_REQUEST['id']."' ");
while($row = mysqli_fetch_array($query)){

$ceo_profile = $row['ceo_profile'];
$ceo = $row['ceo'];
$company_size = $row['company_size'];
$email = $row['email'];
$contact_number = $row['contact_number'];
$link = $row['link'];
$link = $row['link'];
$company_profile = $row['images'];
?>

<!-- START -->
<div class="container">
<div class="row">

        <div class="col-lg-1 col-md-12 col-12 mt-1">
        <div class="p-0 pe-md-0 ">

              <?php if ($company_profile == '') { ?>
                    <img class="company_image w-100 shadow" src='images/default-avatar.png' alt='image'>
             <?php  } else { ?>
                    <img class="company_image w-100 shadow" src='images/<?php echo $company_profile ;?>' alt='image'>
             <?php } ?>

        </div>
        </div>

        <div class="col-lg-8 col-md-12 col-12">
        <div class="card card-plain" style="border: none; ">

            <div class="card-body px-0">
             <h4 class="text-black" style="color: black;"> <?php echo $row['company'];?> </h4>
           </div>

        </div>
        </div>

</div>
</div>
<!-- END -->


    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="background: none; ">

      
      <li class="nav-item col-lg-4"> </li>
      <li class="nav-item col-lg-4"> </li>
      <li class="nav-item col-lg-4"> </li>
      <li class="nav-item col-lg-4"> </li>
      <li class="nav-item col-lg-4"> </li>
      <li class="nav-item col-lg-4"> </li>
      <li class="nav-item col-lg-4"> </li>
      <li class="nav-item col-lg-5"> </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link active btn-secondary" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> VIEWING </button>
      </li>

      <li class="nav-item  ms-lg-2 ms-2" role="presentation">
        <button class="nav-link btn-secondary" id="pills-contact-tab " data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> JOBS </button>
      </li>

    </ul>



<!-- HEAD A -->
<div class="tab-content" id="pills-tabContent">

<!-- VIEW -->
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">  


<div class="container mt-4">
<div class="row">

<h5 class='text-black' style="color: black; font-size: 18px;"> About the company </h5>

<div class="container" style="background: NONE">
<div class="row">
  

          <div class="col-lg-3 col-md-12 col-12 mt-3">
          <div class="p-0 pe-md-0 ">

                <?php if ($ceo_profile == '') { ?>
                      <img class="ceo_image w-100 shadow" src='images/default-avatar.png' alt='image'>
               <?php  } else { ?>
                      <img class="ceo_image w-100 shadow" src='images/<?php echo $ceo_profile ;?>' alt='image'>
               <?php } ?>

          </div>
          </div>


        <div class="col-lg-8 col-md-12 col-12">
        <div class="card card-plain" style="border: none; ">

            <div class="card-body px-0">

              <?php if ($ceo == '') { ?>

              <?php } else { ?>

              <h6 style="font-size: 15px; color: black; ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
                <span class="ms-2"><?php echo $ceo;?> </span>
              </h6>

              <?php  } ?>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                      <span class="ms-2">
                      <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?> </span>
                    </h6>      

              <?php if ($email == '') { ?>

              <?php } else { ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $email;?></span>
                    </h6>

              <?php  } ?>


              <?php if ($contact_number == '') { ?>

              <?php } else { ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                      <span class="ms-2"><?php echo $contact_number;?></span>
                    </h6>

              <?php  } ?>


              <?php if ($link == '') { ?>

              <?php } else { ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                          <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                          <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                        </svg>
                      <span class="ms-2"><?php echo $row['link'];?></span>
                    </h6>

              <?php  } ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                      </svg>

                    <span class="ms-2">
                      <span style="font-weight: normal;"> Date Add .</span> <?php echo date("F d, Y", strtotime ($row['date_posted']));?></span>
                    </h6>


           </div>

        </div>
        </div>

</div>
</div>

    <div class="col-lg-12 col-md-12 col-12 mt-3" >
     <textarea class="form-control" disabled style="background: none; color: black; border: none; font-size: 14px; resize: none; overflow: hidden;"><?php echo $row['description'];?> </textarea>
    </div>

</div>
</div>

<script type="text/javascript">
  window.setTimeout( function() {
    $("textarea").height( $("textarea")[0].scrollHeight );
  }, 1);
</script>

<?php } ?>




<!-- START -->
<div id="users">
<div class="container">
<div class="row">


          <h5 class='text-black' style="color: black; font-size: 18px;"> Jobs Opportunities</h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-10 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_../assets/icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" onclick="resetList();"> <i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>    

              <div style="text-align: right;" >
                <select class="col-lg-2 col-md-12 col-12 mt-2 card-profile" data-bs-toggle="dropdown" aria-expanded="false" name="job_type" 
                style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected > All Job type </option>
                  <option class="filter" value="On Site" style=" color: black; font-size: 13px;"> On Site </option>
                  <option class="filter" value="Work From Home" style=" color: black; font-size: 13px;"> Work From Home </option>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="job_schedule_shift" 
                style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Shift type </option>
                  <option class="filter" value="Day Shift" style=" color: black; font-size: 13px;"> Day Shift </option>
                  <option class="filter" value="Night Shift" style=" color: black; font-size: 13px;"> Night Shift </option>
                </select>

                <select class="col-lg-3 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="job_option" 
                style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Job option type </option>

                  <?php

                  include 'database/database.php';

                  $query = mysqli_query($con,"SELECT * FROM job_option ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                  <option class="filter" value="<?php echo $row['job_option'];?>" style="color: black;" > <?php echo $row['job_option']; ?> </option>

                  <?php } ?>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="gender" 
                style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>
              </div>


</div>
</div>
<!-- END -->












<!-- Result -->
<div class="container mt-3">
<div class="row">

<div class="col-lg-12 col-12 col-md-12 card" style="box-shadow: none; border: none;">
<div class="list">

  <?php

  include 'database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d, h:i:s A');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.images,
                                     company.company,
                                     company.Region,
                                     company.Province,
                                     company.Barangay,
                                     company.City,
                                     company.category,
                                     company.company_view,

                                     job.id as id_job,
                                     job.job_title,
                                     job.job_description,
                                     job.job_salary,
                                     job.job_day,
                                     job.job_schedule,
                                     job.job_schedule_shift,
                                     job.job_type,
                                     job.job_option,
                                     job.job_gender,
                                     job.date_posted,
                                     job.date_ended,
                                     job.company_id,
                                     job.job_status,
                                     job.job_requirements,
                                     job.job_category,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Gender = 'male' then 1 end) as male,
                                      count(case when applicant.Gender = 'female' then 1 end) as female,                                     
                                      count(applicant.count) as applicant_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id 
                                     LEFT JOIN applicant ON applicant.job_id = job.id and job.id = applicant.job_id

                                    WHERE (job.date_ended >= '$date' and job.job_status = 'Active') and company.status = 'Active' and company.id = '".$_REQUEST['id']."' group BY job.job_title order by job.id desc ");


  while($row = mysqli_fetch_array($query)){

  $date_posted = date("F d, Y", strtotime ($row['date_posted']));

  ?>   

<div class="list--list-item">
<div class="row">

        <div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" style="box-shadow: none; border-radius: 5PX; border: none;">
        <div class="card-body ps-lg-0 ms-3">
        <a href="job-company-info.php?id=<?php echo $row['id_job'];?>" style="text-decoration: none; color: black;">


                    <h4 class="job_title" style="font-size: 15px;">  <?php echo $row['job_title'];?>

                    <?php
                    
                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d');
                    $date_ended = $row['date_ended'];

                    if ($date_ended >= $date) {

                      echo "<i class='fa fa-circle ms-2' style='color:green; font-size: 6px;'></i>";

                    } else {

                      echo "<i class='fa fa-circle ms-2' style='color:#333; font-size: 6px;'></i>";
                    }
                    
                    ?>

                    </h4>
 
                    <h6 style="font-size: 14px; color: black;"> <?php echo $row['City'];?>, <?php echo $row['Province'];?> </h6>  

                    <div hidden>
                    <p class="Region"><?php echo $row['Region'];?></p>
                    <p class="Province"><?php echo $row['Province'];?></p>
                    <p class="City"><?php echo $row['City'];?></p>
                    <p class="Barangay"><?php echo $row['Barangay'];?></p>
                    </div>

                    <h6 class="mt-0">
                    <?php

                    $price = ($row['job_salary']);
                    $type = ($row['job_type']);

                    if ($price == 'Hide' && $type == $type) {

                      echo "
                            <span class='job_type_new' style='font-size: 13px; font-weight: normal; color: black;'> $type, </span>";

                    } else {

                      echo "<span style='font-size: 13px; font-weight: normal; color: black;'> $price, </span>
                            <span style='margin-left: 1%; font-size: 13px; font-weight: normal; color: black;'> $type, </span>";

                    }
                    
                    ?>

                    <span class="job_option" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_option'];?> , </span>
                    <span style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_day'];?> , </span>
                    <span style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_schedule'];?> , </span>
                      <!-- Shift -->
                      <?php if ($row['job_schedule_shift'] == 'Both') { ?>
                      <span class="job_schedule_shift" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> Day / Night Shift </span>
                      <?php } else { ?>
                      <span class="job_schedule_shift" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_schedule_shift'];?> , </span>
                      <?php  } ?>

                      <!-- GENDER -->
                      <?php if ($row['job_gender'] == 'Both') { ?>
                      <span class="gender" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> Male / Female </span>
                      <?php } else { ?>
                      <span class="gender" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_gender'];?> </span>
                      <?php  } ?>

                    </h6>

                    <p style='font-size: 13px; font-weight: normal; color: black;'> Posted on . <?php echo $date_posted ?> </p>

          </a>
          </div>
          </div>

</div>
</div>

<?php } ?>

</div>




  <?php

  include 'database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');

  $query = mysqli_query($con, "SELECT count(count) as job_count, date_ended, job_status FROM job 
  WHERE (date_ended >= '$date' and job_status = 'Active') order by job.id desc");
  while($row = mysqli_fetch_array($query)){ 

     $job_count = $row['job_count'];

  ?>
 
  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } else { ?>

  <?php } } ?>  




</div>   
</div>
</div>
<!-- END -->

</div>
<!-- END FILTER -->


<script type="text/javascript">
 var options = {
  valueNames: [

    'Region',
    'Province',
    'City',
    'Barangay',

    'job_title',
    'job_type',
    'job_option',
    'job_schedule_shift',
    'gender'
  ],
  page: 5,
  pagination: true
};
var userList = new List('users', options);

function resetList(){
  userList.search();
  userList.filter();
  userList.update();
  $(".filter-all").prop('selected', true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList(){
  var values_type = $("select[name=job_type]").val();
  var values_option = $("select[name=job_option]").val();
  var values_shift = $("select[name=job_schedule_shift]").val();
  var values_gender = $("select[name=gender]").val();

  userList.filter(function (item) {
    var Filter_type = false;
    var Filter_option = false;
    var Filter_shift = false;
    var Filter_gender = false;

    if(values_type == "all")
    { 
      Filter_type = true;
    } else {
      Filter_type = item.values().job_type.indexOf(values_type) >= 0;
    }

    if(values_option == "all")
    { 
      Filter_option = true;
    } else {
      Filter_option = item.values().job_option.indexOf(values_option) >= 0;
    }

    if(values_shift == "all")
    { 
      Filter_shift = true;
    } else {
      Filter_shift = item.values().job_schedule_shift.indexOf(values_shift) >= 0;
    }

    if(values_gender == "all")
    { 
      Filter_gender = true;
    } else {
      Filter_gender = item.values().gender.indexOf(values_gender) >= 0;
    }

    return Filter_gender && Filter_shift && Filter_option && Filter_type 

  });

}
                               
$(function(){
  //updateList();
  $("select[name=job_type]").change(updateList);
  $('select[name=job_option]').change(updateList);
  $('select[name=job_schedule_shift]').change(updateList);
  $('select[name=gender]').change(updateList);

  userList.on('updated', function (list) {
    if (list.matchingItems.length > 0) {
      $('.no-result').hide()
    } else {
      $('.no-result').show()
    }
  });
});
</script>








<!-- START -->
<div class="container mt-5">
<div class="row">

  <?php

  include 'database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');

  $query = mysqli_query($con, "SELECT count(count) as job_count, date_ended FROM job WHERE date_ended >= '$date' and  company_id = '".$_REQUEST['id']."' order by job.id desc");
  while($row = mysqli_fetch_array($query)){ 

     $job_count = $row['job_count'];

  ?>
 
  <?php 

  if($job_count <= 0) {  ?>


  <?php } else { ?>

  <h5 class='text-black' style="color: black; font-size: 18px;"> Search jobs by category </h5>


  <?php } } ?>  



  <?php

  include 'database/database.php';

  $query = mysqli_query($con,"SELECT company.id,
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
                                     job.company_id as com_id,
                                     count(case when job.count = 1 then 1 end) as job_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id 
                                     LEFT JOIN job_category ON job_category.job_category = job.job_category 

  WHERE (job.date_ended >= '$date' and job.job_status = 'Active') and company.status = 'Active' and company.id = '".$_REQUEST['id']."' group by job.job_category  ");

  while($row = mysqli_fetch_array($query)){

   $com_id = $row['com_id'];

  ?>  

<?php if($com_id == '') { ?>

<?php } else { ?>

<div class="col-lg-4 mt-2">
<div class="info-horizontal border-radius-xl d-block d-block p-0 h-100 " style="background: none ;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

                <div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-2" style="box-shadow: none; border-radius: 5PX; border: none;">
                <div class="card-body ps-lg-0 ms-3">
                <a href="job.php" style="text-decoration: none; color: black;">

                    <h4 class="job_category" style="font-size: 15px;"><?php echo $row['job_category'];?></h4>

                    <h5 class="company" style="font-size: 13px; color: black;"> Total Jobs -    
                    <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['job_count'];?></span>
                    </h5>   
                    
              </a>
              </div>
              </div>

        </div>
        </div>

  </div>
  </div>
 
 <?php } } ?> 

  <?php

  include 'database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');

  $query = mysqli_query($con, "SELECT count(count) as job_count, date_ended, job_status, company_id FROM job 
  WHERE (date_ended >= '$date' and job_status = 'Active') and company_id = '".$_REQUEST['id']."' order by job.id desc");
  while($row = mysqli_fetch_array($query)){ 

   $company_id = $row['company_id'];

  ?>  

  <?php if($company_id == '') {  ?>

  <?php } else { ?>

  <div class='mt-4'>
    <a href='job.php' style='text-decoration: none;' class='text-secondary ../assets/icon-move-right'> 
       <h5 style='font-size: 13px; font-weight: normal; color: #000066;'> See More 
        <i style='color: #000066;' class='fas fa-arrow-right ms-2'></i>
      </h5> 
    </a>
  </div>

 <?php } } ?> 



</div>
</div> 
<!-- END  -->










</div>
<!-- VIEW -->
























<!-- JOBS -->
<div class="tab-pane fade mt-4" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" > 

<!-- START -->
<div id="new_jobs">
<div class="container">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by Job Position. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-10 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_../assets/icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" onclick="resetList_new();"> <i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>    

              <div style="text-align: right;">
                <select class="col-lg-2 col-md-12 col-12 mt-2 card-profile" name="job_type_new" 
                style="cursor: pointer; border: none;  color: black; font-size: 13px; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected > All Job type </option>
                  <option class="filter" value="On Site" style=" color: black; font-size: 13px;"> On Site </option>
                  <option class="filter" value="Work From Home" style=" color: black; font-size: 13px;"> Work From Home </option>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="job_schedule_shift_new" 
                style="cursor: pointer; border: none;  color: black; font-size: 13px; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Shift type </option>
                  <option class="filter" value="Day Shift" style=" color: black; font-size: 13px;"> Day Shift </option>
                  <option class="filter" value="Night Shift" style=" color: black; font-size: 13px;"> Night Shift </option>
                </select>

                <select class="col-lg-3 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="job_option_new" 
                style="cursor: pointer; border: none;  color: black; font-size: 13px; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Job option type </option>

                  <?php

                  include 'database/database.php';

                  $query = mysqli_query($con,"SELECT * FROM job_option ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                  <option class="filter" value="<?php echo $row['job_option'];?>" style="color: black;" > <?php echo $row['job_option']; ?> </option>

                  <?php } ?>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="gender_new" 
                style="cursor: pointer; border: none;  color: black; font-size: 13px; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>

              </div>


</div>
</div>
<!-- END -->











<!-- Result -->
<div class="container">
<div class="row">

<div class="col-lg-12 col-12 col-md-12" style="background: none;">
<div class="card card-profile mt-lg-4 ms-2" style="background: none;  box-shadow: none; border: none;">
<div class="list">

  <?php

  include 'database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d, h:i:s A');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.images,
                                     company.company,
                                     company.Region,
                                     company.Province,
                                     company.Barangay,
                                     company.City,
                                     company.category,
                                     company.company_view,

                                     job.id as id_job,
                                     job.job_title,
                                     job.job_description,
                                     job.job_salary,
                                     job.job_day,
                                     job.job_schedule,
                                     job.job_schedule_shift,
                                     job.job_type,
                                     job.job_option,
                                     job.job_gender,
                                     job.date_posted,
                                     job.date_ended,
                                     job.company_id,
                                     job.job_status,
                                     job.job_requirements,
                                     job.job_category,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Gender = 'male' then 1 end) as male,
                                      count(case when applicant.Gender = 'female' then 1 end) as female,                                     
                                      count(applicant.count) as applicant_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id 
                                     LEFT JOIN applicant ON applicant.job_id = job.id and job.id = applicant.job_id

                                     WHERE (job.date_ended >= '$date' and job.job_status = 'Active') and company.status = 'Active' and company.id = '".$_REQUEST['id']."' group BY job.job_title order by job.id desc ");


  while($row = mysqli_fetch_array($query)){

  $date_posted = date("F d, Y", strtotime ($row['date_posted']));

  ?>   

<div class="list--list-item">
<div class="row">

        <div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" style="box-shadow: none; border-radius: 5PX; border: none; ">
        <div class="card-body ps-lg-0 ms-3">
        <a href="job-company-info.php?id=<?php echo $row['id_job'];?>" style="text-decoration: none; color: black;">

                    <h4 class="job_title_new" style="font-size: 15px;"> <?php echo $row['job_title'];?> 

                    <?php
                    
                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d');
                    $date_ended = $row['date_ended'];

                    if ($date_ended >= $date) {

                      echo "<i class='fa fa-circle ms-2' style='color:green; font-size: 6px;'></i>";

                    } 
                    
                    ?>

                    </h4>
 
                     <h6 style="font-size: 14px; color: black;"> <?php echo $row['City'];?>, <?php echo $row['Province'];?> </h6>  

                     <div hidden>
                    <p class="Region_new"><?php echo $row['Region'];?></p>
                    <p class="Province_new"><?php echo $row['Province'];?></p>
                    <p class="City_new"><?php echo $row['City'];?></p>
                    <p class="Barangay_new"><?php echo $row['Barangay'];?></p>
                    </div>

                    <h6 class="mt-0">
                    <?php

                    $price = ($row['job_salary']);
                    $type = ($row['job_type']);

                    if ($price == 'Hide' && $type == $type) {

                      echo "
                            <span class='job_type_new' style='font-size: 13px; font-weight: normal; color: black;'> $type, </span>";

                    } else {

                      echo "<span style='font-size: 13px; font-weight: normal; color: black;'> $price, </span>
                            <span style='margin-left: 1%; font-size: 13px; font-weight: normal; color: black;'> $type, </span>";

                    }
                    
                    ?>

                    <span class="job_option_new" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_option'];?> , </span>
                    <span style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_day'];?> , </span>
                    <span style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_schedule'];?> , </span>
                      <!-- Shift -->
                      <?php if ($row['job_schedule_shift'] == 'Both') { ?>
                      <span class="job_schedule_shift_new" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> Day / Night Shift </span>
                      <?php } else { ?>
                      <span class="job_schedule_shift_new" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_schedule_shift'];?> , </span>
                      <?php  } ?>

                      <!-- GENDER -->
                      <?php if ($row['job_gender'] == 'Both') { ?>
                      <span class="gender_new" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> Male / Female </span>
                      <?php } else { ?>
                      <span class="gender_new" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_gender'];?> </span>
                      <?php  } ?>

                    </h6>

                    <p style='font-size: 13px; font-weight: normal; color: black;'> Posted on . <?php echo $date_posted ?> </p>

          </a>
          </div>
          </div>

</div>
</div>

<?php } ?>

</div>



  <?php

  include 'database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');

  $query = mysqli_query($con, "SELECT count(count) as job_count, date_ended, job_status FROM job 
  WHERE (date_ended >= '$date' and job_status = 'Active') order by job.id desc");
  while($row = mysqli_fetch_array($query)){ 

     $job_count = $row['job_count'];

  ?>
 
  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } else { ?>

  <?php } } ?>  



</div>   
</div>
</div>
</div>
<!-- END -->

</div>
<!-- END FILTER -->

<script type="text/javascript">
 var options = {
  valueNames: [

    'Region_new',
    'Province_new',
    'City_new',
    'Barangay_new',

    'job_title_new',
    'job_type_new',
    'job_option_new',
    'job_schedule_shift_new',
    'gender_new'
  ],
  page: 5,
  pagination: true
};
var userList_new = new List('new_jobs', options);

function resetList_new(){
  userList_new.search();
  userList_new.filter();
  userList_new.update();
  $(".filter-all").prop('selected', true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList_new(){
  var values_type = $("select[name=job_type_new]").val();
  var values_option = $("select[name=job_option_new]").val();
  var values_shift = $("select[name=job_schedule_shift_new]").val();
  var values_gender = $("select[name=gender_new]").val();

  userList_new.filter(function (item_new) {
    var Filter_type = false;
    var Filter_option = false;
    var Filter_shift = false;
    var Filter_gender = false;

    if(values_type == "all")
    { 
      Filter_type = true;
    } else {
      Filter_type = item_new.values().job_type_new.indexOf(values_type) >= 0;
    }

    if(values_option == "all")
    { 
      Filter_option = true;
    } else {
      Filter_option = item_new.values().job_option_new.indexOf(values_option) >= 0;
    }

    if(values_shift == "all")
    { 
      Filter_shift = true;
    } else {
      Filter_shift = item_new.values().job_schedule_shift_new.indexOf(values_shift) >= 0;
    }

    if(values_gender == "all")
    { 
      Filter_gender = true;
    } else {
      Filter_gender = item_new.values().gender_new.indexOf(values_gender) >= 0;
    }

    return Filter_gender && Filter_shift && Filter_option && Filter_type 

  });

}
                               
$(function(){
  //updateList_new();
  $("select[name=job_type_new]").change(updateList_new);
  $('select[name=job_option_new]').change(updateList_new);
  $('select[name=job_schedule_shift_new]').change(updateList_new);
  $('select[name=gender_new]').change(updateList_new);

  userList_new.on('updated', function (list_new) {
    if (list_new.matchingItems.length > 0) {
      $('.no-result').hide()
    } else {
      $('.no-result').show()
    }
  });
});
</script>


</div>
<!-- JOBS-->



</div>
<!-- HEAD A -->




</div>
</div>
</div>

</section>
<!-- SECTION -->



</body>
</html>