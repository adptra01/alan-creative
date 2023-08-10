<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? '' }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS light-style -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />

    <!-- Core CSS dark-style -->
    <link rel="stylesheet" href="//assets/vendor/css/core-dark.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="//assets/vendor/css/theme-default-dark.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css " />

    @yield('css')

    <!-- Livewire -->
    @livewireStyles
</head>

<body onload="window.print()">
    <!-- Layout wrapper -->
    <div class="invoice-print">
        <div class="p-sm-3 p-0">
            <div>
                <h4>Invoice {{ $transactions->first()->order_code }}</h4>
                <div class="mb-2">
                    <span class="me-1">Tanggal :</span>
                    <span class="fw-medium">{{ $transactions->first()->created_at }}</span>
                </div>
                <div class="mb-2">
                    <span class="me-1">Atas Nama:</span>
                    <span class="fw-medium">{{ $transactions->first()->customer }}</span>
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="table-responsive">
            <table class="table border-top m-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $no => $transaction)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $transaction->product->name }}</td>
                            <td>{{ $transaction->qty }}</td>
                            <td>{{ $transaction->product->price }}</td>
                            <td>{{ $transaction->product->price * $transaction->qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- / Layout wrapper -->
    <!-- Livewire -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="/assets/vendor/libs/select2/select2.js"></script>
    <script>
        $(".select2").select2();
    </script>
    @yield('js')
    @livewireScripts
</body>

</html>
