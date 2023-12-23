<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - My Jobs </title>

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
          <h4 class="" style="color: black; "> MY JOBS </h4>
        </div>

</div>
</div>


<!-- START -->
<div id="new_jobs">

<div class="container mt-3">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by work position company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work or company and status" style="color: black; font-size: 13px;">
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
$date = date('Y-m-d');

  $query = mysqli_query($con,"SELECT account.id,

                                     company.id,
                                     company.company,
                                     company.Province,
                                     company.images,

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
                                     applicant.Status,
                                     applicant.Status_remove,
                                     applicant.admin_pulled_date,
                                     applicant.Date_Posted

                                      FROM account JOIN company
                                      JOIN job ON job.company_id = company.id
                                      JOIN applicant ON applicant.Account_Id = account.id and job.id = applicant.job_id 
                                      WHERE account.id = '$id_acc' order by applicant.id desc ");


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
  <?php
      
      $id = ($row['id']);
      $pulled = ($row['Status']);
      $remove = ($row['Status_remove']);

       if ($pulled == '0') {

              if ($pulled == '0') {

                    echo "<div class='app-card-actions mt-2'>
                            <div class='dropdown' style='float: right; text-align: center;'>
                              <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shodow: none'>
                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>
                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                      <li>
                                        <a class='dropdown-item' href='#' >
                                           <span class='ms-2'> Your application is all ready pulled </span> 
                                        </a>
                                      </li>  

                                </ul>

                              </div>
                            </div>";

              }

                } else if ($remove == '0') {

                    echo "<div class='app-card-actions mt-2'>
                            <div class='dropdown' style='float: right; text-align: center;'>
                              <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shodow: none'>
                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>
                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                      <li>
                                        <a class='dropdown-item' href='active/remove_applicant_user.php?id=$id' onclick='return remove_applicant_user()'>
                                           <span class='ms-1'><i class='fa fa-close' style='color:#333; font-size: 15px'></i></span>
                                           <span class='ms-2'> Remove this job </span> 
                                        </a>
                                      </li>  

                                </ul>

                              </div>
                            </div>";

                 } else {

                    echo "<div class='app-card-actions mt-2'>
                            <div class='dropdown' style='float: right; text-align: center;'>
                               <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shodow: none'>
                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>
                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                      <li>
                                        <a class='dropdown-item' href='active/withdaw_applicant_user.php?id=$id' onclick='return withdaw_applicant_user()'>
                                           <span class='ms-1'><i class='fa fa-close' style='color:#333; font-size: 15px'></i></span>
                                           <span class='ms-2'> Withdaw this job </span> 
                                        </a>
                                      </li>   

                                </ul>


                              </div>
                            </div>";


                      }


                  ?>

                  <script>
                      function withdaw_applicant_user() {
                        return confirm ('Are you sure you want to withdaw this job');
                      }
                  </script>

                  <script>
                      function remove_applicant_user() {
                        return confirm ('Are you sure you want to remove');
                      }
                  </script>  


                  <a href="my-job-info.php?id=<?php echo $row['id_job'];?>" style="text-decoration: none; color: black;">


                    <h4 class="job_title_new" style="font-size: 15px;">  <?php echo $row['job_title'];?>

                    <?php 

                        if ($row['Status'] == '0' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Pulled </span> ";

                        } else if ($row['Status'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> New </span> ";

                        } else if ($row['Status_remove'] == '0') {

                          echo "<span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Reject </span> ";

                        } else {

                          echo "<span class='ms-2' style='background: #333; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Hide </span> ";

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

                    <p style='font-size: 13px; font-weight: normal; color: black;'> Posted on . <?php echo $date_posted ?></p>

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
  $query = mysqli_query($con,"SELECT count(count) as my_job_count FROM applicant WHERE Account_Id = '$id_acc'  ");

  while($row = mysqli_fetch_array($query)){

   $my_job_count = $row['my_job_count'];

  ?>  

  <?php 

  if($my_job_count == 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No my job available </h5>

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
    'job_schedule_shift_new'
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


    return Filter_shift && Filter_option && Filter_type 

  });

}
                               
$(function(){
  //updateList_new();
  $("select[name=job_type_new]").change(updateList_new);
  $('select[name=job_option_new]').change(updateList_new);
  $('select[name=job_schedule_shift_new]').change(updateList_new);

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
</div>
</div>

</section>




</body>
</html>