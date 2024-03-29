<?php include 'session.php';?>
<?php include 'navbar.php';?> 


<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

  <!-- TITLE -->
  <title> PESO - Peso Resume </title>

<style type='text/css'>

  a .back{
    background: none;
    box-shadow: none;
    color: black;
  }     

  a .back:hover {
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
<div class="tab-content col-lg-8 ms-lg-11">

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account WHERE id = '".$_REQUEST['id']."' ");
while($row = mysqli_fetch_array($query)){

$profile_acc = $row['image'];

?>

<!-- START -->
<div class="container">
    <div class="row">

 <a href='account-info.php?id=<?php echo $row['id'];?>' style="text-decoration: none; background: none ;" >
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
</a>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> APPLICANT <p> | Resume </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->


<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 " style="border: 1px solid lightgray;">

        <div class="ps-md-0 mt-md-0">
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
                <div class="col-lg-10 col-md-12 col-12 my-auto">
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
                      <span style="font-weight: normal;"> Date Create .</span> <?php echo date("F d, Y", strtotime ($row['date_time']));?>
                     </span>

                    </h6>

                </div>
                </div>
          </div>
          </div>

      </div>
      </div>

</div>
</div>


<?php } ?>






<!-- START -->
<div class="container mt-3">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

        <div class="ps-md-0 mt-md-0 col-lg-12">
        <div class="row">



                <!-- Summary  -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">
                    <h6 style="font-size: 14PX"> Summary </h6>

                <div class="col-lg-12 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">

                  <?php

                  include '../database/database.php';
                  $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN summary ON summary.summary_id = account.id WHERE account.id = '".$_REQUEST['id']."'  ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                      <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" style="border: 1px solid lightgray; border-radius: 5px">
                      <div class="col-lg-12 col-md-12 col-12">
                      <div class="p-0 pe-md-0">
                      
                    <?php

                     if ($row['summary_count'] == '1') { ?>

                        <input type="int" name="sum_id" value="<?php echo $row['sum_id'] ?>" hidden>
                        <textarea style="font-size: 13px; color: black; border: none; background: none; resize: none; overflow: hidden;"><?php echo $row['summary'];?> </textarea>

                        <script type="text/javascript">
                          window.setTimeout( function() {
                            $("textarea").height( $("textarea")[0].scrollHeight );
                          }, 1);
                        </script>

                        <h6 style="font-weight: normal; font-size: 13px; color: black;">
                          <span style="font-weight: 500;"> Update on . </span> <?php echo date("F d, Y - h:i A", strtotime ($row['Update_date']));?></span>
                        </h6>

                      <?php } else {

                          echo"No available";

                      } ?>

                      </div>
                      </div>
                      </div>

                      <?php } ?>

                </div>
                </div>

                </div>
                </div>
                </div>





                <!-- Personal Information  -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">
                    <h6 style="font-size: 14PX"> Personal Information </h6>

                <div class="col-lg-12 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">

                  <?php

                  include '../database/database.php';
                  $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN personal ON personal.personal_id = account.id WHERE account.id = '".$_REQUEST['id']."' ");
                  while($row = mysqli_fetch_array($query)){

                  ?>

                      <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" style="border: 1px solid lightgray; border-radius: 5px">
                      <div class="col-lg-12 col-md-12 col-12">
                      <div class="p-0 pe-md-0">

                    <?php

                     if ($row['personal_count'] == '1') { ?>

                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Birth Day </span>: 
                           <?php echo $row['Month'];?> <?php echo $row['Day'];?> <?php echo $row['Year'];?> / <?php echo $row['Age'];?> Years Old
                        </h6>

                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Gender </span>: <?php echo $row['Gender'];?></h6>  
                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Birth Place </span>: <?php echo $row['Birth_Place'];?></h6>  
                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Address </span>: 
                          <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?></span>
                        </h6>    

                        <h6 style="font-weight: normal; font-size: 13px; color: black;">
                         <span style="font-weight: 500;"> Update on . </span> <?php echo date("F d, Y - h:i A", strtotime ($row['Update_date']));?></span>
                        </h6>

                      <?php } else {

                          echo"No available";

                      } ?>

                      </div>
                      </div>
                      </div>

                      <?php } ?>

                </div>
                </div>

                </div>
                </div>
                </div>






                <!-- Education -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">
                  <h6 style="font-size: 14PX"> Education </h6>

                <div class="col-lg-12 col-md-12 col-12 my-auto">           
                <div class="card-body ps-lg-0">

                    <?php

                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN education ON education.education_id = account.id WHERE account.id = '".$_REQUEST['id']."' ");
                    while($row = mysqli_fetch_array($query)){

                    ?>

                      <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile mt-2" style="border: 1px solid lightgray; border-radius: 5px">
                      <div class="col-lg-12 col-md-12 col-12">
                      <div class="p-0 pe-md-0">

                      <?php

                       if ($row['education_count'] == '1' ) { ?>

                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Level of Education </span>: <?php echo $row['Education'];?></h6>
                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Field Of Study </span>: <?php echo $row['Field_Of_Study'];?></h6>
                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> School Name </span>: <?php echo $row['School_Name'];?></h6>
                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Address </span>: 
                          <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?>
                        </h6>

                        <?php if($row['currently_enrolled'] == 'checked') { ?>

                          <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Currently enrolled </span>:
                                                                                             <?php echo $row['School_From_Date_Month'];?>, <?php echo $row['School_From_Date_Year'];?>
                          </h6>

                        <?php } else { ?>

                          <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Time period </span>:
                                                                                             <?php echo $row['School_From_Date_Month'];?>, <?php echo $row['School_From_Date_Year'];?> 
                                                                                          to <?php echo $row['School_From_To_Month'];?>, <?php echo $row['School_From_To_Year'];?>
                          </h6>

                        <?php } ?>

                        <h6 style="font-weight: normal; font-size: 13px; color: black;">
                         <span style="font-weight: 500;"> Update on . </span> <?php echo date("F d, Y - h:i A", strtotime ($row['Update_date']));?></span>
                        </h6>

                      <?php } else {

                          echo"No available";

                      } ?>

                      </div>
                      </div>
                      </div>

                      <?php } ?>

                </div>
                </div>

                </div>
                </div>
                </div>






                <!-- Work Experience -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">
                  <h6 style="font-size: 14PX"> Work Experience  </h6>

                <div class="col-lg-12 col-md-12 col-12 my-auto">      
                <div class="card-body ps-lg-0">

                    <?php

                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN work_experience ON work_experience.work_experience_id = account.id WHERE account.id = '".$_REQUEST['id']."' ");
                    while($row = mysqli_fetch_array($query)){

                    ?>

                      <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile mt-2" style="border: 1px solid lightgray; border-radius: 5px">
                      <div class="col-lg-12 col-md-12 col-12">
                      <div class="p-0 pe-md-0">




                      <?php

                      if ($row['work_experience_count'] == '1') { ?>

                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Job Title </span>: <?php echo $row['Job_Title'];?></h6>
                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Company </span>: <?php echo $row['Company'];?></h6>
                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Address </span>: 
                          <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?>
                        </h6>

                        <?php  if($row['currently_employed'] == 'checked') { ?>

                          <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Currently employed </span>:
                                                                                             <?php echo $row['Work_From_Date_Month'];?>, <?php echo $row['Work_From_Date_Year'];?>
                          </h6>

                        <?php } else { ?>

                          <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Time period </span>:
                                                                                             <?php echo $row['Work_From_Date_Month'];?>, <?php echo $row['Work_From_Date_Year'];?> 
                                                                                          to <?php echo $row['Work_From_To_Month'];?>, <?php echo $row['Work_From_To_Year'];?>
                          </h6>

                        <?php } ?>

                        <h6 style="font-weight: normal; font-size: 13px; color: black;">
                         <span style="font-weight: 500;"> Update on . </span> <?php echo date("F d, Y - h:i A", strtotime ($row['Update_date']));?></span>
                        </h6>

                      <?php } else {

                          echo"No available";

                      } ?>

                      </div>
                      </div>
                      </div>

                    <?php } ?>

                </div>
                </div>

                </div>
                </div>
                </div>





                <!-- skills -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">
                  <h6 style="font-size: 14PX"> Skills </h6>

                <div class="col-lg-12 col-md-12 col-12 my-auto">      
                <div class="card-body ps-lg-0">

                    <?php

                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN skills ON skills.skill_id = account.id WHERE account.id = '".$_REQUEST['id']."'  ");
                    while($row = mysqli_fetch_array($query)){

                    ?>

                      <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile mt-2" style="border: 1px solid lightgray; border-radius: 5px">
                      <div class="col-lg-12 col-md-12 col-12">
                      <div class="p-0 pe-md-0">

                      <?php

                      if ($row['skills_count'] == '1') { ?>

                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><?php echo $row['skill_name'];?> </h6>
                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><?php echo $row['year_of_experience'];?></h6>

                        <h6 style="font-weight: normal; font-size: 13px; color: black;">
                         <span style="font-weight: 500;"> Update on . </span> <?php echo date("F d, Y - h:i A", strtotime ($row['Update_date']));?></span>
                        </h6>

                      <?php } else {

                          echo"No available";

                      } ?>

                      </div>
                      </div>
                      </div>

                      <?php } ?>

                </div>
                </div>

                </div>
                </div>
                </div>










                <!-- peso resume -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">
                  <h6 style="font-size: 14PX"> PESO Resume </h6>

                <div class="col-lg-12 col-md-12 col-12 my-auto">      
                <div class="card-body ps-lg-0">

                    <?php

                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN peso_resume ON peso_resume.peso_resume_id = account.id WHERE account.id = '".$_REQUEST['id']."'  ");
                    while($row = mysqli_fetch_array($query)){

                    ?>

                      <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" style="border: 1px solid lightgray; border-radius: 5px">
                      <div class="col-lg-12 col-md-12 col-12">
                      <div class="p-0 pe-md-0">

                      <?php

                      if ($row['peso_count'] == '1') { ?>


                        <h6 style="font-size: 13px; color: black;"><?php echo $F_acc ;?> <?php echo $M_acc ;?> <?php echo $L_acc ;?> | PDF Peso requirement form
                          <a href="../files/<?php echo $row['Peso_Resume'] ?>" download="<?php echo $row['Peso_Resume'] ?>" id="peso_dl" class="ms-2" hidden> <?php echo $row['Peso_Resume'] ?></a>

                                    <script type="text/javascript">
                                    function download_file() {
                                      document.getElementById("peso_dl").click()
                                    }
                                    </script>

                          <button class="btn btn-primary" style="font-size: 11px; box-shadow: none; font-size: none; border-radius: 5px; float: right;" 
                                  onclick="window.location.href='../files/<?php echo $row['Peso_Resume'];?>';">Download </button>
                        </h6>

                        <iframe class="google-docs iframe" src="https://docs.google.com/viewer?url=https://pesostamariabulacan.com/peso/user/../files/<?php echo $row['Peso_Resume'] ?>&embedded=true" 
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0" role="document" aria-label="PDF document" title="PDF document" width='100%' height='800vh' ></iframe>

                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> File Name </span>: <?php echo $row['Peso_Resume'];?></h6>  
                        <h6 style="font-weight: normal; font-size: 13px; color: black;">
                         <span style="font-weight: 500;"> Update on . </span> <?php echo date("F d, Y - h:i A", strtotime ($row['Update_date']));?></span>
                        </h6>

                        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>                                                                                                                 
                        <script type="text/javascript">

                          $(document).ready(function(){
                          $('.google-viewer').on('click', function(){
                            if($('.office').css('display') !== 'none')
                              $('.office').slideToggle();
                            $('.google-docs').slideToggle();
                          });
                        });

                        </script>

                      <?php } else {

                          echo"No available";

                      } ?>

                      </div>
                      </div>
                      </div>
                      
                      <?php } ?>
                </div>
                </div>

                </div>
                </div>
                </div>














                <!-- resume -->
                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2">
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0">
                  <h6 style="font-size: 14PX"> Personal Resume </h6>


                <div class="col-lg-12 col-md-12 col-12 my-auto">      
                <div class="card-body ps-lg-0">

                    <?php

                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM account LEFT JOIN resume ON resume.resume_id = account.id WHERE account.id = '".$_REQUEST['id']."'  ");
                    while($row = mysqli_fetch_array($query)){

                    ?>

                      <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" style="border: 1px solid lightgray; border-radius: 5px">
                      <div class="col-lg-12 col-md-12 col-12">
                      <div class="p-0 pe-md-0">

                      <?php

                      if ($row['resume_count'] == '1') { ?>

                        <h6 style="font-size: 13px; color: black;"><?php echo $F_acc ;?> <?php echo $M_acc ;?> <?php echo $L_acc ;?> | PDF Resume 
                          <a href="../files/<?php echo $row['Resume'] ?>" download="<?php echo $row['Resume'] ?>" id="resume_dl" class="ms-2" hidden> <?php echo $row['Resume'] ?> </a>

                                    <script type="text/javascript">
                                    function download_file() {
                                      document.getElementById("resume_dl").click()
                                    }
                                    </script>

                          <button class="btn btn-primary" style="font-size: 11px; box-shadow: none; font-size: none; border-radius: 5px; float: right;" 
                                             onclick="window.location.href='../files/<?php echo $row['Resume'];?>';">Download </button>

                        </h6>

                        <iframe class="google-docs iframe" src="https://docs.google.com/viewer?url=https://pesostamariabulacan.com/peso/user/../files/<?php echo $row['Resume'] ?>&embedded=true" 
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0" role="document" aria-label="PDF document" title="PDF document" width='100%' height='800vh' ></iframe>

                        <h6 style="font-size: 13px; color: black; font-weight: normal;"><span style="font-weight: 500;"> File Name </span>: <?php echo $row['Resume'];?></h6>  
                        <h6 style="font-weight: normal; font-size: 13px; color: black;">
                         <span style="font-weight: 500;"> Update on . </span> <?php echo date("F d, Y - h:i A", strtotime ($row['Update_date']));?></span>
                        </h6>

                        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>                                                                                                                 
                        <script type="text/javascript">

                          $(document).ready(function(){
                          $('.google-viewer').on('click', function(){
                            if($('.office').css('display') !== 'none')
                              $('.office').slideToggle();
                            $('.google-docs').slideToggle();
                          });
                        });

                        </script>

                      <?php } else {

                          echo"No available";

                      } ?>

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
          </div>

      </div>
      </div>

</div>
</div>


</div>
</div>
</div>

</section>
<!-- END -->

</body>
</html>

