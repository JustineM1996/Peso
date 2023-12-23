<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - Find Job </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
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


</head>

<body>

<!-- START -->
<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-10 ms-lg-7">



<div class="container">
<div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> FIND JOBS </h4>
        </div>

<div class="nav-wrapper position-relative mt-2">
    <ul class="nav nav-fill nav-pills mb-3 col-lg-12" id="pills-tab" role="tablist" style="background: none;">

      <li class="nav-item col-lg-3 col-1 col-md-1" >
        <p  style="border-radius: 3px; font-size: 12px; box-shadow: none;" disabled> </p>
      </li>

      <li class="nav-item ms-lg-1 col-lg-3 col-1 col-md-1">
        <p  style="border-radius: 3px; font-size: 12px; box-shadow: none;" disabled> </p>
      </li>

      <li class="nav-item col-lg-1 ms-lg-1 ms-1 col-4 col-md-4" role="presentation">
        <button class="nav-link active btn btn-secondary" id="pills-new-tab" data-bs-toggle="pill" data-bs-target="#pills-new" type="button" role="tab" aria-controls="pills-new" aria-selected="true"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> NEW JOBS  </button>
      </li>

      <li class="nav-item ms-lg-1 ms-1 col-lg-1 col-4 col-md-4" role="presentation">
        <button class="nav-link btn btn-secondary" id="pills-ended-tab " data-bs-toggle="pill" data-bs-target="#pills-ended" type="button" role="tab" aria-controls="pills-ended" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> END JOBS </button>
      </li>

      <li class="nav-item ms-lg-1 ms-1 col-lg-1 col-4 col-md-4" role="presentation">
        <button class="nav-link btn btn-secondary" id="pills-analysis-tab " data-bs-toggle="pill" data-bs-target="#pills-analysis" type="button" role="tab" aria-controls="pills-analysis" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> ANALYSIS </button>
      </li>

    </ul>
</div>

</div>
</div>


<!-- HEAD B -->
<div class="tab-content" id="job-tabContent">

<!-- NEW JOBS-->
<div class="tab-pane fadeshow active" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">

<!-- START -->
<div id="new_jobs">

