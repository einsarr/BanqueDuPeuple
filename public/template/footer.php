        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/jquery.dataTables.js"></script>
        <script src="public/js/time.js"></script>
        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
        </script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

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
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })
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
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                    }
                )

                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })

                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                });

                $("input[data-bootstrap-switch]").each(function(){
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                });

            })
        </script>
    </body>
</html>