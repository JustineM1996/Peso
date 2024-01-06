<?php include 'session.php' ?>
<?php include 'navbar.php' ?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LINK -->
  <?php include 'link.php';?>

  <!-- TITLE -->
  <title> PESO - Company Reports </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

    <!-- Table JS -->
    <script src="table/vendors/simple-datatables/table1.js"></script>
    <link rel="stylesheet" href="table/css/table.css">
    <link rel="stylesheet" href="table/vendors/simple-datatables/datatable.css">


<style type="text/css">

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

</style>

</head>

<body>

<!-- DATA -->
<?php

    if (isset($_POST['search'])) {
        include '../database/database.php';
        
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

    if ($startdate == "" || $enddate == "") { 

          $account_id = array();

          $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
          while($row = mysqli_fetch_assoc($q)) {
          $account_id[] = $row['id'];

          }

          $query =  "SELECT 
                      id,
                      First_Name,
                      Middel_Name,
                      Last_Name,
                      City,
                      Province,
                      user_type,
                      status,
                      status_account,
                      email,
                      Contant_Number,
                      date_time

                     FROM account 
                     WHERE date_time BETWEEN '$startdate' and '$enddate' and id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc   ";

        } else {

          $account_id = array();

          $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
          while($row = mysqli_fetch_assoc($q)) {
          $account_id[] = $row['id'];

          }          

          $query =  "SELECT 
                      id,
                      First_Name,
                      Middel_Name,
                      Last_Name,
                      City,
                      Province,
                      user_type,
                      status,
                      status_account,
                      email,
                      Contant_Number,
                      date_time

                     FROM account 
                     WHERE date_time BETWEEN '$startdate' and '$enddate' and id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc  ";
                     $searchResult = date_time($query);
        }     

    } else {

          $account_id = array();

          $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
          while($row = mysqli_fetch_assoc($q)) {
          $account_id[] = $row['id'];

          }

          $query =  "SELECT 
                      id,
                      First_Name,
                      Middel_Name,
                      Last_Name,
                      City,
                      Province,
                      user_type,
                      status,
                      status_account,
                      email,
                      Contant_Number,
                      date_time

                     FROM account WHERE id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc  ";
                     $searchResult = date_time($query);
    }

    function date_time($query) {
        include '../database/database.php';

        $filterResults = mysqli_query($con, $query);
        return $filterResults;
    }

?>




<!-- DATA -->
<?php

    if (isset($_POST['search'])) {
        include '../database/database.php';
        
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

    if ($startdate == "" || $enddate == "") { 

          $account_id = array();

          $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
          while($row = mysqli_fetch_assoc($q)) {
          $account_id[] = $row['id'];

          }

          $count =  "SELECT 

                                     count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'verified' then 1 end) as active,
                                     count(case when status = 'deactivated' then 1 end) as Inactive,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'verified' then 1 end) as account_active_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'deactivated' then 1 end) as account_inactive_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'verified' then 1 end) as account_active_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'deactivated' then 1 end) as account_inactive_user

                     FROM account 
                     WHERE date_time BETWEEN '$startdate' and '$enddate' AND id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc   ";

        } else {

          $account_id = array();

          $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
          while($row = mysqli_fetch_assoc($q)) {
          $account_id[] = $row['id'];

          }

          $count =  "SELECT 

                                     count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'verified' then 1 end) as active,
                                     count(case when status = 'deactivated' then 1 end) as Inactive,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'verified' then 1 end) as account_active_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'deactivated' then 1 end) as account_inactive_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'verified' then 1 end) as account_active_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'deactivated' then 1 end) as account_inactive_user

                     FROM account 
                     WHERE date_time BETWEEN '$startdate' and '$enddate' AND id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc   ";
                     $count_account = date_time_account($count);
        }     

    } else {

          $account_id = array();

          $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
          while($row = mysqli_fetch_assoc($q)) {
          $account_id[] = $row['id'];

          }

          $count =  "SELECT 

                                     count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'verified' then 1 end) as active,
                                     count(case when status = 'deactivated' then 1 end) as Inactive,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'verified' then 1 end) as account_active_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'deactivated' then 1 end) as account_inactive_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'verified' then 1 end) as account_active_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'deactivated' then 1 end) as account_inactive_user

                     FROM account WHERE id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc   ";
                     $count_account = date_time_account($count);
    }

    function date_time_account($count) {
        include '../database/database.php';

        $filterResults = mysqli_query($con, $count);
        return $filterResults;
    }

?>




<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-12">

<!-- START -->
<div class="container">
    <div class="row">

 <a href="account.php"  style="text-decoration: none; background: none ;" >
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
</a>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> ALL ACCOUNTS <p> | Records </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->