<div class="container">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by work position company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work or company" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_icon form-label-group my-2">
                      <input type="text" class="location_icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
                    </div>
                  </li>                              

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" onclick="resetList_new();"> <i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

              <div style="text-align: right;">
                <select class="col-lg-2 col-md-12 col-12 mt-2 card-profile" name="job_type_new" 
                style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected > All Set up </option>
                  <option class="filter" value="On Site" style=" color: black; font-size: 13px;"> On Site </option>
                  <option class="filter" value="Work From Home" style=" color: black; font-size: 13px;"> Work From Home </option>
                </select>

                <select class="col-lg-2 ms-lg-1 ms-0 col-md-12 col-12 mt-2 card-profile" name="job_schedule_shift_new"\
                style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Shift type </option>
                  <option class="filter" value="Day Shift" style=" color: black; font-size: 13px;"> Day Shift </option>
                  <option class="filter" value="Night Shift" style=" color: black; font-size: 13px;"> Night Shift </option>
                </select>

                <select class="col-lg-3 ms-lg-1 ms-0 col-md-12 col-12 mt-2 card-profile" name="job_option_new" 
                style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Job option type </option>

                  <?php

                  include '../database/database.php';

                  $query = mysqli_query($con,"SELECT * FROM job_option ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                  <option class="filter" value="<?php echo $row['job_option'];?>" style="color: black;" > <?php echo $row['job_option']; ?> </option>

                  <?php } ?>
                </select>

                <select class="col-lg-2 ms-lg-1 ms-0 col-md-12 col-12 mt-2 card-profile" name="gender_new" 
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

  include '../database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d, h:i:s A');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.company,
                                     company.Province,
                                     company.images,
                                     company.status,

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
                                     job.company_status,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,
                                     applicant.company_status,

                                      count(case when applicant.Gender = 'male' then 1 end) as male,
                                      count(case when applicant.Gender = 'female' then 1 end) as female,                                     
                                      count(applicant.count) as applicant_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     LEFT JOIN applicant ON applicant.job_id = job.id and job.id = applicant.job_id and applicant.company_id = company.id and company.status = applicant.company_status


                                     WHERE (job.date_ended >= '$date' and job.job_status = 'Active') and company.status = 'Active'  group by job.id order by job.id desc ");


  while($row = mysqli_fetch_array($query)){

  $date_posted = date("F d, Y", strtotime ($row['date_posted']));

  ?>   

<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3"
     style="box-shadow: none; border-radius: 5PX; border: none;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

              <div class="col-lg-1 col-md-3 col-3">
                  <div class="card-body p-0 pe-md ps-lg-0 mt-4"> 
                      <?php if ($row['images'] == '') { ?>

                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='../images/default-avatar.png' alt='image'>

                     <?php  } else { ?>
                      
                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='<?php echo $row['images'] ;?>' alt='image'>

                     <?php } ?>
                  </div>
              </div>


              <div class="col-lg-11 col-md-12 col-12">
              <div class="card-body pe-md ps-lg-0">
              
                  <div class="dropdown" style="float: right; text-align: center;">
                    <div class="dropdown-toggle no-toggle-arrow btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none"><?php include 'icon/three_dot.php'?></div>

                      <ul class="dropdown-menu" style="font-size: 13px; color: black;">                             
                          <li> 
                            <a class="dropdown-item" href="job-access.php?edit_job=<?php echo $row['id_job'];?>"  onclick='return edit()'>
                               <span><?php include 'icon/edit.php'?></span>
                               <span> Update job info </span> 
                            </a>
                          </li>  
                          <li> 
                            <a class="dropdown-item" href="job-access.php?end_job=<?php echo $row['id_job']; ?>" onclick='return checkdelete()'>
                               <span><i class="bi bi-align-end"></i></span>
                               <span class="ms-2"> End job </span>
                            </a>
                          </li>
                      </ul>

                    </div>

                  <script>
                      function edit() {
                        return confirm ('Are you sure you want to update this Job');
                      }
                  </script>

                  <script>
                      function checkdelete() {
                        return confirm ('Are you sure you want to end this Job');
                      }
                  </script>

                    <a href="job-info.php?id=<?php echo $row['id_job'];?>" style="text-decoration: none; color: black; cursor: pointer;">
                    <h4 class="job_title_new" style="font-size: 15px;">  <?php echo $row['job_title'];?> 

                    <?php

                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d');
                    $date_ended = $row['date_ended'];
                    $job_status = $row['job_status'];

                    if ($job_status == 'Active' and $date_ended >= $date) {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> $job_status </span></td>";

                    } else if ($job_status == 'Inactive' and $date_ended == '0000-00-00') {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> $job_status </span></td>";

                    } else if ($job_status == 'Active' and $date_ended <= $date)  {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> Successfull </span></td>";

                    }

                    ?>   

                    </h4>
 

                    <h6 class="company" style="font-size: 15px; color: black;"> <?php echo $row['company'];?> -    
                    <span style="font-weight: normal; font-size: 15px"><?php echo $row['Province'];?></span>
                    </h6>   


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

                    <h5 style="font-size: 13px; color: black;"> Applicant -
                    <span style="font-weight: normal; font-size: 13px"><?php echo $row['applicant_count'];?> </span>
                    <span style="font-weight: normal; font-size: 13px" class="ms-2"> Male - <?php echo $row['male'];?> </span>
                    <span style="font-weight: normal; font-size: 13px"> Female - <?php echo $row['female'];?> </span>
                    </h5>

                </a> 
                </div>
                </div>

          </div>
          </div>

</div>
</div>

<?php } ?>  

</div>

<div class="no-result mt-3">No Results</div>
<div class="pagination mt-3"></div>

  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as job_count, date_ended FROM job WHERE company_status = 'Active' and
                                                                                          (date_ended >= '$date' and job_status = 'Active')   ");

  while($row = mysqli_fetch_array($query)){

   $job_count = $row['job_count'];

  ?>  

  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } }  ?>  

</div>
</div>
</div>
<!-- END -->

</div>
<!-- END FILTER -->

