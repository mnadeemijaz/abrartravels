
                      <?php if($this->session->userdata('client_id')){
					  	$this->db->select(array('c.id','c.name','c.last_name','c.address','c.cnic','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','c.visa_no','c.visa_date','vc.name as c_name'));
						$this->db->from('client c');	
						$this->db->join('visa_company vc','vc.id = c.visa_company_id');	
						//$this->db->where('c.voucher_issue', 'no');
						//$this->db->where('c.visa_approve', 'yes');
						$this->db->where('c.isDeleted', 0); 
						$this->db->where_in('c.id',$this->session->userdata('client_id'));
						$query1 = $this->db->get();        
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
                      <?php //if($this->session->userdata('role') == 1){?>
                      <th>Ziarat</th>
                      <?php //}?>
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
                      <td><input type="text" name="visa_no[<?php echo $record1->id?>]" id="visa_no" value="<?php echo ($record1->visa_no)?$record1->visa_no:''?>" required="required"></td>
                      <td><input type="text" name="visa_date[<?php echo $record1->id?>]" id="visa_date" value="<?php echo ($record1->visa_date!='0000-00-00')?date_change_view($record1->visa_date):''?>" class="date12" required="required"></td>
                      <td><?php echo $record1->c_name ?></td>
                      <td><input type="checkbox" name="child_wo_bed[<?php echo $record1->id?>]" id="child_wo_bed" ></td>
                      <?php //if($this->session->userdata('role') == 1){?>
                      <td><input type="checkbox" name="ziarat[<?php echo $record1->id?>]" id="ziarat" ></td><?php //}?>
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
		autoUpdateInput : false,
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});
$('.date12').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY'));
	  depp();
  });
 </script>