<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="®™ CMS - Panasonic Beauty">
    <meta name="keyword" content="CMS - Panasonic Beauty">
    <link rel="shortcut icon" href="img/favicon.png">

  <title>CMS - Panasonic Beauty</title>
		<?php $base_url = base_url(); ?>
		<script type="text/javascript">
		root = "<?php echo $base_url; ?>";
		</script>


    <!-- Bootstrap -->
    <link href="<?php echo $base_url; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url; ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url; ?>assets/styles.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url; ?>assets/DT_bootstrap.css" rel="stylesheet" media="screen">


    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo $base_url; ?>vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="<?php echo $base_url; ?>js/html5.js"></script>
    <![endif]-->
    <script src="<?php echo $base_url; ?>vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

     <?php
       //<!--link href="css/table-responsive.css" rel="stylesheet" /-->
       //<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        $needle = "load_employeemasterlist";
        $haystack = current_url();
        if (strpos($haystack, $needle) !== false)
        {
     ?>
    <!--dynamic table-->

     <?php
        }
     ?>


    <?php
     //used for form components
       /*
        $needle = "new_employee";
        $haystack = current_url();
        if (strpos($haystack, $needle) !== false)
        {

		        From this application/views/templates/header.php file, SET of javascript (jQueries) are required to be preloaded per file for performance benefits.  For example
				Only load the calendar(datepicker) related js if there's a date on the form, HENCE only load the javasript (jQueries) for those entry forms that really require them
				2015 Jun 25 by ®yan™
       */
        $needle = "new_employee"; $needle1 = "edit_employee";
        $haystack = current_url();
        if ( (strpos($haystack, $needle) !== false) || (strpos($haystack, $needle1) !== false) )
        {
    ?>
	
     <?php
        }
     ?>

    <?php
      /*
      <!--link href="css/tasks.css" rel="stylesheet"-->
      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">

      <!--<link href="css/navbar-fixed-top.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <script src="js/jquery.js"></script>
      */
     //used for form components
    ?>
	
    <link href="<?php echo $base_url; ?>css/ci_pagestyle.css" rel="stylesheet" />
    <script src="<?php echo $base_url;?>vendors/jquery-1.9.1.js"></script>

     <?php
        $needle = "load_employeeattendance"; $needle1 = "show_computedemployeeattendance";
        $haystack = current_url();
        if (strpos($haystack, $needle) !== false || (strpos($haystack, $needle1) !== false) )
        {
          //use new jQuery for Export function
    //<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
     ?>
      <script type="text/javascript" src="<?php echo $base_url;?>js/tableExport.js"></script>
      <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.base64.js"></script>
      <script type="text/javascript" src="<?php echo $base_url;?>js/html2canvas.js"></script>
      <script type="text/javascript" src="<?php echo $base_url;?>js/libs/sprintf.js"></script>
      <script type="text/javascript" src="<?php echo $base_url;?>js/jspdf.js"></script>
      <script type="text/javascript" src="<?php echo $base_url;?>js/libs/base64.js"></script>    
     <?php
        }
        else
          //use old jQuery
        {
     ?>
     <?php
        }
     ?>

  </head>
  
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo $base_url; ?>">CMS - Panasonic Beauty</a>
                    <div class="nav-collapse collapse">
                    <?php
                    if($this->session->userdata('isLoggedIn'))          
                    {                      
                    ?>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><?php echo $this->session->userdata('userrole') . '-' . $this->session->userdata('username'); ?><i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo site_url(); ?>/main/change_pwd">Change Password</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo site_url(); ?>/admin/login/logout_user">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php
                    }                      
                    ?>
                        <ul class="nav">
                            <li class="active">
                                <a href="<?php echo site_url(); ?>/tks/show_timesheet">Navigation</a>
                            </li>
                            <?php
                            /*
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="#">Tools <i class="icon-arrow-right"></i>

                                        </a>
                                        <ul class="dropdown-menu sub-menu">
                                            <li>
                                                <a href="#">Reports</a>
                                            </li>
                                            <li>
                                                <a href="#">Logs</a>
                                            </li>
                                            <li>
                                                <a href="#">Errors</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">SEO Settings</a>
                                    </li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Blog</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">News</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Custom Pages</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Calendar</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="#">FAQ</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">User List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Search</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Permissions</a>
                                    </li>
                                </ul>
                            </li>
                            */
                            ?>
                            <?php
                            switch ($this->session->userdata('userlevel')) 
                            {                      
                            case 1:                  
                            ?>                            
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                  <li><a tabindex="-1" href="<?php echo site_url(); ?>/tks/load_employeeattendance">Registered Members</a></li>
                                  <li><a tabindex="-1" href="<?php echo site_url(); ?>/tks/show_computedemployeeattendance">System Users</a></li>
                                </ul>
                            </li>
                            <?php
                            break;
                            }                      
                            ?>                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <?php
                    switch ($this->session->userdata('userlevel')) 
                    {                      
                    case 1:                  
                    ?>
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li>
                            <a href="<?php echo site_url(); ?>/tks/load_departmentlist"><i class="icon-chevron-right"></i> Department</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url(); ?>/tks/load_employeemasterlist"><i class="icon-chevron-right"></i> Employees</a>
                        </li>
                    <?php
                        /*
                        <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i> Timekeeping</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i> Holiday</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i> Overtime</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i> Leaves</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i> Payroll</a>
                        </li>

                        <li>
                            <a href="#"><span class="badge badge-success pull-right">731</span> Orders</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-success pull-right">812</span> Invoices</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-right">27</span> Clients</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-right">1,234</span> Users</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-right">2,221</span> Messages</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-right">11</span> Reports</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-important pull-right">83</span> Errors</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-warning pull-right">4,231</span> Logs</a>
                        </li>
                        */
                    ?>
                    </ul>
                    <?php
                    break;
                    }                      
                        ?>
                </div>