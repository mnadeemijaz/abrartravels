<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-building"></i> Voucher Management
        <small>View</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                
                    <!--<a class="btn btn-primary" href="<?php echo base_url(); ?>createVoucher"><i class="fa fa-plus"></i> Add New</a>-->
                </div>
            </div>
        </div>
        <div class="row">
        	<form action="<?php echo base_url() ?>voucher" method="POST" id="">
        	<?php if($this->session->userdata('role') != '3'){?>
            <div class="col-md-2">
            	Party:
            	<select name="agent_id" class="form-control">
                	<option value="">Select Agent</option>
                    <?php foreach($agent as $ag){?>                    
                    <option value="<?php echo $ag->userId?>" <?php echo ($agent_id == $ag->userId)?'selected="selected"':''?>><?php echo $ag->name?></option>
                    <?php }?>
                </select>
            </div>
            <?php }?>
            <div class="col-md-2">
            Date:
            	<input type="text" name="datefilter" class="datefilter form-control" value="<?php echo $date;?>">
            </div>
            <div class="col-md-2">
            Voucher Status:
            	<select name="v_status" class="form-control">
                	<option value="">Select Voucher Status</option>
                    <option value="yes" <?php echo ($v_status == 'yes')?'selected="selected"':''?>>Approved</option>
                    <option value="no" <?php echo ($v_status == 'no')?'selected="selected"':''?>>Not Approved</option>
                </select>
            </div>
            <!--<div class="col-md-2">
            	Hotels:
            	<select name="hotel_id" class="form-control">
                	<option>Select Hotel</option>
                    <?php foreach($hotels as $ht){?>                    
                    <option value="<?php echo $ht->id?>" <?php echo ($hotel_id == $ht->id)?'selected="selected"':''?>><?php echo $ht->name?></option>
                    <?php }?>
                </select>
            </div>-->
            <div class="col-md-1">&nbsp;
            	<input type="submit" name="submit" class="btn btn-primary" value="Search">
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Voucher List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>voucher" method="POST" id="searchList">                            
                                 <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="height:400px">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                    <?php if($role == '1'){?>
                      <th>Cancel</th>
                      <?php }?>
                      <th>Sr#</th>
                      <?php if($role == '1' || $role == '2'){?>
                      <th colspan="3">Detail</th>
                      <?php } else {?>
                      <th colspan="2">Detail</th>
                      <?php }?>
                      <th>VID</th>
                      <th>DOE</th>
                      <th>Party</th>
                      <th>ARV DATE</th>
                      <th>RET DATE</th>
                      <th>TOTAL</th>
                      <th>ad</th>
                      <th>ch</th>
                      <th>in</th>
                      <th>hotel1</th>
                      <th>nights1</th>
                      <th>hotel2</th>
                      <th>nights2</th>
                      <th>hotel3</th>
                      <th>nights3</th>
                      <th>t_nights</th>
                      <!--<th>room_type</th>-->
                      <th>transport</th>
                      <th>by</th>                      
                      <?php if($role == '1'){?>
                      <th class="text-center">Actions</th>
                      <?php }?>
                    </tr>
                    <?php //print_r($voucherRecords);
					$total_c = 0;
					$total_adult = 0;
					$total_child = 0;
					$total_infant = 0;
                    if(!empty($voucherRecords))
                    {
						$counter = 0;
                        foreach($voucherRecords as $record)
                        {$counter++;
						$total_c += $record->total;
						$total_adult += $record->t_adult;
						$total_child += $record->t_child;
						$total_infant += $record->t_infant;
                    ?>
                    <tr>
                   
                      <!--    <a class="btn btn-sm btn-info" href="<?php //echo base_url().'editClient/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>-->
                      <?php if($role == '1'){?>
                       <td class="text-center">
                      <a class="label label-danger voucherCancel" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-times"></i>Cancel</a></td>
                          <?php 
						  }?>
                      
                      <td><?php echo $counter; ?></td>
                      <?php if($role == '1' || $role == '2'){?>
                      <td>
                      <?php //if($record->approve == 'no'){?>
                      <a  class="label label-danger" href="<?php echo base_url()?>editVoucher/<?php echo $record->id?>">Edit</a>
                      
                      <?php //}?>		</td>				  					
                          <?php 
						  }?>
                      <td><a class="label label-success" href="<?php echo base_url()?>voucherView/<?php echo $record->id?>">view</a>
                      <a  class="label label-primary" href="<?php echo base_url()?>c_in_out/<?php echo $record->id?>">CInOut</a>
                      
                      </td>
                      <td><a class="label label-info" href="<?php echo base_url()?>voucherInvoice/<?php echo $record->id?>">Invoice</a>
                     
                      </td>
                      <td><?php echo $record->id ?></td>
                      <td><?php echo date_change_view($record->date)?></td>
                      <td><?php echo $record->agent_name ?></td>
                      <td><?php echo date_change_view($record->arv_date) ?></td>
                      <td><?php echo date_change_view($record->ret_date) ?></td>
                      <td><?php echo $record->total ?></td>
                      <td><?php echo $record->t_adult ?></td>
                      <td><?php echo $record->t_child ?></td>
                      <td><?php echo $record->t_infant ?></td>
                      <?php  $voucher_hotels = $this->hotel_other_model->view_voucher_hotels($record->id);
					  $tnights = 0;
					  //print_r($voucher_hotels);
					  foreach($voucher_hotels as $hh){
						  $tnights += $hh->city_nights;
					  }
					  for($i = 0; $i<3;$i++){
						  if(isset($voucher_hotels[$i])){
					  ?>                      
                      <td><?php echo $voucher_hotels[$i]->hotel_name ?></td>
                      <td><?php echo $voucher_hotels[$i]->city_nights ?></td>
                      <?php }
					  else{?><td></td><td></td>
                      <?php }
					  }?>
					  
                      <td> <?php echo $tnights; ?></td>
                      <!--<td><?php echo $record->room_type1 ?></td>-->
                      <td><?php echo $record->trip_name ?></td>
                      <td><?php echo $record->vehicle_name ?></td>                      
                      <td class="text-center">
                      <!--    <a class="btn btn-sm btn-info" href="<?php //echo base_url().'editClient/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>-->
                      <?php if($role == '1' || $role == '2'){?>                      						  
					<?php 	  	if($record->approve == 'no'){?>
                          <a class="label label-success voucherApprove" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-check"></i>Approve</a>
                          <?php } else{?>
                          <a class="label label-danger voucherNApprove" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-times"></i>Dis Approve</a>
                          <?php }
						  }?>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                    	<?php if($role == '1'){?>
                      <td></td>
                      <?php }?>
                      <td></td>
                      <?php if($role == '1' || $role == '2'){?>
                      <td colspan="3">Detail</td>
                      <?php } else {?>
                      <td colspan="2">Detail</td>
                      <?php }?>
                      <td colspan="5"></td>                      
                      <td><?php echo $total_c?></td>
                      <td><?php echo $total_adult?></td>
                      <td><?php echo $total_child?></td>
                      <td><?php echo $total_infant?></td>
                      <td colspan="9"></td>                    	
                    </tr>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "voucher/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
