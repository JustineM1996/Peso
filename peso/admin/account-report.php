<?php include 'session.php' ?>
<?php include 'navbar.php' ?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

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
    box-shadow: ;
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

          $query =  "SELECT * FROM account JOIN account_report ON account_report.account_id = account.id 
                     WHERE account_report.login_date BETWEEN '$startdate' and '$enddate' and account.id = '".$_REQUEST['id']."'  ";

        } else {
          
          $query =  "SELECT * FROM account JOIN account_report ON account_report.account_id = account.id 
                     WHERE account_report.login_date BETWEEN '$startdate' and '$enddate' and account.id = '".$_REQUEST['id']."'  ";
                     $searchResult = date_time($query);
        }     

    } else {

          $query =  "SELECT * FROM account JOIN account_report ON account_report.account_id = account.id 
                     WHERE account.id = '".$_REQUEST['id']."'  ";
                     $searchResult = date_time($query);
    }

    function date_time($query) {
        include '../database/database.php';

        $filterResults = mysqli_query($con, $query);
        return $filterResults;
    }

?>

<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-12">


<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account WHERE id = '".$_REQUEST['id']."' ");
while($row = mysqli_fetch_array($query)){

$profile_acc = $row['image'];

?>

<!-- START -->
<div class="container">
    <div class="row">


 <a href="account-vew-user.php?id=<?php echo $row['id'];?>"  style="text-decoration: none; background: ;" >
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
</a>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> ACCOUNT <p> | Records </p></h4>
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
                      <span class="ms-2"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?>
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
                      </span>
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
        <div class="location_icon form-label-group my-2">
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
      <th class="cell" >Address</th>
      <th class="cell" >Date Login</th>
      <th class="cell" >Date Logout</th>
      <th class="cell" >Status</th>

    </tr>
  </thead>

  <tbody style="font-weight: normal; font-size: 13px">


<?php while($row = mysqli_fetch_assoc($searchResult)) { 

  $login_date = date("F d, Y", strtotime ($row['login_date']));
  $login_time = date("H:i:s A", strtotime ($row['login_time']));
  $logout_date = date("F d, Y", strtotime ($row['logout_date']));
  $logout_time = date("H:i:s A", strtotime ($row['logout_time']));

?>

    <tr>
      <td><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?></td>
      <td><?php echo $row['City'];?>, <?php echo $row['Province'];?></td>
      <td><?php echo $login_date;?> <?php echo $login_time;?> </td>

        <?php 

         if ($logout_time <= '') {

          echo"<td> $logout_date $logout_time </td>";

         } else {

          echo"<td> Not Updated </td>";

         }

         ?>

      <td><?php echo $row['user_type'];?></td>
    </tr>

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

