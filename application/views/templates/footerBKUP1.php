<?php $base_url = base_url(); ?>
            <hr>
            <footer>
                <p><span style="font-size:8px">rendered:{elapsed_time}   memory:{memory_usage}</span> <?php echo date("Y"); ?> &copy; CMS Panasonic Beauty</p>
            </footer>
        </div>
        <!--/.fluid-container-->

        <!--script src="vendors/jquery-1.9.1.js"></script-->
          <?php
            //used for forms
          ?>
		  
           <?php
              $needle = "new_employee"; $needle1 = "edit_employee";
              $haystack = current_url();
              if ( (strpos($haystack, $needle) !== false) || (strpos($haystack, $needle1) !== false) )
              {
           ?>
          <?php
            //used for forms so makes no sense to load them for pages with no forms
              }
          ?>


         <?php
            $needle = "load_employeemasterlist";
            $haystack = current_url();
            //echo $haystack;
            if (strpos($haystack, $needle) !== false)
            {
         ?>

            <!--dynamic table-->
            <!--dynamic table initialization -->
            <script type="text/javascript" language="javascript" src="<?php echo $base_url;?>js/dynamic_l1st1ng_init.js"></script>

          <?php
            //used for forms so makes no sense to load them for pages with no forms
          /*
            <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#example').dataTable( {
                        "aaSorting": [[ 0, "asc" ]]
                    } );
                } );
            </script>
          */
          }
        ?>
         <?php
		    /*  From this application/views/templates/footer.php file, SET of javascript (jQueries) are required to be preloaded per file for performance benefits.  For example
				Only load the calendar(datepicker) related js if there's a date on the form, HENCE only load the javasript (jQueries) for those entry forms that really require them
				2015 Jun 25 by ®yan™
			*/
            $needle = "load_employeemasterlist"; $needle1 = "edit_employee"; $needle3 = "new_employee";$needle4 = "change_pwd"; $needle5 = "new_department"; $needle6 = "edit_department";
            if ( (strpos($haystack, $needle) !== false) || (strpos($haystack, $needle1) !== false) || (strpos($haystack, $needle3) !== false) || (strpos($haystack, $needle4) !== false) || (strpos($haystack, $needle5) !== false) || (strpos($haystack, $needle6) !== false) )
            {
         ?>
            <link href="<?php echo $base_url;?>vendors/datepicker.css" rel="stylesheet" media="screen">
            <link href="<?php echo $base_url;?>vendors/uniform.default.css" rel="stylesheet" media="screen">
            <link href="<?php echo $base_url;?>vendors/chosen.min.css" rel="stylesheet" media="screen">

            <link href="<?php echo $base_url;?>vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

            <script src="<?php echo $base_url;?>vendors/jquery.uniform.min.js"></script>
            <script src="<?php echo $base_url;?>vendors/chosen.jquery.min.js"></script>
            <script src="<?php echo $base_url;?>vendors/bootstrap-datepicker.js"></script>

            <script src="<?php echo $base_url;?>vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
            <script src="<?php echo $base_url;?>vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

            <script src="<?php echo $base_url;?>vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

            <script type="text/javascript" src="<?php echo $base_url;?>vendors/jquery-validation/dist/jquery.validate.min.js"></script>
        <?php
          //used for forms to change various form elements/consistency such as input file types, etc.
          //      <script src="assets/form-validation.js"></script>
            }
        ?>          

         <?php
            $needle = "new_employee"; $needle1 = "edit_employee";  $needle3 = "change_pwd";
            $haystack = current_url();
            //echo $haystack;
            if ( (strpos($haystack, $needle) !== false) || (strpos($haystack, $needle1) !== false) || (strpos($haystack, $needle3) !== false) )
            {
              $UPD = '';
              if ( strpos($haystack, $needle1) !== false ) $UPD = 'UPD';
              if ( strpos($haystack, $needle3) !== false ) $UPD = 'PWD';

          /*
            <!--used by edit timesheet-->
            <!--this page  script only-->
            <script src="<?php echo $base_url;?>js/advanced-form-components.js"></script>
            <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.validate.min.js"></script>
          */
         ?>
                <script src="<?php echo $base_url;?>js/form-validation-<?php echo $UPD?>employee.js"></script>

        <?php
          //used for forms so makes no sense to load them for pages with no forms
            }
        ?>          



         <?php
            $needle = "new_department"; $needle1 = "edit_department";
            $haystack = current_url();
            //echo $haystack;
            if ( (strpos($haystack, $needle) !== false) || (strpos($haystack, $needle1) !== false) )
            {
              /*
              $UPD = '';
              if ( strpos($haystack, $needle1) !== false ) $UPD = 'UPD';
              */
              $UPD = 'UPD';

          /*
            <!--used by edit timesheet-->
            <!--this page  script only-->
            <script src="<?php echo $base_url;?>js/advanced-form-components.js"></script>
            <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.validate.min.js"></script>
          */
         ?>
                <script src="<?php echo $base_url;?>js/form-validation-<?php echo $UPD?>department.js"></script>

        <?php
          //used for forms so makes no sense to load them for pages with no forms
            }
        ?>          

        <script src="<?php echo $base_url;?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $base_url;?>vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="<?php echo $base_url;?>assets/scripts.js"></script>
        <script src="<?php echo $base_url;?>assets/DT_bootstrap.js"></script>
          <?php
           /*
        <script>
        //$(function() {
        $(document).ready(function () {
              $("#btn_update").click(function(e){
              var nbox= $('input[id^="ccamp"]:checked').length;
              var count_ = 0;
              if(nbox < 10) {
                    //alert('You\'ve chosen '+ nbox+' questions.  At least 10 is required to continue.');
                    alert('You did not make any selection.');
              return false;
              }
            });
        });
        </script>
            */
          ?>


         <?php
            $needle = "load_employeemasterlist"; $needle1 = "edit_employee"; $needle3 = "new_employee";
            if ( (strpos($haystack, $needle) !== false) || (strpos($haystack, $needle1) !== false)  || (strpos($haystack, $needle3) !== false) )
            {
         ?>
            <script>
              jQuery(document).ready(function() {   
                 //FormValidation.init();
              });

                    $('INPUT[type="file"]').change(function () {
                        var ext = this.value.match(/\.(.+)$/)[1];
                        switch (ext) {
                            case 'csv':
                            case 'xls':
                            case 'xlsx':
                                $('#uploadButton').attr('disabled', false);
                                break;
                            default:
                                alert('Kindly upload properly formatted excel/csv master list only.');
                                $('#uploadButton').attr('disabled', true);
                                this.value = '';
                        }
                    });

                    $(function() {
                        //$(".datepicker").datepicker();
                        $(".datepicker").datepicker({
                            format: 'yyyy-mm-dd'
                        });
                        $(".uniform_on").uniform();
                        $(".chzn-select").chosen();
                        $('.textarea').wysihtml5();

                        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                            var $total = navigation.find('li').length;
                            var $current = index+1;
                            var $percent = ($current/$total) * 100;
                            $('#rootwizard').find('.bar').css({width:$percent+'%'});
                            // If it's the last tab then hide the last button and show the finish instead
                            if($current >= $total) {
                                $('#rootwizard').find('.pager .next').hide();
                                $('#rootwizard').find('.pager .finish').show();
                                $('#rootwizard').find('.pager .finish').removeClass('disabled');
                            } else {
                                $('#rootwizard').find('.pager .next').show();
                                $('#rootwizard').find('.pager .finish').hide();
                            }
                        }});
                        $('#rootwizard .finish').click(function() {
                            alert('Finished!, Starting over!');
                            $('#rootwizard').find("a[href*='tab1']").trigger('click');
                        });
                    });
            </script>
        <?php
          //used for forms so makes no sense to load them for pages with no forms
            }
        ?>          
    </body>
</html>