<script type="text/javascript">
 var options = {
  valueNames: [
    'company',

    'Region',
    'Province',
    'City',
    'Barangay',

    'job_title_new',
    'job_type_new',
    'job_option_new',
    'job_schedule_shift_new',
    'gender_new'
  ],
  page: 8,
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

$(function() {
    $(selector).pagination('selectPage', pageNumber);
});

</script>


</div>
<!-- NEW JOBS-->



























<!-- END JOBS -->
<div class="tab-pane fade" id="pills-ended" role="tabpanel" aria-labelledby="pills-ended-tab">

<div id="end_jobs">

<div class="container">
<div class="row">

          <h5 class="text-black" style="color: black; font-size: 18px;"> You may search by work position company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work or company" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_icon form-label-group my-2">
                      <input type="text" class="location_icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
                    </div>
                  </li>                              

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" onclick="resetList_end();"> <i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

              <div style="text-align: right;">
                <select class="col-lg-2 col-md-12 col-12 mt-2 card-profile" name="job_type_end" style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected > All Set up  </option>
                  <option class="filter" value="On Site" style=" color: black; font-size: 13px;"> On Site </option>
                  <option class="filter" value="Work From Home" style=" color: black; font-size: 13px;"> Work From Home </option>
                </select>

                <select class="col-lg-2 ms-lg-1 ms-0 col-md-12 col-12 mt-2 card-profile" name="job_schedule_shift_end" style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Shift type </option>
                  <option class="filter" value="Day Shift" style=" color: black; font-size: 13px;"> Day Shift </option>
                  <option class="filter" value="Night Shift" style=" color: black; font-size: 13px;"> Night Shift </option>
                </select>

                <select class="col-lg-3 ms-lg-1 ms-0 col-md-12 col-12 mt-2 card-profile" name="job_option_end" style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Job option type </option>

                  <?php

                  include '../database/database.php';

                  $query = mysqli_query($con,"SELECT * FROM job_option ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                  <option class="filter" value="<?php echo $row['job_option'];?>" style="color: black;" > <?php echo $row['job_option']; ?> </option>

                  <?php } ?>
                </select>

                <select class="col-lg-2 ms-lg-1 ms-0 col-md-12 col-12 mt-2 card-profile" name="gender_end" style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>
              </div>

</div>
</div>
<!-- END -->

<!-- Result -->
<div class="container mt-4">
<div class="row">

<div class="col-lg-12 col-12 col-md-12 card" style="box-shadow: none; border: none;">
<div class="list">

  <?php

  include '../database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.company,
                                     company.Province,
                                     company.images,
                                     company.status,

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
                                     job.company_status,
                                     job.end_job,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,
                                     applicant.company_status,

                                      count(case when applicant.Gender = 'male' then 1 end) as male,
                                      count(case when applicant.Gender = 'female' then 1 end) as female,                                     
                                      count(applicant.count) as applicant_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     LEFT JOIN applicant ON applicant.job_id = job.id and job.id = applicant.job_id and applicant.company_id = company.id and  company.status = applicant.company_status

                                     WHERE (job.date_ended <= '$date' || job.date_ended = null || job.date_ended >= '$date'  and job.job_status = 'Inactive') and company.status = 'Active'  group by job.id order by job.id desc ");


  while($row = mysqli_fetch_array($query)){


  ?>   

<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3"
     style="box-shadow: none; border-radius: 5PX; border: none;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

              <div class="col-lg-1 col-md-3 col-3">
                  <div class="card-body p-0 pe-md ps-lg-0 mt-4"> 
                      <?php if ($row['images'] == '') { ?>

                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='../images/default-avatar.png' alt='image'>

                     <?php  } else { ?>
                      
                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='<?php echo $row['images'] ;?>' alt='image'>

                     <?php } ?>
                  </div>
              </div>
              
              <div class="col-lg-11 col-md-12 col-12">
              <div class="card-body pe-md ps-lg-0">

                <div class="app-card-actions mt-1" hidden>
                  <div class="dropdown" style="float: right; text-align: center;">
                    <div class="dropdown-toggle no-toggle-arrow btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none"><?php include 'icon/three_dot.php'?></div>

                      <ul class="dropdown-menu" style="font-size: 13px; color: black;">                             
                          <li> 
                            <a class="dropdown-item" href="job-access.php?edit_job=<?php echo $row['id_job'];?>"  onclick='return edit()'>
                               <span><?php include 'icon/edit.php'?></span>
                               <span> Update job info </span> 
                            </a>
                          </li> 

                    <?php if ($row['date_ended'] == '0000-00-00') { ?>

                          <li> 
                            <a class="dropdown-item" href="job-access.php?edit_job=<?php echo $row['id_job'];?>"  onclick='return editdate()'>
                               <span><i class="bi bi-align-start"></i></span>
                               <span class="ms-2"> Start job </span>
                            </a>
                          </li>

                     <?php  } else { ?>
                      
                          <li> 
                            <a class="dropdown-item" href="job-access.php?start_job=<?php echo $row['id_job']; ?>" onclick='return checkdelete()'>
                               <span><i class="bi bi-align-start"></i></span>
                               <span class="ms-2"> Start job </span>
                            </a>
                          </li>

                     <?php } ?>


                      </ul>

                    </div>
                  </div>  

                  <script>
                      function edit() {
                        return confirm ('Are you sure you want to update this Job');
                      }
                  </script>

                  <script>
                      function checkdelete() {
                        return confirm ('Are you sure you want to start this Job');
                      }
                  </script>

                  <script>
                      function editdate() {
                        return confirm ('Update date ended before start job');
                      }
                  </script>

                    <a href="job-info.php?id=<?php echo $row['id_job'];?>" style="text-decoration: none; color: black; cursor: pointer;">
                    <h4 class="job_title_end" style="font-size: 15px;">  <?php echo $row['job_title'];?>
                    <?php

                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d');
                    $date_ended = $row['date_ended'];
                    $job_status = $row['job_status'];

                    if ($job_status == 'Active' and $date_ended >= $date) {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> $job_status </span></td>";

                    } else if ($job_status == 'Inactive' and $date_ended == '0000-00-00') {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> $job_status </span></td>";

                    } else if ($job_status == 'Active' and $date_ended <= $date)  {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> Successfull </span></td>";

                    }

                    ?>   
                    </h4>

                    <h6 class="company" style="font-size: 15px; color: black;"> <?php echo $row['company'];?> -    
                    <span style="font-weight: normal; font-size: 15px"><?php echo $row['Province'];?></span>
                    </h6>   

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

                    if ($price == 'hide' && $type == $type) {

                      echo "<span style='font-size: 13px; font-weight: normal; color: black;'> $price, </span>
                            <span class='job_type_end' style='margin-left: 1%; font-size: 13px; font-weight: normal; color: black;'> $type, </span>";

                    } else {

                      echo "<span style='font-size: 13px; font-weight: normal; color: black;'> $type, </span>";

                    }
                    
                    ?>

                    <span class="job_option_end" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_option'];?> , </span>
                    <span style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_day'];?> , </span>
                    <span style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_schedule'];?> , </span>
                      <!-- Shift -->
                      <?php if ($row['job_schedule_shift'] == 'Both') { ?>
                      <span class="job_schedule_shift_end" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> Day / Night Shift </span>
                      <?php } else { ?>
                      <span class="job_schedule_shift_end" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_schedule_shift'];?> , </span>
                      <?php  } ?>

                      <!-- GENDER -->
                      <?php if ($row['job_gender'] == 'Both') { ?>
                      <span class="gender_end" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> Male / Female </span>
                      <?php } else { ?>
                      <span class="gender_end" style="margin-left: 1%; font-size: 13px; font-weight: normal; color: black;"> <?php echo $row['job_gender'];?> </span>
                      <?php  } ?>
                    </h6>

                    <?php

                    $date_posted_end = date("F d, Y", strtotime ($row['date_posted']));
                    $date_ended_end = date("F d, Y", strtotime ($row['date_ended']));
                    $end_job = date("F d, Y", strtotime ($row['end_job']));

                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d');
                    $date_ended = $row['date_ended'];
                    $job_status = $row['job_status'];

                    if ($job_status == 'Active' and $date_ended >= $date) {

                      echo "<p style='font-size: 13px; font-weight: normal; color: black;'> Posted on . $date_posted_end | Ended . $date_ended_end </p>";

                    } else if ($job_status == 'Inactive' and $date_ended == '0000-00-00') {

                      echo "<p style='font-size: 13px; font-weight: normal; color: black;'> Posted on . $date_posted_end | End job . $end_job </p>";

                    } else if ($job_status == 'Active' and $date_ended <= $date)  {

                      echo "<p style='font-size: 13px; font-weight: normal; color: black;'> Posted on . $date_posted_end | Ended . $date_ended_end </p>";

                    }

                    ?>

                    <h5 style="font-size: 13px; color: black;"> Applicant -
                    <span style="font-weight: normal; font-size: 13px"><?php echo $row['applicant_count'];?> </span>
                    <span style="font-weight: normal; font-size: 13px" class="ms-2"> Male - <?php echo $row['male'];?> </span>
                    <span style="font-weight: normal; font-size: 13px"> Female - <?php echo $row['female'];?> </span>
                    </h5>

                </a>
                </div>
                </div>

          </div>
          </div>

</div>
</div>

<?php } ?>  

</div>

<div class="no-result mt-3">No Results</div>
<div class="pagination mt-3"></div>

  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as job_count, date_ended FROM job WHERE company_status = 'Active' and (job_status = 'Inactive' and date_ended <= '$date' || date_ended = null || date_ended >= '$date' ) ");

  while($row = mysqli_fetch_array($query)){

   $job_count = $row['job_count'];

  ?>  

  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } }  ?>  

