<?php



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Configration
        <small>Update Configration</small>
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
                    
                    <form action="<?php echo base_url() ?>configration" method="post" id="configration" role="form"  enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Company Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Company Name" name="name" value="<?php echo $config->name; ?>" maxlength="128">                                           
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
                                        <label for="fname">Phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="<?php echo $config->phone; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Phone 2</label>
                                        <input type="text" class="form-control" id="phone2" placeholder="Phone 2" name="phone2" value="<?php echo $config->phone2; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Adult Visa Rate</label>
                                        <input type="text" class="form-control" id="adult_rate" placeholder="Adult Visa Rate" name="adult_rate" value="<?php echo $config->adult_rate; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Child Visa Rate</label>
                                        <input type="text" class="form-control" id="child_rate" placeholder="Child Visa Rate" name="child_rate" value="<?php echo $config->child_rate; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Infant Visa Rate</label>
                                        <input type="text" class="form-control" id="infant_rate" placeholder="Infant Visa Rate" name="infant_rate" value="<?php echo $config->infant_rate; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Per Page</label>
                                        <input type="text" class="form-control" id="per_page" placeholder="Per Page" name="per_page" value="<?php echo $config->per_page; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">SR Rate</label>
                                        <input type="text" class="form-control" id="sr_rate" placeholder="SR Rate" name="sr_rate" value="<?php echo $config->sr_rate; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">No Voucher Visa Rate</label>
                                        <input type="text" class="form-control" id="no_vo_visa_rate" placeholder="No Voucher Visa Rate" name="no_vo_visa_rate" value="<?php echo $config->no_vo_visa_rate; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Madina Helper Name</label>
                                        <input type="text" class="form-control" id="mad_name" placeholder="" name="mad_name" value="<?php echo $config->mad_name; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Madina Helper Contect</label>
                                        <input type="text" class="form-control" id="mad_cont" placeholder="" name="mad_cont" value="<?php echo $config->mad_cont; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Madina Helper Name 2</label>
                                        <input type="text" class="form-control" id="mad_name1" placeholder="" name="mad_name1" value="<?php echo $config->mad_name1; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Madina Helper Contect 2</label>
                                        <input type="text" class="form-control" id="mad_cont1" placeholder="" name="mad_cont1" value="<?php echo $config->mad_cont1; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Makka Helper Name</label>
                                        <input type="text" class="form-control" id="mak_name" placeholder="" name="mak_name" value="<?php echo $config->mak_name; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Makka Helper Contect</label>
                                        <input type="text" class="form-control" id="mak_cont" placeholder="" name="mak_cont" value="<?php echo $config->mak_cont; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Makka Helper Name 2</label>
                                        <input type="text" class="form-control" id="mak_name1" placeholder="" name="mak_name1" value="<?php echo $config->mak_name1; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Makka Helper Contect 2</label>
                                        <input type="text" class="form-control" id="mak_cont1" placeholder="" name="mak_cont1" value="<?php echo $config->mak_cont1; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Name for Only Transport (Madina)</label>
                                        <input type="text" class="form-control" id="only_transport_name_mad" placeholder="" name="only_transport_name_mad" value="<?php echo $config->only_transport_name_mad; ?>" maxlength="128">
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Name for Only Transport (Makkah)</label>
                                        <input type="text" class="form-control" id="only_transport_name" placeholder="" name="only_transport_name" value="<?php echo $config->only_transport_name; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Contact No. for Only Transport (Madina)</label>
                                        <input type="text" class="form-control" id="only_transport_mad" placeholder="" name="only_transport_mad" value="<?php echo $config->only_transport_mad; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Contact No. for Only Transport (Makkah)</label>
                                        <input type="text" class="form-control" id="only_transport" placeholder="" name="only_transport" value="<?php echo $config->only_transport; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">E-Mail</label>
                                        <input type="text" class="form-control" id="email" placeholder="" name="email" value="<?php echo $config->email; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">SMS Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile_for_sms" placeholder="" name="mobile_for_sms" value="<?php echo $config->mobile_for_sms; ?>" maxlength="128">
                                        <input type="checkbox" id="sms_yes_no" name="sms_yes_no" <?php echo ($config->sms_yes_no == 'Yes')?"checked='checked'":''?>>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">21 Days Rate</label>
                                        <input type="text" class="form-control" id="rate_two" placeholder="" name="rate_two" value="<?php echo $config->rate_two; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">28 Days Rate</label>
                                        <input type="text" class="form-control" id="rate_three" placeholder="" name="rate_three" value="<?php echo $config->rate_three; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>-->
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Team Member 1</label>
                                        <input type="text" class="form-control" id="member_one" placeholder="" name="member_one" value="<?php echo $config->member_one; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Discription Member One</label>
                                        <input type="text" class="form-control" id="dis_one" placeholder="" name="dis_one" value="<?php echo $config->dis_one; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div><div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Team Member 2</label>
                                        <input type="text" class="form-control" id="member_two" placeholder="" name="member_two" value="<?php echo $config->member_one; ?>" maxlength="128">                                           
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Discription Member Two</label>
                                        <input type="text" class="form-control" id="dis_two" placeholder="" name="dis_two" value="<?php echo $config->dis_one; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Ticket Sale SMS Template {ticket/visa} {amount}</label>
                                        <input type="text" name="ticket_sms_format" id="ticket_sms_format" class="form-control" value="<?php echo $config->ticket_sms_format; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Permotion SMS Tempelate {name} </label>
                                        <input type="text" name="permotion_sms" id="permotion_sms" class="form-control" value="<?php echo $config->permotion_sms; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Ticket Sale SMS Template to Admin {amount} {name} {ticket/visa} {mobile}</label>
                                        <input type="text" name="ticket_sms_format_admin" id="ticket_sms_format_admin" class="form-control" value="<?php echo $config->ticket_sms_format_admin; ?>">
                                        <!--<textarea id="ticket_sms_format_admin" class="form-control" name="ticket_sms_format_admin" rows="4" cols="50">
                                            <?php echo trim($config->ticket_sms_format_admin); ?>
                                        </textarea>-->
                                        
                                    </div>                                    
                                </div>
                                
                            </div>
                            
                            
                            <div class="row">
                            <div class="col-md-6">
                             <div class="form-group" style="padding-left: 15px;">
                                <label>Packeg Photo</label>                            
                                <div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <!--<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            <img src="http://placehold.it/200x200" alt="...">
                                        </div>-->
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; height: 150px">
                                        <?php if($config->packeg1){?>
                                            <img src="<?php echo base_url().'assets/images/'.$config->packeg1?>">
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
                            <div class="col-md-6">
                            <div class="form-group" style="padding-left: 15px;">
                                <label>Packeg Photo 2</label>                            
                                <div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <!--<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            <img src="http://placehold.it/200x200" alt="...">
                                        </div>-->
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; height: 150px">
                                        <?php if($config->packeg2){?>
                                            <img src="<?php echo base_url().'assets/images/'.$config->packeg2?>">
                                            <?php }?>
                                        
                                        </div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new btn btn-default">Select Picture</span>
                                                <span class="fileinput-exists"><!--Change--></span>
                                                <input type="file" id="userfile1" name="userfile1" accept="image/*">
                                            </span>
                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
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
            <input type="button" id="backup_db" class="btn btn-danger" value="Back Up" />
        </div>    
    </section>
</div>

    
    <script>
    	$(function () {
			$("#backup_db").click(function() {
				window.location='<?php echo site_url('backup_db') ?>';
			});
		});
			</script>

<script src="<?php echo base_url(); ?>assets/js/config.js" type="text/javascript"></script>