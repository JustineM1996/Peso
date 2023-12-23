<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - Account </title>

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

<body >

<!-- START -->
<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-10 ms-lg-7">

<div class="container">
<div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> ACCOUNTS </h4>
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
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> USER  </button>
      </li>

      <li class="nav-item ms-lg-1 ms-1 col-lg-1 col-4 col-md-4" role="presentation">
        <button class="nav-link btn btn-secondary" id="pills-ended-tab " data-bs-toggle="pill" data-bs-target="#pills-ended" type="button" role="tab" aria-controls="pills-ended" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> ADMIN </button>
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

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by name and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-10 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Name and location" style="color: black; font-size: 13px;">
                    </div>
                  </li>
                         

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" onclick="resetList();"> 
                            <i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

              <div style="text-align: right;">
                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="gender" style="cursor: pointer; color: black; font-size: 13px; border: none;  border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="status" style="cursor: pointer; color: black; font-size: 13px; border: none;  border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Account </option>
                  <option class="filter" value="verified" style=" color: black; font-size: 13px;"> Active </option>
                  <option class="filter" value="deactivate" style=" color: black; font-size: 13px;"> Deactivate </option>
                </select>
              </div>

</div>
</div>
<!-- END -->




                      

<!-- Result -->
<!-- START -->
<div class="container mt-3">
<div class="row">

<div class="list">

<?php

$account_id = array();

include '../database/database.php';

$q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
while($row = mysqli_fetch_assoc($q)) {
$account_id[] = $row['id'];
}