</div>
</div>
</div>
<!-- END -->


  
</div>
<!-- END FILTER -->

<script type="text/javascript">
 var options = {
  valueNames: [
    'company',

    'Region',
    'Province',
    'City',
    'Barangay',

    'job_title_end',
    'job_type_end',
    'job_option_end',
    'job_schedule_shift_end',
    'gender_end'
  ],
  page: 8,
  pagination: true
};
var userList_end = new List('end_jobs', options);

function resetList_end(){
  userList_end.search();
  userList_end.filter();
  userList_end.update();
  $(".filter-all").prop('selected', true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList_end(){
  var values_type = $("select[name=job_type_end]").val();
  var values_option = $("select[name=job_option_end]").val();
  var values_shift = $("select[name=job_schedule_shift_end]").val();
  var values_gender = $("select[name=gender_end]").val();

  userList_end.filter(function (item_end) {
    var Filter_type = false;
    var Filter_option = false;
    var Filter_shift = false;
    var Filter_gender = false;

    if(values_type == "all")
    { 
      Filter_type = true;
    } else {
      Filter_type = item_end.values().job_type_end.indexOf(values_type) >= 0;
    }

    if(values_option == "all")
    { 
      Filter_option = true;
    } else {
      Filter_option = item_end.values().job_option_end.indexOf(values_option) >= 0;
    }

    if(values_shift == "all")
    { 
      Filter_shift = true;
    } else {
      Filter_shift = item_end.values().job_schedule_shift_end.indexOf(values_shift) >= 0;
    }

    if(values_gender == "all")
    { 
      Filter_gender = true;
    } else {
      Filter_gender = item_end.values().gender_end.indexOf(values_gender) >= 0;
    }

    return Filter_gender && Filter_shift && Filter_option && Filter_type 

  });

}
                               
$(function(){
  //updateList_end();
  $("select[name=job_type_end]").change(updateList_end);
  $('select[name=job_option_end]').change(updateList_end);
  $('select[name=job_schedule_shift_end]').change(updateList_end);
  $('select[name=gender_end]').change(updateList_end);

  userList_end.on('updated', function (list_end) {
    if (list_end.matchingItems.length > 0) {
      $('.no-result').hide()
    } else {
      $('.no-result').show()
    }
  });
});

</script>

</div>
<!-- HEAD END -->









<!-- ANALYSIS -->
<div class="tab-pane fade" id="pills-analysis" role="tabpanel" aria-labelledby="pills-analysis-tab">

<!-- START -->
<div class="container mt-4">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">

  <h5 class='text-black' style="color: black; font-size: 18px;"> ANALYSIS </h5>

<!-- NEW -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.company,
                                     company.status,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,
                                     job.company_status,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,
                                     applicant.company_status,

                                      count(case when applicant.count = 1 AND applicant.Gender = 'male'  then 1 end) as new_male,
                                      count(case when applicant.count = 1 AND applicant.Gender = 'female' then 1 end) as new_female,
                                      count(case when applicant.count = 1 then 1 end) as applicant_new

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id and company.status = applicant.company_status
                                     WHERE company.status = 'Active' and job.date_ended >= '$date' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $new = ($row['applicant_new']);
   $new_male = ($row['new_male']);
   $new_female = ($row['new_female']);

  ?>   


<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> New Jobs </h4>
        </div>


  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     job.id,
                                     job.company_id,
                                     job.company_status,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     WHERE company.status = 'Active' and job.date_ended >= '$date' ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];
  ?>   

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Jobs -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $total_jobs;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $total_new_job;?></span>
                    </h6>   
                    
  <?php } ?>

                    <h6 class="company" style="font-size: 13px; color: black;"> Total  applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $new;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $new_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $new_female;?></span>
                    </h6>   

          </div>
          </div>

