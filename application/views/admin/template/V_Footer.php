  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/input-mask/jquery.inputmask.js')?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/iCheck/icheck.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/demo.js')?>"></script>

<script src="<?php echo base_url('assets/js/sweetalert.min.js')?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>

<!-- <script> 
  window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); });
    $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
  }, 3000); 
</script> -->

<script type="application/javascript">  
     /** After windod Load */  
     $(window).bind("load", function() {  
       window.setTimeout(function() {  
         $(".alert").fadeTo(500, 0).slideUp(500, function() {  
           $(this).remove();  
         });  
       }, 500);  
     });  
   </script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script type="text/javascript">
  var t, day, minute, second;
  var daynumber, monthnumber, monthday, year;
  var hari, bulan;
  window.onload =function() {
    //start jam
    var sec =document.getElementById('the-time');
    sec.timer =setInterval(function(){jam()},1000);
  }

  function jam(){
    if(t != null) t=null;
    t = new Date();
    hour = t.getHours(); // Jumlah jam (0-23)
    minute = t.getMinutes(); // Jumlah menit (0-59)
    second = t.getSeconds(); // Jumlah detik (0-59)
    daynumber = t.getDay();
    monthnumber = t.getMonth(); // Jumlah bulan (0-11)
    monthday = t.getDate(); // Hari dari bulan (0-31)
    year = t.getFullYear();
    //jam
    if(hour < 10) hour ='0'+hour;
    if(minute < 10) minute ='0'+minute;
    if(second < 10) second ='0'+second;
    //hari
    hari = getTheDay(daynumber);
    //bulan
    bulan = getTheMonth(monthnumber);
    
    document.getElementById('the-time').innerHTML=hour+':'+minute+':'+second;
    document.getElementById('the-day').innerHTML= hari+', ' +monthday+' '+bulan+' '+year;
  }

  function getTheDay(num){
    if(num == 1) return 'Senin';
    else if(num == 2) return 'Selasa';
    else if(num == 3) return 'Rabu';
    else if(num == 4) return 'Kamis';
    else if(num == 5) return 'Jumat';
    else if(num == 6) return 'Sabtu';
    else if(num == 0) return 'Minggu';
  }

  function getTheMonth(num){
    if(num == 0) return 'Januari';
    else if(num == 1) return 'Februari';
    else if(num == 2) return 'Maret';
    else if(num == 3) return 'April';
    else if(num == 4) return 'Mei';
    else if(num == 5) return 'Juni';
    else if(num == 6) return 'Juli';
    else if(num == 7) return 'Agustus';
    else if(num ==8) return 'September';
    else if(num == 9) return 'Oktober';
    else if(num == 10) return 'November';
    else if(num == 11) return 'Desember';
  }
</script>

</body>
</html>
