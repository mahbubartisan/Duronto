<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="{{ asset("assets/images/favicon.svg") }}" type="image/x-icon" />
        <title>{{ $title ?? 'Admin Dashboard' }}</title>
        <!-- ========== All CSS files linkup ========= -->
        <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" />
        <link rel="stylesheet" href="{{ asset("assets/css/lineicons.css") }}" />
        <link rel="stylesheet" href="{{ asset("assets/css/quill/bubble.css") }}" />
        <link rel="stylesheet" href="{{ asset("assets/css/quill/snow.css") }}" />
        <link rel="stylesheet" href="{{ asset("assets/css/fullcalendar.css") }}" />
        <link rel="stylesheet" href="{{ asset("assets/css/morris.css") }}" />
        <link rel="stylesheet" href="{{ asset("assets/css/datatable.css") }}" />
        <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}" />
        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">


        <style>
            /* Custom CSS for exact design */
            .custom-container {
                margin: auto;
            }

            .entries-dropdown,
            .search-bar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 15px;
            }

            .entries-dropdown select {
                width: 80px;
                margin-right: 5px;
            }

            .search-bar input {
                width: 200px;
            }

            .custom-table-wrapper {
                border-radius: 10px;
                /* Rounded corners */
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                /* Shadow effect */
                overflow: hidden;
                /* Ensure corners are clipped */
                background-color: #ffffff;
            }

            .custom-table {
                width: 100%;
                border-collapse: collapse;
            }

            .custom-table th,
            .custom-table td {
                padding: 10px;
            }

            .custom-table thead th {
                border-bottom: 1px solid #eaeaeb;
                font-weight: 600;
                font-size: 16px;
            }

            .custom-table tbody tr {
                border-bottom: 1px solid #eaeaeb;
            }

            .custom-table tbody td {
                font-size: 5px;
                /* Smaller font size for table body text */
            }

            .custom-table tbody tr:last-child {
                border-bottom: none;
            }

            .footer-info {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
                border-top: 1px solid #dee2e6;
            }

            .pagination {
                margin: 0;
                display: flex;
                list-style: none;
                padding: 0;
            }

            .pagination li {
                margin: 0 8px;
            }

            .pagination a {
                text-decoration: none;
                color: #007bff;
                padding: 5px 10px;
                border: 1px solid #dee2e6;
                border-radius: 4px;
            }

            .pagination .active a {
                color: #ffffff;
                background-color: #007bff;
            }

            .image-upload-container {
                position: relative;
                width: 100%;
                height: 0;
                padding-bottom: 100%;
                /* Aspect ratio 1:1 */
                background-color: #f8f9fa;
                border: 1px solid #ced4da;
                border-radius: 5px;
                cursor: pointer;
            }

            .image-upload-container p {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: #6c757d;
                text-align: center;
                margin: 0;
            }

            .image-upload-container input[type="file"] {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                opacity: 0;
                cursor: pointer;
            }
        </style>

    </head>

    <body>
        <!-- ======== Preloader =========== -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- ======== Preloader =========== -->

        <!-- ======== sidebar-nav start =========== -->
        @include("layouts._nav")
        <!-- ======== sidebar-nav end =========== -->

        <!-- ======== main-wrapper start =========== -->
        <main class="main-wrapper">
            <!-- ========== header start ========== -->
            @include("layouts._header")
            <!-- ========== header end ========== -->

            <!-- ========== section start ========== -->
            <section class="section">
                <div class="container-fluid">
                    @yield("content")
                </div>
                <!-- end container -->
            </section>
            <!-- ========== section end ========== -->

            <!-- ========== footer start =========== -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 order-last order-md-first">
                            <div class="copyright text-center text-md-start">
                                <p class="text-sm">
                                    Designed and Developed 2025
                                </p>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </footer>
            <!-- ========== footer end =========== -->
        </main>
        <!-- ======== main-wrapper end =========== -->


        <!-- ========= All Javascript files linkup ======== -->
        <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("assets/js/Chart.min.js") }}"></script>
        <script src="{{ asset("assets/js/apexcharts.min.js") }}"></script>
        <script src="{{ asset("assets/js/dynamic-pie-chart.js") }}"></script>
        <script src="{{ asset("assets/js/moment.min.js") }}"></script>
        <script src="{{ asset("assets/js/fullcalendar.js") }}"></script>
        <script src="{{ asset("assets/js/jvectormap.min.js") }}"></script>
        <script src="{{ asset("assets/js/world-merc.js") }}"></script>
        <script src="{{ asset("assets/js/polyfill.js") }}"></script>
        <script src="{{ asset("assets/js/quill.min.js") }}"></script>
        <script src="{{ asset("assets/js/datatable.js") }}"></script>
        <script src="{{ asset("assets/js/Sortable.min.js") }}"></script>
        <script src="{{ asset("assets/js/main.js") }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

        <script>
            const dataTable = new simpleDatatables.DataTable("#table", {
                searchable: true,
            });
        </script>
    </body>

</html>
