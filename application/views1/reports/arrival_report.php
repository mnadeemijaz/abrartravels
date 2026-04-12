<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-building"></i> Arrival Report
        <small>View</small>
      </h1>
    </section>
    <section class="content">        
        <div class="row">
        	<form action="<?php echo base_url() ?>arrival_report" method="POST" id="">
            <div class="col-md-2">
            	Shirka:
            	<select name="company_id" class="form-control">
                	<option value="">Shirka</option>
                    <?php foreach($visaCompany as $vc){?>                    
                    <option value="<?php echo $vc->id?>" <?php echo ($company_id == $vc->id)?'selected="selected"':''?>><?php echo $vc->name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-md-2">
            	City:
            	<select name="city" class="form-control">
                	<option value="">City</option>
                    <option value="MED" <?php echo ($city == 'MED')?'selected="selected"':''?>>Madina</option>
                    <option value="JED" <?php echo ($city == 'JED')?'selected="selected"':''?>>Jeddah</option>
                </select>
            </div>
            <div class="col-md-2">
            Date:
            	<input type="text" name="date_range" class="date_range_rep form-control" value="<?php echo ($start_date)?$start_date.' - '.$end_date:''?>">
            </div>
            <div class="col-md-1">&nbsp;
            	<input type="submit" name="submit" class=" btn btn-primary" value="Search">
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Voucher List</h3>
                    <div class="box-tools">
                        <form action="#" method="POST" id="searchList">
                            <div class="input-group">
                              
                              <div class="input-group-btn">
                                <button class="searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>                         							
                    </div>
                    <a href='<?php echo base_url() ?>arrival_report_excel'> <i class="fa fa-file-excel-o "> </i> </a>
                        <a href='<?php echo base_url() ?>arrival_report_word'> <i class="fa fa-file-word-o "> </i> </a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="height:400px">
                  <table class="table table-bordered table-striped dataTable table-hover vtable">
                    <tr>
                      <th>Sr#</th>
                      <th>View</th>
                      <th>VID</th>
                      <th>Party</th>
                      <th>DEP DATE</th>
                      <th>ARV DATE</th>
                      <th>ARV TIME</th>
                      <th>Flight_no</th>
                      <th>Air Port</th>
                      <th>T</th>
                      <th>A</th>
                      <th>C</th>
                      <th>I</th>
                      <th>arr_hotel</th>
                      <th>Transport</th>
                      <th>By</th>
                      <th>Shirka</th>
                    </tr>
                    <?php $count = 1;//print_r($voucherRecords);
                    if(!empty($arrival_report))
                    {
						$counter = 0;
                        foreach($arrival_report as $record)
                        {$counter++;
                    ?>
                    <tr>
                      <td><?php echo $count++; ?></td>
                    <td><a class="label label-success" href="<?php echo base_url()?>voucherView/<?php echo $record->id?>">view</a></td>                      
                      <td><?php echo $record->id ?></td>
                      <td><?php echo $record->agent_name ?></td>
                      <td><?php echo date_change_view($record->dep_date) ?></td>
                      <td><?php echo date_change_view($record->arv_date) ?></td>
                      <td><?php echo $record->arv_time ?></td>
                      <td><?php echo $record->flight_name.' '.$record->dep_flight_no ?></td>
                      <td><?php echo ($record->dep_sector2 == 'JED')? 'Jeddah Airport':'Media Airport' ?></td>
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
					  for($i = 0; $i<1;$i++){
						  if(isset($voucher_hotels[$i])){
					  ?>                      
                      <td><?php echo $voucher_hotels[$i]->hotel_name ?></td>
                      <?php }
					  else{?><td></td>
                      <?php }
					  }?>
                      <td><?php echo $record->trip_name ?></td>
                      <td><?php echo $record->vehicle_name ?></td>
                      <td><?php echo $record->com_name ?></td>                      
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
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "arrival_report/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
