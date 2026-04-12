<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-credit-card"></i> Bank Transection Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
            
                <div class="row">
                <form action="<?php echo base_url() ?>bank_transection" method="POST" id="searchList">
                <?php if($this->session->userdata('role') != '3'){?>
                    <div class="col-md-3">
                    Select Bank
                    <select name="bank_id" class="form-control" id="bank_id">
                        <option value="">Select bank</option>
                        <?php foreach($banks as $row){?>
                            <option value="<?php echo $row->id?>"<?php echo ($bank_id == $row->id)?'selected="selected"':''?>><?php echo $row->name?></option>
                        <?php }?>
                    </select>
                    </div>
                    <?php }?>
                    <div class="col-md-2">
                    Date:
                        <input type="text" name="date_range" class="date_range_rep form-control" value="">
                    </div>
                    <div class="col-md-3">
                    <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                <?php if($this->session->userdata('role') != 3){?>
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addBTransection"><i class="fa fa-plus"></i> Add New</a>
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
                    		<h3 class="box-title">Bank Transection List </h3>
                        </div>
                        
                </div>
                <a href='<?php echo base_url() ?>bank_transection_excel'> <i class="fa fa-file-excel-o "> </i> </a>
				<a href='<?php echo base_url() ?>bank_transection_word'> <i class="fa fa-file-word-o "> </i> </a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                    	<th>Sr#</th>
                    	<th>Date</th>
                    	<th>Bank Name</th>                        
                          <th>Detail</th>
                          <th>Credit</th>
                          <th>Debit</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php $count = 1;//print_r($hotelRecords);
                    if(!empty($btransectionRecords))
                    {
					$total_cr = 0;
					$total_dr = 0;
					$cr;
					$dr;
                        foreach($btransectionRecords as $record)
                        {
							if($record->payment_type == 'cr'){
								$cr = $record->amount;
								$dr = '';
								$total_cr += $record->amount;
							}
							else{
								$dr = $record->amount;
								$cr = '';
								$total_dr += $record->amount;
							}
                    ?>
                    <tr> 
                      <td><?php echo $count ++;?>                     
                      <td><?php echo date_change_view($record->date) ?></td>
                      <td><?php echo $record->bank_name ?></td>                      
                      <td><?php echo $record->detail ?></td>
                      <td><?php echo $cr ?></td>
                      <td><?php echo $dr ?></td>
                      <td class="text-center">
                      <?php if($record->ft_id=='0'){?>
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editBTransection/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteBTransection" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                          <?php }?>
                      </td>
                    </tr>
                    <?php
                        }
                    
                    ?>
                    <tr>
                    	<td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td><strong><?php echo $total_cr?></strong></td>
                        <td><strong><?php echo $total_dr?></strong></td> 
                        <td></td>                       
                    </tr>
                    <tr>
                    	<td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Balance</strong></td>
                        <td><strong><?php echo $total_cr-$total_dr?></strong></td>
                        <td></td> 
                        <td></td>                       
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
