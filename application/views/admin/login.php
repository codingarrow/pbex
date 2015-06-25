<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="CMS - Panasonic Beauty ">
    <meta name="keyword" content="CMS - Panasonic Beauty ">
    <link rel="shortcut icon" href="img/favicon.png">
		<?php $base_url = base_url(); ?>
		<script type="text/javascript">
		root = "<?php echo $base_url; ?>";
		</script>

    <title>CMS - Panasonic Beauty Login</title>
    <!-- Bootstrap -->
    <link href="<?php echo $base_url; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url; ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url; ?>assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo $base_url; ?>/js/html5.js"></script>
    <![endif]-->
    <script src="<?php echo $base_url; ?>vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
  <body id="login">
    <div class="container">
      <form class="form-signin" method="POST" action="<?php echo site_url();?>/admin/login/login_admin" accept-charset="utf-8">
                  <?php if (isset($error) && $error): ?>
            <br />
          <div class="alert alert-info">
            <?php //Please login with your Username and Password. ?>
                              <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!                                                
          </div>
                  <?php endif; ?>            
        <h2 class="form-signin-heading">Please Login</h2>
        <input name="username" type="text" class="input-block-level" placeholder="Username">
        <input name="password" type="password" class="input-block-level" placeholder="Password">
        <?php
        /*
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        */
        ?>
        <input type="hidden" name="referpage" value="<?php echo site_url();?>"> 
        <button type="submit" class="btn btn-primary">Login</button>        
        <p>&nbsp;</p>
        <span style="font-size:12px;">
          Help: <a href="<?php echo site_url();?>/login/forgotPassword">I can't sign in or I forgot my username/password</a>
        </span>
      </form>
    </div> <!-- /container -->
    <script src="<?php echo $base_url; ?>vendors/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $base_url; ?>bootstrap/js/bootstrap.min.js"></script>
  </body>	
</html>