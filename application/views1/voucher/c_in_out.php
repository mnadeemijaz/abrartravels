<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-clock"></i> Check In Check Out Management
        <small>View</small>
      </h1>
    </section>
    <section class="content">
    <div class="row">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Voucher List</h3>
                </div>
                        <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                      <th>Sr#</th>
                      <th>Hotel Name</th>
                      <th>City</th>
                      <th>Room Type</th>
                      <th>Check In Date</th>
                      <th>Check Out Date</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                    </tr>
                    <?php 
                    if(!empty($voucher_hotels))
                    {
						$counter = 1;
                        foreach($voucher_hotels as $record1)
                        {
                    ?>
                    <tr>
                      <td><?php echo $counter++ ?></td>
                      <td><?php echo $record1->hotel_name?></td>
                      <td><?php echo $record1->city_name ?></td>
                      <td><?php echo $record1->room_type ?></td>
                      <td><?php echo date_change_view($record1->check_in) ?></td>
                      <td><?php echo date_change_view($record1->check_out) ?></td>                      
                      <td>
                      
                      <?php 
					  		 if($role == '1' || $role == '2'){
					  	  	if($record1->c_in == 'no'){?>
                          <a class="label label-danger check_in_yes" href="#" data-id="<?php echo $record1->id; ?>"><i class="fa fa-check"></i>Yes</a>
                          <?php } else{?>
                          <a class="label label-success check_in_no" href="#" data-id="<?php echo $record1->id; ?>"><i class="fa fa-times"></i>No</a>
                          <?php }?>
                      </td>
                      <td><?php 	  	if($record1->c_out == 'no'){?>
                                          <a class="label label-danger check_out_yes" href="#" data-id="<?php echo $record1->id; ?>"><i class="fa fa-check"></i>Yes</a>
                                          <?php } else{?>
                                          <a class="label label-success check_out_no" href="#" data-id="<?php echo $record1->id; ?>"><i class="fa fa-times"></i>No</a>
                                          <?php }
                                             }
                                             else{
                                                    if($record1->c_in == 'no'){?>
                                          <label class="label label-danger"><i class="fa fa-check"></i>Yes</label>
                                          <?php } else{?>
                                          <label class="label label-success"><i class="fa fa-times"></i>No</label>
                                          <?php }?>
                                      </td>
                                      <td><?php 	  	if($record1->c_out == 'no'){?>
                                          <label class="label label-danger"><i class="fa fa-check"></i>Yes</label>
                                          <?php } else{?>
                                          <label class="label label-success"><i class="fa fa-times"></i>No</label>
                                          <?php }
								 }
						  ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
            </div>
        </div>
        </section>
   </div>
 <script>
 jQuery(document).on("click", ".check_in_yes", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "check_in_yes",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to Check In ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				//currentRow.parents('tr').remove();
				if(data.status = true) { alert("Check In Successfuly"); }
				else if(data.status = false) { alert("Sorry failed"); }
				else { alert("Access denied..!"); }
				window.location.reload();
			});
		}
	});
	jQuery(document).on("click", ".check_in_no", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "check_in_no",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to Cancel Check In ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				//currentRow.parents('tr').remove();
				if(data.status = true) { alert("Check In Canceled Successfuly"); }
				else if(data.status = false) { alert("Sorry failed"); }
				else { alert("Access denied..!"); }
				window.location.reload();
			});
		}
	});
	
	
	jQuery(document).on("click", ".check_out_yes", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "check_out_yes",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to Check Out ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				//currentRow.parents('tr').remove();
				if(data.status = true) { alert("Check Out Successfuly"); }
				else if(data.status = false) { alert("Sorry failed"); }
				else { alert("Access denied..!"); }
				window.location.reload();
			});
		}
	});
	jQuery(document).on("click", ".check_out_no", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "check_out_no",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to Cancel Check out ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				//currentRow.parents('tr').remove();
				if(data.status = true) { alert("Check Out Canceled Successfuly"); }
				else if(data.status = false) { alert("Sorry failed"); }
				else { alert("Access denied..!"); }
				window.location.reload();
			});
		}
	});
 </script>