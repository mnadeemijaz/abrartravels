<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i> Pilgrim Wise Report        
      </h1>
    </section>
    <section class="content">        
        <div class="row">
        <?php if($this->session->userdata('role') != 3){?>
        <form action="<?php echo base_url() ?>pilgrim_wise_report" method="POST" id="">
        	<div class="col-md-2">
            	Party:
            	<select name="agent_id" class="form-control">
                	<option value="">Select Agent</option>
                    <?php foreach($agent as $ag){?>                    
                    <option value="<?php echo $ag->userId?>" <?php echo ($agent_id == $ag->userId)?'selected="selected"':''?>><?php echo $ag->name?></option>
                    <?php }?>
                </select>                
            </div>
            <div class="col-md-1">
            &nbsp;
            	<input type="submit" name="submit" value="Search" class="btn btn-primary">
            </div>
            </form>
            <?php }?>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pilgrim Wise Report</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>pilgrim_wise_report" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                        
                    </div>
                    <a href='<?php echo base_url() ?>pilgrim_wise_excel'> <i class="fa fa-file-excel-o "> </i> </a>
                        <a href='<?php echo base_url() ?>pilgrim_wise_word'> <i class="fa fa-file-word-o "> </i> </a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                      <th>Sr#</th>
                      <th>VNo</th>
                      <th>Name</th>
                      <th>Passport No</th>
                      <th>D.O.B</th>
                      <th>Age</th>
                      <th>Nights</th>
                      <th>Visa</th>
                      <th>Document</th>
                      <th>Ziarat</th>
                      <th>Accumodation</th>
                      <th>Total</th>
                    </tr>
                    <?php //print_r($hotelRecords);
					$total_nights = 0;
					$total_amount = 0;
					$grand_total_amount = 0;
					$total_document = 0;
					$visa_amount = 0;
					$visa_total = 0;
					$ziarat_fee = 0;
					$total_ziarat_fee = 0;
					$total_accomudation =0;
                    if(!empty($pilgrim_wise_report))
                    { $count=1;
						
						
                        foreach($pilgrim_wise_report as $record)
                        {
							if($record->age_group == 'Adult')
							$visa_amount = $record->adult_rate*$record->sr_rate;
							else if($record->age_group == 'Child')
							$visa_amount = $record->child_rate*$record->sr_rate;
							else 
							$visa_amount = $record->infant_rate*$record->sr_rate;
							
							$ziarat_fee = ($record->ziarat == 'yes')?($record->ziarat_rate*$record->sr_rate):0;															
							$total_ziarat_fee += $ziarat_fee;
							$total_nights += $record->nights;
							$total_amount = (($record->document_fee+$record->ttl_htl)*$record->sr_rate)+$visa_amount+$ziarat_fee;
							$grand_total_amount += $total_amount;
							$total_document += $record->document_fee;
							$total_accomudation += $record->ttl_htl*$record->sr_rate;
							
							
							$visa_total +=$visa_amount;
                    ?>
					<tr>
						<td><?php echo $count++; ?></td>
                        <td><a href="<?php echo base_url()?>voucherInvoice/<?php echo $record->voucher_id?>"><?php echo $record->voucher_id?></a></td>                        
                      	<td><?php echo $record->name.' '.$record->last_name ?></td>
                      	<td><?php echo $record->ppno ?></td>
                        <td><?php echo date_change_view($record->dob) ?></td>
                      	<td><strong><?php 
							  echo $_age = floor((time() - strtotime($record->dob)) / 31556926);

						?></strong></td>
                      	<td><?php echo $record->nights ?></td>
                        <td><?php echo $visa_amount ?></td>
                        <td><?php echo $record->document_fee*$record->sr_rate; ?></td>
                        <td><?php echo $ziarat_fee ?></td>
                        <td><?php echo ($record->ttl_htl)*$record->sr_rate; ?></td>
                        <td><?php echo $total_amount ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                    	<td></td>
                        <td></td>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $total_nights?></td>
                        <td></td>
                        <td><?php echo $total_document*$record->sr_rate?></td>
                        <td><?php echo $total_ziarat_fee?></td>
                        <td><?php echo $total_accomudation?></td>
                        <td><?php echo $grand_total_amount?></td>
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
</script>
