<?php include 'session.php';?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

  <!-- LINK -->
  <?php include 'link.php';?>

  <!-- TITLE -->
  <title> PESO - Peso Word experince </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>


<style type='text/css'>

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
<section class="my-3 py-3">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-12">



<?php
    include '../database/database.php';
    $query = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
    while($row = mysqli_fetch_array($query)){
?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='peso-resume-view.php?id=<?php echo $row['id'];?>' style="text-decoration: none;" onclick='return cancel()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

  <script type="text/javascript">
      window.history.forward();
      function cancel() {
      return confirm ('Are you sure you want to cancel');
      }
  </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> WORK EXPERIENCE <p> | Edit </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->


<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100" style="border: 1px solid lightgray;">

        <div class="ps-md-0 mt-md-0 col-lg-12">
        <div class="row">

                <div class="col-lg-2 col-md-12 col-12 mt-3">
                <div class="p-0 pe-md-0 ">
                      <?php
                         if ($profile_acc == '') {
                            echo "<img class='w-100 border-radius-md shadow' src='../images/default-avatar.png' style='border-radius: 50%;' alt='image'> ";
                          } else {
                            echo "<img class='w-100 border-radius-md shadow' src='$profile_acc' style='border-radius: 50%;' alt='image'>";
                         }
                      ?>
                </div>
                </div>

                <!-- information -->
                <div class="col-lg-8 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">
                    
                    <h6 style="font-size: 15px; color: black; ">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['email'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['Contant_Number'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                      <span class="ms-2">
                      <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?> </span>
                    </h6>          


                    <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                      </svg>
                      <span class="ms-2">
                      <span style="font-weight: normal;"> Date Create </span>: <?php echo date("F d, Y", strtotime ($row['date_time']));?></span>
                    </h6>

                </div>
                </div>
                

          </div>
          </div>

      </div>
      </div>

</div>
</div>


<?php } 

$query = mysqli_query($con,"SELECT * FROM account
                                     LEFT JOIN personal ON personal.personal_id = account.id
                                     LEFT JOIN education ON education.education_id = account.id
                                     LEFT JOIN work_experience ON work_experience.work_experience_id = account.id WHERE account.id = '$id_acc' ");
while($row = mysqli_fetch_array($query)) {

?>

<!-- START -->
<div class="container mt-3">
<div class="row">

<div class="col-lg-12">
<div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

    <div class="ps-md-0 mt-md-0 col-lg-12">
    <div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Work Experience  </h4>
        </div>







       <!-- EDUCATION-->
                         <div class="nav-wrapper position-relative">
                         <label class="mt-2 text-sm" > Information </label>
                         <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Level of education
                                  <div class="form-label-group"> <?php echo $row['Education'];?> <?php echo $row['Field_Of_Study'];?> <?php echo $row['School_Name'];?>
                                  </div>
                                </p>
                              </li>

                          </ul>
                          </div>

                          <!-- COMPLETE ADDRESS -->
                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Complete Addres </label>
                          <script src="ph-address-selector.js"></script>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Province </label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="region" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;"></select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="Region" id="region-text" value="<?php echo $row['Region']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Province </label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="province" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;"></select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="Province" id="province-text" value="<?php echo $row['Province']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> City / Municipality </label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="city"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"></select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="City" id="city-text" value="<?php echo $row['City']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Barangay </label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="barangay"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"></select>
                                  <input type="hidden" class="input-groupl input-groupl-md form-control shadow-none" name="Barangay" id="barangay-text" value="<?php echo $row['Barangay']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-md-6 mb-3">
                                  <label for="street-text" class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Street <span style="color: gray; font-size: 13px">(Optional)</span>  </label>
                                  <input type="text" class="form-control form-control-md form-control shadow-none" name="Street" id="street-text" value="<?php echo $row['Street']; ?>" 
                                         style="color: black; text-align: left; font-size: 13PX;">
                              </div>

                            </div>



                          <!-- TIME PERIOD -->
                          <div class="nav-wrapper position-relative">
                          <label class="mt-2 text-sm" > Time period </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                            <?php  if($row['currently_enrolled'] == 'checked') { ?>

                                  <li class="nav-item col-0 col-md-0 col-lg-0 mt-1">
                                      <div class="form-label-group">
                                        <input type="checkbox" name="currently_enrolled" id="currently_enrolled_edit" style="color: black; font-size: 13PX;" checked onclick="enableCreateUser()">
                                      </div>
                                  </li>

                                  <li class="nav-item col-11 col-md-11 col-lg-11">
                                      <div class="form-label-group">
                                        <input type="text" style="color: black; font-size: 13PX; background: none; border: none;" 
                                                value="Currently enrolled" class="form-control shadow-none">
                                      </div>
                                  </li>

                            <?php } else { ?>

                                  <li class="nav-item col-0 col-md-0 col-lg-0 mt-1">
                                      <div class="form-label-group">
                                        <input type="checkbox" name="currently_enrolled" id="currently_enrolled_edit" style="color: black; font-size: 13PX;" onclick="enableCreateUser()">
                                      </div>
                                  </li>

                                  <li class="nav-item col-11 col-md-11 col-lg-11">
                                      <div class="form-label-group">
                                        <input type="text" style="color: black; font-size: 13PX; background: none; border: none;" 
                                                value="Currently enrolled" class="form-control shadow-none">
                                      </div>
                                  </li>

                            <?php } ?>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative mt-1">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-5 col-md-5 col-lg-5">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> From 
                                  <div class="form-label-group">
                                  <select type="int" name="School_From_Date_Month" class="input-group shadow-none mt-2" required 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" >
                                    <option value="<?php echo $row['School_From_Date_Month']; ?>" hidden ><?php echo $row['School_From_Date_Month']; ?></option>
                                    <option value="January" style="color: black;" >January </option>
                                    <option value="February" style="color: black;" >February </option>
                                    <option value="March" style="color: black;" >March </option>
                                    <option value="April" style="color: black;" >April </option>
                                    <option value="May" style="color: black;" >May </option>
                                    <option value="June" style="color: black;" >June </option>
                                    <option value="July" style="color: black;" >July </option>
                                    <option value="August" style="color: black;" >August </option>
                                    <option value="September" style="color: black;" >September </option>
                                    <option value="October" style="color: black;" >October </option>
                                    <option value="November" style="color: black;" >November </option>
                                    <option value="December" style="color: black;" >December </option>
                                  </select>
                                  </div>
                                </p>
                              </li>

                              <li class="nav-item ms-lg-2 ms-2 col-5 col-md-5 col-lg-5">
                                <p class="form-label" style="color: white; text-align: left; font-size: 13PX; cursor: none;"> 1
                                  <div class="form-label-group">
                                  <select class="input-group shadow-none" type="int" name="School_From_Date_Year" id="form_year" required
                                            style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" > 
                                      <option value="<?php echo $row['School_From_Date_Year']; ?>" hidden ><?php echo $row['School_From_Date_Year']; ?></option>
                                  </select>
                                  </div>
                                </p>
                              </li>                              
                              <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
                              <script type="text/javascript">
                                let fromstartYear = 1979;
                                let fromdateendYear = new Date().getFullYear();
                                for (i = fromdateendYear; i > fromstartYear; i--)
                                {
                                  $('#form_year').append($('<option />').val(i).html(i));
                                }
                              </script>

                              <li class='nav-item col-5 col-md-5 col-lg-5' id="close_to_month_edit">
                                <p class='form-label' style='color: black; text-align: left; font-size: 13PX;'> To 
                                  <div class='form-label-group'>
                                  <select type='int' name='School_From_To_Month' class='input-group shadow-none mt-2' id='to_month_edit' required
                                          style='color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;'>
                                    <option value='<?php echo $row['School_From_To_Month']; ?>' hidden ><?php echo $row['School_From_To_Month']; ?></option>
                                    <option value='January' style='color: black;' >January </option>
                                    <option value='February' style='color: black;' >February </option>
                                    <option value='March' style='color: black;' >March </option>
                                    <option value='April' style='color: black;' >April </option>
                                    <option value='May' style='color: black;' >May </option>
                                    <option value='June' style='color: black;' >June </option>
                                    <option value='July' style='color: black;' >July </option>
                                    <option value='August' style='color: black;' >August </option>
                                    <option value='September' style='color: black;' >September </option>
                                    <option value='October' style='color: black;' >October </option>
                                    <option value='November' style='color: black;' >November </option>
                                    <option value='December' style='color: black;' >December </option>
                                  </select>
                                  </div>
                                </p>
                              </li>

                              <li class="nav-item ms-lg-2 ms-2 col-5 col-md-5 col-lg-5" id="close_to_year_edit">
                                <p class="form-label" style="color: white; text-align: left; font-size: 13PX; cursor: none;"> 2
                                  <div class="form-label-group">
                                  <select class=" input-group shadow-none" type="int" name="School_From_To_Year" id="to_year_edit"  required
                                            style=" color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" > 
                                      <option value="<?php echo $row['School_From_To_Year']; ?>" hidden ><?php echo $row['School_From_To_Year']; ?></option>
                                  </select>
                                  </div>
                                </p>
                              </li>    
                              <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
                              <script type="text/javascript">
                                let tostartYear = 1979;
                                let toendYear = new Date().getFullYear();
                                for (i = toendYear; i > tostartYear; i--)
                                {
                                  $('#to_year_edit').append($('<option />').val(i).html(i));
                                }
                              </script>

                          </ul>
                          </div>






















            <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100">
            <div class="col-lg-12 col-md-12 col-12">
            <div class="p-0 pe-md-0">

                         <input type="text" name="work_id" value="<?php echo $row['work_id']?>" hidden>

                          <!-- EDUCATION-->
                         <div class="nav-wrapper position-relative">
                         <label class="mt-2 text-sm" > Information </label>
                         <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Job Title
                                  <div class="form-label-group">
                                    <input type="text" style="color: black; font-size: 13PX;"  value="<?php echo $row['Job_Title'];?>" required
                                           name="Job_Title"  class="form-control shadow-none" placeholder="Enter job title" >
                                  </div>
                                </p>
                              </li>

                              <li class="nav-item ms-lg-1 ms-1">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Field of study
                                  <div class="form-label-group">
                                    <input type="text" style="color: black; font-size: 13PX;"  value="<?php echo $row['Company'];?>" required
                                           name="Company"  class="form-control shadow-none" placeholder="Enter company" >
                                  </div>
                                </p>
                              </li>                              


                          </ul>
                          </div>

                          <!-- COMPLETE ADDRESS -->
                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Complete Addres </label>
                          <script src="ph-address-selector.js"></script>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Province </label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="region" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;"></select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="Region" id="region-text" value="<?php echo $row['Region']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Province </label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="province" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;"></select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="Province" id="province-text" value="<?php echo $row['Province']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> City / Municipality </label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="city"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"></select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="City" id="city-text" value="<?php echo $row['City']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Barangay </label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="barangay"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"></select>
                                  <input type="hidden" class="input-groupl input-groupl-md form-control shadow-none" name="Barangay" id="barangay-text" value="<?php echo $row['Barangay']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-md-6 mb-3">
                                  <label for="street-text" class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Street <span style="color: gray; font-size: 13px">(Optional)</span>  </label>
                                  <input type="text" class="form-control form-control-md form-control shadow-none" name="Street" id="street-text" value="<?php echo $row['Street']; ?>" 
                                         style="color: black; text-align: left; font-size: 13PX;">
                              </div>

                            </div>




                          <!-- TIME PERIOD -->
                          <div class="nav-wrapper position-relative">
                          <label class="mt-2 text-sm" > Time period </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                            <?php  if($row['currently_employed'] == 'checked') { ?>

                                  <li class="nav-item col-0 col-md-0 col-lg-0 mt-1">
                                      <div class="form-label-group">
                                        <input type="checkbox" name="currently_employed" id="currently_employed_edit" style="color: black; font-size: 13PX;" checked onclick="enableCreateUser()">
                                      </div>
                                  </li>

                                  <li class="nav-item col-11 col-md-11 col-lg-11">
                                      <div class="form-label-group">
                                        <input type="text" style="color: black; font-size: 13PX; background: none; border: none;" 
                                                value="Currently employed" class="form-control shadow-none">
                                      </div>
                                  </li>

                            <?php } else { ?>

                                  <li class="nav-item col-0 col-md-0 col-lg-0 mt-1">
                                      <div class="form-label-group">
                                        <input type="checkbox" name="currently_employed" id="currently_employed_edit" style="color: black; font-size: 13PX;" onclick="enableCreateUser()">
                                      </div>
                                  </li>

                                  <li class="nav-item col-11 col-md-11 col-lg-11">
                                      <div class="form-label-group">
                                        <input type="text" style="color: black; font-size: 13PX; background: none; border: none;" 
                                                value="Currently employed" class="form-control shadow-none">
                                      </div>
                                  </li>

                            <?php } ?>

                          </ul>
                          </div>


                          <div class="nav-wrapper position-relative mt-1">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item ms-lg-2 ms-2 col-5 col-md-5 col-lg-5">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> From 
                                  <div class="form-label-group">
                                  <select type="int" name="Work_From_Date_Month" class="input-group shadow-none mt-2" required 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  >
                                    <option value="<?php echo $row['Work_From_Date_Month']; ?>" hidden ><?php echo $row['Work_From_Date_Month']; ?></option>
                                    <option value="January" style="color: black;" >January </option>
                                    <option value="February" style="color: black;" >February </option>
                                    <option value="March" style="color: black;" >March </option>
                                    <option value="April" style="color: black;" >April </option>
                                    <option value="May" style="color: black;" >May </option>
                                    <option value="June" style="color: black;" >June </option>
                                    <option value="July" style="color: black;" >July </option>
                                    <option value="August" style="color: black;" >August </option>
                                    <option value="September" style="color: black;" >September </option>
                                    <option value="October" style="color: black;" >October </option>
                                    <option value="November" style="color: black;" >November </option>
                                    <option value="December" style="color: black;" >December </option>
                                  </select>
                                  </div>
                                </p>
                              </li>

                              <li class="nav-item ms-lg-2 ms-2 col-5 col-md-5 col-lg-5">
                                <p class="form-label" style="color: white; text-align: left; font-size: 13PX;"> 1
                                  <div class="form-label-group">
                                  <select class="input-group shadow-none" type="int" name="Work_From_Date_Year" id="form_year" required 
                                            style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" > 
                                      <option value="<?php echo $row['Work_From_Date_Year']; ?>" hidden ><?php echo $row['Work_From_Date_Year']; ?></option>
                                  </select>
                                  </div>
                                </p>
                              </li>                              
                              <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
                              <script type="text/javascript">
                                let fromstartYear = 1979;
                                let fromdateendYear = new Date().getFullYear();
                                for (i = fromdateendYear; i > fromstartYear; i--)
                                {
                                  $('#form_year').append($('<option />').val(i).html(i));
                                }
                              </script>

                              <li class="nav-item ms-lg-2 ms-2 col-5 col-md-5 col-lg-5" id="close_to_month_edit">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> To 
                                  <div class="form-label-group">
                                  <select type="int" name="Work_From_To_Month" class="input-group shadow-none mt-2" id="to_month_edit" required 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;">
                                    <option value="<?php echo $row['Work_From_To_Month']; ?>" hidden ><?php echo $row['Work_From_To_Month']; ?></option>
                                    <option value="January" style="color: black;" >January </option>
                                    <option value="February" style="color: black;" >February </option>
                                    <option value="March" style="color: black;" >March </option>
                                    <option value="April" style="color: black;" >April </option>
                                    <option value="May" style="color: black;" >May </option>
                                    <option value="June" style="color: black;" >June </option>
                                    <option value="July" style="color: black;" >July </option>
                                    <option value="August" style="color: black;" >August </option>
                                    <option value="September" style="color: black;" >September </option>
                                    <option value="October" style="color: black;" >October </option>
                                    <option value="November" style="color: black;" >November </option>
                                    <option value="December" style="color: black;" >December </option>
                                  </select>
                                  </div>
                                </p>
                              </li>

                              <li class="nav-item ms-lg-2 ms-2 col-5 col-md-5 col-lg-5" id="close_to_year_edit">
                                <p class="form-label" style="color: white; text-align: left; font-size: 13PX;"> 2
                                  <div class="form-label-group">
                                  <select class="input-group shadow-none" type="int" name="Work_From_To_Year" id="to_year_edit" required 
                                            style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" > 
                                      <option value="<?php echo $row['Work_From_To_Year']; ?>" hidden ><?php echo $row['Work_From_To_Year']; ?></option>
                                  </select>
                                  </div>
                                </p>
                              </li>    
                              <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
                              <script type="text/javascript">
                                let tostartYear = 1979;
                                let toendYear = new Date().getFullYear();
                                for (i = toendYear; i > tostartYear; i--)
                                {
                                  $('#to_year_edit').append($('<option />').val(i).html(i));
                                }
                              </script>


                          </ul>
                          </div>

                          <button type="submit" name="edit_work_experience"  class="btn btn-success mt-3" style="color: white; font-size: 12px;">SAVE</button>

                </div>
                </div>
                </div>



                </div>
                </div>

        </div>
        </div>

</div>
</div>



<?php }  ?>


</div>
</div>
</div>
</section>


<script language="javascript" type="text/javascript">
      //this code disables F5/Ctrl+F5/Ctrl+R and mouse in Chrome, Firefox and Explorer
      document.onkeydown = disableF5
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}
      function disableF5(e) { if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82 && e.ctrlKey)) e.preventDefault(); };
      $(document).on("keydown", disableF5);
</script>


</body>
</html>