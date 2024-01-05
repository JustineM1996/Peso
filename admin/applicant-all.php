<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>



  <!-- TITLE -->
  <title> PESO - Applicant </title>


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
          <h4 class="" style="color: black; "> APPLICANTS </h4>
        </div>

<div class="nav-wrapper position-relative mt-2">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="background: none;  ">

      <li class="nav-item  ms-lg-2 ms-2 col-lg-2"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-2"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-2"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-2"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-2"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-2"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-2"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-3"> </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link active btn-secondary" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> NEW </button>
      </li>

      <li class="nav-item  ms-lg-2 ms-2" role="presentation">
        <button class="nav-link btn-secondary" id="pills-profile-tab " data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> PULLED </button>
      </li>

      <li class="nav-item  ms-lg-2 ms-2" role="presentation">
        <button class="nav-link btn-secondary" id="pills-contact-tab " data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> REJECT </button>
      </li>

      <li class="nav-item  ms-lg-2 ms-2" role="presentation">
        <button class="nav-link btn-secondary" id="pills-ended-tab " data-bs-toggle="pill" data-bs-target="#pills-ended" type="button" role="tab" aria-controls="pills-ended" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> HIDE </button>
      </li>

      <li class="nav-item  ms-lg-2 ms-2" role="presentation">
        <button class="nav-link btn-secondary" id="pills-analysis-tab " data-bs-toggle="pill" data-bs-target="#pills-analysis" type="button" role="tab" aria-controls="pills-analysis" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> ANALYSIS </button>
      </li>

    </ul>
</div>

</div>
</div>


<!-- HEAD A -->
<div class="tab-content" id="pills-tabContent">


<!-- NEW -->
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">  

<!-- START -->
<div id="users">

<div class="container">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by work position company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work, company or applicant name " style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_../assets/icon form-label-group my-2">
                      <input type="text" class="location_../assets/icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
                    </div>
                  </li>                              

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_../assets/icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" 
                          onclick="resetList();"><i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

              <div style="text-align: right;">
                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="gender" style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>
              </div>

</div>
</div>

<div class="container">
<div class="row">

<div class="col-lg-12 col-12" style="background: none">
<div class="card card-profile mt-lg-4 mt-5" style="background: none ; box-shadow: none; border: none;">
<div class="list">

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account JOIN company 
                                                  JOIN job ON job.company_id = company.id 
                                                  INNER JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id and applicant.Account_Id = account.id
                                                  WHERE applicant.Status = '1' and
                                                        applicant.Status_remove = '1' and
                                                        applicant.Status_hide = '1' order by applicant.id asc ");
