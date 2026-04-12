<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Client.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
                  <table class="table table-hover">
                    <tr>
                    	<th>Sr#</th>
                      <th>Name</th>
                      <th>PP Issue Date</th>
                      <th>PP Exp. Date</th>
                      <th>DOB</th>
                      <th>PPNo</th>
                      <th>Age Group</th>
                      <th>Agent Name</th>
                      <th>Account PKG</th>
                      
                    </tr>
                    <?php $count = 1;//print_r($hotelRecords);
                    if(!empty($clientRecords))
                    {
                        foreach($clientRecords as $record)
                        {
							if($record->voucher_issue == 'no'){
                    ?>
                    <tr>
                    <td><?php echo $count++ ?></td>
                      
                      <td><?php echo $record->name.' '.$record->last_name ?></td>
                      <td><?php echo date_change_view($record->passport_issue_date) ?></td>
                      <td><?php echo date_change_view($record->passport_exp_date) ?></td>
                      <td><?php echo date_change_view($record->dob) ?></td>
                      <td><?php echo $record->ppno ?></td>
                      <td><?php echo $record->age_group ?></td>
                      <td><?php echo $record->agent_name ?></td>
                      <td><?php echo $record->account_pkg ?></td>
                       
                    </tr>
                    <?php }
                        }
                    }
                    ?>
                  </table>
                  