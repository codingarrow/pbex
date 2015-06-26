
<div class="span9" id="content">
      <!-- morris stacked chart -->
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Edit Users</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                        <!-- BEGIN FORM  form_sample_1-->
                        <form accept-charset="utf-8" class="form-horizontal" id="signupForm" method="post" action="<?php echo site_url()?>/main/update_users/">

                          <fieldset>
                              <!--legend>Form Components</legend-->                            
                            <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                            </div>
                            <div class="alert alert-success hide">
                              <button class="close" data-dismiss="alert"></button>
                              Your form validation is successful!
                            </div>

                              <input type="hidden" name="id" value="<?php echo $entry->id; ?>"/>
							  <?php
							  /*
                              <div class="control-group">
                                <label class="control-label">Department</label>
                                <div class="controls">
								
                                  <select class="span6 m-wrap" name="category">
                                    <option value="">Select...</option>
                                    <option value="Category 1">Category 1</option>
                                    <option value="Category 2">Category 2</option>
                                    <option value="Category 3">Category 5</option>
                                    <option value="Category 4">Category 4</option>
                                  </select>
							  */
                                  ?>
                                  <?php //echo form_dropdown('department', $print_department, '','class="form-control m-bot15"'); ?>

							  <?php
							  /*
                                </div>
                              </div>
							  */
							  ?>
                              <div class="control-group">
                                <label class="control-label">Activated</label>
                                <div class="controls">
                                             <select id="activated" name="activated" class="span6 m-wrap">
                                              <option value="1" <?php if($entry->activated == "1") { echo "selected"; } ?>>Yes</option>
                                              <option value="0" <?php if($entry->activated == "0") { echo "selected"; } ?>>No</option>
                                            </select>
                                </div>
                              </div>
							  
                              <div class="control-group">
                                <label class="control-label">Gender</label>
                                <div class="controls">
                                             <select id="gender" name="gender" class="span6 m-wrap">
                                              <option value="M" <?php if($entry->gender == "M") { echo "selected"; } ?>>M</option>
                                              <option value="F" <?php if($entry->gender == "F") { echo "selected"; } ?>>F</option>
                                            </select>
                                </div>
                              </div>

                              <?php //name changed to login changed to username?>
                              <div class="control-group">
                                <label class="control-label">Username<span class="required">*</span></label>
                                <div class="controls">
                                  <input value="<?php echo $entry->username; ?>" maxlength="32" type="text" name="username" id="username" data-required="1" class="span6 m-wrap"/>
                                </div>
                              </div>

                              <?php //name changed to login changed to username?>
                              <div class="control-group">
                                  <label class="control-label">Password<span class="required">*</span></label>
                                  <div class="controls">
                                      <input value="<?php echo $entry->password; ?>" maxlength="32" name="password" id="password" type="password" data-required="1" class="span6 m-wrap"/>
                                      <span style="font-size: 9px"><?php echo $entry->password; ?></span>
                                  </div>
                              </div>

                              <div class="control-group">
                                <label class="control-label">Email<span class="required">*</span></label>
                                <div class="controls">
                                  <input value="<?php echo $entry->email; ?>" maxlength="80" name="email" id="email" type="email" class="span6 m-wrap"/>
                                </div>
                              </div>
							  
                              <?php // ?>
                              <div class="control-group">
                                <label class="control-label">Lastname<span class="required">*</span></label>
                                <div class="controls">
                                  <input value="<?php echo $entry->lastname; ?>" maxlength="250" type="text" name="lastname" id="lastname" data-required="1" class="span6 m-wrap"/>
                                </div>
                              </div>


                              <?php // ?>
                              <div class="control-group">
                                <label class="control-label">Firstname<span class="required">*</span></label>
                                <div class="controls">
                                  <input value="<?php echo $entry->firstname; ?>" maxlength="250" type="text" name="firstname" id="firstname" data-required="1" class="span6 m-wrap"/>
                                </div>
                              </div>


                              <?php // ?>
                              <div class="control-group">
                                <label class="control-label">Middle<span class="required">*</span></label>
                                <div class="controls">
                                  <input value="<?php echo $entry->minit; ?>" maxlength="4" type="text" name="minit" id="minit" data-required="1" class="span6 m-wrap"/>
                                </div>
                              </div>

                              <?php // ?>
                              <div class="control-group">
                                <label class="control-label" for="birth_date">Birth Date</label>
                                <div class="controls">
                                  <input name="birth_date" type="text" class="input-xlarge datepicker" id="birth_date" value="<?php echo $entry->dob; ?>">
                                  <!--p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p-->
                                </div>
                              </div>    

                              <?php // ?>
                              <div class="control-group">
                                <label class="control-label">Address<span class="required">*</span></label>
                                <div class="controls">
                                  <input value="<?php echo $entry->address1; ?>" maxlength="250" type="text" name="address1" id="address1" data-required="1" class="span6 m-wrap"/>
                                </div>
                              </div>

                              <?php // ?>
                              <div class="control-group">
                                <label class="control-label">Userphoto<span class="required">*</span></label>
                                <div class="controls">
                                  <input value="<?php echo $entry->userphoto; ?>" maxlength="249" type="text" name="userphoto" id="userphoto" data-required="1" class="span6 m-wrap"/>
                                </div>
                              </div>

                              <?php
                              /*
                              <div class="control-group">
                                <label class="control-label">URL<span class="required">*</span></label>
                                <div class="controls">
                                  <input name="url" type="text" class="span6 m-wrap"/>
                                  <span class="help-block">e.g: http://www.demo.com or http://demo.com</span>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">Number<span class="required">*</span></label>
                                <div class="controls">
                                  <input name="number" type="text" class="span6 m-wrap"/>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">Digits<span class="required">*</span></label>
                                <div class="controls">
                                  <input name="digits" type="text" class="span6 m-wrap"/>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">Credit Card<span class="required">*</span></label>
                                <div class="controls">
                                  <input name="creditcard" type="text" class="span6 m-wrap"/>
                                  <span class="help-block">e.g: 5500 0000 0000 0004</span>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">Occupation&nbsp;&nbsp;</label>
                                <div class="controls">
                                  <input name="occupation" type="text" class="span6 m-wrap"/>
                                  <span class="help-block">optional field</span>
                                </div>
                              </div>
                              */
                              ?>
                              <div class="form-actions">
                                <input type="submit" class="btn btn-primary" value="Save" />
                                <!--button type="button" class="btn">Cancel</button-->
                                  <!--button class="btn">Cancel <i class="icon-plus icon-white"></i></button-->
                                  <a class="btn" href="<?php echo site_url()?>/main/load_registeredmembers">Cancel</a>
                              </div>
                          </fieldset>
                        </form>
                        <!-- END FORM-->
                      </div>
                        </div>
                    </div>
                                    <!-- /block -->
                      </div>
                                   <!-- /validation -->

                              </div>
                          </div>                            
	  <?php
	  /*GUIDE DON'T PURGE
<div class="samplebox">
	<div id="checkboxlistDemo">
		<div><input type="checkbox" id="checkbox03[]" value="1" class="chkDemo"> Value 1</div>
		<div><input type="checkbox" id="checkbox03[]" value="2" class="chkDemo"> Value 2</div>
		<div><input type="checkbox" id="checkbox03[]" value="3" class="chkDemo"> Value 3</div>
		<div><input type="checkbox" id="checkbox03[]" value="4" class="chkDemo"> Value 4</div>
		<div><input type="checkbox" id="checkbox03[]" value="5" class="chkDemo"> Value 5</div>
		<div>
    		 <input type="button" value="Get Value Using Class" id="buttonClassDemo" class="samplebutton"> 
             <!--button id="buttonClassDemo" class="samplebutton"><i class="icon-refresh"></i> Update</button-->
			 
    		 <input type="button" value="Get Value Using Parent Tag" id="buttonParentDemo" class="samplebutton">
		</div>
	</div>
</div>		  
	  */
	  ?>
<?php //include('templates/footer.php'); ?>