$query = mysqli_query($con, "SELECT * FROM account where user_type = 'user' and status_account = '0'  and  id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc");
while($row = mysqli_fetch_array($query)){ 

  $img = ($row['image']);
  
?>



<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" style="box-shadow: none; border-radius: 5PX; border: none;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

              <div class="col-lg-1 col-md-3 col-3">
                  <div class="card-body p-0 pe-md ps-lg-0 mt-3"> 
                                         <?php
                         if ($img == '') {
                            echo "<img class='w-100 border-radius-md shadow-lg' src='../images/default-avatar.png' style='border-radius: 50%;' alt='image'> ";
                          } else {
                            echo "<img class='w-100 border-radius-md shadow-lg' src='$img' style='border-radius: 50%;' alt='image'>";
                         }
                      ?>
                  </div>
              </div>


              <div class="col-lg-11 col-md-12 col-12">
              <div class="card-body pe-md ps-lg-0"> 

      <?php
      
      $verified = ($row['status']);
      $account = ($row['Status_account']);

      $id = ($row['id']);
      $emails = ($row['email']);          

       if ($account > '0'){

        if ($verified == 'verified'){

                    echo "<div class='app-card-actions'>
                            <div class='dropdown' style='float: right; text-align: center;'>
                              <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>

                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                    <li>
                                    <form  action='active_inactive/deactivate_account.php' method='POST'>
                                    <div hidden>
                                    <input type='text' value='$emails' name='email'>
                                    <input type='int' value='$id' name='id'>
                                    </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                         <span>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                            <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                              <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                              <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                          </svg> 
                                        </span>
                                        <span class='ms-2'> Deactivate this account </span> 
                                      </form>
                                    </li>  

                                    <li>
                                    <form  action='active_inactive/remove_temporary_account.php' method='POST'>
                                      <div hidden>
                                      <input type='text' value='$emails' name='email'>
                                      <input type='int' value='$id' name='id'>
                                      </div>

                                        <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-x' viewBox='0 0 20 20'>
                                            <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                          </svg>
                                        <span class='ms-2'> Remove as main admin this account </span> 
                                    </form>
                                    </li>  

                                      <li>
                                        <a class='dropdown-item' href='account-report.php?id=$id' >
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                              <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                              <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Account Record </span> 
                                        </a>
                                      </li>  

                                </ul>

                            </div>
                          </div>";


                    } else {

                      echo "<div class='app-card-actions'>
                              <div class='dropdown' style='float: right; text-align: center;'>
                                <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                  <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                                </svg>

                                </div>

                                  <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                     <li>
                                      <form  action='active_inactive/activate_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                           <span>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                </svg>  
                                          </span>
                                          <span class='ms-2'> Activate this account </span> 
                                      </form>
                                      </li>   

                                      <li>
                                      <form  action='active_inactive/remove_permanent_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                            <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                          </svg>
                                           <span class='ms-2'> Remove permanent this account </span> 
                                      </form>
                                      </li>  


                                      <li>
                                        <a class='dropdown-item' href='account-report.php?id=$id' >
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                              <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                              <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Account Record </span> 
                                        </a>
                                      </li>  


                                  </ul>

                                </div>
                              </div>";


                    }
                    

     
           } else {

        if ($verified == 'verified'){

                    echo "<div class='app-card-actions'>
                            <div class='dropdown' style='float: right; text-align: center;'>
                              <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>

                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'> 
                                    
                                    <li>
                                      <form  action='active_inactive/add_admin_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='17' height='17' fill='currentColor' class='bi bi-person-check' viewBox='0 0 16 16'>
                                              <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                              <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                            </svg>
                                        </span>
                                        <span class='ms-2'> add main admin this account </span> 
                                        </form>
                                    </li> 

                                    <li>
                                      <form  action='active_inactive/deactivate_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                         <span>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                            <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                            <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                            <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                          </svg> 
                                        </span>
                                        <span class='ms-2'> Deactivate this account </span> 
                                      </form>
                                    </li>  


                                      <li>
                                        <a class='dropdown-item' href='account-report.php?id=$id' >
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                              <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                              <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Account Record </span> 
                                        </a>
                                      </li>  


                                </ul>


                              </div>
                            </div>";


                    } else {

                      echo "<div class='app-card-actions'>
                              <div class='dropdown' style='float: right; text-align: center;'>
                                <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                  <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                                </svg>

                                </div>

                                  <ul class='dropdown-menu' style='font-size: 13px; color: black;'>                       

                                      <li>
                                      <form  action='active_inactive/activate_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                           <span>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                </svg>  
                                          </span>
                                          <span class='ms-2'> Activate this account </span> 
                                        </form>
                                      </li>   

                                      <li>
                                        <form  action='active_inactive/remove_permanent_account.php' method='POST'>
                                          <div hidden>
                                          <input type='text' value='$emails' name='email'>
                                          <input type='int' value='$id' name='id'>
                                          </div>
                                        <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                              <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                            </svg>
                                             <span class='ms-2'> Remove permanent this account </span> 
                                          </form>
                                      </li>  

                                      <li>
                                        <a class='dropdown-item' href='account-report.php?id=$id' >
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                              <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                              <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Account Record </span> 
                                        </a>
                                      </li>  

                                  </ul>

                                </div>
                              </div>";


                        }
                    

                 }


         ?>


                  <script>
                      function temporary() {
                        return confirm ('Are you sure you want to temporary as admin this account');
                      }
                  </script>
                  <script>
                      function temporary_remove() {
                        return confirm ('Are you sure you want to remove temporary as admin this account');
                      }
                  </script>
                  <script>
                      function activate() {
                        return confirm ('Are you sure you want to activate this account');
                      }
                  </script>
                  <script>
                      function deactivate() {
                        return confirm ('Are you sure you want to deactivate this account');
                      }
                  </script>
                  <script>
                      function remove() {
                        return confirm ('Are you sure you want to remove permanently this account');
                      }
                  </script>  
                  





                  <?php if ($row['user_type'] == 'admin') { ?>

                  <a href="account-vew-user.php?id=<?php echo $row['id'];?>"
                     style="text-decoration: none; color: black; cursor: pointer;">
                    <h4 style="font-size: 15px;"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?> 


                  <?php
                    
                  $verified = ($row['status']);
                  $account = ($row['Status_account']);
                   
                  if ($account > '0') {

                      if ($verified == 'verified') {

                            echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:green;'> Main admin </span>";

                          } else {

                            echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:#333;'> Main admin </span>";
                          }

                      } else {

                          if ($verified == 'verified') {

                            echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:green;'> User </span>";

                          } else {

                            echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:#333;'> User </span>";
                          }

                      }

                  ?>

                   </h4>

                      <h6 style="font-size: 13px; font-weight: normal; color: black; ">
                       <?php echo $row['email'];?> - <?php echo $row['Contant_Number'];?>

                        <?php
                          
                        $verified = ($row['status']);
                        $account = ($row['Status_account']);

                        $date_time = date("F d, Y", strtotime ($row['date_time']));
                        $date_add = date("F d, Y", strtotime ($row['date_add_main_admin']));
                         
                        if ($account > '0') {

                            if ($verified == 'verified') {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time | Date add for admin on . $date_add";

                                } else {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time | Date add for admin on . $date_add";
                                }

                            } else {

                                if ($verified == 'verified') {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time";

                                } else {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time";

                                }

                            }

                        ?>

                       </h6>
                      </h6>


                  <script>
                      function deactivate() {
                        return deactivate ('Are you sure you want to deactivate this user');
                      }
                  </script>

                </a>

                <?php  } else { ?>
                      
                  <a href="account-info.php?id=<?php echo $row['id'];?>" style="text-decoration: none; color: black; cursor: pointer;">
                    <h4 style="font-size: 15px;"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?> 


                  <?php
                    
                  $verified = ($row['status']);
                  $account = ($row['Status_account']);
                   
                  if ($account > '0') {

                      if ($verified == 'verified') {

                            echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:green;'> Main admin </span>";

                          } else {

                            echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:#333;'> Main admin </span>";
                          }

                      } else {

                          if ($verified == 'verified') {

                            echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:green;'> User </span>";

                          } else {

                            echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:#333;'> User </span>";
                          }

                      }

                  ?>

                   </h4>

                   <div hidden>
                    <p class="gender" ><?php echo $row['Gender'];?></p>
                    <p class="status" ><?php echo $row['status'];?></p>
                    <p class="First_Name" ><?php echo $row['First_Name'];?></p>
                    <p class="Middel_Name" ><?php echo $row['Middel_Name'];?></p>
                    <p class="Last_Name" ><?php echo $row['Last_Name'];?></p>

                    <p class="Region"><?php echo $row['Region'];?></p>
                    <p class="Province"><?php echo $row['Province'];?></p>
                    <p class="City"><?php echo $row['Location'];?></p>
                    <p class="Barangay"><?php echo $row['Street'];?></p>
                    <p class="email"><?php echo $row['email'];?></p>
                  </div>

                      <h6 style="font-size: 13px; font-weight: normal; color: black; ">
                       <?php echo $row['email'];?> - <?php echo $row['Contant_Number'];?>

                        <?php
                          
                        $verified = ($row['status']);
                        $account = ($row['Status_account']);

                        $date_time = date("F d, Y", strtotime ($row['date_time']));
                        $date_add = date("F d, Y", strtotime ($row['date_add_main_admin']));
                         
                        if ($account > '0') {

                            if ($verified == 'verified') {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time | Date add for admin on . $date_add";

                                } else {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time | Date add for admin on . $date_add";
                                }

                            } else {

                                if ($verified == 'verified') {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time";

                                } else {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time";

                                }

                            }

                        ?>

                       </h6>
                      </h6>


                  <script>
                      function deactivate() {
                        return deactivate ('Are you sure you want to deactivate this user');
                      }
                  </script>

                </a>

                <?php } ?>

             </div>
             </div>
       
      </div>
      </div>

</div>   
</div>

<?php } ?>

