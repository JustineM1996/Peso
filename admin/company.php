<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- TITLE -->
  <title> PESO - Company </title>

<style type='text/css'>

  .btn-secondary {
    background: none;
    box-shadow: none;
    padding: 2px 10px;
    color: black;
  }                        

  .btn-secondary:hover {
    background-color: lightgray;
    box-shadow: none;
    padding: 2px 10px;
    color: black;
  }

  i {
    background: none;
    box-shadow: none;
    color: black;
  }     

  i:hover {
    background-color: lightgray;
    box-shadow: none ;
    color: black;
  }

  a i {
    background: none;
    box-shadow: none;
    color: black;
  }     

  a i:hover {
    background-color: lightgray;
    box-shadow: none ;
    color: black;
  }

  .btn-danger {
    background: darkred;
    box-shadow: none;
    padding: 10px 35px;
    border-radius: 3px;
    font-size: 12px;
    float: right;
    font-family: sans-serif;
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

.company {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 5px;
  overflow: hidden;}

.company:hover .company_content {
  opacity: .8;
  background: #111;

}

.company:hover .company_image {
  opacity: .8;
  background: #111;

}

.company_image {
  object-fit: cover;
  opacity: 1;
  transition: opacity .2s ease-in-out;
}

.company_content {
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

<body>

<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-10 ms-lg-7">


<div class="container">
<div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> COMPANIES </h4>
        </div>

<div class="nav-wrapper position-relative mt-2">
    <ul class="nav nav-fill nav-pills mb-3 col-lg-12" id="pills-tab" role="tablist" style="background: none;">

      <li class="nav-item col-lg-3 col-1 col-md-1" >
        <p  style="border-radius: 3px; font-size: 12px; box-shadow: none;" disabled> </p>
      </li>

      <li class="nav-item col-lg-1 ms-lg-1 ms-1 col-4 col-md-4" role="presentation">
        <button class="nav-link active btn btn-secondary" id="pills-new-tab" data-bs-toggle="pill" data-bs-target="#pills-new" type="button" role="tab" aria-controls="pills-new" aria-selected="true"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> ACTIVE COMPANIES  </button>
      </li>

      <li class="nav-item ms-lg-1 ms-1 col-lg-1 col-4 col-md-4" role="presentation">
        <button class="nav-link btn btn-secondary" id="pills-ended-tab " data-bs-toggle="pill" data-bs-target="#pills-ended" type="button" role="tab" aria-controls="pills-ended" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> INACTIVE COMPANIES </button>
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
<div id="users">
<div class="container mt-3">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Company" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_../assets/icon form-label-group my-2">
                      <input type="text" class="location_../assets/icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
                    </div>
                  </li>                              

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_../assets/icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" onclick="resetList();"> <i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

            <div style="text-align: right;"> 
                <select class="col-lg-2 col-md-12 col-12 mt-2 card-profile" name="category" style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Categoty </option>
                  <?php
                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM company_category ");
                    while($row = mysqli_fetch_array($query)){
                  ?>
                  <option class="filter" value="<?php echo $row['category'];?>" style="color: black;" > <?php echo $row['category']; ?> </option>
                  <?php } ?>
                </select>
            </div>


</div>
</div>
<!-- END -->


<!-- START -->
<div class="container mt-3">
<div class="row">

<div class="col-lg-12 col-12 col-md-12 card" style="box-shadow: none; border: none;">
<div class="list">


  <?php

  include '../database/database.php';

  $query = mysqli_query($con,"SELECT company.id as com_id,
                                     company.images,
                                     company.company,
                                     company.Region,
                                     company.Province,
                                     company.Barangay,
                                     company.City,
                                     company.category,
                                     company.company_view,
                                     company.status,

                                     job.id,
                                     job.job_title,
                                     job.job_category,
                                     count(case when job.count = 1 then 1 end) as job_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id WHERE company.status = 'Active' GROUP BY company.id order by company.id desc");  

  while($row = mysqli_fetch_array($query)){
  
  ?> 


<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" 
style="box-shadow: none; border-radius: 5PX; border: none;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

        <div class="col-lg-1 col-md-12 col-12 mt-4">
        <div class="p-0 pe-md-0 ">

              <?php if ($row['images'] == '') { ?>

                <a href='company-profile.php?company=<?php echo $row['com_id'];?>'>
                  <div class="company shadow">
                    <img class="company_image w-100 shadow" src='../images/default-avatar.png' alt='image'>
                    <div class="company_content">
                      <span><i class="fas fa-camera" style="color: white;"></i></span>
                      <span style="font-size: 10px;"> Edit profile </span>
                    </div>
                  </div>
                </a>

             <?php  } else { ?>

                <a href='company-profile.php?company=<?php echo $row['com_id'];?>'>
                  <div class="company shadow">
                    <img class="company_image w-100 shadow" src='<?php echo $row['images'] ;?>' alt='image'>
                    <div class="company_content">
                      <span><i class="fas fa-camera" style="color: white;"></i></span>
                      <span style="font-size: 10px;"> Edit profile </span>
                    </div>
                  </div>
                </a>

             <?php } ?>

        </div>
        </div>


              <div class="col-lg-4 col-md-9 col-9">
               <div class="card-body pe-md ps-lg-0 mt-1">
              <a href="company-info.php?id=<?php echo $row['com_id'];?>" style="text-decoration: none; color: black;">
                  <h6 style="font-size: 15px; color: black;"> <?php echo $row['company'];?>
                    
                    <?php

                    $status = $row['status'];

                    if ($status == 'Active' ) {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> $status </span></td>";

                    } else if ($status == 'Inactive') {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> $status </span></td>";

                    }

                    ?>  

                  </h6>   
                  <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['category'];?> </h6>   
                  <h6 style="font-size: 13px; color: black;"> Total Jobs - <?php echo $row['job_count'];?></h6>
              </a>
              </div>
              </div>

              <div class="col-lg-6 col-md-12 col-12">
              <div class="card-body pe-md ps-lg-0"> 


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

                    <div class="card6" style="cursor: pointer;">

                      <span style="font-weight: normal; font-size: 12px;" id="dots6">
                        <textarea class="scroll col-lg-12 col-md-12 col-12" rows="5"
                                  style="border: none; background: none; resize: none; overflow: hidden;" disabled><?php echo $row['company_view'];?>
                        </textarea>
                      </span>

                      <span style="font-weight: normal; font-size: 12px;" id="more6">
                        <textarea class="scroll_A col-lg-12 col-md-12 col-12"
                                  style="border: none; background: none; resize: none;" disabled><?php echo $row['company_view'];?>
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


              <div class="col-lg-1 col-md-1 col-1">
              <div class="card-body pe-md ps-lg-0"> 

                    <div class="dropdown" style="cursor: pointer; float: right;">
                    <div class="dropdown-toggle no-toggle-arrow btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none;"><?php include '../assets/icon/three_dot.php'?></div>

                      <ul class="dropdown-menu" style="font-size: 13px; color: black;">                            
                          <li> 
                            <a class="dropdown-item" href="company-access.php?edit_company=<?php echo $row['com_id'];?>"  onclick='return edit()'>
                               <span><?php include '../assets/icon/edit.php'?></span>
                               <span> Update company info </span> 
                            </a>
                          </li>  

                          <li> 
                            <a class="dropdown-item" href="company-access.php?inactive_company=<?php echo $row['com_id']; ?>" onclick='return checkdelete()'>
                               <span><?php include '../assets/icon/eye-slash.php'?></span>
                               <span class="ms-2"> Inactive company </span>
                            </a>
                          </li>

                      </ul>
                
                  </div> 
                    <script>
                        function edit() {
                          return confirm ('Are you sure you want to update this company');
                        }
                    </script>

                    <script>
                        function checkdelete() {
                          return confirm ('Are you sure you want to inactive this company');
                        }
                    </script>


                  <div hidden>
                  <p class="company"><?php echo $row['company'];?></p>
                  <p class="Region"><?php echo $row['Region'];?></p>
                  <p class="Province"><?php echo $row['Province'];?></p>
                  <p class="City"><?php echo $row['City'];?></p>
                  <p class="Barangay"><?php echo $row['Barangay'];?></p>
                  <p class="category"><?php echo $row['category'];?></p>
                  </div>
                  
              </div>
              </div>

      </div>
      </div>

</div>
</div>

<?php } ?>

</div>



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

  <?php } }  ?>  

</div>
</div>
</div>

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

    'category'
  ],
  page: 10,
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
  var values_type = $("select[name=category]").val();

  userList.filter(function (item) {
    var Filter_type = false;

    if(values_type == "all")
    { 
      Filter_type = true;
    } else {
      Filter_type = item.values().category.indexOf(values_type) >= 0;
    }

    return Filter_type 

  });

}
                               
