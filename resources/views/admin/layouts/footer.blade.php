        <!-- footer content -->
        <footer>
          <div class="pull-right">
            All Rights Reserved. &copy; 2022 <a href="#">Ilham Alfath</a></p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    
    
    <!-- jQuery -->
    <script src="{{ asset('vendor/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendor/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendor/admin/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendor/admin/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('vendor/admin/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendor/admin/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendor/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendor/admin/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendor/admin/vendors/skycons/skycons.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('vendor/admin/build/js/custom.min.js') }}"></script>
	    <!-- Datatables -->
    <script src="{{ asset('vendor/admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>

    <script>
    $(document).ready(function () {

        fetchstudent();

        function fetchstudent() {
            $.ajax({
                type: "GET",
                url: "/fetch-students",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.students, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.course + '</td>\
                            <td>' + item.email + '</td>\
                            <td>' + item.phone + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_student', function (e) {
            e.preventDefault();

            $(this).text('Sending..');

            var data = {
                'name': $('.name').val(),
                'course': $('.course').val(),
                'email': $('.email').val(),
                'phone': $('.phone').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/students",
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Save');
                        $('#AddStudentModal').modal('hide');
                        fetchstudent();
                    }
                }
            });

        });

        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var stud_id = $(this).val();
            // alert(stud_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-student/" + stud_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        // console.log(response.student.name);
                        $('#name').val(response.student.name);
                        $('#course').val(response.student.course);
                        $('#email').val(response.student.email);
                        $('#phone').val(response.student.phone);
                        $('#stud_id').val(stud_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_student', function (e) {
            e.preventDefault();

            $(this).text('Updating..');
            var id = $('#stud_id').val();
            // alert(id);

            var data = {
                'name': $('#name').val(),
                'course': $('#course').val(),
                'email': $('#email').val(),
                'phone': $('#phone').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-student/" + id,
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_student').text('Update');
                    } else {
                        $('#update_msgList').html("");

                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').find('input').val('');
                        $('.update_student').text('Update');
                        $('#editModal').modal('hide');
                        fetchstudent();
                    }
                }
            });

        });

        $(document).on('click', '.deletebtn', function () {
            var stud_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(stud_id);
        });

        $(document).on('click', '.delete_student', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-student/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchstudent();
                    }
                }
            });
        });

    });

</script>
  </body>
</html>