</div>

      <div class="no-result">No Results</div>
      <div class="pagination mt-3"></div>

<?php

$account_id = array();

include '../database/database.php';

$q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
while($row = mysqli_fetch_assoc($q)) {
$account_id[] = $row['id'];
}

$query = mysqli_query($con, "SELECT count(*), count FROM account where user_type = 'user' and status_account = '0' and id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc");
while($row = mysqli_fetch_array($query)){ 

  $account_count = $row['count'];
  
?>

  <?php 

  if($account_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No applicant available </h5>

  <?php } }  ?>  
</div>   
</div>

</div>
<!-- END FILTER -->


<script type="text/javascript">
 var options = {
  valueNames: [
    'First_Name',
    'Middel_Name',
    'Last_Name',

    'Region',
    'Province',
    'City',
    'Barangay',

    'gender',
    'status',
    'email'

  ],
  page: 3,
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
  var values_gender = $("select[name=gender]").val();
  var values_apply = $("select[name=status]").val();

  userList.filter(function (item) {
    var Filter_gender = false;
    var Filter_apply = false;


    if(values_gender == "all")
    { 
      Filter_gender = true;
    } else {
      Filter_gender = item.values().gender.indexOf(values_gender) >= 0;
    }

    if(values_apply == "all")
    { 
      Filter_apply = true;
    } else {
      Filter_apply = item.values().status.indexOf(values_apply) >= 0;
    }

    return Filter_apply && Filter_gender

  });

}
                               
