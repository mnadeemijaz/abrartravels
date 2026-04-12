<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    <?php if($this->session->flashdata('permission_error')){?>
    <div class="alert alert-danger alert-dismissable">
       <?php echo $this->session->flashdata('permission_error');?>
        <a class="close" data-dismiss="alert">×</a>
    </div>
<?php }?>
    <section class="content">
    <div class="vheading">Information About Vouchers</div>
        <div class="row">            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $total_vouchers?></h3>
                  <p>Total Vouchers</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file"></i>
                </div>
                <a style="border: 2px solid; width:50%; margin-left:20%" href="<?php echo base_url(); ?>voucher" class="small-box-footer">More info </a>
              </div>
            </div><!-- ./col -->
           
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $approved_vouchers?></h3>
                  <p>Approved Vouchers</p>
                </div>
                <div class="icon">
                  <i class="fa fa-check-circle"></i>
                </div>
                <form action="<?php echo base_url();?>voucher" method="post">
                <input type="hidden" name="v_status" value="yes">
                <input style="background:transparent; width:50%; margin-left:20%" type="submit" name="submit" value="More Info" class="small-box-footer">
                <!--<a href="<?php echo base_url();?>voucher" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                </form>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $not_approved?></h3>
                  <p>Not Approved Vouchers</p>
                </div>
                <div class="icon">
                  <i class=" fa fa-times-circle"></i>
                </div>
                <form action="<?php echo base_url();?>voucher" method="post">
                <input type="hidden" name="v_status" value="no">
                <input style="background:transparent; width:50%; margin-left:20%" type="submit" name="submit" value="More Info" class="small-box-footer">
                <!--<a href="<?php echo base_url();?>voucher" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                </form>
              </div>
            </div><!-- ./col -->
          </div>
          
          
          <div class="vheading">Information About Pilgrims</div>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo ($pilgrims->t_adult+$pilgrims->t_child+$pilgrims->t_infant)?></h3>
                  <p>Total</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <form action="<?php echo base_url();?>pilgrim_report" method="post">
                <input type="hidden" name="age_group" value="">
                <input style="background:transparent; width:50%; margin-left:20%" type="submit" name="submit" value="More Info" class="small-box-footer">
                </form>

                <!--<a href="<?php echo base_url(); ?>client" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $pilgrims->t_adult?></h3>
                  <p>Total Adults</p>
                </div>
                <div class="icon">
                  <i class="fa fa-male"></i>
                </div>
                <form action="<?php echo base_url();?>pilgrim_report" method="post">
                <input type="hidden" name="age_group" value="Adult">
                <input style="background:transparent; width:50%; margin-left:20%" type="submit" name="submit" value="More Info" class="small-box-footer">
                </form>
                <!--<a href="<?php echo base_url(); ?>client" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div><!-- ./col -->
           
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $pilgrims->t_child?></h3>
                  <p>Total Child</p>
                </div>
                <div class="icon">
                  <i class="fa fa-child"></i>
                </div>
                <form action="<?php echo base_url();?>pilgrim_report" method="post">
                <input type="hidden" name="age_group" value="Child">
                <input style="background:transparent; width:50%; margin-left:20%" type="submit" name="submit" value="More Info" class="small-box-footer">
                </form>
                <!--<a href="<?php echo base_url(); ?>client" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $pilgrims->t_infant?></h3>
                  <p>Total Infant</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <form action="<?php echo base_url();?>pilgrim_report" method="post">
                <input type="hidden" name="age_group" value="Infant">
                <input style="background:transparent; width:50%; margin-left:20%" type="submit" name="submit" value="More Info" class="small-box-footer">
                </form>
                <!--<a href="<?php echo base_url(); ?>client" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div><!-- ./col -->
          </div>
          
          
          <div class="vheading">Information About Mofa</div>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo ($total_clients->n_total)?></h3>
                  <p>Approved</p>
                </div>
                <div class="icon">
                  <i class="fa fa-fighter-jet"></i>
                </div>
                <!--<a style="border: 2px solid;" href="<?php echo base_url(); ?>client" class="small-box-footer">More info </a>-->
                <!--<a style="border: 2px solid;" href="#" class="small-box-footer"> </a>-->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>&nbsp;<?php echo ($visa_not_approve_clients->n_total)?></h3>
                  <p>Not Approved</p>
                </div>
                <div class="icon">
                  <i class="fa fa-fighter-jet"></i>
                </div>
                <!--<a style="border: 2px solid;" href="<?php echo base_url(); ?>client" class="small-box-footer">More info </a>-->
                <!--<a style="border: 2px solid;" href="#" class="small-box-footer"> </a>-->
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $total_clients->v_total?></h3>
                  <p>Voucher Created</p>
                </div>
                <div class="icon">
                  <i class="fa fa-rocket"></i>
                </div>
                <!--<a style="border: 2px solid;" href="<?php echo base_url(); ?>client" class="small-box-footer">More info </a>-->
                <!--<a style="border: 2px solid;" href="#" class="small-box-footer"> </a>-->
              </div>
            </div><!-- ./col -->
           
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $total_clients->n_total+$total_clients->v_total+$visa_not_approve_clients->n_total?></h3>
                  <p>Total</p>
                </div>
                <div class="icon">
                  <i class="fa fa-plus"></i>
                </div>
                <!--<a style="border: 2px solid;" href="<?php echo base_url(); ?>client" class="small-box-footer">More info </a>-->
                <!--<a style="border: 2px solid;" href="#" class="small-box-footer"> </a>-->
              </div>
            </div><!-- ./col -->
            <!-- ./col -->
          </div>
          
          
          
    </section>
</div>
<script>

</script>