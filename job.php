<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- TITLE -->
  <title> PESO - Find Job </title>

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

<div class="container">
<div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; ">  FIND JOBS </h4>
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
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work or company" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_../assets/icon form-label-group my-2">
                      <input type="text" class="location_../assets/icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
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

                  include 'database/database.php';

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

include 'database/database.php';

date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

$query = mysqli_query($con, "SELECT * FROM company LEFT JOIN job ON job.company_id = company.id 

WHERE (job.date_ended >= '$date' and job.job_status = 'Active') and company.status = 'Active' order by job.id desc");
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

                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='images/default-avatar.png' alt='image'>

                     <?php  } else { ?>
                      
                            <img class="ceo_image w-100 border-radius-md shadow-lg" src='images/<?php echo $row['images'] ;?>' alt='image'>

                     <?php } ?>
                  </div>
              </div>

              <div class="col-lg-11 col-md-12 col-12">
              <div class="card-body pe-md ps-lg-0">
              <a href="job-info.php?id=<?php echo $row['id'];?>" style="text-decoration: none; color: black; cursor: pointer;">


                    <h4 class="job_title_new" style="font-size: 15px;">  <?php echo $row['job_title'];?>

                    <?php
                    
                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d');
                    $date_ended = $row['date_ended'];

                    if ($date_ended >= $date) {

                      echo "<i class='fa fa-circle ms-2' style='color:green; font-size: 6px;'></i>";

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


  <?php

  include 'database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');

  $query = mysqli_query($con, "SELECT count(count) as job_count, date_ended FROM job WHERE date_ended >= '$date' order by job.id desc");
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
</div>
</div>

</section>








</body>
</html>