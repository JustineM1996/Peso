s<?php require_once "access.php"; ?>

<?php 

    $email = $_SESSION['email'];

    if($email == false){

      header('Location: login.php');

    }

?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>



  <!-- TITLE -->
  <title> PESO - Change Password </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

</head>

<body >

<?php include "navbar.php"; ?>

<div class="page-header align-items-start min-vh-100">

    <div class="container my-auto">
      <div class="row">

        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom" style="background: none; border: none; box-shadow: none;">

            <!-- start -->
            <div class="card-body">


                    <h3 class=""> P E S O </h3>
                    <h4 class="mt-3"> Change Password </h4>

            <form action="login.php" method="POST" autocomplete="" class="auth-form login-form mt-5">

                <?php if(isset($_SESSION['info'])) { ?>

                    <div class="alert alert-success text-center" style="background: none; border: none; box-shadow: none;">
                        <?php echo $_SESSION['info']; ?>
                    </div>

                <?php } ?>

                <button type="submit" name="login-now" class="btn btn-success" style="font-size: 12px"> Login </button>

            </form>    

            </div>
            <!-- End -->


          </div>
        </div>
      </div>
    </div>


</div>

</body>
</html> 
