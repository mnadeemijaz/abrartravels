<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i> Pilgrim Report        
      </h1>
    </section>
    <section class="content">        
        <div class="row">
        <?php if($this->session->userdata('role') != 3){?>
        <form action="<?php echo base_url() ?>pilgrim_report" method="POST" id="">
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
                    <h3 class="box-title">Pilgrim Report</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>pilgrim_report" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                        
                    </div>
                    <a href='<?php echo base_url() ?>pilgrim_report_excel'> <i class="fa fa-file-excel-o "> </i> </a>
                        <a href='<?php echo base_url() ?>pilgrim_report_word'> <i class="fa fa-file-word-o "></i> </a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                      <th>Sr#</th>
                      <th>Party</th>
                      <th>Name</th>
                      <th>Passport No</th>
                      <th>Age</th>
                      <th>Group Code</th>
                      <th>VNO</th>
                    </tr>
                    <?php //print_r($hotelRecords);
                    if(!empty($pilgrim_report))
                    { $count=1;
                        foreach($pilgrim_report as $record)
                        {
                    ?>
					<tr>
						<td><?php echo $count++; ?></td>
                        <td><?php echo $record->agent_name ?></td>
                      	<td><?php echo $record->name.' '.$record->last_name ?></td>
                      	<td><?php echo $record->ppno ?></td>
                      	<td><strong><?php 
							  echo $_age = floor((time() - strtotime($record->dob)) / 31556926);

						?></strong></td>
                      	<td><?php echo $record->group_code ?></td>
                        <td><a href="<?php echo base_url()?>voucherView/<?php echo $record->voucher_id?>"><?php echo $record->voucher_id?></a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
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
