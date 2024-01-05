<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

  <!-- TITLE -->
  <title> PESO - Job Information </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>
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

</style>

</head>

<body>




<!-- START SEASON #1 -->
<section class="py-8">

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account JOIN company
                                                  JOIN job ON job.company_id = company.id
                                                  JOIN applicant ON applicant.Account_Id = account.id and job.id = applicant.job_id 
                                                  WHERE account.id = '$id_acc' and job.id = '".$_REQUEST['id']."' ");
while($row = mysqli_fetch_array($query)){

?>

<!-- START -->
<div class="container">
<div class="row">

  <a href='my-job.php?id=<?php echo $row['id'];?>' style="text-decoration: none; background: none ;" >
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

        <div class="col-lg-1 col-md-3 col-3 mt-3" >
          <div class="card card-blog">

              <div class="content-left text-start my-auto py-0" >
                  <div class="p-0 pe-md-0">
                    <img class="w-100 border-radius-md shadow-lg" src="<?php echo $row['images'];?>" alt="image">
                  </div>
              </div>

           </div>
         </div>

        <div class="col-lg-7 col-md-12 col-12 mt-2">
          <div class="card card-plain" style="border: none">

            <div class="card-body px-0">
             <h4 class="text-black" style="color: black;"> <?php echo $row['company'];?> </h4>
             <h5 > <?php echo $row['job_title'];?> </h5>
            </div>

          </div>
        </div>

</div>
</div>
<!-- END -->






<!-- START -->
<div class="container">
<div class="row">
 
      <div class="col-lg-7 col-md-12 col-12" >
      <div class="card card-blog" style="background: none ; box-shadow: none; border: none;">

          <div class="card-body">
            <div class="content-left text-start my-auto py-4" >
              <h5 class="card-description text-black" style="color: black; font-size: 15px"> About the Company </h5>
               <textarea class="form-control about" disabled 
                         style="background: none; color: black; font-size: 14px; border: none; resize: none; overflow: hidden;"><?php echo $row['description'];?>
               </textarea>
            </div>
          </div>
        
      </div>
      </div>

      <script type="text/javascript">
        window.setTimeout( function() {
          $("textarea.about").height( $("textarea.about")[0].scrollHeight );
        }, 1);
      </script>


 <div class="root-visual_tags flex-jobs col-lg-5 col-md-12 col-12">
    <div class="lvl2-el2-visual flex-jobs jobs-scrollable">
        <div class="lvl3-el2-visual scrollable_jobs">
    
      <div class="col-lg-12 col-md-12 col-12">
      <div class="card card-blog" style="background: none ; box-shadow: none; border: none;">

              <div class="card-body px-0">
                <h4 class="mb-0" style="font-size: 15px; color:black;" > Job Description  </h4>
                  <textarea class="form-control Description" disabled 
                            style="background: none; font-size: 14px; border: none; resize: none; overflow: hidden;"><?php echo $row['job_description'];?></textarea>
              </div>

              <div class="card-body px-0">
                <h4 class="mb-0" style="font-size: 15px; color:black;" > Qualifications  </h4>
                  <textarea class="form-control Qualifications" 
                            disabled style="background: none; font-size: 14px; border: none; resize: none; overflow: hidden;"><?php echo $row['job_requirements'];?></textarea>
              </div>

            <script type="text/javascript">
              window.setTimeout( function() {
                $("textarea.Description").height( $("textarea.Description")[0].scrollHeight );
              },0);
            </script>

            <script type="text/javascript">
              window.setTimeout( function() {
                $("textarea.Qualifications").height( $("textarea.Qualifications")[0].scrollHeight );
              },0);
            </script>

              <div class="card-body px-0">
                <h4 class="mb-0" style="font-size: 15px; color:black;"> Hiring Info  </h4>
                <p class="ms-3" style="margin-top: 5px ; color: black; font-size: 14px; font-weight: normal;">
                   <?php echo $row['job_salary'];?> <br>
                   <?php echo $row['job_day'];?> <br>
                   <?php echo $row['job_schedule'];?> <br>
                   <?php echo $row['job_schedule_shift'];?> <br> 
                   <?php echo $row['job_type'];?><br> 
                   <?php echo $row['job_category'];?><br> 
                   <?php echo $row['job_option'];?><br> 
                   <?php echo $row['job_gender'];?>
                </p> 
              </div>

      </div>
      </div>

    </div>
  </div>
</div>


<!-- CSS SITE STROLLBAR -->
<style type="text/css">

.flex-jobs {
  display: flex;
  flex-direction: column;
}

.flex-jobs > :not(.scrollable_jobs):not(.jobs-scrollable) {
  flex-shrink: 0;
}

.flex-jobs > .scrollable_jobs, .jobs-scrollable {
  flex-grow: 1;
}

.jobs-scrollable {
  overflow: hidden;
}

.scrollable_jobs {
  overflow: auto;
  overflow-x: hidden; /* Hide horizontal scrollbar */

}

.root-visual_tags {
  height: 50vh;
}

.scrollable_jobs::-webkit-scrollbar
{
   width: 10px;
   border-radius: 10px;
}

.scrollable_jobs::-webkit-scrollbar-thumb
{
   height: 10px;
   background: #333;
   border: 8px solid transparent;
   border-radius: 10px;
}

</style>

</div>

<button href="apply.php?id=<?php echo $row['id'];?>" class="btn btn-success" style="color: white; font-size: 12px;" onclick='return apply()' disabled> APPLY NOW </button>

</div>
<!-- END -->

<?php } ?>

</section>
<!-- END SEASON #1 -->

</body>
</html>