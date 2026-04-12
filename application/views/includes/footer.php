

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Nadeem Ijaz</b> Admin System | Version 2.0
        </div>
        <strong class="no-print">Copyright &copy; 2023-2024 <a href="http://www.idlbridge.com" target="_blank">IDLBridge</a>.</strong> Muhammad Nadeem Ijaz 03017893497 All rights reserved.
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap-daterangepicker-master/moment.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap-daterangepicker-master/daterangepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jQuery.print.js" type="text/javascript"></script>
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.0.0.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.printElement.js" type="text/javascript"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/printPreview.js" type="text/javascript"></script>-->
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');

$(function() {
    $('input[name="daterange"]').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});


$(function() {
    $('input[name="daterangetime"]').daterangepicker({
        timePicker: true,
        timePickerIncrement: 5,
        locale: {
            format: 'DD/MM/YYYY ~ h:mm A'
        }
    });
});


$(function() {
    $('input[name="date"]').daterangepicker({
		singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});
$(function() {
    $('input[name="datetime"]').daterangepicker({
		timePicker24Hour: true,
        timePicker: true,
		singleDatePicker: true,
		/*autoUpdateInpur: false,*/
        timePickerIncrement: 30,
        locale: {
            format: 'DD/MM/YYYY ~ h:mm A'
        }
    });
});
$(function() {
    $('.datetime').daterangepicker({
		timePicker24Hour: true,
        timePicker: true,
		singleDatePicker: true,
        timePickerIncrement: 1,
        locale: {
            format: 'DD/MM/YYYY ~ h:mm A'
        }
    });
});
$(function() {
    $('.datetimeeidt').daterangepicker({
		timePicker24Hour: true,
        timePicker: true,
		singleDatePicker: true,
		autoUpdateInput: false,
        timePickerIncrement: 1,
        locale: {
            format: 'DD/MM/YYYY ~ h:mm A'
        }
    });
});
$('.datetimeeidt').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY ~ h:mm A'));
	  depp();
  });

  $('.datetimeeidt').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });






$(function() {
    $('.date1').daterangepicker({
		singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});
$(function() {
    $('.datefilter').daterangepicker({
		singleDatePicker: true,
		autoUpdateInput: false,
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});
$('.datefilter').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY'));
	  depp();
  });

  $('.datefilter').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });
  
 //date range
 $(function() {
    $('.date_range').daterangepicker({
		autoUpdateInput: false,
        locale: {
            format: 'DD/MM/YYYY - DD/MM/YYYY'
        }
    });
});
$('.date_range').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY - DD/MM/YYYY'));
	  depp();
  });

  $('.date_range').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

$(function() {
    $('input[name="passport_issue_date"]').daterangepicker({
		singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});
$(function() {
    $('input[name="passport_exp_date"]').daterangepicker({
		singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});
$(function() {
    $('.date_range_rep').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
});

    </script>
  </body>
</html>