$(function(){
  //updateList();
  $("select[name=gender]").change(updateList);
  $('select[name=status]').change(updateList);

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
<!-- END USER -->













<!-- START ADMIN -->
<div class="tab-pane fade" id="pills-ended" role="tabpanel" aria-labelledby="pills-ended-tab">

<!-- START -->
<div id="admin">

<div class="container mt-3">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by name and location. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-10 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Name and location" style="color: black; font-size: 13px;">
                    </div>
                  </li>
                         

                  <li class="nav-item col-lg-1 col-12 col-md-12 mt-2">
                    <div class="location_icon form-label-group my-2">
                          <button class="btn btn-secondary" style="box-shadow: none; font-size: 14px" onclick="resetList_new();"> 
                            <i class="fa fa-refresh"></i><span class="ms-2">Clear</span></button>
                    </div>
                  </li>    

              </ul>
              </div>

              <div style="text-align: right;">
                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="gender_new" style="cursor: pointer; color: black; font-size: 13px; border: none;  border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Gender </option>
                  <option class="filter" value="Female" style=" color: black; font-size: 13px;"> Female </option>
                  <option class="filter" value="Male" style=" color: black; font-size: 13px;"> Male </option>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 mt-2 card-profile" name="status_new" style="cursor: pointer; color: black; font-size: 13px; border: none;  border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Account </option>
                  <option class="filter" value="verified" style=" color: black; font-size: 13px;"> Active </option>
                  <option class="filter" value="deactivate" style=" color: black; font-size: 13px;"> Deactivate </option>
                </select>
              </div>

</div>
</div>
<!-- END -->




                      

<!-- Result -->
<!-- START -->
<div class="container mt-3">
<div class="row">

<div class="list">

<?php

$account_id = array();

include '../database/database.php';

$q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
while($row = mysqli_fetch_assoc($q)) {
$account_id[] = $row['id'];
}

$query = mysqli_query($con, "SELECT * FROM account where user_type = 'admin' and status_account = '1' and  id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc");
while($row = mysqli_fetch_array($query)){ 

  $img = ($row['image']);
  
?>



<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" style="box-shadow: none; border-radius: 5PX; border: none;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

              <div class="col-lg-1 col-md-3 col-3">
                  <div class="card-body p-0 pe-md ps-lg-0 mt-3"> 
                                         <?php
                         if ($img == '') {
                            echo "<img class='w-100 border-radius-md shadow-lg' src='../images/default-avatar.png' style='border-radius: 50%;' alt='image'> ";
                          } else {
                            echo "<img class='w-100 border-radius-md shadow-lg' src='$img' style='border-radius: 50%;' alt='image'>";
                         }
                      ?>
                  </div>
              </div>


              <div class="col-lg-11 col-md-12 col-12">
              <div class="card-body pe-md ps-lg-0"> 

      <?php
      
      $verified = ($row['status']);
      $account = ($row['Status_account']);

      $id = ($row['id']);
      $emails = ($row['email']);          

       if ($account > '0'){

        if ($verified == 'verified'){

                    echo "<div class='app-card-actions'>
                            <div class='dropdown' style='float: right; text-align: center;'>
                              <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>

                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                    <li>
                                    <form  action='active_inactive/deactivate_account.php' method='POST'>
                                    <div hidden>
                                    <input type='text' value='$emails' name='email'>
                                    <input type='int' value='$id' name='id'>
                                    </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                         <span>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                            <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                              <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                              <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                          </svg> 
                                        </span>
                                        <span class='ms-2'> Deactivate this account </span> 
                                      </form>
                                    </li>  

                                    <li>
                                    <form  action='active_inactive/remove_temporary_account.php' method='POST'>
                                      <div hidden>
                                      <input type='text' value='$emails' name='email'>
                                      <input type='int' value='$id' name='id'>
                                      </div>

                                        <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-x' viewBox='0 0 20 20'>
                                            <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                          </svg>
                                        <span class='ms-2'> Remove as main admin this account </span> 
                                    </form>
                                    </li>  

                                      <li>
                                        <a class='dropdown-item' href='account-report.php?id=$id' >
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                              <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                              <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Account Record </span> 
                                        </a>
                                      </li>  

                                </ul>

                            </div>
                          </div>";


                    } else {

                      echo "<div class='app-card-actions'>
                              <div class='dropdown' style='float: right; text-align: center;'>
                                <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                  <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                                </svg>

                                </div>

                                  <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                     <li>
                                      <form  action='active_inactive/activate_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                           <span>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                </svg>  
                                          </span>
                                          <span class='ms-2'> Activate this account </span> 
                                      </form>
                                      </li>   

                                      <li>
                                      <form  action='active_inactive/remove_permanent_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                            <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                          </svg>
                                           <span class='ms-2'> Remove permanent this account </span> 
                                      </form>
                                      </li>  


                                      <li>
                                        <a class='dropdown-item' href='account-report.php?id=$id' >
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                              <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                              <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Account Record </span> 
                                        </a>
                                      </li>  


                                  </ul>

                                </div>
                              </div>";


                    }
                    

     
           } else {

        if ($verified == 'verified'){

                    echo "<div class='app-card-actions'>
                            <div class='dropdown' style='float: right; text-align: center;'>
                              <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                              </svg>

                              </div>

                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'> 
                                    
                                    <li>
                                      <form  action='active_inactive/add_admin_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='17' height='17' fill='currentColor' class='bi bi-person-check' viewBox='0 0 16 16'>
                                              <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                              <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                            </svg>
                                        </span>
                                        <span class='ms-2'> add main admin this account </span> 
                                        </form>
                                    </li> 

                                    <li>
                                      <form  action='active_inactive/deactivate_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                         <span>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                            <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                            <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                            <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                          </svg> 
                                        </span>
                                        <span class='ms-2'> Deactivate this account </span> 
                                      </form>
                                    </li>  


                                      <li>
                                        <a class='dropdown-item' href='account-report.php?id=$id' >
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                              <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                              <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Account Record </span> 
                                        </a>
                                      </li>  


                                </ul>


                              </div>
                            </div>";


                    } else {

                      echo "<div class='app-card-actions'>
                              <div class='dropdown' style='float: right; text-align: center;'>
                                <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                  <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                                </svg>

                                </div>

                                  <ul class='dropdown-menu' style='font-size: 13px; color: black;'>                       

                                      <li>
                                      <form  action='active_inactive/activate_account.php' method='POST'>
                                        <div hidden>
                                        <input type='text' value='$emails' name='email'>
                                        <input type='int' value='$id' name='id'>
                                        </div>
                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                           <span>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                </svg>  
                                          </span>
                                          <span class='ms-2'> Activate this account </span> 
                                        </form>
                                      </li>   

                                      <li>
                                        <form  action='active_inactive/remove_permanent_account.php' method='POST'>
                                          <div hidden>
                                          <input type='text' value='$emails' name='email'>
                                          <input type='int' value='$id' name='id'>
                                          </div>
                                        <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                              <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                            </svg>
                                             <span class='ms-2'> Remove permanent this account </span> 
                                          </form>
                                      </li>  

                                      <li>
                                        <a class='dropdown-item' href='account-report.php?id=$id' >
                                           <span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                              <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                              <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                            </svg>
                                          </span>
                                          <span class='ms-2'> Account Record </span> 
                                        </a>
                                      </li>  

                                  </ul>

                                </div>
                              </div>";


                        }
                    

                 }


         ?>


                  <script>
                      function temporary() {
                        return confirm ('Are you sure you want to temporary as admin this account');
                      }
                  </script>
                  <script>
                      function temporary_remove() {
                        return confirm ('Are you sure you want to remove temporary as admin this account');
                      }
                  </script>
                  <script>
                      function activate() {
                        return confirm ('Are you sure you want to activate this account');
                      }
                  </script>
                  <script>
                      function deactivate() {
                        return confirm ('Are you sure you want to deactivate this account');
                      }
                  </script>
                  <script>
                      function remove() {
                        return confirm ('Are you sure you want to remove permanently this account');
                      }
                  </script>  
                
                  <?php if ($row['user_type'] == 'admin') { ?>

                  <a href="account-vew-user.php?id=<?php echo $row['id'];?>"
                     style="text-decoration: none; color: black; cursor: pointer;">
                    <h4 style="font-size: 15px;"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?> 

                   <div hidden>
                    <p class="gender_new" ><?php echo $row['Gender'];?></p>
                    <p class="status_new" ><?php echo $row['status'];?></p>
                    <p class="First_Name" ><?php echo $row['First_Name'];?></p>
                    <p class="Middel_Name" ><?php echo $row['Middel_Name'];?></p>
                    <p class="Last_Name" ><?php echo $row['Last_Name'];?></p>

                    <p class="Region"><?php echo $row['Region'];?></p>
                    <p class="Province"><?php echo $row['Province'];?></p>
                    <p class="City"><?php echo $row['Location'];?></p>
                    <p class="Barangay"><?php echo $row['Street'];?></p>
                    <p class="email"><?php echo $row['email'];?></p>
                  </div>

                  <?php
                    
                  $verified = ($row['status']);
                  $account = ($row['Status_account']);
                   
                  if ($account > '0') {

                      if ($verified == 'verified') {

                            echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:green;'> Main admin </span>";

                          } else {

                            echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:#333;'> Main admin </span>";
                          }

                      } else {

                          if ($verified == 'verified') {

                            echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:green;'> User </span>";

                          } else {

                            echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:#333;'> User </span>";
                          }

                      }

                  ?>

                   </h4>

                      <h6 style="font-size: 13px; font-weight: normal; color: black; ">
                       <?php echo $row['email'];?> - <?php echo $row['Contant_Number'];?>

                        <?php
                          
                        $verified = ($row['status']);
                        $account = ($row['Status_account']);

                        $date_time = date("F d, Y", strtotime ($row['date_time']));
                        $date_add = date("F d, Y", strtotime ($row['date_add_main_admin']));
                         
                        if ($account > '0') {

                            if ($verified == 'verified') {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time | Date add for admin on . $date_add";

                                } else {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time | Date add for admin on . $date_add";
                                }

                            } else {

                                if ($verified == 'verified') {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time";

                                } else {

                                  echo "<h6 style='font-size: 12px; font-weight: normal; color: black;'> Create on . $date_time";

                                }

                            }

                        ?>

                      </h6>

                </a>

                <?php } ?>

             </div>
             </div>
       
      </div>
      </div>

</div>   
</div>

<?php } ?>

</div>

      <div class="no-result">No Results</div>
      <div class="pagination mt-3"></div>

<?php

$account_id = array();

include '../database/database.php';

$q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
while($row = mysqli_fetch_assoc($q)) {
$account_id[] = $row['id'];
}

$query = mysqli_query($con, "SELECT count(*), count FROM account where user_type = 'admin' and status_account = '1' and id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc");
while($row = mysqli_fetch_array($query)){ 

  $account_count = $row['count'];
  
?>

  <?php 

  if($account_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No applicant available </h5>

  <?php } }  ?>  
</div>   
</div>

</div>
<!-- END FILTER -->


<script type="text/javascript">
 var options = {
  valueNames: [
    'First_Name',
    'Middel_Name',
    'Last_Name',

    'Region',
    'Province',
    'City',
    'Barangay',

    'gender_new',
    'status_new',
    'email'

  ],
  page: 3,
  pagination: true
};
var userList_new = new List('admin', options);

function resetList_new(){
  userList_new.search();
  userList_new.filter();
  userList_new.update();
  $(".filter-all").prop('selected', true);
  $('.filter').prop('selected', false);
  $('.search').val('');
};
  
function updateList_new(){
  var values_gender = $("select[name=gender_new]").val();
  var values_apply = $("select[name=status_new]").val();

  userList_new.filter(function (item) {
    var Filter_gender = false;
    var Filter_apply = false;


    if(values_gender == "all")
    { 
      Filter_gender = true;
    } else {
      Filter_gender = item.values().gender_new.indexOf(values_gender) >= 0;
    }

    if(values_apply == "all")
    { 
      Filter_apply = true;
    } else {
      Filter_apply = item.values().status_new.indexOf(values_apply) >= 0;
    }

    return Filter_apply && Filter_gender

  });

}
                               
$(function(){
  //updateList_new();
  $("select[name=gender_new]").change(updateList_new);
  $('select[name=status_new]').change(updateList_new);

  userList_new.on('updated', function (list) {
    if (list.matchingItems.length > 0) {
      $('.no-result').hide()
    } else {
      $('.no-result').show()
    }
  });
});
</script>


</div>
<!-- END ADMIN -->




















<!-- ANALYSIS -->
<div class="tab-pane fade" id="pills-analysis" role="tabpanel" aria-labelledby="pills-analysis-tab">

<div class="container mt-4">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">

  <h5 class='text-black' style="color: black; font-size: 18px;"> ANALYSIS </h5>


  <?php
  $account_id = array();

  include '../database/database.php';

  $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
  while($row = mysqli_fetch_assoc($q)) {
  $account_id[] = $row['id'];
  }


  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'verified' then 1 end) as active,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'verified' then 1 end) as account_active_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'verified' then 1 end) as account_active_user

                                     FROM account WHERE status = 'verified' and id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc ");

  while($row = mysqli_fetch_array($query)){

  ?>   

       


<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Active </h4>
        </div>     

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total User -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_user']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['account_active_user']; ?></span>
                    </h6>  

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Admin -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_admin']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['account_active_admin']; ?></span>
                    </h6>  

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Account -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['active']; ?></span>
                    </h6>  
          </div>
          </div>

</div>
</div>

<?php }  ?> 



  <?php

  $account_id = array();

  include '../database/database.php';

  $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
  while($row = mysqli_fetch_assoc($q)) {
  $account_id[] = $row['id'];
  }


  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'deactivated' then 1 end) as Inactive,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'deactivated' then 1 end) as account_inactive_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'deactivated' then 1 end) as account_inactive_user

                                     FROM account WHERE status = 'deactivated' and id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc ");

  while($row = mysqli_fetch_array($query)){

  ?>   


<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Deactivate </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total User -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_user']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['account_inactive_user']; ?></span>
                    </h6>  

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Admin -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_admin']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['account_inactive_admin']; ?></span>
                    </h6> 

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Account -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['Inactive']; ?></span>
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

  $account_id = array();

  include '../database/database.php';

  $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
  while($row = mysqli_fetch_assoc($q)) {
  $account_id[] = $row['id'];
  }


  $query = mysqli_query($con,"SELECT 

                                     count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'verified' then 1 end) as active,
                                     count(case when status = 'deactivated' then 1 end) as Inactive,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'verified' then 1 end) as account_active_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'deactivated' then 1 end) as account_inactive_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'verified' then 1 end) as account_active_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'deactivated' then 1 end) as account_inactive_user

                                     FROM account WHERE id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc ");

  while($row = mysqli_fetch_array($query)){

  ?>   




<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Overall Total Report  </h4>
        </div>
           

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total User -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_user']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['account_active_user']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['account_inactive_user']; ?></span>
                    </h6>  

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Admin -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_admin']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['account_active_admin']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['account_inactive_admin']; ?></span>
                    </h6> 

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Account -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['active']; ?></span>
                       <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['Inactive']; ?></span>
                    </h6>   
                    
                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="account-all-report.php"> Info </a>

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










































</div>
<!-- END NAV -->


</div>   
</div>
</div>
<!-- END -->

</section>






</body>
</html>