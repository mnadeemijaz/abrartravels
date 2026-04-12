<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-map-marker"></i> Permotion Numbers Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addpermotion_number"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Permotion Numbers List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>permotion_number" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <form role="form" id="add_sector" action="<?php echo base_url()?>permotion_sms" method="post" role="form">
                    <table class="table table-bordered table-striped dataTable table-hover">
                      <tr>
                        <th>SR# <input type="checkbox" id="checkAll"> Select All</th>                      
                        <th>Name</th>                      
                        <th>Phone</th>                      
                        <th>Address</th>                      
                        <th class="text-center">Actions</th>
                      </tr>
                      <?php //print_r($hotelRecords);
                      if(!empty($permotion_numberRecords))
                      {
                        $count = 1;
                          foreach($permotion_numberRecords as $record)
                          {
                      ?>
                      <tr>
                        <td><?php echo $count++; ?> <input type="checkbox" id="checkItem" name="id[]" value="<?php echo $record->id ?>"></td>
                        <td><?php echo $record->name ?></td>
                        <td><?php echo $record->phone ?></td>
                        <td><?php echo $record->address ?></td>
                        
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'editpermotion_number/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger deletepermotion_number" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                          }
                      }
                      ?>
                    </table>
                    <input type="submit" class="btn btn-primary" value="Submit" >
                    </form>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "sector/" + value);
            jQuery("#searchList").submit();
        });
    });

    $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
</script>
