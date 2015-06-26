               <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Registered Members</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                          <a class="btn btn-success" href="<?php echo site_url()?>/main/new_users">Add New</a>
                                      </div>
                                      <div class="btn-group pull-right">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Export <span class="caret"></span></button>
                                        <ul role="menu" class="dropdown-menu">
                                            <li><a onClick ="$('#employeeattendance').tableExport({type:'excel',escape:'false'});" href="#">To Excel</a></li>
                                            <li><a onClick ="$('#employeeattendance').tableExport({type:'doc',escape:'false'});" href="#">To Word</a></li>
                                            <!--li class="divider"></li>
                                            <li><a href="#">Separated link</a></li-->
                                        </ul>
                                         
                                      </div>
                                   </div>
                                    <?php
                                    /*
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>Trident</td>
                                                <td>Internet
                                                     Explorer 4.0</td>
                                                <td>Win 95+</td>
                                                <td class="center"> 4</td>
                                                <td class="center">X</td>
                                            </tr>
                                            <tr class="even gradeC">
                                                <td>Trident</td>
                                                <td>Internet
                                                     Explorer 5.0</td>
                                                <td>Win 95+</td>
                                                <td class="center">5</td>
                                                <td class="center">C</td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>Trident</td>
                                                <td>Internet
                                                     Explorer 5.5</td>
                                                <td>Win 95+</td>
                                                <td class="center">5.5</td>
                                                <td class="center">A</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    */
                                    ?>
                                    <table id="employeeattendance" class="table table-striped">
                                          <thead>
                                                    <tr>
                                                            <th class="numeric">Lastname</th>
                                                            <th class="numeric">Firstname</i></th>
                                                            <th class="numeric">Username</th>
                                                            <th class="numeric">Email<i class="icon-email"></i></th>
                                                            <th class="numeric">Date <i class="icon-calendar"></i></th>
															<th>&nbsp;</th>
                                                    </tr>
                                          </thead>

                                       <tbody>
                                        <?php if ( $max_posts ) : ?>
                                            <?php foreach( $max_posts as $results )  : $empid=$results->id;?>
                                                <tr>
                                                    <td class="numeric"><?php echo $results->lastname; ?>&nbsp;</td>
                                                    <td class="numeric"><?php echo $results->firstname; ?></td>
                                                    <td class="numeric"><?php echo $results->username; ?></td>
                                                    <td class="numeric"><?php echo $results->email; ?></td>
                                                    <td class="numeric"><?php echo $results->date_created; ?></td>
                                                    <td>
                                                      <div class="pull-right hidden-phone">
                                                          <!--button class="btn btn-success btn-xs"><i class="icon-ok"></i></button-->
                                                          <?php if ($results->activated == 1) { ?>
                                                          <span class="badge badge-sm label-inverse">Active</span>
                                                          <?php }?>
                                                          <!--i class="icon-lock"></i-->
                                                          <!--a title="Schedule" href="<?php //echo site_url("tks/edit_shiftsched/{$empid}")?>"><button class="btn btn-primary btn-xs"><i class="icon-calendar"></i></button></a-->

                                                          <a title="Edit" href="<?php echo site_url("main/edit_users/{$empid}")?>"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                                          
                                                          <a title="Delete" onclick="return confirm('Deleting this employee will also delete the other records referenced to this, are you sure?');" href="<?php echo site_url("main/purge_users/{$empid}")?>"><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a>
                                                      </div>                                                  
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
												<tr>
													 <td colspan="6"><div class="btn-group pull-right"><?php echo $links; ?></div></td>
												</tr>
                                        <?php endif; ?>
                                       </tbody>

                                    </table>                                

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
<?php
/* End of file systemusers_model.php */
/* Location: ./application/models/admin/systemusers_model.php */