while($row = mysqli_fetch_array($query)){

  $image = $row['image'];

?>


<div class="col-lg-12 mt-3" >
<div class="card card-profile info-horizontal border-radius-xl d-block d-block p-0 h-100 " style=" box-shadow: none;  border-radius: 5PX; border: none; ">

    <div class="mt-md-0 ms-3">
    <div class="row">


        <div class="col-lg-1 col-md-3 col-3">
            <div class="ps-lg-0 mt-4">
                      <?php
                         if ($image == '') {
                            echo "<img class='ceo_image w-100 border-radius-md shadow-lg' src='../images/default-avatar.png' style='border-radius: 50%;' > ";
                          } else {
                            echo "<img class='ceo_image w-100 border-radius-md shadow-lg' src='$image' style='border-radius: 50%;' >";
                         }
                      ?>
            </div>
        </div>

              <div class="col-lg-4 col-md-9 col-9 my-auto">
              <div class="card-body ps-lg-0">
                <a href="peso-resume-view.php?id=<?php echo $row['Account_Id'];?>" style="text-decoration: none; color: black; cursor: pointer;">
                    <h6 class="First_Name" style='font-size: 15px;'><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?> 

                    <?php 

                        if ($row['Status'] == '0' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Pulled </span> ";

                        } else if ($row['Status'] == '1' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> New </span> ";

                        } else if ($row['Status_remove'] == '0' && $row['Status_hide'] == '1') {

                          echo "<span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Reject </span> ";

                        } else {

                          echo "<span class='ms-2' style='background: #333; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Hide </span> ";

                        }

                    ?>

                    </h6>

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Email'];?> - 
                      <span ><?php echo $row['Contact_Number'];?></span>
                    </h6>      

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Age'];?> years old / <?php echo $row['Gender'];?> </h6> 
                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Region'];?> <?php echo $row['Province'];?> <?php echo $row['City'];?> <?php echo $row['Barangay'];?></h6> 
                </a>
              </div>
              </div>


              <div class="col-lg-6 col-md-12 col-12 my-auto">
              <div class="card-body ps-lg-0">
                <a href="peso-resume-view.php?id=<?php echo $row['Account_Id'];?>" style="text-decoration: none; color: black; cursor: pointer;">

                  <h6 style="font-size: 15px;"> <?php echo $row['job_title'];?></h6>   
                  <h6 style="font-size: 14px; color: black;"> <?php echo $row['company'];?> </h6>   

                    <?php

                    $pulled = ($row['Status']);
                    $date_posted = date("F d, Y", strtotime ($row['date_posted']));
                    $admin_pulled_date = date("F d, Y h:i A", strtotime ($row['admin_pulled_date']));

                    if ($pulled <= '0') {

                    } else {

                      echo "<h6 style='font-size: 13px; font-weight: normal; color: black;'> Apply on . $date_posted </h6>";
                    }
                    
                    ?>
                </a>
              </div>
              </div>

              <div class="col-lg-1 col-md-12 col-12">
              <div class="card-body ps-lg-0">

              <?php

              $id = ($row['id']);
              $pulled = ($row['Status']);

              $job_title = ($row['job_title']);
              $company = ($row['company']);   
              $emails = ($row['Email']);          

              if ($pulled <= '0') {

                    } else {

                    echo "<div class='dropdown' style='float: right; text-align: center;'>
                            <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shadow: none'>
                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>
                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                    <li>
                                      <form  action='active_inactive/pulled_applicant.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        <input type='text' value='$job_title' name='job_title'>
                                        <input type='text' value='$company' name='company'>
                                        </div>

                                        <button type='submit' name='submit' class='dropdown-item' onclick='return pulled()' style='background: none; border: none'>
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-person-check' viewBox='0 0 16 16'>
                                              <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                              <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Pull this applicant </span>
                                        </button>
                                      </form>
                                    </li>  

                                    <li>
                                    <form  action='active_inactive/remove_applicant.php' method='POST'>
                                      <div hidden>
                                      <input type='text' value='$emails' name='email'>
                                      <input type='int' value='$id' name='id'>
                                      <input type='text' value='$job_title' name='job_title'>
                                      <input type='text' value='$company' name='company'>
                                      </div>
                                        <button type='submit' name='submit' class='dropdown-item' onclick='return remove()' style='background: none; border: none'>
                                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-person-dash' viewBox='0 0 16 16'>
                                                <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                                <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                              </svg>
                                             <span class='ms-2'> Reject this applicant </span> 
                                        </button>
                                    </form>
                                    </li>  

                                    <li>
                                      <a class='dropdown-item' href='active_inactive/hide_applicant.php?id=$id'  onclick='return hide()'>
                                         <span>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                            <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                            <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                            <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                          </svg> 
                                        </span>
                                        <span class='ms-2'> Hide this applicant </span> 
                                      </a>

                                    </li>  


                                </ul>
                              </div>";

                          }
                    
                    ?>

                  <script>
                      function pulled() {
                        return confirm ('Are you sure you want to pull this applicant');
                      }
                  </script>

                  <script>
                      function remove() {
                        return confirm ('Are you sure you want to remove this applicant');
                      }
                  </script>

                  <script>
                      function hide() {
                        return confirm ('Are you sure you want to hide this applicant');
                      }
                  </script>


                    <div hidden>
                    <p class="Last_Name"><?php echo $row['Last_Name'];?></p>
                    <p class="Middel_Name"><?php echo $row['Middel_Name'];?></p>

                    <p class="company"><?php echo $row['company'];?></p>
                    <p class="job_title"><?php echo $row['job_title'];?></p>
                    <p class="gender"><?php echo $row['Gender'];?></p>

                    <p class="Region"><?php echo $row['Region'];?></p>
                    <p class="Province"><?php echo $row['Province'];?></p>
                    <p class="City"><?php echo $row['City'];?></p>
                    <p class="Barangay"><?php echo $row['Barangay'];?></p>
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
  $query = mysqli_query($con,"SELECT count(count) as applicant_count FROM applicant ");

  while($row = mysqli_fetch_array($query)){

   $applicant_count = $row['applicant_count'];

  ?>  

  <?php 

  if($applicant_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No applicant available </h5>

  <?php } }  ?>  

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

    'job_title',
    'company',

    'First_Name',
    'Middel_Name',
    'Last_Name',

    'Region',
    'Province',
    'City',
    'Barangay',

    'gender',

  ],
  page: 8,
  pagination: true
};

var userList = new List('users', options);

