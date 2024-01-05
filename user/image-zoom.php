<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- TITLE -->
  <title> PESO - Announcement </title>

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


<!-- START -->
<div class="container mt-3">
<div class="row">

<div class="col-lg-12 col-12 col-md-12 card" style="box-shadow: none; border: none;">
<div class="list">

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM image where id = '".$_REQUEST['id']."' order by id desc  ");
while($row = mysqli_fetch_array($query)){

?>

 <a href='announcement.php' style="text-decoration: none; background: none ;" >
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 mt-3" style=" box-shadow: none; border-radius: 5PX; border: 1px solid lightgray;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

                <div class="col-lg-12 col-md-12 col-12">
                <div class="card-body ps-lg-0">

                   <div class="col-lg-12 col-md-12 col-12">
                      <div class="card-body p-0 pe-md ps-lg-1">
                          <img class="w-100 border-radius-md shadow" src="<?php echo $row['image'];?>" alt="image">
                      </div>
                    </div>

                  <div class="mt-4">

                      <h4 class="title" style="font-size: 15px;"><?php echo $row['image_name'];?>
                        
                        <?php
                        
                        date_default_timezone_set('Asia/Manila');
                        $date = date('Y-m-d');
                        $date_ended = $row['date_ended'];

                        if ($date_ended >= $date) {

                          echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i>";

                        } else {

                          echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i>";
                        }
                        
                        ?>

                      </h4>

                      <span style="font-weight: normal; font-size: 13px;">
                        <textarea class="scroll_A col-lg-12 col-md-12 col-10" 
                                  style="border: none; background: none; resize: none;" disabled><?php echo $row['image_descriptions'];?>
                        </textarea>
                      </span>

                  <script type="text/javascript">
                    window.setTimeout( function() {
                      $("textarea.scroll_A").height( $("textarea")[0].scrollHeight );
                    }, 1);
                  </script>

                    <?php
                    
                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d');
                    $date1 = $row['date_ended'];

                    $date_posted = date("F d, Y", strtotime ($row['date_posted']));
                    $date_ended = date("F d, Y", strtotime ($row['date_ended']));

                    if ($date1 >= $date) {

                      echo "<p style='font-size: 13px; font-weight: normal; color: black;'> Posted on . $date_posted </p>";

                    } else {

                      echo "<p style='font-size: 13px; font-weight: normal; color: black;'> Posted on . $date_posted | Ended on . $date_ended </p>";

                    }
                    
                    ?>
                  </div>


            </div>
            </div>
</div>
</div>

</div>
</div>


<?php } ?>

</div>
</div>
</div>
</div>
<!-- END -->

</div>
</div>
</div>

</section>
<!-- END -->

</body>
</html>