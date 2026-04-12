<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-credit-card"></i> Transection Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
    <?php 
	$total_ticket_amt = 0;
	$t_total = 0;
	$t_adult = 0;
	$t_child = 0;
	$t_infant = 0;
	$total_pil = 0;
	$adult_pil = 0;
	$child_pil = 0;
	$infant_pil = 0;
	$total_charges = 0;
	?>
        <!--<div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                <?php if($this->session->userdata('role') != 3){?>
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addTransection"><i class="fa fa-plus"></i> Add New</a>
                    <?php }?>
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                	<div class="row">
                    	<div class="col-md-3">
                    		<h3 class="box-title">Transection List Debit Amount</h3>
                        </div>
                        <div class="col-md-9 pull-right">
                            <div class="box-tools" style=" right:40px">
                                <form action="<?php echo base_url() ?>transection" method="POST" id="searchList">
                                    <!--<div class="row">
                                    <?php if($this->session->userdata('role') != '3'){?>
                                        <div class="col-md-3 pull-right">
                                        <select name="agent_id" class="form-control" id="agent_id">
                                            <option value="">Select Agent</option>
                                            <?php foreach($agentList as $row){?>
                                                <option value="<?php echo $row->userId?>"<?php echo ($agent_id == $row->userId)?'selected="selected"':''?>><?php echo $row->name?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                        <?php }?>
                                        <div class="col-md-3 pull-right">
                                            <div class="input-group">                            	
                                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                              <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                              </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </form>
                            </div>
                       </div>
                </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                    	   <th>Sr#</th>
                    	<th>V NO</th>
                          <th>Party</th>
                          <th>Total</th>
                          <th>Adults</th>
                          <th>Childs</th>
                          <th>Infant</th>
                          <th>Total Charges</th>                    
                  <!--    <th class="text-center">Actions</th>-->
                    </tr>
                    <?php //print_r($hotelRecords);
					$total_dr=0;$total = 0;$counter = 1;
                    if(!empty($transectionRecords))
                    {
						$total_dr = 0;
						$t_total = 0;
						$t_adult = 0;
						$t_child = 0;
						$t_infant = 0;
                        foreach($transectionRecords as $record)
                        {
							$total_dr +=$record->amount;							
							$t_adult +=$record->t_adult;
							$t_child +=$record->t_child;
							$t_infant +=$record->t_infant;
                    ?>
                    <tr>
                    	<td><?php echo $counter++ ?></td>
                      <td><a href="<?php echo base_url()?>voucherInvoice/<?php echo $record->voucher_id?>"><?php echo $record->voucher_id ?></a></td>
                      <td><?php echo $record->name ?></td>
                      <?php if(empty($record->voucher_id)){?>
                      <td><?php echo ''?></td>
                      <td><?php echo '' ?></td>
                      <td><?php echo '' ?></td>
                      <td><?php echo '' ?>
                      <?php if($this->session->userdata('role') != 3){?><a class="btn btn-sm btn-info" href="<?php echo base_url().'editTransection/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                      <?php }?></td>
                      <?php }
					  else{?>
                      <td><?php echo $record->t_adult+$record->t_child+ $record->t_infant?></td>
                      <td><?php echo $record->t_adult ?></td>
                      <td><?php echo $record->t_child ?></td>
                      <td><?php echo $record->t_infant ?></td>
                      <?php }?>
                      <td><?php echo $record->amount ?></td>
                      <!--<td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editClient/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteHotel" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>-->
                    </tr>
                    <?php
                        }
                    }
					if(!empty($transectionRecords))
                    {
                    ?>
                    <tr>
                    	
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td><?php echo $t_adult+$t_child+$t_infant ?></td>
                        <td><?php echo $t_adult ?></td>
                        <td><?php echo $t_child ?></td>
                        <td><?php echo $t_infant ?></td>
                        <td><?php echo $total_dr ?></td>
                    </tr>
                    <?php } ?>
                  </table>
                  
                </div><!-- /.box-body -->        
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Charges Pilgrim Without Voucher</h3>
                </div><!-- /.box-header -->
                	<div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                      <th>Sr#</th>
                      <th>Party</th>
                      <th>Total</th>
                      <th>Adults</th>
                      <th>Childs</th>
                      <th>Infants</th>
                      <th> Total Charges</th>
                    </tr>
                    <?php //print_r($hotelRecords);
                    if(!empty($charges_wo_voucher))
                    {
						$total_pil = 0;
						$adult_pil = 0;
						$child_pil = 0;
						$infant_pil = 0;
						$total_charges = 0;
						$cont = 1;
                        foreach($charges_wo_voucher as $records)
                        {						
						$adult_pil += $records->t_adult;
						$child_pil += $records->t_child;
						$infant_pil += $records->t_infant;
						$total_charges = (($records->t_adult+$records->t_child+$records->t_infant)*$config->no_vo_visa_rate)*$records->sr_rate;
						$total_pil = +$total_charges;
                    ?>
                    <tr>
                      <td><?php echo $cont++; ?></td>
                      <td><?php echo $records->name ?></td>
                      <td><?php echo $records->t_adult+$records->t_child+$records->t_infant ?></td> 
                      <td><?php echo $records->t_adult ?></td>                      
                      <td><?php echo $records->t_child ?></td> 
                      <td><?php echo $records->t_infant ?></td> 
                      <td><?php echo $total_charges ?></td>
                    </tr>
                    <?php
                        }
                    }
					if(!empty($charges_wo_voucher))
                    {
                    ?>
                    
                    <tr>
                    	<td></td>
                        <td>Total</td>
                        <td><?php echo $adult_pil+$child_pil+$infant_pil?></td>
                        <td><?php echo $adult_pil?></td>
                        <td><?php echo $child_pil?></td>
                        <td><?php echo $infant_pil?></td>
                        <td><?php echo $total_pil?></td>
                    </tr>
                    <?php } ?>
                    
                    
                  </table>
                  
                </div>
              </div>
            </div>
         </div>
        
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ticket Sale Detail</h3>
                </div><!-- /.box-header -->
                	<div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                      <th>Sr#</th>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Detail</th>
                      <th>PNR</th>
                      <th>Air Time</th>
                      <th>Agent Name</th>                                            
                      <th>Ticket Amount</th>                      
                    </tr>
                    <?php //print_r($hotelRecords);
                    if(!empty($ticket_record))
                    {
						$total_ticket_amt = 0;$cont = 1;
                        foreach($ticket_record as $records)
                        {$total_ticket_amt +=$records->sale;
                    ?>
                    <tr>
                      <td><?php echo $cont++; ?></td>
                      <td><?php echo date_change_view($records->date) ?></td>
                      <td><?php echo $records->name ?></td> 
                      <td><?php echo $records->ticket_from_to ?></td>                      
                      <td><?php echo $records->pnr ?></td> 
                      <td><?php echo $records->flight_name ?></td> 
                      <td><?php echo $records->agent_name ?></td> 
                      
                      <td><?php echo $records->sale ?></td>
                    </tr>
                    <?php
                        }
                    }
					if(!empty($transectionRecords1)||!empty($total_ticket_amt))
                    {
                    ?>
                    
                    <tr>
                    	<td colspan="6"></td>
                        <td>Total</td>
                        <td><?php echo $total_ticket_amt?></td>
                    </tr>
                    <?php } ?>
                    
                    
                  </table>
                  
                </div>
              </div>
            </div>
         </div>              
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Transection List credit Amount</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                      <th>Sr#</th>
                      <th>Date</th>
                      <th>Agent Name</th>                      
                      
                      <th>Detail</th>
                      <th>Amount</th>
                      <?php if($this->session->userdata('role') != 3){?>
                      <th class="text-center">Actions</th>
                      <?php }?>
                    </tr>
                    <?php //print_r($hotelRecords);
                    if(!empty($transectionRecords1))
                    {
						$total = 0; $contt = 1;
                        foreach($transectionRecords1 as $record)
                        {$total +=$record->amount;
                    ?>
                    <tr>
                      <td><?php echo $contt++ ?></td>
                      <td><?php echo date_change_view($record->date) ?></td>
                      <td><?php echo $record->name ?></td>                                            
                      <td><?php echo $record->detail ?></td>
                      <td><?php echo $record->amount ?></td>
                      <?php if($this->session->userdata('role') != 3){?>
                      <td class="text-center">                      
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editTransection/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <!--<a class="btn btn-sm btn-danger deleteHotel" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>-->
                      </td>
                      <?php }?>
                    </tr>
                    <?php
                        }
                    }
					if(!empty($transectionRecords1))
                    {
                    ?>
                    
                    <tr>
                    	<td colspan="4"></td>
                        <td>Total</td>
                        <td><?php echo $total?></td>
                    </tr>
                    <?php }?>
                  </table>
                  
                </div><!-- /.box-body -->                
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Total And Balance</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">                   
                    <tr>
                    	<td colspan="2"></td>
                        <td>Total Transection Debit</td>
                        <td><?php echo $total_dr?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"></td>
                        <td>Total Pilgrim Charges Without Voucher</td>
                        <td><?php echo $total_pil?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"></td>
                        <td>Total Ticket Sale Amount</td>
                        <td><?php echo $total_ticket_amt?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"></td>
                        <td>Total Credit Transection Amount</td>
                        <td><?php echo $total?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"></td>
                        <td>Balance</td>
                        <td><?php echo ($total_dr + $total_ticket_amt+$total_pil)-$total?></td>
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
            jQuery("#searchList").attr("action", baseURL + "transection/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
