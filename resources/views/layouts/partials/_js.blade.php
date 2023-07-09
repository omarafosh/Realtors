 <!-- jQuery 2.0.2 -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
 <!-- jQuery UI 1.10.3 -->
 <script src={{ asset('assets/js/jquery-ui-1.10.3.min.js') }} type="text/javascript"></script>
 <!-- Bootstrap -->
 <script src={{ asset('assets/js/bootstrap.min.js') }} type="text/javascript"></script>
 <!-- Morris.js charts -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src={{ asset('assets/js/plugins/morris/morris.min.js') }} type="text/javascript"></script>
 <!-- Sparkline -->
 <script src={{ asset('assets/js/plugins/sparkline/jquery.sparkline.min.js') }} type="text/javascript"></script>
 <!-- jvectormap -->
 <script src={{ asset('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }} type="text/javascript"></script>
 <script src={{ asset('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }} type="text/javascript">
 </script>
 <!-- fullCalendar -->
 <script src={{ asset('assets/js/plugins/fullcalendar/fullcalendar.min.js') }} type="text/javascript"></script>
 <!-- jQuery Knob Chart -->
 <script src={{ asset('assets/js/plugins/jqueryKnob/jquery.knob.js') }} type="text/javascript"></script>
 <!-- daterangepicker -->
 <script src={{ asset('assets/js/plugins/daterangepicker/daterangepicker.js') }} type="text/javascript"></script>
 <!-- Bootstrap WYSIHTML5 -->
 <script src={{ asset('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }} type="text/javascript">
 </script>
 <!-- iCheck -->
 <script src={{ asset('assets/js/plugins/iCheck/icheck.min.js') }} type="text/javascript"></script>

 <!-- AdminLTE App -->
 <script src={{ asset('assets/js/AdminLTE/app.js') }} type="text/javascript"></script>

 <!-- Toast Message -->
 <script src={{ asset('assets/js/toast.js') }} type="text/javascript"></script>

 <!-- DATA TABES SCRIPT -->
 <script src={{ asset('assets/js/plugins/datatables/jquery.dataTables.js') }} type="text/javascript"></script>
 <script src={{ asset('assets/js/plugins/datatables/dataTables.bootstrap.js') }} type="text/javascript"></script>

 <!-- bootstrap color picker -->
 <script src={{ asset('assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js') }} type="text/javascript"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src={{ asset('assets/js/AdminLTE/dashboard.js') }} type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


 <script type="text/javascript">
     $('.show_confirm').click(function(event) {
         var form = $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal({
                 title: `Are you sure you want to delete this record?`,
                 text: "If you delete this, it will be gone forever.",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     form.submit();
                 }
             });
     });
 </script>


 <script>
    
 <script type="text/javascript">
     $.ajaxSetup({
         headers: {
             'csrftoken': '{{ csrf_token() }}'
         }
     });
 </script>
