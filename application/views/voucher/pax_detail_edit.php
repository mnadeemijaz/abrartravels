
                      <?php if($this->session->userdata('client_id')){
					  	$this->db->select(array('c.id','c.name','c.last_name','c.address','c.cnic','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.visa_no','c.child_wo_bed','c.visa_date','c.agent_id','c.account_pkg','c.iata','vc.name as c_name','c.ziarat'));
						$this->db->from('client c');	
						$this->db->join('visa_company vc','vc.id = c.visa_company_id');	
						//$this->db->where('c.voucher_issue', 'no');
						$this->db->where('c.isDeleted', 0); 
						$this->db->where_in('c.id',$this->session->userdata('client_id'));
						$query1 = $this->db->get();        
						//echo $this->db->last_query();
						$result1 = $query1->result(); ?>
                        
                        <table class="table table-hover">
                    <tr>
                      <th>Sr#</th>
                      <th>Name</th>
                      <th>PPNo</th>
                      <th>DOB</th>
                      <th>Age Group</th>
                      <th>Visa No</th>
                      <th>Visa Date</th>
                      <th>Shirka</th>
                      <th>Without Bed</th>
                      <th>Ziarat</th>
                    </tr>
                    <?php 
                    if(!empty($result1))
                    {
						$counter = 1;
                        foreach($result1 as $record1)
                        {
                    ?>
                    <tr>
                      <td><?php echo $counter++ ?></td>
                      <td><?php echo $record1->name.' '.$record1->last_name ?></td>
                      <td><?php echo $record1->ppno ?></td>
                      <td><?php echo date_change_view($record1->dob) ?></td>
                      <td><?php echo $record1->age_group ?></td>
                      <td><input type="text" name="visa_no[<?php echo $record1->id?>]" value="<?php echo $record1->visa_no?>" id="visa_no" required="required"></td>
                      <td><input type="text" name="visa_date[<?php echo $record1->id?>]" value="<?php echo date('d/m/Y',strtotime($record1->visa_date))?>" id="visa_date" class="date12" required="required"></td>
                      <td><?php echo $record1->c_name ?></td>
    					<td><input type="checkbox" name="child_wo_bed[<?php echo $record1->id?>]" <?php echo ($record1->child_wo_bed == 'on')?'checked="checked"':''?> id="child_wo_bed" ></td>
                        <td><input type="checkbox" name="ziarat[<?php echo $record1->id?>]" <?php echo ($record1->ziarat == 'yes')?'checked="checked"':''?> id="ziarat" ></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
					  <?php 
                        //print_r($this->session->userdata('client_id'));
                      }?>
            
 <script>
 $(function() {
    $('.date12').daterangepicker({
		singleDatePicker: true,
		autoUpdateInput:false,
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});
 </script>