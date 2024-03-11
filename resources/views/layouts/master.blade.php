<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KCCF Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style_studentportal.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/LOGOEDIT.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/list.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom/sweetalert/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom/select2/select2.css') }}" />
    @vite('resources/js/app.js')
    @yield('css')
</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.nav')
        <!-- partial -->
        @include('layouts/breadcrumbs')
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('content')

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('layouts.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- base:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/custom/sweetalert/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/custom/select2/select2.js') }}"></script>
    <script>

        $(document).on('click','.btndelete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = $(this).data('url');
            var row = $('#row'+id); // Get the row to be deleted
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: { id: id, _token: "{{ csrf_token() }}" },
                        success: function(response) {
                            row.remove(); // Remove the row from the table
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                title: "Error!",
                                text: "An error occurred while deleting.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    @yield('script')

    <!-- End custom js for this page-->
</body>

</html>
