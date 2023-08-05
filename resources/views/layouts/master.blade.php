<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
  <meta charset="utf-8">
  <link href="{{ url('images/logo.png') }}" rel="shortcut icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Pegawai Non-ASN Kota Tangerang Selatan">
  <meta name="keywords" content="non asn, kota tangerang selatan">
  <meta name="author" content="BKPSDM">
  <title>E-NonASN</title>
  <!-- BEGIN: CSS Assets-->
  <link rel="stylesheet" type="text/css" href="{{ url('template/dist/css/app.css') }}" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />
  <!-- <link href="{{ url('DataTables/datatables.css') }}" type="text/css" rel="stylesheet"> -->
  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      color: #0099cc !important;
      padding: 0.4em 0.8em;
      border: #eaeaea 1px solid;
      ;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      color: #0099cc !important;
      border-color: #eaeaea !important;
      background-color: #eaeaea !important;
      background: unset;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
      color: #fff !important;
      background: unset !important;
      border: #0099cc 1px solid !important;
      background-color: #0099cc !important;
      cursor: default;
    }

    table.dataTable.row-border tbody th,
    table.dataTable.row-border tbody td,
    table.dataTable.display tbody th,
    table.dataTable.display tbody td {
      border: 1px solid #ddd;
      border-left: none;
      border-top: none;
    }

    table.dataTable.stripe tbody tr.odd,
    table.dataTable.display tbody tr.odd {
      background-color: #fff;
    }

    table.dataTable.display tbody tr.even>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
      background-color: #f3f3f3;
    }

    table.dataTable.display tbody tr.odd>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
      background-color: #fff;
    }

    table.dataTable thead th,
    table.dataTable thead td {
      border: 1px solid #ddd;
      border-left: none;
    }

    table.dataTable.stripe tbody tr.even,
    table.dataTable.display tbody tr.even {
      background-color: #f3f3f3;
    }

    .datatables_length {
      padding-bottom: 15px;
    }

    table.dataTable {
      border-left: 1px solid #ddd;
    }

    .dataTables_wrapper select,
    .dataTables_wrapper input {
      border: 1px solid #ddd;
      padding: 0.4em;
    }
  </style>
  <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">
  <!-- BEGIN: Mobile Menu -->
  @include('layouts.mobile-menu')
  <!-- END: Mobile Menu -->
  <div class="flex mt-[4.7rem] md:mt-0">
    <!-- BEGIN: Side Menu -->
    @include('layouts.sidebar')
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
      <!-- BEGIN: Top Bar -->
      @include('layouts.topbar')
      <!-- END: Top Bar -->
      @yield('content')

    </div>
    <!-- END: Content -->
  </div>

  <!-- BEGIN: JS Assets-->
  @include('layouts.js')
  <!-- END: JS Assets-->
</body>

</html>