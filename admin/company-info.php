<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<?php

include '../database/database.php';

if(isset($_GET['delete_profile'])){

$id = $_GET['delete_profile'];

    $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {

    $image = '../../images/'.$row['images'];;

    if (file_exists($image)) {
        unlink($image);
    }

    }

    mysqli_query($con,"UPDATE company SET images = '' WHERE id = '$id'");

    echo "<script>alert('Company profile delete successfully.')</script>";
    echo "<script>window.location = '/peso/admin/company-info.php?id=$id'</script>";

}

?>

<?php

include '../database/database.php';

if(isset($_GET['delete_ceo'])){

$id = $_GET['delete_ceo'];

    $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {

    $image = '../../images/'.$row['ceo_profile'];;

    if (file_exists($image)) {
        unlink($image);
    }

    }

    mysqli_query($con,"UPDATE company SET ceo_profile = '' WHERE id = '$id'");

    echo "<script>alert('Ceo profile delete successfully.')</script>";
    echo "<script>window.location = '/peso/admin/company-info.php?id=$id'</script>";

}

?>

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

.ceo {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 5px;
  overflow: hidden;}

.ceo:hover .ceo_content {
  opacity: .8;
  background: #111;

}

.ceo:hover .ceo_image {
  opacity: .8;
  background: #111;

}

.ceo_image {
  object-fit: cover;
  opacity: 1;
  transition: opacity .2s ease-in-out;
}

