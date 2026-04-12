<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=FlightTransectionReport.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
                  <table class="table table-bordered table-striped dataTable table-hover">
                  <thead>
                    <tr>
                    	<th>Sr#</th>
                        <th>Date</th>
                    	<th>Flight Name</th>
                          <th>Detail</th>
                          <th>Credit</th>
                          <th>Debit</th>                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;//print_r($hotelRecords);
                    if(!empty($ftransectionRecords))
                    {
					$total_cr = 0;
					$total_dr = 0;
					$cr;
					$dr;
                        foreach($ftransectionRecords as $record)
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
                    	<td><?php echo $count++ ?></td>
                        <td><?php echo date_change_view($record->date) ?></td>
                      <td><?php echo $record->flight_name ?></td>
                      <td><?php echo $record->detail ?></td>
                      <td><?php echo $cr ?></td>
                      <td><?php echo $dr ?></td>                      
                    </tr>
                    <?php
                        }
                    }?>
                    </tbody>
					<?php if(!empty($ftransectionRecords))
                    {
                    ?>
                    <tfoot>
                    <tr>
                    	<th></th>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                        <th><?php echo $total_cr?></th>
                        <th><?php echo $total_dr?></th>
                    </tr>
                    </tfoot>
                    <?php } ?>
                  </table>
                