@extends('layouts.app')
@section('content')

        <style>
            td.cuspad0 {
                padding-top: 3px;
                padding-bottom: 3px;
                padding-right: 13px;
                padding-left: 13px;
            }
            td.cuspad1 {
                text-transform: uppercase;
            }
            td.cuspad2 {
                /* padding-top: 0.5px;
                padding-bottom: 0.5px;
                padding-right: 0.5px;
                padding-left: 0.5px;
                margin-top: 5px;
                margin-bottom: 5px;
                margin-right: 5px;
                margin-left: 5px; */
            }
            
            .unselectable {
                -webkit-user-select: none;
                -webkit-touch-callout: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                color: #cc0000;
                font-weight: bolder;
            }
        </style>
        <div class="page">
            <!-- Sidebar -->
            @include('shared.sidebar')
            <!-- Navbar -->
            @include('shared.navbar')

            <div class="page-wrapper">
                <!-- Page header -->
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <!-- Page pre-title -->
                                <h2 class="page-title">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  class="text-red" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-fingerprint-scan"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 0 1 6 0c0 1.657 .612 3.082 1 4" /><path d="M12 11v1.75c-.001 1.11 .661 2.206 1 3.25" /><path d="M9 14.25c.068 .58 .358 1.186 .5 1.75" /><path d="M4 8v-2a2 2 0 0 1 2 -2h2" /><path d="M4 16v2a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v2" /><path d="M16 20h2a2 2 0 0 0 2 -2v-2" /></svg>
                                    Daftar User Mesin Finger
                                </h2>
                                <div class="page-pretitle">
                                    <ol class="breadcrumb" aria-label="breadcrumbs">
                                        <li class="breadcrumb-item"><a href="{{ url('dashboard'); }}"><i class="fa fa-home"></i> Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('lokal/mesinfinger') }}"><i class="fas fa-fingerprint"></i> Local</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-fingerprint"></i> Daftar User <i class="text-red">(Restricted Area)</i></a></li>
                                    </ol>
                                </div>
                            </div>
                            
                            <!-- Page title actions -->
                            {{-- <div class="col-auto ms-auto d-print-none">
                                <div class="btn-list">
                                    <div class=" d-none d-sm-inline-block">
                                        <input type="date" name="" id="" class="form-control" value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class=" d-none d-sm-inline-block">
                                        <input type="date" name="" id="" class="form-control" value="{{ date('Y-m-d') }}">
                                    </div>
                                    <a href="{{ url('absensi/fingerprint') }}" class="btn btn-primary d-none d-sm-inline-block">
                                        <i class="fa-solid fa-fingerprint"></i>
                                        Perbarui
                                    </a>
                                    <a href="{{ url('absensi/absensi') }}" class="btn btn-secondary d-none d-sm-inline-block">
                                        <i class="fa-solid fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                    <a href="#" class="btn btn-danger d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-lamaran" aria-label="Tambah Lamaran">
                                        <i class="fa-solid fa-person-running"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-upload" aria-label="Upload Excel">
                                        <i class="fa-solid fa-user-slash"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-upload" aria-label="Upload Excel">
                                        <i class="fa-solid fa-fingerprint"></i>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-deck row-cards">
                            <div class="col-6">
                                <div class="card card-xl border-blue shadow rounded">
                                    <div class="card-stamp card-stamp-lg">
                                        <div class="card-stamp-icon bg-blue">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-mysql"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 21c-1.427 -1.026 -3.59 -3.854 -4 -6c-.486 .77 -1.501 2 -2 2c-1.499 -.888 -.574 -3.973 0 -6c-1.596 -1.433 -2.468 -2.458 -2.5 -4c-3.35 -3.44 -.444 -5.27 2.5 -3h1c8.482 .5 6.421 8.07 9 11.5c2.295 .522 3.665 2.254 5 3.5c-2.086 -.2 -2.784 -.344 -3.5 0c.478 1.64 2.123 2.2 3.5 3" /><path d="M9 7h.01" /></svg>
                                        </div>
                                    </div>
                                    
                                    <table style="width:100%;" class="display table table-vcenter card-table table-sm table-striped table-bordered table-hover text-nowrap datatable-daftar-mysql" id="tbdaftar">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>USERID</th>
                                                <th>NAME</th>
                                                <th>BADGENUMBER</th>
                                                <th>SSN</th>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-xl border-red shadow rounded">
                                    <div class="card-stamp card-stamp-lg">
                                        <div class="card-stamp-icon bg-red">
                                            <i class="fa-solid fa-database"></i>
                                        </div>
                                    </div>
                                    <table style="width:100%;" class="display table table-vcenter card-table table-sm table-striped table-bordered table-hover text-nowrap datatable-daftar-odbc" id="tbdaftar">
                                        <thead>
                                            <tr>
                                                <th>USERID</th>
                                                <th>NAME</th>
                                                <th>BADGENUMBER</th>
                                                <th>SSN</th>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('shared.footer')
            </div>
        </div>

        <script type="text/javascript">            
            function newexportaction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function(e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function(e, settings) {
                        // Call the original action function
                        if (button[0].className.indexOf('buttons-copy') >= 0) {
                            $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                            $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                            $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                            $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-print') >= 0) {
                            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                        }
                        dt.one('preXhr', function(e, s, data) {
                            // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                            // Set the property to what it was before exporting.
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export settings
                dt.ajax.reload();
            }

            $(function () {
                var tableODBC = $('.datatable-daftar-odbc').DataTable({
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "scrollX": true,
                    "scrollCollapse": true,
                    "pagingType": 'full_numbers',
                    "dom": "<'card-header h3' B>" +
                        "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                        "<'table-responsive' <'col-sm-12'tr> >" +
                        "<'card-footer' <'row'<'col-sm-8'i><'col-sm-4'p> >>",
                    "lengthMenu": [
                        [10, 25, 35, 40, 50, -1],
                        ['10', '25', '35', '40', '50', 'Tampilkan Semua']
                    ],
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            autoFilter: true,
                            className: 'btn btn-red',
                            text: '<i class="fa-solid fa-database"></i> Export to Xls',
                            action: newexportaction,
                        },
                        {
                            className: 'btn btn-dark getAllAccess',
                            text: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M15 15h-6" /><path d="M11.5 17.5l-2.5 -2.5l2.5 -2.5" /></svg> Get All Data',
                        },
                    ],
                    "language": {
                        "lengthMenu": "Access _MENU_",
                        "zeroRecords": "Data Tidak Ditemukan",
                        "info": "_START_ - _END_ (_TOTAL_)",
                        "infoEmpty": "Data Tidak Ditemukan",
                        "infoFiltered": "(Difilter dari _MAX_ total records)",
                        "processing": '<div class="container container-slim py-4"><div class="text-center"><div class="mb-3"></div><div class="text-secondary mb-3">Loading Data...</div><div class="progress progress-sm"><div class="progress-bar progress-bar-indeterminate"></div></div></div></div>',
                        "search": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>',
                        "paginate": {
                            "first": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6v12"></path><path d="M18 6l-6 6l6 6"></path></svg>',
                            "last": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 6l6 6l-6 6"></path><path d="M17 5v13"></path></svg>',
                            "next": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
                            "previous": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>',
                        },
                    },
                    ajax: "{{ route('getUserODBC.index') }}",
                    
                    columns: [
                        { data: 'USERID', name: 'USERID', className: 'cuspad0 text-center' },
                        { data: 'Name', name: 'Name', className: 'cuspad0' },
                        { data: 'Badgenumber', name: 'Badgenumber', className: 'cuspad0 cuspad1 text-center' },
                        { data: 'SSN', name: 'SSN', className: 'cuspad0 cuspad1 text-center' },
                    ],
                    order: [[0, 'desc']],
                });

                var tableMYSQL = $('.datatable-daftar-mysql').DataTable({
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": false, //Feature control DataTables' server-side processing mode.
                    "scrollX": true,
                    "scrollCollapse": true,
                    "pagingType": 'full_numbers',
                    "dom": "<'card-header h3' B>" +
                        "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                        "<'table-responsive' <'col-sm-12'tr> >" +
                        "<'card-footer' <'row'<'col-sm-8'i><'col-sm-4'p> >>",
                    "lengthMenu": [
                        [10, 25, 35, 40, 50, -1],
                        ['10', '25', '35', '40', '50', 'Tampilkan Semua']
                    ],
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            autoFilter: true,
                            className: 'btn btn-blue',
                            text: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-mysql"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 21c-1.427 -1.026 -3.59 -3.854 -4 -6c-.486 .77 -1.501 2 -2 2c-1.499 -.888 -.574 -3.973 0 -6c-1.596 -1.433 -2.468 -2.458 -2.5 -4c-3.35 -3.44 -.444 -5.27 2.5 -3h1c8.482 .5 6.421 8.07 9 11.5c2.295 .522 3.665 2.254 5 3.5c-2.086 -.2 -2.784 -.344 -3.5 0c.478 1.64 2.123 2.2 3.5 3" /><path d="M9 7h.01" /></svg> Export to Xls',
                            action: newexportaction,
                        },
                        {
                            className: 'btn btn-dark sendSelectedData',
                            text: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-arrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 15h6" /><path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5" /></svg> Send Selected Data',
                        },
                        // {
                        //     extend: 'excelHtml5',
                        //     autoFilter: true,
                        //     className: 'btn btn-dark',
                        //     text: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-arrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 15h6" /><path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5" /></svg> Send All Data',
                        //     action: newexportaction,
                        // },
                    ],
                    "language": {
                        "lengthMenu": "Mysql _MENU_",
                        "zeroRecords": "Data Tidak Ditemukan",
                        "info": "_START_ - _END_  (_TOTAL_)",
                        "infoEmpty": "Data Tidak Ditemukan",
                        "infoFiltered": "(Difilter dari _MAX_ total records)",
                        "processing": '<div class="container container-slim py-4"><div class="text-center"><div class="mb-3"></div><div class="text-secondary mb-3">Loading Data...</div><div class="progress progress-sm"><div class="progress-bar progress-bar-indeterminate"></div></div></div></div>',
                        "search": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>',
                        "paginate": {
                            "first": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6v12"></path><path d="M18 6l-6 6l6 6"></path></svg>',
                            "last": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 6l6 6l-6 6"></path><path d="M17 5v13"></path></svg>',
                            "next": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
                            "previous": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>',
                        },
                        "select": {
                            rows: {
                                _: "%d Karyawan dipilih",
                            }
                        },
                    },
                    ajax: "{{ route('getUserMYSQL.index') }}",
                    
                    columns: [
                        { data: 'select_orders', name: 'select_orders', className:'cuspad2', orderable: false, searchable: false },
                        { data: 'USERID', name: 'USERID', className: 'cuspad0 text-center' },
                        { data: 'Name', name: 'Name', className: 'cuspad0' },
                        { data: 'Badgenumber', name: 'Badgenumber', className: 'cuspad0 cuspad1 text-center' },
                        { data: 'SSN', name: 'SSN', className: 'cuspad0 cuspad1 text-center' },
                    ],
                    order: [[1, 'desc']],
                    columnDefs: [
                        {
                            'targets': 0,
                            "orderable": false,
                            'className': 'select-checkbox',
                            'checkboxes': {
                                'selectRow': true
                            },
                        }
                        
                    ],
                    select: {
                        'style': 'multi',
                    },
                });


                $('body').on('click', '.getAllAccess', function() {
                    var token = $("meta[name='csrf-token']").attr("content");
                    Swal.fire({
                        icon: 'info',
                        title: 'Get All Data',
                        text: 'Apakah anda yakin ingin update semua data dari Database Access ?',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: ' Ya',
                        cancelButtonText: 'Tidak',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "{{ url('syncFromAccess') }}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                },
                                beforeSend: function() {
                                    Swal.fire({
                                        title: 'Mohon Menunggu',
                                        html: '<center><lottie-player src="https://lottie.host/f6ad03a7-1560-4082-8f73-eba358540a2a/jwBLWkLRwZ.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang menarik data dari DB Access, Proses mungkin membutuhkan beberapa menit. <br><br><b class="text-danger">(Jangan menutup jendela ini, bisa mengakibatkan error)</b></h1>',
                                        timerProgressBar: true,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                    })
                                },
                                success: function(data) {
                                    tableODBC.ajax.reload();
                                    tableMYSQL.ajax.reload();

                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: "top-end",
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.onmouseenter = Swal.stopTimer;
                                            toast.onmouseleave = Swal.resumeTimer;
                                        }
                                    });
                                    Toast.fire({
                                        icon: "success",
                                        title: "Berhasil Menarik data"
                                    });
                                },
                                error: function(data) {
                                    console.log('Error:', data.responseText);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Error: ' + data.responseText,
                                        showConfirmButton: true,
                                    });
                                    tableODBC.ajax.reload();
                                    tableMYSQL.ajax.reload();
                                }
                            });
                        }
                    });

                });

                $('body').on('click', '.sendSelectedData', function() {
                    var token = $("meta[name='csrf-token']").attr("content");
                    itemTables = [];

                    $.each(tableMYSQL.rows('.selected').nodes(), function(index, rowId) {
                        var rows_selected = tableMYSQL.rows('.selected').data();
                        itemTables.push(rows_selected[index]['USERID']);
                    });
                    console.log(itemTables);

                    Swal.fire({
                        icon: 'info',
                        title: 'Send Selected Data',
                        text: 'Apakah anda yakin ingin update data dari MySql ke Database Access ?',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: ' Ya',
                        cancelButtonText: 'Tidak',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "{{ url('syncFromSelectedMysql') }}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    id: itemTables,
                                    jml:itemTables.length,
                                },
                                beforeSend: function() {
                                    Swal.fire({
                                        title: 'Mohon Menunggu',
                                        html: '<center><lottie-player src="https://lottie.host/f6ad03a7-1560-4082-8f73-eba358540a2a/jwBLWkLRwZ.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang menarik data dari DB Access, Proses mungkin membutuhkan beberapa menit. <br><br><b class="text-danger">(Jangan menutup jendela ini, bisa mengakibatkan error)</b></h1>',
                                        timerProgressBar: true,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                    })
                                },
                                success: function(data) {
                                    console.log(data.error);
                                    tableODBC.ajax.reload();
                                    tableMYSQL.ajax.reload();

                                    if (data.status == 0) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: "top-end",
                                            showConfirmButton: false,
                                            timer: 5000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.onmouseenter = Swal.stopTimer;
                                                toast.onmouseleave = Swal.resumeTimer;
                                            }
                                        });
                                        Toast.fire({
                                            icon: "error",
                                            title: data.error
                                        });
                                    } else {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: "top-end",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.onmouseenter = Swal.stopTimer;
                                                toast.onmouseleave = Swal.resumeTimer;
                                            }
                                        });
                                        Toast.fire({
                                            icon: "success",
                                            title: data.success
                                        });
                                    }
                                },
                                error: function(data) {
                                    console.log('Error:', data.responseText);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Error: ' + data.responseText,
                                        showConfirmButton: true,
                                    });
                                }
                            });
                        }
                    });

                });
            });
        </script>
@endsection