.ceo_content {
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-../assets/icons@1.10.4/font/bootstrap-../assets/icons.css">

</head>

<body>

<!-- START -->
<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-10 ms-lg-7">

<?php

include '../database/database.php';
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

        <div class="col-lg-1 col-md-3 col-3 mt-1">
        <div class="p-0 pe-md-0 ">

              <?php if ($company_profile == '') { ?>

                <a href='company-profile.php?company=<?php echo $row['id'];?>'>
                  <div class="company shadow">
                    <img class="company_image w-100 border-radius-md shadow-lg" src='../images/default-avatar.png' alt='image'>
                    <div class="company_content">
                      <span><i class="fas fa-camera" style="color: white;"></i></span>
                      <span style="font-size: 10px;"> Edit profile </span>
                    </div>
                  </div>
                </a>

             <?php  } else { ?>

                <a href='company-profile.php?company=<?php echo $row['id'];?>'>
                  <div class="company shadow">
                    <img class="company_image w-100 border-radius-md shadow-lg" src='<?php echo $company_profile ;?>' alt='image'>
                    <div class="company_content">
                      <span><i class="fas fa-camera" style="color: white;"></i></span>
                      <span style="font-size: 10px;"> Edit profile </span>
                    </div>
                  </div>
                </a>

             <?php } ?>

        </div>
        </div>

        <div class="col-lg-8 col-md-5 col-5">
        <div class="card card-plain" style="border: none; ">

            <div class="card-body px-0">
             <h4 class="text-black" style="color: black;"> <?php echo $row['company'];?> . 
                         <?php

                        $status = $row['status'];

                        if ($status == 'Active') {

                          echo "<span style='color:green; font-size: 14px; '> Active </span>";

                        } else {

                          echo "<span style='color:#333; font-size: 14px; '> Inactive </span>";
                        }
                        
                        ?>

             </h4>
           </div>

        </div>
        </div>

</div>
</div>
<!-- END -->

    <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist" style="background: none; ">

      <li class="nav-item  ms-lg-2 ms-2 col-lg-4"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-4"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-4"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-4"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-4"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-4"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-4"> </li>
      <li class="nav-item  ms-lg-2 ms-2 col-lg-5"> </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link active btn-secondary" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> VIEWING </button>
      </li>

      <li class="nav-item  ms-lg-2 ms-2" role="presentation">
        <button class="nav-link btn-secondary" id="pills-contact-tab " data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> JOBS </button>
      </li>

      <li class="nav-item  ms-lg-2 ms-2" role="presentation">
        <button class="nav-link btn-secondary" id="pills-report-tab " data-bs-toggle="pill" data-bs-target="#pills-report" type="button" role="tab" aria-controls="pills-report" aria-selected="false"
                style="box-shadow: none; border-radius: 3px; font-size: 13px"> ANALYSIS </button>
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

                  <a href='company-profile.php?ceo=<?php echo $row['id'];?>'>
                    <div class="ceo shadow">
                      <img class="ceo_image w-100 border-radius-md shadow-lg" src='../images/default-avatar.png' alt='image'>
                      <div class="ceo_content">
                        <span><i class="fas fa-camera" style="color: white;"></i></span>
                        <span style="font-size: 10px;">Update ceo profile</span>
                        <span style="font-size: 12px;">(Optional)</span>
                      </div>
                    </div>
                  </a>

               <?php  } else { ?>

                  <a href='company-profile.php?ceo=<?php echo $row['id'];?>'>
                    <div class="ceo shadow">
                      <img class="ceo_image w-100 border-radius-md shadow-lg" src='<?php echo $ceo_profile ;?>' alt='image'>
                      <div class="ceo_content">
                        <span><i class="fas fa-camera" style="color: white;"></i></span>
                        <span style="font-size: 10px;">Update ceo profile</span>
                        <span style="font-size: 12px;">(Optional)</span>
                      </div>
                    </div>
                  </a>

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
                <span class="ms-2"><?php echo $ceo;?> 

              <span style="float: right; font-weight: 500; font-size: 13px;">
              <div class="dropdown" style="cursor: pointer; float: right;">
              <div class="dropdown-toggle no-toggle-arrow btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none;"><?php include '../assets/icon/three_dot.php'?></div>

                  <ul class="dropdown-menu" style="font-size: 13px; color: black;"> 

                      <li> 
                        <a class="dropdown-item" href="company-access.php?edit_company=<?php echo $row['id'];?>"  onclick='return edit()'>
                           <span><?php include '../assets/icon/edit.php'?></span>
                           <span> Update company info </span> 
                        </a>
                      </li>  

                    <?php $status = $row['status']; ?>

                    <?php if ($status == 'Active') { ?>

                          <li> 
                            <a class="dropdown-item" href="company-access.php?inactive_company=<?php echo $row['id']; ?>" onclick='return checkdelete()'>
                               <span><?php include '../assets/icon/eye-slash.php'?></span>
                               <span class="ms-1"> Inactive company </span>
                            </a>
                          </li>

                    <?php } else if ($status == 'Inactive') { ?>

                          <li> 
                            <a class="dropdown-item" href="company-access.php?active_company=<?php echo $row['id']; ?>" onclick='return checkdelete()'>
                               <span><?php include '../assets/icon/eye.php'?></span>
                               <span class="ms-1"> Activate company </span>
                            </a>
                          </li>

                    <?php }  ?>   

                      <li> 
                        <a class="dropdown-item" href="company-info.php?delete_ceo=<?php echo $row['id'];?>" onclick='return ceo()'>
                           <span><i class="bi bi-x-circle"></i></span>
                           <span class="ms-2"> Delete ceo profile </span>
                        </a>
                      </li>


                  </ul>

              </div>
              </span>
             </span>

              <script>
                  function edit() {
                    return confirm ('Are you sure you want to update this company');
                  }
              </script>

              <script>
                  function checkdelete() {
                    return confirm ('Are you sure you want to delete this company');
                  }
              </script>

              <script>
                  function company() {
                    return confirm ('Are you sure you want to delete this company profile');
                  }
              </script>

              <script>
                  function ceo() {
                    return confirm ('Are you sure you want to delete this ceo profile ');
                  }
              </script>

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
          <h5 class='text-black' style="color: black; font-size: 18px;"> Job Opportunities </h5>

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
                <select class="col-lg-2 col-md-12 col-12 card-profile" data-bs-toggle="dropdown" aria-expanded="false" name="job_type" 
                style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected > All Job type </option>
                  <option class="filter" value="On Site" style=" color: black; font-size: 13px;"> On Site </option>
                  <option class="filter" value="Work From Home" style=" color: black; font-size: 13px;"> Work From Home </option>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="job_schedule_shift" 
                style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Shift type </option>
                  <option class="filter" value="Day Shift" style=" color: black; font-size: 13px;"> Day Shift </option>
                  <option class="filter" value="Night Shift" style=" color: black; font-size: 13px;"> Night Shift </option>
                </select>

                <select class="col-lg-3 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="job_option" 
                style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Job option type </option>

                  <?php

                  include '../database/database.php';

                  $query = mysqli_query($con,"SELECT * FROM job_option ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                  <option class="filter" value="<?php echo $row['job_option'];?>" style="color: black;" > <?php echo $row['job_option']; ?> </option>

                  <?php } ?>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="gender" 
                style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
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

                                     WHERE job.date_ended >= '$date' and  company.id = '".$_REQUEST['id']."' group BY job.id order by job.id desc ");


  while($row = mysqli_fetch_array($query)){

  $date_posted = date("F d, Y", strtotime ($row['date_posted']));

  ?>   

<div class="list--list-item">
<div class="row">

        <div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" style="box-shadow: none; border-radius: 5PX; border: none;">
        <div class="card-body ps-lg-0 ms-3">

                  <div class="dropdown" style="float: right; text-align: center;">
                    <div class="dropdown-toggle no-toggle-arrow btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none"><?php include '../assets/icon/three_dot.php'?></div>

                      <ul class="dropdown-menu" style="font-size: 13px; color: black;">                             
                          <li> 
                            <a class="dropdown-item" href="job-access.php?edit_job=<?php echo $row['id_job'];?>"  onclick='return edit()'>
                               <span><?php include '../assets/icon/edit.php'?></span>
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

                  <a href="job-company-info.php?id=<?php echo $row['id_job'];?>" style="text-decoration: none; color: black;">
                    <h4 class="job_title" style="font-size: 15px;">  <?php echo $row['job_title'];?>

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

<?php } ?>

</div>



  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as job_count, date_ended FROM job WHERE date_ended >= '$date' and  company_id = '".$_REQUEST['id']."'  ");

  while($row = mysqli_fetch_array($query)){

   $job_count = $row['job_count'];

  ?>  

  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } else {  ?>  

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

  include '../database/database.php';

  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d, h:i:s A');

  $query = mysqli_query($con,"SELECT company.id,
                                     job.id,
                                     job.date_ended,
                                     job.company_id as com_id

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     WHERE job.date_ended >= '$date' and company.id = '".$_REQUEST['id']."' group by company.id");

  while($row = mysqli_fetch_array($query)){

   $com_id = $row['com_id'];

  ?>  

  <?php if($com_id == '') {  ?>

  <?php } else { ?>

  <h5 class='text-black' style="color: black; font-size: 18px;"> Jobs by category </h5>

  <?php } } ?>   

  <?php

  include '../database/database.php';

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

                                     job.id,
                                     job.job_title,
                                     job.job_category,
                                     job.date_ended,
                                     job.company_id as com_id,
                                     count(case when job.count = 1 then 1 end) as job_count

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id 
                                     LEFT JOIN job_category ON job_category.job_category = job.job_category 

                                     WHERE job.date_ended >= '$date' and company.id = '".$_REQUEST['id']."' group by job.job_category ");

  while($row = mysqli_fetch_array($query)){

   $com_id = $row['com_id'];

  ?>  

  <?php if($com_id == '') { ?>

  <?php } else { ?>

<div class="col-lg-4 mt-2">
<div class="cardm card-profile info-horizontal border-radius-xl d-block d-block p-0 h-100" >

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

            <div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-2" style="background: none; box-shadow: none; border-radius: 5PX; border: none;">
            <div class="card-body ps-lg-0 ms-3">
            <a href="job.php" style="text-decoration: none; color: black;">
                <h4 class="job_category" style="font-size: 15px;">  <?php echo $row['job_category'];?></h4>
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

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d, h:i:s A');
  $query = mysqli_query($con,"SELECT company.id,
                                     job.id,
                                     job.date_ended,
                                     job.company_id as com_id

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     WHERE job.date_ended >= '$date' and company.id = '".$_REQUEST['id']."' group by company.id");

  while($row = mysqli_fetch_array($query)){

   $com_id = $row['com_id'];

  ?>  

  <?php if($com_id == '') {  ?>

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






<div class="container mt-5" hidden>
<div class="row">

<?php

include '../database/database.php';
$company_query = mysqli_query($con,"SELECT * FROM company
                                             LEFT JOIN company_question ON company_question.company_id = company.id WHERE company.id = '".$_REQUEST['id']."' ");
while($row = mysqli_fetch_assoc($company_query)) {

?>

<h5 class='text-black' style='color: black; font-size: 18px;'> Common questions about <?php echo $row['company'] ?> <span style="color: gray; font-size: 13px">(Optional)</span>  </h5>
<div class='accordion col-12 col-md-12 col-lg-12 mt-3' id='accordionPanelsStayOpenExample '>

      <!-- QUESTION 1 -->
      <div class='accordion-item card card-profile col-lg-12 col-md-12 col-12 my-auto'  style='box-shadow: none;'>

          <button class='accordion-button shadow-none collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collap_1' aria-expanded='false' aria-controls='panelsStayOpen-collap_1'>
           <h6 style='font-size: 15px'>  Is <?php echo $row['company'] ?> hiring now in the Philippines? </h6>
          </button>

        <div id='panelsStayOpen-collap_1' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingTwo'>
          <div class='accordion-body' style='color: black'>

                 <?php if ($row['question_1'] == '') { ?>

                  <span style='font-size: 14px'> Empty </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>

                 <?php  } else { ?>

                  <span style='font-size: 14px'> <?php echo $row['question_1'] ?> </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;" onclick='return delete_data()'> Clear <i class='fas fa-angle-right ms-2'></i> </a>
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>

                 <?php } ?>
             
          </div>
        </div>

      </div>

      <!-- QUESTION 2 -->
      <div class='accordion-item card card-profile col-lg-12 col-md-12 col-12 my-auto ' style='box-shadow: none;'>

          <button class='accordion-button shadow-none collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapse_2' aria-expanded='false' aria-controls='panelsStayOpen-collapse_2'>
             <h6 style='font-size: 15px'> Is it hard to get a job at <?php echo $row['company'] ?> in the Philippines? </h6>
          </button>

        <div id='panelsStayOpen-collapse_2' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingThree'>
          <div class='accordion-body' style='color: black'>

                 <?php if ($row['question_2'] == '') { ?>

                  <span style='font-size: 14px'> Empty </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>

                 <?php  } else { ?>

                  <span style='font-size: 14px'> <?php echo $row['question_2'] ?> </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;" onclick='return clear()'> Clear <i class='fas fa-angle-right ms-2'></i> </a>
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>
                
                 <?php } ?>

          </div>
        </div>

      </div>
 
      <!-- QUESTION 3 -->
      <div class='accordion-item card card-profile col-lg-12 col-md-12 col-12 my-auto ' style='box-shadow: none;'>

          <button class='accordion-button shadow-none collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapse_3' aria-expanded='false' aria-controls='panelsStayOpen-collapse_3'>
             <h6 style='font-size: 15px'> What is the hiring process at <?php echo $row['company'] ?>? </h6>
          </button>

        <div id='panelsStayOpen-collapse_3' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingThree'>
          <div class='accordion-body' style='color: black'>

                 <?php if ($row['question_3'] == '') { ?>

                  <span style='font-size: 14px'> Empty </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>

                 <?php  } else { ?>

                  <span style='font-size: 14px'> <?php echo $row['question_3'] ?> </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;" onclick='return clear()'> Clear <i class='fas fa-angle-right ms-2'></i> </a>
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>
                
                 <?php } ?>
          </div>
        </div>

      </div>
 
      <!-- QUESTION 4 -->
      <div class='accordion-item card card-profile col-lg-12 col-md-12 col-12 my-auto ' style='box-shadow: none;'>

          <button class='accordion-button shadow-none collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapse_4' aria-expanded='false' aria-controls='panelsStayOpen-collapse_4'>
             <h6 style='font-size: 15px'> Who is the CEO of <?php echo $row['company'] ?>?</h6>
          </button>

        <div id='panelsStayOpen-collapse_4' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingThree'>
          <div class='accordion-body' style='color: black'>

                 <?php if ($row['question_4'] == '') { ?>

                  <span style='font-size: 14px'> Empty </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>

                 <?php  } else { ?>

                  <span style='font-size: 14px'> <?php echo $row['question_4'] ?> </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;" onclick='return clear()'> Clear <i class='fas fa-angle-right ms-2'></i> </a>
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>
                
                 <?php } ?>

          </div>
        </div>

      </div>
 
      <!-- QUESTION 5 -->
      <div class='accordion-item card card-profile col-lg-12 col-md-12 col-12 my-auto' style='box-shadow: none;'> 

          <button class='accordion-button shadow-none collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapse_5' aria-expanded='false' aria-controls='panelsStayOpen-collapse_5'>
             <h6 style='font-size: 15px'> How many employees does <?php echo $row['company'] ?> have? </h6>
          </button>

        <div id='panelsStayOpen-collapse_5' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingThree'>
          <div class='accordion-body' style='color: black'>

                 <?php if ($row['question_5'] == '') { ?>

                  <span style='font-size: 14px'> Empty </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>

                 <?php  } else { ?>

                  <span style='font-size: 14px'> <?php echo $row['question_5'] ?> </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;" onclick='return clear()'> Clear <i class='fas fa-angle-right ms-2'></i> </a>
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>
                
                 <?php } ?>

          </div>
        </div>

      </div>
 
      <!-- QUESTION 6 -->
      <div class='accordion-item card card-profile col-lg-12 col-md-12 col-12 my-auto' style='box-shadow: none;'> 

          <button class='accordion-button shadow-none collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapse_6' aria-expanded='false' aria-controls='panelsStayOpen-collapse_6'>
            <h6 style='font-size: 15px'> Where are <?php echo $row['company'] ?> headquarters? </h6>
          </button>
        
        <div id='panelsStayOpen-collapse_6' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingThree'>
          <div class='accordion-body' style='color: black'>

                 <?php if ($row['question_6'] == '') { ?>

                  <span style='font-size: 14px'> Empty </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>

                 <?php  } else { ?>

                  <span style='font-size: 14px'> <?php echo $row['question_6'] ?> </span>  

                  <span style="float: right; font-weight: 500; font-size: 13px;">
                  <a href="#" style="text-decoration: none; color: black;" onclick='return clear()'> Clear <i class='fas fa-angle-right ms-2'></i> </a>
                  <a href="#" style="text-decoration: none; color: black;"> Update <i class='fas fa-angle-right ms-2'></i> </a>
                  </span>
                
                 <?php } ?>

          </div>
        </div>

      </div>
 
       <script>
          function clear() {
            return confirm ('Are you sure you want to delete');
          }
      </script>

</div>

<?php } ?>

</div>
</div>

</div>
<!-- VIEW -->














<!-- JOBS -->
<div class="tab-pane fade mt-4" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" > 
  
    <ul class="nav nav-pills mb-3 mt-3 col-lg-4" id="pills-tab" role="tablist" style="background: none;">

      <li class="nav-item" role="presentation">
        <button class="nav-link active btn-secondary" id="pills-new-tab" data-bs-toggle="pill" data-bs-target="#pills-new" type="button" role="tab" aria-controls="pills-new" aria-selected="true"
                style="border-radius: 3px; font-size: 12px;  box-shadow: none;"> NEW JOBS </button>
      </li>

      <li class="nav-item ms-lg-2 ms-2" role="presentation">
        <button class="nav-link btn-secondary" id="pills-ended-tab " data-bs-toggle="pill" data-bs-target="#pills-ended" type="button" role="tab" aria-controls="pills-ended" aria-selected="false"
                style="border-radius: 3px; font-size: 12px;  box-shadow: none;"> END JOBS </button>
      </li>

    </ul>

<!-- HEAD B -->
<div class="tab-content" id="job-tabContent">

<!-- NEW JOBS-->
<div class="tab-pane fadeshow active mt-4" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">

<!-- START -->
<div id="new_jobs">
<div class="container">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by Job Position. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-10 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work or company" style="color: black; font-size: 13px;">
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
                <select class="col-lg-2 col-md-12 col-12 card-profile" name="job_type_new" 
                style=" cursor: pointer; border: none;  color: black; font-size: 13px; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected > All Job type </option>
                  <option class="filter" value="On Site" style=" color: black; font-size: 13px;"> On Site </option>
                  <option class="filter" value="Work From Home" style=" color: black; font-size: 13px;"> Work From Home </option>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="job_schedule_shift_new" 
                style=" cursor: pointer; border: none;  color: black; font-size: 13px; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Shift type </option>
                  <option class="filter" value="Day Shift" style=" color: black; font-size: 13px;"> Day Shift </option>
                  <option class="filter" value="Night Shift" style=" color: black; font-size: 13px;"> Night Shift </option>
                </select>

                <select class="col-lg-3 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="job_option_new" 
                style=" cursor: pointer; border: none;  color: black; font-size: 13px; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Job option type </option>

                  <?php

                  include '../database/database.php';

                  $query = mysqli_query($con,"SELECT * FROM job_option ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                  <option class="filter" value="<?php echo $row['job_option'];?>" style="color: black;" > <?php echo $row['job_option']; ?> </option>

                  <?php } ?>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="gender_new" 
                style=" cursor: pointer; border: none;  color: black; font-size: 13px; border-radius: 3px; padding: 5px 10px">
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

  include '../database/database.php';

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

                                     WHERE job.date_ended >= '$date' and  company.id = '".$_REQUEST['id']."' group BY job.job_title order by job.id desc ");


  while($row = mysqli_fetch_array($query)){

  $date_posted = date("F d, Y", strtotime ($row['date_posted']));

  ?>   

<div class="list--list-item">
<div class="row">

        <div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" style=" box-shadow: none; border-radius: 5PX; border: none; ">
        <div class="card-body ps-lg-0 ms-3">

                  <div class="dropdown" style="float: right; text-align: center;" >
                    <div class="dropdown-toggle no-toggle-arrow btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none"><?php include '../assets/icon/three_dot.php'?></div>

                      <ul class="dropdown-menu" style="font-size: 13px; color: black;">                             
                          <li> 
                            <a class="dropdown-item" href="job-access.php?edit_job=<?php echo $row['id_job'];?>"  onclick='return edit()'>
                               <span><?php include '../assets/icon/edit.php'?></span>
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

                  <a href="job-company-info.php?id=<?php echo $row['id_job'];?>" style="text-decoration: none; color: black;">
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

<?php } ?>

</div>   

<div class="no-result ">No Results</div>
<div class="pagination mt-3"></div>



  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as job_count, date_ended FROM job WHERE date_ended >= '$date' and  company_id = '".$_REQUEST['id']."'  ");

  while($row = mysqli_fetch_array($query)){

   $job_count = $row['job_count'];

  ?>  

  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } else {  ?>  

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
<!-- NEW JOBS-->




















<!-- END JOBS -->
<div class="tab-pane fade mt-4" id="pills-ended" role="tabpanel" aria-labelledby="pills-ended-tab">

<!-- START -->
<div id="end_jobs">
<div class="container">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by Job Position. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-10 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Work or company" style="color: black; font-size: 13px;">
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
                <select class="col-lg-2 col-md-12 col-12 card-profile" name="job_type_end" 
                style=" cursor: pointer; color: black; font-size: 13px; border: none;  border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected > All Job type </option>
                  <option class="filter" value="On Site" style=" color: black; font-size: 13px;"> On Site </option>
                  <option class="filter" value="Work From Home" style=" color: black; font-size: 13px;"> Work From Home </option>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="job_schedule_shift_end" 
                style=" cursor: pointer; color: black; font-size: 13px; border: none;  border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style=" color: black; font-size: 13px;" selected> All Shift type </option>
                  <option class="filter" value="Day Shift" style=" color: black; font-size: 13px;"> Day Shift </option>
                  <option class="filter" value="Night Shift" style=" color: black; font-size: 13px;"> Night Shift </option>
                </select>

                <select class="col-lg-3 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="job_option_end" 
                style=" cursor: pointer; color: black; font-size: 13px; border: none;  border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Job option type </option>

                  <?php

                  include '../database/database.php';

                  $query = mysqli_query($con,"SELECT * FROM job_option ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                  <option class="filter" value="<?php echo $row['job_option'];?>" style="color: black;" > <?php echo $row['job_option']; ?> </option>

                  <?php } ?>
                </select>

                <select class="col-lg-2 ms-lg-2 ms-0 col-md-12 col-12 card-profile" name="gender_end" 
                style=" cursor: pointer; color: black; font-size: 13px; border: none;  border-radius: 3px; padding: 5px 10px">
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

  include '../database/database.php';

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
                                     JOIN job ON job.company_id = company.id 
                                     LEFT JOIN applicant ON applicant.job_id = job.id and job.id = applicant.job_id

                                     WHERE job.date_ended <= '$date' and  company.id = '".$_REQUEST['id']."' group BY job.job_title order by job.id desc ");


  while($row = mysqli_fetch_array($query)){

  $date_posted = date("F d, Y", strtotime ($row['date_posted']));

  ?>   

<div class="list--list-item">
<div class="row">

        <div class="card card-profile col-lg-12 col-md-12 col-12 my-auto mt-3" style="box-shadow: none; border-radius: 5PX; border: none; ">
        <div class="card-body ps-lg-0 ms-3">

                  <div class="dropdown" style="float: right; text-align: center;" hidden>
                    <div class="dropdown-toggle no-toggle-arrow btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none;"><?php include '../assets/icon/three_dot.php'?></div>

                      <ul class="dropdown-menu" style="font-size: 13px; color: black;">

                          <li> 
                            <a class="dropdown-item" href="job-access.php?edit_job=<?php echo $row['id_job'];?>"  onclick='return edit()'>
                               <span><?php include '../assets/icon/edit.php'?></span>
                               <span> Update job info </span> 
                            </a>
                          </li>  
                          <li> 
                            <a class="dropdown-item" href="delete/job_delete.php?id=<?php echo $row['id_job']; ?>" onclick='return checkdelete()'>
                               <span><?php include '../assets/icon/delete.php'?></span>
                               <span> Delete job </span>
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
                        return confirm ('Are you sure you want to delete this Job');
                      }
                  </script>
                  <a href="job-company-info.php?id=<?php echo $row['id_job'];?>" style="text-decoration: none; color: black;">
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
 
                     <h6 style="font-size: 14px; color: black;"> <?php echo $row['City'];?>, <?php echo $row['Province'];?> </h6>  
                     
                    <div hidden>
                    <p class="Region_end"><?php echo $row['Region'];?></p>
                    <p class="Province_end"><?php echo $row['Province'];?></p>
                    <p class="City_end"><?php echo $row['City'];?></p>
                    <p class="Barangay_end"><?php echo $row['Barangay'];?></p>
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

<?php } ?>

</div>

<div class="no-result ">No Results</div>
<div class="pagination mt-3"></div>

  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as job_count, date_ended FROM job WHERE date_ended <= '$date' and  company_id = '".$_REQUEST['id']."'  ");

  while($row = mysqli_fetch_array($query)){

   $job_count = $row['job_count'];

  ?>  

  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } else {  ?>  

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

    'Region_end',
    'Province_end',
    'City_end',
    'Barangay_end',

    'job_title_end',
    'job_type_end',
    'job_option_end',
    'job_schedule_shift_end',
    'gender_end'
  ],
  page: 5,
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
<!-- END JOBS -->



</div>
<!-- HEAD B-->



</div>
<!-- JOBS  -->

























<!-- TOTAL REPORT -->
<div class="tab-pane fade" id="pills-report" role="tabpanel" aria-labelledby="pills-report-tab">

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
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as job_count, company_id FROM job WHERE company_id = '".$_REQUEST['id']."'  ");

  while($row = mysqli_fetch_array($query)){

   $job_count = $row['job_count'];

  ?>  

  <?php 

  if($job_count <= 0) {  ?>

  <h5 class='text-black' style="color: black; font-size: 18px;"> ANALYSIS </h5>
  <h5 class='text-black mt-3' style='color: black; font-size: 18px;'> No job available </h5>

  <?php } else {  ?>  

  <h5 class='text-black' style="color: black; font-size: 18px;"> ANALYSIS </h5>

  <?php } } ?>  




  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,

                                     job.id as jobid,
                                     job.company_id as com_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,
                                     job.job_status,

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

                                      count(case when applicant.count = 1 then 1 end) as applicant_count


                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id
                                     WHERE company.id = '".$_REQUEST['id']."' group by job.id desc ");

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

  $com_id = $row['com_id'];

  ?>   

<?php if($com_id == '') { ?>

<?php } else { ?>

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black;">  <?php echo $row['job_title'];?> 
          <?php

          date_default_timezone_set('Asia/Manila');
          $date = date('Y-m-d');
          $date_ended = $row['date_ended'];
          $job_status = $row['job_status'];

          if ($job_status == 'Active' and $date_ended >= $date) {

            echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> $job_status </span></td>";

          } else if ($job_status == 'Inactive' and $date_ended == '0000-00-00') {

            echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> $job_status </span></td>";

          } else if ($job_status == 'Active' and $date_ended <= $date)  {

            echo "<td style='text-align: center;'> <span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px; font-size: 10px'> Successfull </span></td>";

          }

          ?>  
          </h4>
        </div>



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

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $applicant_count;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $gender_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $gender_female;?></span>
                    </h6>   

                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="company-report-by-job.php?id=<?php echo $row['jobid']; ?>"> Info </a>

          </div>
          </div>

</div>
</div>

<?php } } ?> 

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
                                     job.company_id,
                                     job.job_category

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON  applicant.company_id = company.id and job.id = applicant.job_id

                                     WHERE company.id = '".$_REQUEST['id']."'  ");

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

  $query = mysqli_query($con,"SELECT company.id as com_id_id,

                                     job.id,
                                     job.company_id,


                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id WHERE company.id = '".$_REQUEST['id']."'");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];
    $com_id_id = $row['com_id_id'];

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
  
                    <a class="btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="company-report.php?id=<?php echo $com_id_id ?>"> Info </a>


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
<!-- TOTAL REPORT  -->








</div>
<!-- HEAD A -->

</div>
</div>
</div>

</section>
<!-- SECTION -->



</body>
</html>