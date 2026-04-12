<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-2">sdf
            </div>
            <div class="col-md-8">
                <div id="printit">
                    <h1 align="center"><?php  echo $config->name?></h1>
                    <h4 align="center">Address: <?php  echo $config->address?></h4>
                    <h4 align="center">Phone: <?php  echo $config->phone.', '.$config->phone2?></h4>
                    <hr />
                    <h4 align="center">Ticket Sale Slip</h4>
                    <table class="table vtable" border="1">
                        <tr style="border:solid">
                            <th>Invoice #</th>
                            <th><?php echo $ticket_sale_info->id?></th>
                        </tr>
                        <tr style="border:solid">
                            <th>Name</th>
                            <th><?php echo $ticket_sale_info->name?></th>
                        </tr>
                        <tr style="border:solid">
                            <th>PNR</th>
                            <th><?php echo $ticket_sale_info->pnr?></th>
                        </tr>
                        <tr style="border:solid">
                            <th>Ticket From To</th>
                            <th><?php echo $ticket_sale_info->ticket_from_to?></th>
                        </tr>
                        <!--<tr style="border:solid">
                            <th>Category</th>
                            <th><?php echo $ticket_sale_info->category?></th>
                        </tr>-->
                        <tr style="border:solid">
                            <th>Date</th>
                            <th><?php echo date_change_view($ticket_sale_info->date)?></th>
                        </tr>
                        <tr style="border:solid">
                            <th>Price</th>
                            <th><?php echo $ticket_sale_info->sale?></th>
                        </tr>
                    </table>
                    <h3>Payment Detail</h3>
                    <table class="table vtable" border="1">
                        <tr style="border:solid">
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        <?php foreach($amount as $row){?>
                            <tr style="border:solid 1px">
                                <td><?php echo date_change_view($row->date)?></td>
                                <td><?php echo $row->amount?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <button name="print" class="btn btn-info no-print" id="printitbtn"> <i class="fa fa-print"> </i> Print</button>
                </div>
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
            jQuery("#searchList").attr("action", baseURL + "ticket_sale/" + value);
            jQuery("#searchList").submit();
        });
    });
    $("#printit").find('button').on('click', function() {
                    //Print ele4 with custom options
                    $("#printit").print({
                        //Use Global styles
                        globalStyles : false,
                        //Add link with attrbute media=print
                        mediaPrint : true,
                        //Custom stylesheet
                        //stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
						stylesheet : "<?php echo base_url(); ?>assets/dist/css/print.css",
						//stylesheet : "<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css",
						
                        //Print in a hidden iframe
                   //     iframe : false,
                        //Don't print this
                        noPrintSelector : ".avoid-this",
                        //Add this at top
                       // prepend : "Hello World!!!<br/>",
                        //Add this on bottom
                        //append : "<br/>Buh Bye!",
                        //Log to console when printing is done via a deffered callback
                        deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                    });
                });
    
</script>
