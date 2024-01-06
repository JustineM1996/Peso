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

</div>
</div>

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
                <select class="col-lg-2 col-md-12 col-12 mt-2 card-profile" name="category" 
                        style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Categoty </option>
                  <?php
                    include 'database/database.php';
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

  include 'database/database.php';

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


<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" style="box-shadow: none; border-radius: 5PX; border: none;">

    <div class="row ms-3">
        
        <div class="col-lg-1 col-md-12 col-12 mt-4">
        <div class="p-0 pe-md-0 ">

              <?php if ($row['images'] == '') { ?>
                
                <a href="company-info.php?id=<?php echo $row['com_id'];?>" style="text-decoration: none; color: black;">
                  <div class="company shadow">
                    <img class="company_image w-100 border-radius-md shadow-lg" src='images/default-avatar.png' alt='image'>
                  </div>
                </a>

             <?php  } else { ?>

                <a href="company-info.php?id=<?php echo $row['com_id'];?>" style="text-decoration: none; color: black;">
                  <div class="company shadow">
                    <img class="company_image w-100 border-radius-md shadow-lg" src='images/<?php echo $row['images'] ;?>' alt='image'>
                  </div>
                </a>

             <?php } ?>

        </div>
        </div>


              <div class="col-lg-5 col-md-9 col-9">
              <div class="card-body ps-lg-0 mt-1">
              <a href="company-info.php?id=<?php echo $row['com_id'];?>" style="text-decoration: none; color: black;">

                  <h6 style="font-size: 15px; color: black;"> <?php echo $row['company'];?></h6>   
                  <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['category'];?> </h6>   
                  <h6 style="font-size: 13px; color: black;"> Total Jobs - <?php echo $row['job_count'];?></h6>

              </a>
              </div>
              </div>

              <div class="col-lg-6 col-md-12 col-12">
              <div class="card-body ps-lg-0"> 


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

                    <div class="card6" >

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

                      <div class="col-lg-12 col-md-3 col-5">
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

<?php } ?>

</div>



  <?php

  include 'database/database.php';
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
<!-- END FILTER -->

</div>
</div>
</div>

</section>

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



</body>
</html>