</div>
</div>

<?php }  ?> 























<!-- PULLED -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,
                                     job.company_status,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,
                                     applicant.company_status,

                                      count(case when applicant.count = 1 AND applicant.Gender = 'male'  then 1 end) as new_male,
                                      count(case when applicant.count = 1 AND applicant.Gender = 'female' then 1 end) as new_female,
                                      count(case when applicant.count = 1 then 1 end) as applicant_new

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id and company.status = applicant.company_status
                                     WHERE company.status = 'Active' and job.date_ended <= '$date'  order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $new = ($row['applicant_new']);
   $new_male = ($row['new_male']);
   $new_female = ($row['new_female']);



  ?>   


<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> End Jobs </h4>
        </div>

  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     job.id,
                                     job.company_id,
                                     job.company_status,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     WHERE company.status = 'Active' and job.date_ended <= '$date' ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];

  ?>   

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Jobs -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $total_jobs;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $total_end_job ;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px"> Succsessfull - <?php echo $total_suc_job ;?></span>
                    </h6>   
                    
  <?php } ?>

                    <h6 class="company" style="font-size: 13px; color: black;"> Total  applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $new;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $new_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $new_female;?></span>
                    </h6>   

          </div>
          </div>

</div>
</div>

<?php }  ?> 

</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->










