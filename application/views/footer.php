<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- DataTable -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables/dataTables.min.js"></script>
<!-- DataTable Button -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables/Buttons-1.5.1/js/dataTables.buttons.min.js"></script>
<!-- DataTable Button -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables/Buttons-1.5.1/js/buttons.bootstrap.min.js"></script>
<!-- DataTable Button -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables/JSZip-2.5.0/jszip.min.js"></script>
<!-- DataTable Button -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables/pdfmake-0.1.32/pdfmake.js"></script>
<!-- DataTable Button -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables/pdfmake-0.1.32/vfs_fonts.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript">

      $(document).ready(function() {

        $('.select2').select2();

        // var table = $('#libDataTable').DataTable( {
        //     buttons: [
        //         'excel', 'pdf'
        //     ]
        // } );
        // table.buttons().container()
        //                 .appendTo( $('.col-sm-6:eq(1)', table.table().container() ) );

        // 'excelHtml5',
        // 'pdf'


        // dom:
        //     "<'row'<'col-sm-2'l><'col-sm-7 text-center'f><'col-sm-3 text-center'B>>" +
        //     "<'row'<'col-sm-12'tr>>" +
        //     "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        var tbl = $('#libDataTable');
        var table = $("#libDataTable").DataTable({
              lengthChange: false,
              buttons: [
                  {
                    extend: 'colvis',
                    text: 'Show'
                  },
                  {
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                      {
                        extend: 'print',
                        exportOptions: {
                          columns: ':visible'
                        }
                      },
                      {
                          extend: 'pdf',
                          filename: 'Aziz',
                          title: 'Exported Contacts',
                          exportOptions: {
                            columns: [ 0, 1, 2, 3],
                              columns: ':visible'
                          },
                          customize: function (doc) {
                            doc.content[1].table.widths =
                                   Array(doc.content[1].table.body[0].length + 1).join('%').split('');
                                   console.log( doc.content );
                            // doc.content[0].table.widths =
                            //     Array(doc.content[0].table.body[0].length + 1).join('%').split('');
                          }
                      },
                      {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                      }
                    ]
                  }
              ]
      	});

        table.buttons().container()
        .appendTo( '#libDataTable_wrapper .col-sm-6:eq(0)' );

        $('.btn-edit-trig').click(function(){
          $('#modal-edit').modal('show');
          var uid = $(this).data('uid');
          var name = $(this).data('name');
          var address = $(this).data('address');
          var details = $(this).data('details');

          $('#upuid').val(uid);
          $('#upname').val(name);
          $('#upaddress').val(address);
          $('#updetails').val(details);
        });

        $('.btn-delete-trig').click(function(){
            $('#modal-delete').modal('show');
            var uid = $(this).data('uid');
            var name = $(this).data('name');
            var details = $(this).data('details');

            var href = $("#btn-delete").attr('href').replace("#delid", uid);
            $("#btn-delete").attr('href', href);
            $(".delete-name").text(name);
            $(".delete-details").text(details);

        });

      });
</script>

<script type="text/javascript">

    function get_select(val) {
      $.ajax({
        type: 'post',
        url: 'GetDistricts',
        data: {
          get_option:val
        },
        success: function(response) {
          document.getElementById("districts").innerHTML=response;
        }
      });
    }

    function get_upazila(val) {
      $.ajax({
        type: 'post',
        url: 'GetUpazila',
        data: {
          get_option:val
        },
        success: function(response) {
          document.getElementById("upazila").innerHTML=response;
        }
      });
    }


    function get_unions(val) {
      $.ajax({
        type: 'post',
        url: 'GetUnions',
        data: {
          get_option:val
        },
        success: function(response) {
          document.getElementById("unions").innerHTML=response;
        }
      })
    }

    function show_village(val) {
      $("#villtable").show("slow");
      $("#villaddform").show("slow");
      GetVillData(val);
      SetUnion_form(val);
    }

    function GetVillData(val) {
      $.ajax({
        type: 'post',
        url: 'GetVillData',
        data: {
          union_id:val
        },
        success: function(data) {
          document.getElementById("villdata").innerHTML=data;
        }
      })
    }

    function SetUnion_form(val) {
        alert(val);
        $("#form_uniid").val(val);
    }


</script>

</body>
</html>
