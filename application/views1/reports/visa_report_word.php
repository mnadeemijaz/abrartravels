<?php 
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=\"VisaReport.doc\"");
?>
    
                  <table class="table table-hover">
                    <tr>  
                      <th>Sr#</th>                  
                      <th>Status</th>
                      <th>Name</th>
                      <th>PPNO</th>
                      <th>DOB</th>
                      <th>Visa No</th>
                      <th>Issue Date</th>
                      <th>Shirka</th>
                      <th>Party</th>                      
                    </tr>
                    <?php $counter = 1;//print_r($hotelRecords);
                    if(!empty($visa_report))
                    {
                        foreach($visa_report as $record)
                        {							
                    ?>
                    <tr>                      
                      <td><?php echo $counter++; ?></td>	
                      <td><?php echo ($record->visa_approve == 'yes')?'Approved':'Not Approved' ?></td>	
                      <td><?php echo $record->name.' '.$record->last_name ?></td>
                      <td><?php echo $record->ppno ?></td>
                      <td><?php echo date_change_view($record->dob) ?></td>
                      <td><?php echo $record->visa_no ?></td>
                      <td><?php echo date_change_view($record->visa_date) ?></td>
                      <td><?php echo $record->com_name ?></td>
                      <td><?php echo $record->agent_name ?></td>                      
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                  </table>
                  