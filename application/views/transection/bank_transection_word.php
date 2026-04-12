<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=\"BankTransection.doc\"");
?>
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
                        <td>Total</td>
                        <td><?php echo $total_cr?></td>
                        <td><?php echo $total_dr?></td> 
                        <td></td>                       
                    </tr>
                    <?php } ?>
                  </table>