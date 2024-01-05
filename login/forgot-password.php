<?php require_once "access.php"; ?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>



  <!-- TITLE -->
  <title> PESO - Forgot Password </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

</head>

<body>

<?php include "navbar.php"; ?>

<div class="page-header align-items-start min-vh-100" >

    <div class="container my-auto">
      <div class="row">

        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom" style="background: none; border: none; box-shadow: none;">


            <!-- start -->
            <div class="card-body" >

                    <h3 class=""> P E S O </h3>
                    <h4 class="mt-3"> Forgot Password </h4>

            <form action="forgot-password.php" method="POST" autocomplete="" class="auth-form login-form mt-5" >

                    <?php if(count($errors) > 0) { ?>

                            <div class="alert alert-danger text-center" style="background: none; border: none; box-shadow: none;">
                                <?php foreach ($errors as $error){
                                               echo $error; } ?>
                            </div>

                    <?php } ?>

                    <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Enter your email address 
                      <div class="form-label-group">
                        <input type="email" style="color: black; font-size: 13PX;" name="email" value="<?php echo $email ?>" class="form-control shadow-none" required>
                      </div>
                    </p>

                    <button type="submit" name="check-email" class="btn btn-success" style="font-size: 12px"> Continue </button>
                    
                      <div style="float: right;">
                          <a href='index.php' class="text-secondary ../assets/icon-move-right"  onclick='return apply()'style="text-decoration: none;" > 
                             <h5 style='font-size: 12px; font-weight: normal; color: #000066;'> Cancel 
                              <i style='color: #000066;' class='fas fa-arrow-right ms-2 mb-3 me-1 mt-3 mt-md-3'></i>
                            </h5> 
                          </a>
                      </div>

                    <script type="text/javascript">
                        window.history.forward();
                        function apply() {
                        return confirm ('Are you sure you want to cancel');
                        }
                    </script>                   

            </form>         

            </div>
            <!-- End -->


          </div>
        </div>
      </div>
    </div>


</div>
<!-- End -->

</body>
</html> 


