<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-credit-card"></i> Balance Report
        <small>View</small>
      </h1>
    </section>
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                	<div class="row">
                    	<div class="col-md-3">
                    		<h3 class="box-title">Agent Balance Report</h3>
                        </div>
                        <div class="col-md-9 pull-right">
                            <div class="box-tools" style=" right:40px">
                                
                            </div>
                       </div>
                </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                    	<th>Sr #</th>
                    	<th>Agent ID</th>
                          <th>Name</th>
                          <th>Total Credit</th>
                          <th>Total Debit</th>
                          <th>Agent Balance</th>                          
                    </tr>
                    <?php //print_r($hotelRecords);
					$total_credit = 0;
					$total_debit = 0;
					$counter = 1;
					$debit = 0;					
                    if(!empty($balance))
                    {						
                        foreach($balance as $record)
                        {
						$total_credit += $record->credit_total;
						$total_c = $record->t_adult+$record->t_child+$record->t_infant;
						$tt = ($total_c*$config->no_vo_visa_rate)*$record->sr_rate;
					   $debit = $record->debit_total + $record->sale_amountt+$tt;
						$total_debit += $debit;
                    ?>
                    <tr>
                    	<td><?php echo $counter++?></td>
                      <td><a href="<?php echo base_url()?>transection/<?php echo $record->userId?>"><?php echo $record->userId ?></a></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->credit_total  ?></td>
                      <td><?php echo $debit?></td>
                      <td><?php echo $debit-$record->credit_total ?></td>                      
                    </tr>
                    <?php
                        }
                    }?>
                    <tr>
                    	<td></td>
                        <td></td>
                        <td>Total</td>
                        <td><?php echo $total_credit ?></td>
                        <td><?php echo $total_debit ?></td>
                        <td><?php echo $total_debit - $total_credit ?></td>
                    </tr>
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
                	<div class="row">
                    	<div class="col-md-3">
                    		<h3 class="box-title">Bank Balance Report</h3>
                        </div>
                        <div class="col-md-9 pull-right">
                            <div class="box-tools" style=" right:40px">
                                
                            </div>
                       </div>
                </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                    	<th>Sr #</th>
                          <th>Bank Name</th>
                          <th>Total Credit</th>
                          <th>Total Debit</th>
                          <th>Bank Balance</th>                          
                    </tr>
                    <?php //print_r($hotelRecords);
					$bank_credit = 0;
					$bank_debit = 0;
					$cont = 1;					
                    if(!empty($bank_balance))
                    {						
                        foreach($bank_balance as $record)
                        {
						$bank_credit += $record->credit_total;
						$bank_debit += $record->debit_total;
                    ?>
                    <tr>
                      <td><?php echo $cont++;?></td>
                      <td><a href="<?php echo base_url()?>bank_transection/<?php echo $record->bank_id?>"><?php echo $record->name ?></a></td>
                      <td><?php echo $record->credit_total ?></td>
                      <td><?php echo $record->debit_total ?></td>
                      <td><?php echo $record->credit_total-$record->debit_total ?></td>                      
                    </tr>
                    <?php
                        }
                    }?>
                    <tr>
                    	<td></td>
                        <td>Total</td>
                        <td><?php echo $bank_credit ?></td>
                        <td><?php echo $bank_debit ?></td>
                        <td><?php echo $bank_credit - $bank_debit ?></td>
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
            jQuery("#searchList").attr("action", baseURL + "balance/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
