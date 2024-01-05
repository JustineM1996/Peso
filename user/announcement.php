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

<div class="container">
<div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> ANNOUNCEMENTS </h4>
        </div>

</div>
</div>

<!-- START -->
<div id="users">

<div class="container mt-3">
<div class="row">

          <h5 class='text-black' style="color: black; font-size: 18px;"> You may search by announcements. </h5>

              <div class="nav-wrapper position-relative mt-3">
              <ul class="nav nav-pills nav-fill" style="background: none;">
        
                  <li class="nav-item col-lg-10 col-12 col-md-12">
                    <div class="search_icon form-label-group my-2">
                      <input type="text" class="search_icon search form-control shadow-none" placeholder="Search" style="color: black; font-size: 13px;">
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
                <select class="col-lg-2 col-md-12 col-12 card-profile" name="image_category" 
                        style=" cursor: pointer; color: black; font-size: 13px; border: none; border-radius: 3px; padding: 5px 10px">
                  <option class="filter-all" value="all" style="color: black; font-size: 13px;" selected> All Category </option>

                  <?php
                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM job_tips_category ");
                    while($row = mysqli_fetch_array($query)){
                  ?>

                  <option class="filter" value="<?php echo $row['job_tips_category'];?>" 
                          style="color: black;" > <?php echo $row['job_tips_category']; ?> 
                  </option>

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
$query = mysqli_query($con,"SELECT * FROM image WHERE image_status = 'Active' order by id desc  ");
while($row = mysqli_fetch_array($query)){

?>

<div class="col-lg-12 mt-3" >
<div class="card card-profile col-lg-12 col-md-12 col-12 mt-3" style="box-shadow: none; border-radius: 5PX; border: none;">

    <div class="ps-md-0 mt-md-0 ms-3">
    <div class="row">

              <div class="col-lg-6 col-md-12 col-12">
                  <div class="card-body pe-md"> 
                    <a href="image-zoom.php?id=<?php echo $row['id'] ?>"> 
                    <img class="w-100 border-radius-md shadow" src="<?php echo $row['image'];?>" alt="image">
                  </a>
                  </div>
              </div>


                <div class="col-lg-6 col-md-12 col-12">
                <div class="card-body ps-lg-0">

                      <h4 class="image_category" style="font-size: 15px;" hidden><?php echo $row['image_category'];?></h4>
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
                        <textarea class="scroll col-lg-11 col-md-10 col-10" rows="6"
                                  style="border: none; background: none; resize: none; overflow: hidden;" disabled><?php echo $row['image_descriptions'];?>
                        </textarea>
                      </span>

                      <span style="font-weight: normal; font-size: 12px;" id="more6">
                        <textarea class="scroll_A col-lg-11 col-md-12 col-10" 
                                  style="border: none; background: none; resize: none;" disabled><?php echo $row['image_descriptions'];?>
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


<?php } ?>

</div>



  <?php

  include '../database/database.php';
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d');
  $query = mysqli_query($con,"SELECT count(count) as post_count, date_ended FROM image  ");

  while($row = mysqli_fetch_array($query)){

   $post_count = $row['post_count'];
   
  ?>  

  <?php 

  if($post_count <= 0) {  ?>

  <h5 class='text-black' style='color: black; font-size: 18px;'> No announcements available </h5>

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
    'title',
    'image_category'
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
  var values_type = $("select[name=image_category]").val();

  userList.filter(function (item) {
    var Filter_type = false;

    if(values_type == "all")
    { 
      Filter_type = true;
    } else {
      Filter_type = item.values().image_category.indexOf(values_type) >= 0;
    }

    return Filter_type 

  });

}
                               
$(function(){
  //updateList();
  $("select[name=image_category]").change(updateList);

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
</div>
</div>

</section>
<!-- END -->

</body>
</html>