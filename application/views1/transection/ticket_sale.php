<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-credit-card"></i> Ticket Sale Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    
    <section class="content">
    <div class="row">
            <form action="<?php echo base_url() ?>ticket_sale" method="POST" id="">                
                <?php if($this->session->userdata('role') != '3'){?>
                    <div class="col-md-2">
                    <select name="agent_id" class="form-control" id="agent_id">
                        <option value="">Select Agent</option>
                        <?php foreach($agentRecords as $row){?>
                            <option value="<?php echo $row->userId?>"<?php echo ($agent_id == $row->userId)?'selected="selected"':''?>><?php echo $row->name?></option>
                        <?php }?>
                    </select>
                    </div>
                    <?php }?>
                    <div class="col-md-2">
                    <select name="flight_id" class="form-control" id="flight_id">
                        <option value="">Select Flight</option>
                        <?php foreach($flights as $row){?>
                            <option value="<?php echo $row->id?>"<?php echo ($flight_id == $row->id)?'selected="selected"':''?>><?php echo $row->name?></option>
                        <?php }?>
                    </select>
                    </div>
                    <div class="col-md-2">                                
                        <div class="form-group">
                            <?php if(isset($bsp)){
                                    $flight_bsp = $bsp;
                                }
                                else{
                                    $flight_bsp = '';
                                }?>
                            <select name="bsp" class="form-control" id="bsp">
                            	<option value="">Select BSP</option>
                               <option value="no" <?php echo ($flight_bsp == 'no')?'selected="selected"':''?>>No</option>
                               <option value="yes" <?php echo ($flight_bsp == 'yes')?'selected="selected"':''?>>Yes</option>
                            </select> 
                        </div>                                    
                    </div>
                    <div class="col-md-2">
                            <input type="text" name="date_range" class="date_range_rep form-control" value="<?php echo ($start_date)?$start_date.' - '.$end_date:''?>">
                        </div>
                    <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
         </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                <?php if($this->session->userdata('role') != 3){?>
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addTicket_sale"><i class="fa fa-plus"></i> Add New</a>
                    <?php }?>
                </div>
            </div>
        </div>        
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                	<div class="row">
                    	<div class="col-md-3">
                    		<h3 class="box-title">Ticket Sale Detail</h3>
                        </div><form action="<?php echo base_url() ?>ticket_sale" method="POST" id="searchList">
                            
                                <button class="searchList"></button>
                        </form>
                </div>
                <a href='<?php echo base_url() ?>ticket_sale_excel'> <i class="fa fa-file-excel-o "> </i> </a>
				<a href='<?php echo base_url() ?>ticket_sale_word'> <i class="fa fa-file-word-o "> </i> </a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                    	<th>Sr#</th>
                    	<th>INV#</th>
                    	<th>Date</th>
                          <th>Name</th>
                          <th>Ticket No</th>
                          <th>PNR</th>
                          <th>Air Line</th>
                          <th>Agent</th>
                          <th>Ticket From-To</th>
                          <th>Category</th>
                          <th>Ticket Khareed Rate</th>
                          <th>Ticket Sale Rate</th>
                          <th>Paid Amount</th>
                          <th>Profit</th>
                          <?php if($this->session->userdata('role') != '3'){?>
                          <th>Action</th>
                          <?php }?>
                  <!--    <th class="text-center">Actions</th>-->
                    </tr>
                    <?php $count = 1;$total_purchase = 0;$paid_amount = 0;$total_sale = 0; $total_profit = 0;$profit = 0;//print_r($hotelRecords);
                    if(!empty($ticket_sale))
                    {
                        foreach($ticket_sale as $record)
                        {
							$total_purchase += $record->purchase;
							$total_sale += $record->sale;
							$paid_amount += $record->paid_amount;
							$profit = $record->sale-$record->purchase;
							$total_profit +=$profit;
                    ?>
                    <tr>
                     <td><?php echo $count++ ?></td>
                     <td><?php echo $record->id ?></td>
                      <td><?php echo date_change_view($record->date) ?></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->ticket_no?></td>
                      <td><?php echo $record->pnr ?></td>
                      <td><?php echo $record->flight_name ?></td>
                      <td><?php echo $record->agent_name ?></td>
                      <td><?php echo $record->ticket_from_to ?></td>
                      <td><?php echo $record->category ?></td>
                      <td><?php echo $record->purchase ?></td>
                      <td><?php echo $record->sale ?></td>
                      <td><?php echo $record->paid_amount ?></td>
                      <td><?php echo $record->sale-$record->purchase ?></td>
                      <?php if($this->session->userdata('role') != '3'){?>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'edit_ticketSale/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteTicket" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                          <a href="#" data-target="#my_modal" data-toggle="modal" class="btn btn-sm btn-warning identifyingClass" data-id="<?php echo $record->id?>"><i class="fa fa-credit-card"></i></a>
                          <a class="btn btn-sm btn-success" href="<?php echo base_url().'print_ticket_sale/'.$record->id; ?>"><i class="fa fa-print"></i></a>
                      </td>
                      <?php }?>
                    </tr>
                    <?php
                        }
                    }
                    ?> 
                    <tr>
                    	<td colspan="2"></td>
                        <td>Total</td>
                        <td colspan="7"></td>
                        <td><?php echo $total_purchase?></td>
                        <td><?php echo $total_sale?></td>
                        <td><?php echo $paid_amount?></td>
                        <td><?php echo $total_profit?></td>
                        <td></td>
                    </tr>                   
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
        <!----Model--->
        <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="my_modalLabel">
            <div class="modal-dialog" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Receive Payment</h4>
                    </div>
                    <form role="form" id="ticket_sale" action="<?php echo base_url()?>receive_payment" method="post" role="form">
                        <div class="modal-body">
                            <input type="hidden" name="ticket_sale_id" id="ticket_sale_id" value="" />
                            <input type="text" name="amount" id="amount" value="" required="required"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <input type="submit" value="Submit" class="btn btn-default">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-----end MOdel---->
        
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "ticket_sale/" + value);
            jQuery("#searchList").submit();
        });
    });

    $(function () {
        $(".identifyingClass").click(function () {
            var my_id_value = $(this).data('id');
            $(".modal-body #ticket_sale_id").val(my_id_value);
        })
    });
    
</script>