<!-- START -->
<div class="container mt-4">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">


  <?php

  include '../database/database.php';

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,
                                     applicant.company_status,

                                      count(case when applicant.Gender = 'male' then 1 end) as male,
                                      count(case when applicant.Gender = 'female' then 1 end) as female,
                                      count(case when applicant.count = 1 then 1 end) as applicant_count,

                                     job.id,
                                     job.company_id as com_id,
                                     job.job_category,
                                     job.company_status

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     LEFT JOIN applicant ON  applicant.company_id = company.id and 
                                                             job.id = applicant.job_id and company.status = applicant.company_status
                                                             WHERE company.status = 'Active' ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL APPLICANTS
   $applicant_count = $row['applicant_count'];  

  //COUNT GENDER
   $gender_male = $row['male'];
   $gender_female = $row['female'];


  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Overall Total Report  </h4>
        </div>
           

  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     job.id,
                                     job.company_id,
                                     job.company_status,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                                     FROM company 
                                     JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     WHERE company.status = 'Active' ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];


  ?>     

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Jobs -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $total_jobs;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $total_new_job ;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $total_end_job ;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px"> Succsessfull - <?php echo $total_suc_job ;?></span>
                    </h6>  
                    
  <?php } ?>

                    <h6 class="company " style="font-size: 13px; color: black;"> Total Applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $applicant_count;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $gender_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $gender_female;?></span>
                    </h6>     

                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="job-all-report.php"> Info </a>

          </div>
          </div>

</div>
</div>

<?php } ?>






</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->



</div>
<!-- END NAV -->










</div>






















</div>
</div>
</div>

</section>








</body>
</html>