<!-- START -->
<div id="new_jobs">
<div class="container">
<div class="row">

<form method="POST" class="mt-3">

  <div class="nav-wrapper position-relative ">
  <ul class="nav nav-pills nav-fill" style="background: none;">

      <li class="nav-item col-lg-5 col-12 col-md-12">
        <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> From date
        <div class="form-label-group">
          <input type="date" style="color: black; font-size: 13PX;" name="txtStartdate" 
                 class="form-control shadow-none" required>
        </div>
       </p>
      </li>

      <li class="nav-item ms-lg-1 col-lg-5 col-12 col-md-12">
        <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> To date
        <div class="form-label-group">
          <input type="date" style="color: black; font-size: 13PX;" name="txtEnddate" 
                 class="form-control shadow-none" required>
        </div>
       </p>
      </li>

      <li class="nav-item col-lg-1 col-12 col-md-12 mt-1">
        <p class="form-label" style="color: black; text-align: left; font-size: 13PX; color: white;" > a
        <div class="location_../assets/icon form-label-group my-2">
              <button type="submit" name="search" class="btn btn-secondary" style="box-shadow: none; font-size: 14px"> <i class="fa fa-filter"></i><span class="ms-2" style="color:black;">Filter</span></button>
        </div>
      </p>
      </li>    


  </ul>
  </div>

</form>

</div>
</div>
<!-- END -->


<!-- START -->
<div class="container">
<div class="row">

<div class="col-lg-12 col-12" style="background: none;">
<div class="card card-profile" style="background: none;  box-shadow: none; border: none;">
<div class="list">

<table id="table1" class="table app-table-hover mb-0 text-left" style="background: none; box-shadow: none; border-radius: 5PX;">

  <thead style="font-weight: normal; font-size: 14px" >
    <tr>

      <th class="cell" >Full name</th>
      <th class="cell" >Email adress</th>
      <th class="cell" >Contact number</th>
      <th class="cell" >Location</th>
      <th class="cell" >Date Created</th>
      <th class="cell" >Status</th>
      <th class="cell" >Account Record</th>

    </tr>
  </thead>

  <tbody style="font-weight: normal; font-size: 13px">


<?php while($row = mysqli_fetch_assoc($searchResult)) { 

$date_time = date("F d, Y, h:i A", strtotime ($row['date_time']));

?>

    <tr>
      <td><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['Contant_Number'];?></td>
      <td><?php echo $row['City'];?>, <?php echo $row['Province'];?></td>
      <td><?php echo $date_time?></td>
      <td><?php echo $row['user_type'];?>

          <?php

          $status = $row['status'];

          if ($status == 'verified') {

            echo "<span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> Active </span>";

          } else if ($status == 'deactivated') {

            echo "<span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px'> Deactivated </span>";

          }

          ?>  

      </td>
      <td style="text-align: center;"><a href='account-report.php?id=<?php echo $row['id'];?>'> Info </td>
    </tr>

<?php   }   ?>

<?php while($row = mysqli_fetch_assoc($count_account)) { 

?>
  <td colspan="4" style="background: lightgray; font-weight: 500">
  <span  style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> ADMIN ACTIVE - <?php echo $row['account_active_admin'];?> </span>
  <span class="ms-2" style='background: darkRED; color: white; padding: 3Px 8px; border-radius: 5px'> ADMIN DEACTIVATE - <?php echo $row['account_inactive_admin'];?> </span>
  <span class="ms-2" style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px'> TOTAL ADMIN  - <?php echo $row['account_admin'];?> </span> <br><br>

  <span  style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> USER ACTIVE - <?php echo $row['account_active_user'];?> </span>
  <span class="ms-2" style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px'> USER DEACTIVATE - <?php echo $row['account_inactive_user'];?> </span>
  <span class="ms-2" style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px'> TOTAL USER - <?php echo $row['account_user'];?> </span> <br><br>

  Total Account - <?php echo $row['account_count'];?>

 </td>
  

<?php   }   ?>










  </tbody>

</table>

</div>

<div class="app-card-footer mt-auto" style="float: right; font-size: 10px; padding: 20px 8px;">
        <button  type="button" onclick="tableToExcel('table1', 'W3C Example Table')" class="btn app-btn-secondary"
         style="font-size: 12px; font-family: sans-serif; background: #006600; font-weight: normal; color: white;"> Download to excel </button>
</div>

</div>

</div>
</div>   
</div>
</div>
</div>
<!-- END  -->

</div>
</div>
</div>

</section>
    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>

    <script type="text/javascript">

    var tableToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
      return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        window.location.href = uri + base64(format(template, ctx))
      }
    })()

    </script>

</body>
</html> 