function resetList(){
  userList.search();
  userList.filter();
  userList.update();
  $(".filter-all").prop('selected',true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList(){
  var values_gender = $("select[name=gender]").val();

  userList.filter(function (item) {
    var Filter_gender = false;

    if(values_gender == "all")
    { 
      Filter_gender = true;
    } else {
      Filter_gender = item.values().gender.indexOf(values_gender) >= 0;
    }

    return Filter_gender

  });

}
                               
$(function(){
  //updateList();
  $("select[name=gender]").change(updateList);

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
<!-- END -->  




























<!-- PULLED -->
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">  

<!-- START -->
<div id="pulled">

<div class="container">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by work position company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work, company or applicant name" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_../assets/icon form-label-group my-2">
                      <input type="text" class="location_../assets/icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
                    </div>
                  </li>                              

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_../assets/icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" 
                          onclick="resetList_pulled();"><i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

              <div style="text-align: right;">
             <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="gender_pulled" style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>
              </div>

</div>
</div>

<div class="container">
<div class="row">

<div class="col-lg-12 col-12" style="background: none">
<div class="card card-profile mt-lg-4 mt-5" style="background: none ; box-shadow: none; border: none;">
<div class="list">

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account JOIN company 
                                                  JOIN job ON job.company_id = company.id 
                                                  INNER JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id and applicant.Account_Id = account.id
                                                  WHERE applicant.Status = '0' and
                                                        applicant.Status_hide = '1' and
                                                        applicant.Status_remove = '1' order by applicant.id asc ");
while($row = mysqli_fetch_array($query)){

  $image = $row['image'];

?>


<div class="col-lg-12 mt-3" >
<div class="card card-profile info-horizontal border-radius-xl d-block d-block p-0 h-100 " style=" box-shadow: none;  border-radius: 5PX; border: none; ">

    <div class="mt-md-0 ms-3">
    <div class="row">


        <div class="col-lg-1 col-md-3 col-3">
            <div class="ps-lg-0 mt-4">
                      <?php
                         if ($image == '') {
                            echo "<img class='ceo_image w-100 border-radius-md shadow-lg' src='../images/default-avatar.png' style='border-radius: 50%;' > ";
                          } else {
                            echo "<img class='ceo_image w-100 border-radius-md shadow-lg' src='$image' style='border-radius: 50%;' >";
                         }
                      ?>
            </div>
        </div>

                <div class="col-lg-4 col-md-9 col-9 my-auto">
                <div class="card-body ps-lg-0">
                  <a href="peso-resume-view.php?id=<?php echo $row['Account_Id'];?>" style="text-decoration: none; color: black; cursor: pointer;">
                    <h6 class="First_Name_pulled" style='font-size: 15px;'><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?> 

                    <?php 

                        if ($row['Status'] == '0' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Pulled </span> ";

                        } else if ($row['Status'] == '1' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> New </span> ";

                        } else if ($row['Status_remove'] == '0' && $row['Status_hide'] == '1') {

                          echo "<span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Reject </span> ";

                        } else {

                          echo "<span class='ms-2' style='background: #333; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Hide </span> ";

                        }

                    ?>

                    </h6>

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Email'];?> - 
                      <span><?php echo $row['Contact_Number'];?></span>
                    </h6>      

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Age'];?> years old / <?php echo $row['Gender'];?> </h6> 
                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Region'];?> <?php echo $row['Province'];?> <?php echo $row['City'];?> <?php echo $row['Barangay'];?></h6> 
                    
                  </a>
              </div>
              </div>


              <div class="col-lg-6 col-md-12 col-12 my-auto">
              <div class="card-body ps-lg-0">
                <a href="peso-resume-view.php?id=<?php echo $row['Account_Id'];?>" style="text-decoration: none; color: black; cursor: pointer;">
                  <h6 style="font-size: 15px;"> <?php echo $row['job_title'];?></h6>   
                  <h6 style="font-size: 14px; color: black;"> <?php echo $row['company'];?> </h6>   

                    <?php

                    $pulled = ($row['Status']);
                    $date_posted = date("F d, Y", strtotime ($row['date_posted']));
                    $admin_pulled_date = date("F d, Y h:i A", strtotime ($row['admin_pulled_date']));

                    if ($pulled <= '0') {

                      echo "<h6 style='font-size: 13px; font-weight: normal; color: black;'> Apply on . $date_posted | Pulled on . $admin_pulled_date </h6>";

                    }
                    
                    ?>
                </a>
              </div>
              </div>

              <div class="col-lg-1 col-md-12 col-12">
              <div class="card-body ps-lg-0">

              <?php

              $id = ($row['id']);
              $pulled = ($row['Status']);

              $job_title = ($row['job_title']);
              $company = ($row['company']);   
              $emails = ($row['Email']);          

              if ($pulled <= '0') {

              echo "<div class='dropdown' style='float: right; text-align: center;'>
                        <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shadow: none'>
                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                          <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                        </svg>
                        </div>

                          <ul class='dropdown-menu' style='font-size: 13px; color: black;'>
                      
                              <li>
                                <a class='dropdown-item' href='active_inactive/hide_applicant.php?id=$id'  onclick='return hide()'>
                                   <span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                      <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                      <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                      <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                    </svg> 
                                  </span>
                                  <span class='ms-2'> Hide this applicant </span> 
                                </a>
                              </li>  

                          </ul>
                      </div>";

                    } 
                    
                    ?>

                  <script>
                      function hide() {
                        return confirm ('Are you sure you want to hide this applicant');
                      }
                  </script>

                    <div hidden>
                    <p class="Last_Name_pulled"><?php echo $row['Last_Name'];?></p>
                    <p class="Middel_Name_pulled"><?php echo $row['Middel_Name'];?></p>

                    <p class="job_title_pulled"><?php echo $row['job_title'];?></p>
                    <p class="company_pulled"><?php echo $row['company'];?></p>
                    <p class="gender_pulled"><?php echo $row['Gender'];?></p>

                    <p class="Region_pulled"><?php echo $row['Region'];?></p>
                    <p class="Province_pulled"><?php echo $row['Province'];?></p>
                    <p class="City_pulled"><?php echo $row['City'];?></p>
                    <p class="Barangay_pulled"><?php echo $row['Barangay'];?></p>

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
  $query = mysqli_query($con,"SELECT count(count) as applicant_count FROM applicant ");

  while($row = mysqli_fetch_array($query)){

   $applicant_count = $row['applicant_count'];

  ?>  

  <?php 

  if($applicant_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No applicant available </h5>

  <?php } }  ?>  

</div>   
</div>
</div>
</div>
<!-- END -->


</div>
<!-- END FILTER -->

<script type="text/javascript">

 var options_pulled = {
  valueNames: [
    'job_title_pulled',
    'company_pulled',

    'First_Name_pulled',
    'Middel_Name_pulled',
    'Last_Name_pulled',

    'Region_pulled',
    'Province_pulled',
    'City_pulled',
    'Barangay_pulled',

    'gender_pulled',

  ],
  page: 8,
  pagination: true
};

var userList_pulled = new List('pulled', options_pulled);

function resetList_pulled(){
  userList_pulled.search();
  userList_pulled.filter();
  userList_pulled.update();
  $(".filter-all").prop('selected',true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList_pulled(){
  var values_gender_pulled = $("select[name=gender_pulled]").val();

  userList_pulled.filter(function (item) {
    var Filter_gender_pulled = false;

    if(values_gender_pulled == "all")
    { 
      Filter_gender_pulled = true;
    } else {
      Filter_gender_pulled = item.values().gender_pulled.indexOf(values_gender_pulled) >= 0;
    }

    return Filter_gender_pulled

  });

}
                               
$(function(){
  //updateList_pulled();
  $("select[name=gender_pulled]").change(updateList_pulled);

  userList_pulled.on('updated', function (list_pulled) {
    if (list_pulled.matchingItems.length > 0) {
      $('.no-result').hide()
    } else {
      $('.no-result').show()
    }
  });
});

</script>

</div>
<!-- END -->  








<!-- REJECT -->
<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" >

<!-- START -->
<div id="reject">

<div class="container">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by work position company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work, company or applicant name" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_../assets/icon form-label-group my-2">
                      <input type="text" class="location_../assets/icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
                    </div>
                  </li>                              

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_../assets/icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" 
                          onclick="resetList_reject();"><i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>
              <div style="text-align: right;">
            <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="gender_reject" style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>
              </div>

</div>
</div>

<div class="container">
<div class="row">

<div class="col-lg-12 col-12" style="background: none">
<div class="card card-profile mt-lg-4 mt-5" style="background: none ; box-shadow: none; border: none;">
<div class="list">

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account JOIN company 
                                                  JOIN job ON job.company_id = company.id 
                                                  INNER JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id and applicant.Account_Id = account.id
                                                  WHERE applicant.Status_remove = '0' and 
                                                        applicant.Status_hide = '1' order by applicant.id asc ");
while($row = mysqli_fetch_array($query)){

  $image = $row['image'];

?>


<div class="col-lg-12 mt-3" >
<div class="card card-profile info-horizontal border-radius-xl d-block d-block p-0 h-100 " style=" box-shadow: none;  border-radius: 5PX; border: none; ">

    <div class="mt-md-0 ms-3">
    <div class="row">


        <div class="col-lg-1 col-md-3 col-3">
            <div class="ps-lg-0 mt-4">
                      <?php
                         if ($image == '') {
                            echo "<img class='ceo_image w-100 border-radius-md shadow-lg' src='../images/default-avatar.png' style='border-radius: 50%;' > ";
                          } else {
                            echo "<img class='ceo_image w-100 border-radius-md shadow-lg' src='$image' style='border-radius: 50%;' >";
                         }
                      ?>
            </div>
        </div>

            <div class="col-lg-4 col-md-9 col-9 my-auto">
            <div class="card-body ps-lg-0">
              <a href="peso-resume-view.php?id=<?php echo $row['Account_Id'];?>" style="text-decoration: none; color: black; cursor: pointer;">
                    <h6 class="First_Name_reject" style='font-size: 15px;'><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?> 

                    <?php 

                        if ($row['Status'] == '0' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Pulled </span> ";

                        } else if ($row['Status'] == '1' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> New </span> ";

                        } else if ($row['Status_remove'] == '0' && $row['Status_hide'] == '1') {

                          echo "<span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Reject </span> ";

                        } else {

                          echo "<span class='ms-2' style='background: #333; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Hide </span> ";

                        }

                    ?>

                    </h6>

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Email'];?> - 
                      <span><?php echo $row['Contact_Number'];?></span>
                    </h6>      

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Age'];?> years old / <?php echo $row['Gender'];?> </h6> 
                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Region'];?> <?php echo $row['Province'];?> <?php echo $row['City'];?> <?php echo $row['Barangay'];?></h6>

                </a> 
              </div>
              </div>


              <div class="col-lg-6 col-md-12 col-12 my-auto">
              <div class="card-body ps-lg-0">
                <a href="peso-resume-view.php?id=<?php echo $row['Account_Id'];?>" style="text-decoration: none; color: black; cursor: pointer;">

                  <h6 style="font-size: 15px;"> <?php echo $row['job_title'];?></h6>   
                  <h6 style="font-size: 14px; color: black;"> <?php echo $row['company'];?> </h6>   

                    <?php

                    $reject = ($row['Status_remove']);
                    $date_posted = date("F d, Y", strtotime ($row['date_posted']));
                    $admin_pulled_date = date("F d, Y h:i A", strtotime ($row['admin_pulled_date']));

                    if ($reject <= '0') {

                      echo "<h6 style='font-size: 13px; font-weight: normal; color: black;'> Apply on . $date_posted | Reject on . $admin_pulled_date </h6>";

                    }
                    
                    ?>
                </a>
              </div>
              </div>

              <div class="col-lg-1 col-md-12 col-12">
              <div class="card-body ps-lg-0">

              <?php

              $id = ($row['id']);
              $reject = ($row['Status_remove']);

              $job_title = ($row['job_title']);
              $company = ($row['company']);   
              $emails = ($row['Email']);          

              if ($reject <= '0') {

              echo "<div class='dropdown' style='float: right; text-align: center;'>
                        <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shadow: none'>
                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                          <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                        </svg>
                        </div>

                          <ul class='dropdown-menu' style='font-size: 13px; color: black;'>
                      
                              <li>
                                <a class='dropdown-item' href='active_inactive/hide_applicant.php?id=$id'  onclick='return hide()'>
                                   <span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                      <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                      <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                      <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                    </svg> 
                                  </span>
                                  <span class='ms-2'> Hide this applicant </span> 
                                </a>
                              </li>  

                          </ul>
                      </div>";

                    } 
                    
                    ?>

                  <script>
                      function hide() {
                        return confirm ('Are you sure you want to hide this applicant');
                      }
                  </script>

                    <div hidden>
                    <p class="Last_Name_reject"><?php echo $row['Last_Name'];?></p>
                    <p class="Middel_Name_reject"><?php echo $row['Middel_Name'];?></p>

                    <p class="job_title_reject"><?php echo $row['job_title'];?></p>
                    <p class="company_reject"><?php echo $row['company'];?></p>
                    <p class="gender_reject"><?php echo $row['Gender'];?></p>

                    <p class="Region_reject"><?php echo $row['Region'];?></p>
                    <p class="Province_reject"><?php echo $row['Province'];?></p>
                    <p class="City_reject"><?php echo $row['City'];?></p>
                    <p class="Barangay_reject"><?php echo $row['Barangay'];?></p>

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
  $query = mysqli_query($con,"SELECT count(count) as applicant_count FROM applicant ");

  while($row = mysqli_fetch_array($query)){

   $applicant_count = $row['applicant_count'];

  ?>  

  <?php 

  if($applicant_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No applicant available </h5>

  <?php } }  ?>  

</div>   
</div>
</div>
</div>
<!-- END -->

</div>
<!-- END FILTER -->

<script type="text/javascript">

 var options_reject = {
  valueNames: [
    'job_title_reject',
    'company_reject',

    'First_Name_reject',
    'Middel_Name_reject',
    'Last_Name_reject',

    'Region_reject',
    'Province_reject',
    'City_reject',
    'Barangay_reject',

    'gender_reject',

  ],
  page: 8,
  pagination: true
};

var userList_reject = new List('reject', options_reject);

function resetList_reject(){
  userList_reject.search();
  userList_reject.filter();
  userList_reject.update();
  $(".filter-all").prop('selected',true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList_reject(){
  var values_gender_reject = $("select[name=gender_reject]").val();

  userList_reject.filter(function (item) {
    var Filter_gender_reject = false;

    if(values_gender_reject == "all")
    { 
      Filter_gender_reject = true;
    } else {
      Filter_gender_reject = item.values().gender_reject.indexOf(values_gender_reject) >= 0;
    }

    return Filter_gender_reject

  });

}
                               
$(function(){
  //updateList_reject();
  $("select[name=gender_reject]").change(updateList_reject);

  userList_reject.on('updated', function (list_reject) {
    if (list_reject.matchingItems.length > 0) {
      $('.no-result').hide()
    } else {
      $('.no-result').show()
    }
  });
});

</script>

</div>
<!-- END -->  

















<!-- HIDE -->
<div class="tab-pane fade" id="pills-ended" role="tabpanel" aria-labelledby="pills-ended-tab">


<!-- START -->
<div id="hide">

<div class="container">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by work position company and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work, company or applicant name and status" style="color: black; font-size: 13px;">
                    </div>
                  </li>

                  <li class="nav-item ms-lg-2 col-lg-5 col-12 col-md-12">
                    <div class="location_../assets/icon form-label-group my-2">
                      <input type="text" class="location_../assets/icon search form-control shadow-none mt-2" placeholder="Location" style="color: black; font-size: 13px;">
                    </div>
                  </li>                              

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_../assets/icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" 
                          onclick="resetList_hide();"><i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

              <div style="text-align: right;">
                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="gender_hide" style="cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>
              </div>


</div>
</div>

<div class="container">
<div class="row">

<div class="col-lg-12 col-12" style="background: none">
<div class="card card-profile mt-lg-4 mt-5" style="background: none ; box-shadow: none; border: none;">
<div class="list">

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account JOIN company 
                                                  JOIN job ON job.company_id = company.id 
                                                  INNER JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id and applicant.Account_Id = account.id
                                                  WHERE applicant.Status_hide = '0' order by applicant.id asc ");
while($row = mysqli_fetch_array($query)){

  $image = $row['image'];

?>


<div class="col-lg-12 mt-3" >
<div class="card card-profile info-horizontal border-radius-xl d-block d-block p-0 h-100 " style=" box-shadow: none;  border-radius: 5PX; border: none; ">

    <div class="mt-md-0 ms-3">
    <div class="row">

        <div class="col-lg-1 col-md-3 col-3">
            <div class="ps-lg-0 mt-4">
                      <?php
                         if ($image == '') {
                            echo "<img class='ceo_image w-100 border-radius-md shadow-lg' src='../images/default-avatar.png' style='border-radius: 50%;' > ";
                          } else {
                            echo "<img class='ceo_image w-100 border-radius-md shadow-lg' src='$image' style='border-radius: 50%;' >";
                         }
                      ?>
            </div>
        </div>

                <div class="col-lg-4 col-md-9 col-9 my-auto">
                <div class="card-body ps-lg-0">
                  <a href="peso-resume-view.php?id=<?php echo $row['Account_Id'];?>" style="text-decoration: none; color: black; cursor: pointer;">
                    <h6 class="First_Name_hide" style='font-size: 15px;'><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?> 

                    <?php 

                        if ($row['Status'] == '0' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Pulled </span> ";

                        } else if ($row['Status'] == '1' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

                         echo "<span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> New </span> ";

                        } else if ($row['Status_remove'] == '0' && $row['Status_hide'] == '1') {

                          echo "<span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Reject </span> ";

                        } else {

                          echo "<span class='ms-2' style='background: #333; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Hide </span> ";

                        }

                    ?>

                    </h6>

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Email'];?> - 
                      <span><?php echo $row['Contact_Number'];?></span>
                    </h6>      

                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Age'];?> years old / <?php echo $row['Gender'];?> </h6> 
                    <h6 style="font-size: 13px; color: black; font-weight: normal;"> <?php echo $row['Region'];?> <?php echo $row['Province'];?> <?php echo $row['City'];?> <?php echo $row['Barangay'];?></h6>
                </a>
              </div>
              </div>


              <div class="col-lg-6 col-md-12 col-12 my-auto">
              <div class="card-body ps-lg-0">
                <a href="peso-resume-view.php?id=<?php echo $row['Account_Id'];?>" style="text-decoration: none; color: black; cursor: pointer;">

                  <h6 style="font-size: 15px;"> <?php echo $row['job_title'];?></h6>   
                  <h6 style="font-size: 14px; color: black;"> <?php echo $row['company'];?> </h6>   

                    <?php

                    $hide = ($row['Status_hide']);
                    $date_posted = date("F d, Y", strtotime ($row['date_posted']));
                    $admin_pulled_date = date("F d, Y h:i A", strtotime ($row['admin_pulled_date']));

                    if ($hide <= '0') {

                      echo "<h6 style='font-size: 13px; font-weight: normal; color: black;'> Apply on . $date_posted | hide on . $admin_pulled_date </h6>";

                    }
                    
                    ?>

                </a>
              </div>
              </div>

              <div class="col-lg-1 col-md-12 col-12">
              <div class="card-body ps-lg-0">

              <?php

              $id = ($row['id']);
              $hide = ($row['Status_hide']);

              $job_title = ($row['job_title']);
              $company = ($row['company']);   
              $emails = ($row['Email']);          

              $hide = ($row['Status_hide']);
              $pulled = ($row['Status']);
              $reject = ($row['Status_remove']);

              if ($hide <= '0') {

                if ($reject <= '0') {

                 echo "<div class='dropdown' style='float: right; text-align: center;'>
                          <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shadow: none'>
                          <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                          </svg>
                          </div>

                            <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                <li>
                                  <form action='active_inactive/pulled_applicant.php' method='POST'>
                                    <div hidden>
                                    <input type='text' value='$emails' name='email'>
                                    <input type='int' value='$id' name='id'>
                                    <input type='text' value='$job_title' name='job_title'>
                                    <input type='text' value='$company' name='company'>
                                    </div>
                                    <button type='submit' name='submit' class='dropdown-item' onclick='return pulled()' style='background: none; border: none'>
                                       <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-person-check' viewBox='0 0 16 16'>
                                              <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                              <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                            </svg>
                                      </span>
                                      <span class='ms-2'> Pull this applicant at this time </span> 
                                    </button>
                                  </form>
                                </li>  

                                <li>
                                  <a class='dropdown-item' href='active_inactive/remove_applicant.php?delete=$id' onclick='return delete_app()'>
                                     <span>
                                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash me-2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                          <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                          <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                        </svg>
                                    </span>
                                    <span class='ms-1'> Delete this applicant </span> 
                                  </a>
                                </li>  

                                <li>
                                  <a class='dropdown-item' href='active_inactive/hide_applicant.php?unhide=$id'  onclick='return unhide()'>
                                     <span>
                                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                      <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                      <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                      </svg>  
                                    </span>
                                    <span class='ms-2'> Unhide this applicant </span> 
                                  </a>
                                </li>  


                            </ul>
                        </div>";

                      } else if ($pulled <= '0') {

                  echo "<div class='dropdown' style='float: right; text-align: center;'>
                            <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shadow: none'>
                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                              <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                            </svg>
                            </div>

                              <ul class='dropdown-menu' style='font-size: 13px; color: black;'>
                          
                                  <li>
                                    <a class='dropdown-item' href='active_inactive/hide_applicant.php?unhide=$id'  onclick='return unhide()'>
                                       <span>
                                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                              <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                              <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                              </svg>  
                                      </span>
                                      <span class='ms-2'> Unhide this applicant </span> 
                                    </a>
                                  </li>  

                              </ul>
                          </div>";

                      } else if ($pulled >= '1') {

                    echo "<div class='dropdown' style='float: right; text-align: center;'>
                            <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false' style='box-shadow: none'>
                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>
                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                    <li>
                                      <form  action='active_inactive/pulled_applicant.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        <input type='text' value='$job_title' name='job_title'>
                                        <input type='text' value='$company' name='company'>
                                        </div>

                                        <button type='submit' name='submit' class='dropdown-item' onclick='return pulled()' style='background: none; border: none'>
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-person-check' viewBox='0 0 16 16'>
                                              <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                              <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Pull this applicant </span> 
                                        </button>
                                      </form>
                                    </li>  

                                    <li>
                                      <form action='active_inactive/remove_applicant.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        <input type='text' value='$job_title' name='job_title'>
                                        <input type='text' value='$company' name='company'>
                                        </div>

                                        <button type='submit' name='submit' class='dropdown-item' onclick='return remove()' style='background: none; border: none'>
                                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-person-dash' viewBox='0 0 16 16'>
                                                <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                                <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                              </svg>
                                             <span class='ms-2'> Reject this applicant </span> 
                                        </button>
                                      </form>
                                    </li>  

                                    <li>
                                      <a class='dropdown-item' href='active_inactive/remove_applicant.php?delete=$id'  onclick='return delete_app()'>
                                         <span>
                                          <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash me-2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                          </svg>
                                        </span>
                                        <span class='ms-1'> Delete this applicant </span> 
                                      </a>
                                    </li> 

                                    <li>
                                      <a class='dropdown-item' href='active_inactive/hide_applicant.php?unhide=$id'  onclick='return unhide()'>
                                         <span>
                                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                              <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                              <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                              </svg>  
                                        </span>
                                        <span class='ms-2'> Unhide this applicant </span> 
                                      </a>
                                    </li>  


                                </ul>
                              </div>";

                      } 


                }
                    
                ?>

                  <script>
                      function delete_app() {
                        return confirm ('Are you sure you want to delete this applicant');
                      }
                  </script>

                  <script>
                      function pulled() {
                        return confirm ('Are you sure you want to pull this applicant at this time');
                      }
                  </script>

                  <script>
                      function remove() {
                        return confirm ('Are you sure you want to remove this applicant');
                      }
                  </script>

                  <script>
                      function unhide() {
                        return confirm ('Are you sure you want to unhide this applicant');
                      }
                  </script>

                    <div hidden>
                    <p class="Last_Name_hide"><?php echo $row['Last_Name'];?></p>
                    <p class="Middel_Name_hide"><?php echo $row['Middel_Name'];?></p>

                    <p class="job_title_hide"><?php echo $row['job_title'];?></p>
                    <p class="company_hide"><?php echo $row['company'];?></p>
                    <p class="gender_hide"><?php echo $row['Gender'];?></p>

                    <p class="Region_hide"><?php echo $row['Region'];?></p>
                    <p class="Province_hide"><?php echo $row['Province'];?></p>
                    <p class="City_hide"><?php echo $row['City'];?></p>
                    <p class="Barangay_hide"><?php echo $row['Barangay'];?></p>

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
  $query = mysqli_query($con,"SELECT count(count) as applicant_count FROM applicant ");

  while($row = mysqli_fetch_array($query)){

   $applicant_count = $row['applicant_count'];

  ?>  

  <?php 

  if($applicant_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No applicant available </h5>

  <?php } }  ?>  

</div>   
</div>
</div>
</div>
<!-- END -->

</div>
<!-- END FILTER -->

<script type="text/javascript">

 var options_hide = {
  valueNames: [
    'job_title_hide',
    'company_hide',

    'First_Name_hide',
    'Middel_Name_hide',
    'Last_Name_hide',

    'Region_hide',
    'Province_hide',
    'City_hide',
    'Barangay_hide',

    'gender_hide',

  ],
  page: 8,
  pagination: true
};

var userList_hide = new List('hide', options_hide);

function resetList_hide(){
  userList_hide.search();
  userList_hide.filter();
  userList_hide.update();
  $(".filter-all").prop('selected',true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList_hide(){
  var values_gender_hide = $("select[name=gender_hide]").val();

  userList_hide.filter(function (item) {
    var Filter_gender_hide = false;

    if(values_gender_hide == "all")
    { 
      Filter_gender_hide = true;
    } else {
      Filter_gender_hide = item.values().gender_hide.indexOf(values_gender_hide) >= 0;
    }

    return Filter_gender_hide

  });

}
                               
$(function(){
  //updateList_hide();
  $("select[name=gender_hide]").change(updateList_hide);

  userList_hide.on('updated', function (list_hide) {
    if (list_hide.matchingItems.length > 0) {
      $('.no-result').hide()
    } else {
      $('.no-result').show()
    }
  });
});

</script>

</div>
<!-- END -->  




















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

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status = 1 AND applicant.Gender = 'male'  then 1 end) as new_male,
                                      count(case when applicant.Status = 1 AND applicant.Gender = 'female' then 1 end) as new_female,
                                      count(case when applicant.Status = 1 then 1 end) as applicant_new

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id 
                                      WHERE applicant.Status = '1' and
                                            applicant.Status_remove = '1' and
                                            applicant.Status_hide = '1' order by applicant.id asc ");

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
          <h4 class="" style="color: black; "> New </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total  New -    
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

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status = 0 AND applicant.Gender = 'male'  then 1 end) as pulled_male,
                                      count(case when applicant.Status = 0 AND applicant.Gender = 'female' then 1 end) as pulled_female,
                                      count(case when applicant.Status = 0 then 1 end) as applicant_pulled

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id 
                                                  WHERE applicant.Status = '0' and
                                                        applicant.Status_hide = '1' and
                                                        applicant.Status_remove = '1' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $pulled = ($row['applicant_pulled']);
   $pulled_male = ($row['pulled_male']);
   $pulled_female = ($row['pulled_female']);

  ?>   



<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Pulled </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Pulled -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $pulled;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $pulled_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $pulled_female;?></span>
                    </h6>   

          </div>
          </div>

</div>
</div>

<?php }  ?> 









<!-- REJECT -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status_remove = 0 AND applicant.Gender = 'male' then 1 end) as reject_male,
                                      count(case when applicant.Status_remove = 0 AND applicant.Gender = 'female' then 1 end) as reject_female,
                                      count(case when applicant.Status_remove = 0 then 1 end) as applicant_reject

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id 
                                                  WHERE applicant.Status_remove = '0' and 
                                                        applicant.Status_hide = '1' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $reject = $row['applicant_reject'];
   $reject_male = ($row['reject_male']);
   $reject_female = ($row['reject_female']);

  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Reject </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Reject -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $reject;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $reject_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $reject_female;?></span>
                    </h6>  

          </div>
          </div>

</div>
</div>

<?php }  ?> 








<!-- HIDE -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status_hide = 0 AND applicant.Gender = 'male' then 1 end) as hide_male,
                                      count(case when applicant.Status_hide = 0 AND applicant.Gender = 'female' then 1 end) as hide_female,
                                      count(case when applicant.Status_hide = 0 then 1 end) as applicant_hide

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id 
                                                  WHERE applicant.Status_hide = '0' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $hide = $row['applicant_hide'];
   $hide_male = ($row['hide_male']);
   $hide_female = ($row['hide_female']);

  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Hide </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Hide -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $hide;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $hide_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $hide_female;?></span>
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

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status = 1 AND
                                                      applicant.Gender = 'male' AND
                                                      applicant.Status_remove = 1 AND
                                                      applicant.Status_hide = 1 then 1 end) as new_male,

                                      count(case when applicant.Status = 1 AND
                                                      applicant.Gender = 'female' AND
                                                      applicant.Status_remove = 1 AND
                                                      applicant.Status_hide = 1 then 1 end) as new_female,


                                      count(case when applicant.Status = 0 AND
                                                      applicant.Gender = 'male' AND
                                                      applicant.Status_hide = 1 AND
                                                      applicant.Status_remove = 1 then 1 end) as pulled_male,

                                      count(case when applicant.Status = 0 AND
                                                      applicant.Gender = 'female' AND
                                                      applicant.Status_hide = 1 AND
                                                      applicant.Status_remove = 1 then 1 end) as pulled_female,


                                      count(case when applicant.Status_remove = 0 AND
                                                      applicant.Gender = 'male' AND
                                                      applicant.Status_hide = 1 then 1 end) as reject_male,

                                      count(case when applicant.Status_remove = 0 AND
                                                      applicant.Gender = 'female' AND
                                                      applicant.Status_hide = 1 then 1 end) as reject_female,


                                      count(case when applicant.Status_hide = 0 AND applicant.Gender = 'male' then 1 end) as hide_male,
                                      count(case when applicant.Status_hide = 0 AND applicant.Gender = 'female' then 1 end) as hide_female,

                                      count(case when applicant.Gender = 'male' then 1 end) as male,
                                      count(case when applicant.Gender = 'female' then 1 end) as female,

                                      count(case when applicant.Status = 1 AND
                                                      applicant.Status_remove = 1 AND
                                                      applicant.Status_hide = 1 then 1 end) as applicant_new,

                                      count(case when applicant.Status = 0 AND
                                                      applicant.Status_hide = 1 AND
                                                      applicant.Status_remove = 1 then 1 end) as applicant_pulled,

                                      count(case when applicant.Status_remove = 0 AND
                                                      applicant.Status_hide = 1 then 1 end) as applicant_reject,

                                      count(case when applicant.Status_hide = 0 then 1 end) as applicant_hide,

                                      count(case when applicant.count = 1 then 1 end) as applicant_count,

                                     job.id,
                                     job.company_id as com_id,
                                     job.job_category

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON  applicant.company_id = company.id and job.id = applicant.job_id ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL APPLICANTS
   $applicant_count = $row['applicant_count'];  

  //COUNT GENDER
   $gender_male = $row['male'];
   $gender_female = $row['female'];

  //COUNT NEW
   $new = $row['applicant_new'];
   $new_male = ($row['new_male']);
   $new_female = ($row['new_female']);

  //COUNT PULL
   $pulled = ($row['applicant_pulled']);
   $pulled_male = ($row['pulled_male']);
   $pulled_female = ($row['pulled_female']);

  //COUNT PULL
   $reject = $row['applicant_reject'];
   $reject_male = ($row['reject_male']);
   $reject_female = ($row['reject_female']);

  //COUNT HIDE
   $hide = $row['applicant_hide'];
   $hide_male = ($row['hide_male']);
   $hide_female = ($row['hide_female']);

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

                                     job.id,
                                     job.company_id,

                                       count(case when job.company_id = company.id then 1 end) as count_company,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                       FROM company 
                       JOIN job ON job.company_id = company.id
                       JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id 
                       JOIN resume ON resume.resume_id = applicant.Account_id
                       JOIN peso_resume ON peso_resume.peso_resume_id = applicant.Account_id order by applicant.id desc");

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

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total  New -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $new;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $new_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $new_female;?></span>
                    </h6>   

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Pulled -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $pulled;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $pulled_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $pulled_female;?></span>
                    </h6>   

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Reject -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $reject;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $reject_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $reject_female;?></span>
                    </h6>  

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Hide -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $hide;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $hide_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $hide_female;?></span>
                    </h6>  

                    <h6 class="company " style="font-size: 13px; color: black;"> Total Applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $applicant_count;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $gender_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $gender_female;?></span>
                    </h6>     

                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="applicant-report.php"> Info </a>

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



</section>






</body>
</html>