$(function(){
  //updateList();
  $("select[name=category]").change(updateList);

  userList.on('updated', function (list) {
    if (list.matchingItems.length > 0) {
      $('.no-result').hide()
    } else {
      $('.no-result').show()
    }
  });
});
</script>


</div>







<!-- END JOBS -->
<div class="tab-pane fade" id="pills-ended" role="tabpanel" aria-labelledby="pills-ended-tab">

<!-- START -->
<div id="users_end">
<div class="container mt-3">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Company" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_../assets/icon form-label-group my-2">
                      <input type="text" class="location_../assets/icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
                    </div>
                  </li>                              

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_../assets/icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" onclick="resetList_end();"> <i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

            <div style="text-align: right;"> 
                <select class="col-lg-2 col-md-12 col-12 mt-2 card-profile" name="category_end" style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Categoty </option>
                  <?php
                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM company_category ");
                    while($row = mysqli_fetch_array($query)){
                  ?>
                  <option class="filter" value="<?php echo $row['category'];?>" style="color: black;" > <?php echo $row['category']; ?> </option>
                  <?php } ?>
                </select>
            </div>


</div>
</div>
<!-- END -->



<!-- START -->
<div class="container mt-3">
<div class="row">

<div class="col-lg-12 col-12 col-md-12 card" style="box-shadow: none; border: none;">
<div class="list">


  <?php

  include '../database/database.php';

  $query = mysqli_query($con,"SELECT company.id as com_id,
                                     company.images,
                                     company.company,
                                     company.Region,
                                     company.Province,
                                     company.Barangay,
                                     company.City,
                                     company.category,
                                     company.company_view,
                                     company.status,

                                     job.id,
                                     job.job_title,
                                     job.job_category,
                                     count(case when job.count = 1 then 1 end) as job_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id WHERE company.status = 'Inactive' GROUP BY company.id order by company.id desc");  

  while($row = mysqli_fetch_array($query)){
  
  ?> 


<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" 
style="box-shadow: none; border-radius: 5PX; border: none;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

        <div class="col-lg-1 col-md-12 col-12 mt-4">
        <div class="p-0 pe-md-0 ">

              <?php if ($row['images'] == '') { ?>

                <a href='company-profile.php?company=<?php echo $row['com_id'];?>'>
                  <div class="company shadow">
                    <img class="company_image w-100 shadow" src='../images/default-avatar.png' alt='image'>
                    <div class="company_content">
                      <span><i class="fas fa-camera" style="color: white;"></i></span>
                      <span style="font-size: 10px;"> Edit profile </span>
                    </div>
                  </div>
                </a>

             <?php  } else { ?>

                <a href='company-profile.php?company=<?php echo $row['com_id'];?>'>
                  <div class="company shadow">
                    <img class="company_image w-100 shadow" src='<?php echo $row['images'] ;?>' alt='image'>
                    <div class="company_content">
                      <span><i class="fas fa-camera" style="color: white;"></i></span>
                      <span style="font-size: 10px;"> Edit profile </span>
                    </div>
                  </div>
                </a>

             <?php } ?>

        </div>
        </div>


              <div class="col-lg-4 col-md-9 col-9">
               <div class="card-body pe-md ps-lg-0 mt-1">
              <a href="company-info.php?id=<?php echo $row['com_id'];?>" style="text-decoration: none; color: black;">
                  <h6 style="font-size: 15px; color: black;"> <?php echo $row['company'];?>

                    <?php

                    $status = $row['status'];

                    if ($status == 'Active' ) {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> $status </span></td>";

                    } else if ($status == 'Inactive') {

                      echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; text-decoration: none; font-size: 10px'> $status </span></td>";

                    }

                    ?>  

                  </h6>   
                  <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['category'];?> </h6>   
                  <h6 style="font-size: 13px; color: black;"> Total Jobs - <?php echo $row['job_count'];?></h6>
              </a>
              </div>
              </div>

              <div class="col-lg-6 col-md-12 col-12">
              <div class="card-body pe-md ps-lg-0"> 


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

                    <div class="card6" style="cursor: pointer;">

                      <span style="font-weight: normal; font-size: 12px;" id="dots6">
                        <textarea class="scroll col-lg-12 col-md-12 col-12" rows="5"
                                  style="border: none; background: none; resize: none; overflow: hidden;" disabled><?php echo $row['company_view'];?>
                        </textarea>
                      </span>

                      <span style="font-weight: normal; font-size: 12px;" id="more6">
                        <textarea class="scroll_A col-lg-12 col-md-12 col-12"
                                  style="border: none; background: none; resize: none;" disabled><?php echo $row['company_view'];?>
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


              <div class="col-lg-1 col-md-1 col-1">
              <div class="card-body pe-md ps-lg-0"> 

                    <div class="dropdown" style="cursor: pointer; float: right;">
                    <div class="dropdown-toggle no-toggle-arrow btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none;"><?php include '../assets/icon/three_dot.php'?></div>

                      <ul class="dropdown-menu" style="font-size: 13px; color: black;">                            
                          <li> 
                            <a class="dropdown-item" href="company-access.php?edit_company=<?php echo $row['com_id'];?>"  onclick='return edit()'>
                               <span><?php include '../assets/icon/edit.php'?></span>
                               <span> Update company info </span> 
                            </a>
                          </li>  
                          <li> 
                            <a class="dropdown-item" href="company-access.php?active_company=<?php echo $row['com_id']; ?>" onclick='return checkdelete()'>
                               <span><?php include '../assets/icon/eye.php'?></span>
                               <span class="ms-2"> Activate company </span>
                            </a>
                          </li>
                      </ul>
                
                  </div> 
                    <script>
                        function edit() {
                          return confirm ('Are you sure you want to update this company');
                        }
                    </script>

                    <script>
                        function checkdelete() {
                          return confirm ('Are you sure you want to activate this company');
                        }
                    </script>


                  <div hidden>
                  <p class="company_end"><?php echo $row['company'];?></p>
                  <p class="Region_end"><?php echo $row['Region'];?></p>
                  <p class="Province_end"><?php echo $row['Province'];?></p>
                  <p class="City_end"><?php echo $row['City'];?></p>
                  <p class="Barangay_end"><?php echo $row['Barangay'];?></p>
                  <p class="category_end"><?php echo $row['category'];?></p>
                  </div>
                  
              </div>
              </div>

      </div>
      </div>

</div>
</div>

<?php } ?>

</div>



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

  <?php } }  ?>  

