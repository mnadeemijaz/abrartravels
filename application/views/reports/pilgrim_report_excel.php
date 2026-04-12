<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=PilgrimReport.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
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
                        <td><?php echo $record->voucher_id?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  