<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=\"PilgrimWiseReport.doc\"");
?>
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
                        <td><?php echo $total_document?></td>
                        <td><?php echo $total_ziarat_fee?></td>
                        <td><?php echo $total_amount?></td>
                        <td><?php echo $grand_total_amount?></td>
                    </tr>
                  </table>