</div>
</div>
</div>

</div>
<!-- END FILTER -->  

<script type="text/javascript">
 var options = {
  valueNames: [
    'company_end',

    'Region_end',
    'Province_end',
    'City_end',
    'Barangay_end',

    'category_end'
  ],
  page: 10,
  pagination: true
};
var userList_end = new List('users_end', options);

function resetList_end(){
  userList_end.search();  
  userList_end.filter();
  userList_end.update();
  $(".filter-all").prop('selected', true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList_end(){
  var values_type_end = $("select[name=category_end]").val();

  userList_end.filter(function (item) {
    var Filter_type_end = false;

    if(values_type_end == "all")
    { 
      Filter_type_end = true;
    } else {
      Filter_type_end = item.values().category_end.indexOf(values_type_end) >= 0;
    }

    return Filter_type_end 

  });

}
                               
$(function(){
  //updateList_end();
  $("select[name=category_end]").change(updateList_end);

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

  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as company_count,
                                     count(case when status = 'Active' then 1 end) as active

                                     FROM company WHERE status = 'Active' ");

  while($row = mysqli_fetch_array($query)){

  ?>   
 
                    
<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Active </h4>
        </div>     
                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Companies -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['company_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['active']; ?></span>
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

  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as company_count,
                                     count(case when status = 'Inactive' then 1 end) as Inactive

                                     FROM company WHERE status = 'Inactive' ");

  while($row = mysqli_fetch_array($query)){

  ?>  

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Inactive </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Companies -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['company_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $row['Inactive']; ?></span>
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

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as company_count,
                                     count(case when status = 'Active' then 1 end) as active,
                                     count(case when status = 'Inactive' then 1 end) as Inactive

                                     FROM company ");

  while($row = mysqli_fetch_array($query)){

  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Overall Total Report  </h4>
        </div>
           
                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Companies -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['company_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['active']; ?></span>
                       <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $row['Inactive']; ?></span>
                    </h6>   
                    
                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="company-all-report.php"> Info </a>

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