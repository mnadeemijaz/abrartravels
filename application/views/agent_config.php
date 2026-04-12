<?php



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Accounts Settings
        <small>Update Account Setting</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Company Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>Config" method="post" id="agent_config" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Name</label>
                                        <input type="text" class="form-control" id="name" placeholder=" Name" name="name" value="<?php echo $config->name; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?php echo $config->address; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="<?php echo $config->mobile; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Company Name</label>
                                        <input type="text" class="form-control" id="c_name" placeholder="Company Name" name="c_name" value="<?php echo $config->c_name; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                </div>
                                <div class="row">
                                	<div class="form-group" style="padding-left: 15px;">
                            <label>Photo</label>                            
                            <div>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <!--<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                        <img src="http://placehold.it/200x200" alt="...">
                                    </div>-->
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; height: 150px">
                                    <?php if($config->logo){?>
                                    	<img src="<?php echo base_url().'assets/images/'.$config->logo?>">
                                        <?php }?>
                                    
                                    </div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new btn btn-default">Select Picture</span>
                                            <span class="fileinput-exists"><!--Change--></span>
                                            <input type="file" id="userfile" name="userfile" accept="image/*">
                                        </span>
                                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                </div>
                                
                            
                            
                                                        
                            
                            
                            
                            
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/config.js" type="text/javascript"></script>