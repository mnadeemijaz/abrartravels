<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=TicketSale.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
                  <table class="table table-hover">
                    <tr>
                    	<th>Sr#</th>
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
                          <th>Profit</th>                         
                    </tr>
                    <?php $count = 1;$total_purchase = 0;$total_sale = 0; $total_profit = 0;$profit = 0;//print_r($hotelRecords);
                    if(!empty($ticket_sale))
                    {
                        foreach($ticket_sale as $record)
                        {
							$total_purchase += $record->purchase;
							$total_sale += $record->sale;
							$profit = $record->sale-$record->purchase;
							$total_profit +=$profit;
                    ?>
                    <tr>
                     <td><?php echo $count++ ?></td>
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
                      <td><?php echo $record->sale-$record->purchase ?></td>                    
                    </tr>
                    <?php
                        }
                    }
                    ?>  
                    <tr>
                    	<th colspan="2"></th>
                        <th>Total</th>
                        <th colspan="6"></th>
                        <th><?php echo $total_purchase?></th>
                        <th><?php echo $total_sale?></th>
                        <th><?php echo $total_profit?></th>
                    </tr>                  
                  </table>
                  