<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Rights Management 
        <small></small>
      </h1>
    </section>
    <section class="content">
        <div class="row" style="margin:10px">
        <input type="checkbox" name="select_all" id="select_all"><label>Select /Un Select All</label><br>
        <form name="form" action="<?php echo base_url()?>userRights/<?php echo $id?>" method="post">
            <?php $counter=1; foreach($user_rights as $row){
			if($row->right_id)
					{	$checked = 'checked="checked"';
							
					}
					else
					{	$checked = '';}											
	?>     	
        <input type="checkbox" class="select" name="right[<?php echo $row->id?>]" <?php echo $checked?>>
        <!--<input type="hidden" name="count[<?php echo $row->id;?>]" value="<?php echo $row->permotion_id;?>">-->
        <label><?php change_case($row->name)?></label><br>
    <?php $counter++; }?>
    <input name="submit" class="btn btn-success" value="Submit" type="submit">
    </form>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    $('#select_all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }
});
</script>
