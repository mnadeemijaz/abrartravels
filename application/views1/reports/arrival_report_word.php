<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
 
/*header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xlxs");
header("Pragma: no-cache");
header("Expires: 0");*/
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=\"ArrivalReport.doc\"");
?>
                  <table class="table table-hover vtable">
                    <tr>
                      <th>Sr#</th>
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
                  
                