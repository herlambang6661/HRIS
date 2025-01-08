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

        .overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }

        .is-hide {
            display: none;
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-hand-move">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" />
                                    <path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5" />
                                    <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" />
                                    <path
                                        d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                                    <path d="M2.541 5.594a13.487 13.487 0 0 1 2.46 -1.427" />
                                    <path d="M14 3.458c1.32 .354 2.558 .902 3.685 1.612" />
                                </svg>
                                Approval
                                <div id="entitasText" style="margin-left: 5px;">Loading... <i
                                        class="fa-solid fa-spinner fa-spin-pulse"></i> </div>
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-user-pen"></i>
                                            Penerimaan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-solid fa-file-signature"></i> Approval</a></li>
                                </ol>
                            </div>
                        </div>

                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">

                                <ul class="nav">
                                    <a href="#tabs-approval"
                                        class="nav-link btn bg-danger text-white d-none d-sm-inline-block"
                                        data-bs-toggle="tab" aria-selected="true" role="tab" style="margin-right: 5px"
                                        aria-label="Proses Approval Karyawan">
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                        Approval
                                    </a>
                                    <a href="#tabs-hasil" class="nav-link btn bg-blue text-white d-none d-sm-inline-block"
                                        data-bs-toggle="tab" aria-selected="true" role="tab" style="margin-right: 5px">
                                        <i class="fa-solid fa-people-arrows"></i>
                                        Hasil
                                    </a>
                                    <a href="#tabs-approval" class="btn btn-secondary d-sm-none btn-icon"
                                        data-bs-toggle="tab" aria-selected="true" role="tab"
                                        aria-label="Proses Approval Karyawan" style="margin-right: 3px">
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </a>
                                    <a href="#tabs-hasil" class="btn btn-info d-sm-none btn-icon" data-bs-toggle="tab"
                                        aria-selected="true" role="tab" aria-label="PHL" style="margin-right: 3px">
                                        <i class="fa-solid fa-people-arrows"></i>
                                    </a>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tabs-approval" role="tabpanel">
                                <div class="card card-xl border-blue shadow rounded">
                                    <div class="card-stamp card-stamp-lg">
                                        <div class="card-stamp-icon bg-blue">
                                            <i class="fa-solid fa-people-arrows"></i>
                                        </div>
                                    </div>
                                    <table style="width:100%; font-family: 'Trebuchet MS', Helvetica, sans-serif;"
                                        class="display table table-vcenter card-table table-sm table-striped table-bordered table-hover text-nowrap datatable-approval"
                                        id="tbapproval">
                                        <tfoot>
                                            <th class="px-1 py-1 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                    <path d="M21 21l-6 -6" />
                                                </svg>
                                            </th>
                                            <th class="px-1 th py-1"></th>
                                            <th class="px-1 th py-1">Masuk</th>
                                            <th class="px-1 th py-1">STB</th>
                                            <th class="px-1 th py-1">NIK</th>
                                            <th class="px-1 th py-1">Nama</th>
                                            <th class="px-1 th py-1">Gender</th>
                                            <th class="px-1 th py-1">Email</th>
                                            <th class="px-1 th py-1">Status</th>
                                            <th class="px-1 th py-1">No Map</th>
                                            <th class="px-1 th py-1">Bagian</th>
                                            <th class="px-1 th py-1">Grup</th>
                                            <th class="px-1 th py-1">Profesi</th>
                                            <th class="px-1 th py-1">Pendidikan</th>
                                            <th class="px-1 th py-1">Jurusan</th>
                                            <th class="px-1 th py-1">Status</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade active" id="tabs-hasil" role="tabpanel">
                                <div class="card card-xl border-blue shadow rounded">
                                    <div class="card-stamp card-stamp-lg">
                                        <div class="card-stamp-icon bg-blue">
                                            <i class="fa-solid fa-people-arrows"></i>
                                        </div>
                                    </div>
                                    <table style="width:100%; font-family: 'Trebuchet MS', Helvetica, sans-serif;"
                                        class="display table table-vcenter card-table table-sm table-striped table-bordered table-hover text-nowrap datatable-hasil"
                                        id="tbapproval">
                                        <tfoot>
                                            <th class="px-1 py-1 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                    <path d="M21 21l-6 -6" />
                                                </svg>
                                            </th>
                                            <th class="px-1 th py-1"></th>
                                            <th class="px-1 th py-1">Masuk</th>
                                            <th class="px-1 th py-1">STB</th>
                                            <th class="px-1 th py-1">NIK</th>
                                            <th class="px-1 th py-1">Nama</th>
                                            <th class="px-1 th py-1">Gender</th>
                                            <th class="px-1 th py-1">Email</th>
                                            <th class="px-1 th py-1">Status</th>
                                            <th class="px-1 th py-1">No Map</th>
                                            <th class="px-1 th py-1">Bagian</th>
                                            <th class="px-1 th py-1">Grup</th>
                                            <th class="px-1 th py-1">Profesi</th>
                                            <th class="px-1 th py-1">Pendidikan</th>
                                            <th class="px-1 th py-1">Jurusan</th>
                                            <th class="px-1 th py-1">Status</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('shared.footer')
        </div>
    </div>
    {{-- modal approval --}}
    <style>
        .overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }

        .is-hide {
            display: none;
        }
    </style>
    <div class="modal modal-blur fade" id="modalApproval" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="formACCPermintaan" name="formACCPermintaan" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-check" style="margin-right: 5px"></i>
                            Proses Approval Karyawan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-approval"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitAccept"><i class="fas fa-save"
                                style="margin-right: 5px"></i> Proses</button>
                        <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                                class="fa-solid fa-fw fa-arrow-rotate-left"></i> Batal</button>
                    </div>
                </form>
            </div>
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

        var tableApproval;

        function syn() {
            tableApproval.ajax.reload();
        }

        $(function() {
            /*------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================
            Create Data
            --------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================*/
            tableApproval = $('.datatable-approval').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": false, //Feature control DataTables' server-side processing mode.
                "scrollX": false,
                "scrollCollapse": true,
                "pagingType": 'full_numbers',
                "lengthMenu": [
                    [25, 35, 40, 50, -1],
                    ['25', '35', '40', '50', 'Tampilkan Semua']
                ],
                ajax: "{{ route('getLegalitasKaryawanPhl.index') }}",
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-8'i><'col-sm-4'p> >>",
                buttons: [{
                        className: 'btn btn-dark checkall',
                        text: '<i class="fa-regular fa-square-check"></i>',
                    },
                    {
                        text: '<i class="fa-solid fa-filter" style="margin-right:5px"></i>',
                        className: 'btn btn-blue w_filter',
                        attr: {
                            'href': '#offcanvasEnd-phl',
                            'data-bs-toggle': 'offcanvas',
                            'role': 'button',
                            'aria-controls': 'offcanvasEnd',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        className: 'btn btn-success w_excel',
                        text: '<i class="fa fa-file-excel text-white" style="margin-right:5px"></i>',
                        action: newexportaction,
                    },
                    {
                        "className": 'btn btn-info',
                        "text": '<i class="fa-solid fa-handshake"></i> Proses Approval',
                        "action": function(e, node, config) {
                            $('#modalApproval').modal('show')
                        }
                    }
                ],
                "language": {
                    "lengthMenu": "Menampilkan PHL _MENU_",
                    "zeroRecords": "Data Tidak Ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ total data",
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
                            _: "%d Approval dipilih",
                            0: "Pilih item dan tekan tombol Proses approval untuk memproses Approval karyawan",
                        }
                    },
                },
                "ajax": {
                    "url": "{{ route('getApproval.index') }}",
                    // "data": function(data) {
                    //     data._token = "{{ csrf_token() }}";
                    //     data.dari = $('#filterStart-all').val();
                    //     data.sampai = $('#filterEnd-all').val();
                    //     data.status = '*';
                    // }
                },
                columnDefs: [{
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
                    "selector": 'td:not(:nth-child(2), :nth-child(17),:nth-child(18),:nth-child(19),:nth-child(20),:nth-child(21),:nth-child(22),:nth-child(23),:nth-child(24),:nth-child(25),:nth-child(26),:nth-child(27))',
                },
                //Set column definition initialisation properties.
                "fixedColumns": {
                    left: 3,
                    right: 0,
                },
                autoWidth: true,
                columns: [{
                        data: 'select_orders',
                        name: 'select_orders',
                        className: 'cursor-pointer',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'cursor-pointer',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        title: 'masuk',
                        data: 'ttl',
                        name: 'ttl',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'STB',
                        data: 'stb',
                        name: 'stb',
                        className: 'cuspad0'
                    },
                    {
                        title: 'NIK',
                        data: 'nik',
                        name: 'nik',
                        visible: false,
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'nama',
                        data: 'nama',
                        name: 'nama',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'gender',
                        data: 'gender',
                        name: 'gender',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'email',
                        data: 'email',
                        name: 'email',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'status',
                        data: 'status',
                        name: 'status',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'No map',
                        data: 'nomap',
                        name: 'nomap',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'bagian',
                        data: 'bagian',
                        name: 'bagian',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'grup',
                        data: 'grup',
                        name: 'grup',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'profesi',
                        data: 'profesi',
                        name: 'profesi',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'pendidikan',
                        data: 'pendidikan',
                        name: 'pendidikan',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'jurusan',
                        data: 'jurusan',
                        name: 'jurusan',
                        className: 'cuspad0'
                    },
                    {
                        title: 'status',
                        data: 'status',
                        name: 'status',
                        className: 'cuspad0'
                    },
                ],
                "initComplete": function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                }
            });
            $('.datatable-approval tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="' +
                    $(this).text() + '" />'
                );
            });

            // TB hasil
            tableHasil = $('.datatable-hasil').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": false, //Feature control DataTables' server-side processing mode.
                "scrollX": false,
                "scrollCollapse": true,
                "pagingType": 'full_numbers',
                "lengthMenu": [
                    [25, 35, 40, 50, -1],
                    ['25', '35', '40', '50', 'Tampilkan Semua']
                ],
                ajax: "{{ route('getLegalitasKaryawanPhl.index') }}",
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-8'i><'col-sm-4'p> >>",
                buttons: [{
                        className: 'btn btn-dark checkall',
                        text: '<i class="fa-regular fa-square-check"></i>',
                    },
                    {
                        text: '<i class="fa-solid fa-filter" style="margin-right:5px"></i>',
                        className: 'btn btn-blue w_filter',
                        attr: {
                            'href': '#offcanvasEnd-phl',
                            'data-bs-toggle': 'offcanvas',
                            'role': 'button',
                            'aria-controls': 'offcanvasEnd',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        className: 'btn btn-success w_excel',
                        text: '<i class="fa fa-file-excel text-white" style="margin-right:5px"></i>',
                        action: newexportaction,
                    },
                ],
                "language": {
                    "lengthMenu": "Menampilkan PHL _MENU_",
                    "zeroRecords": "Data Tidak Ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ total data",
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
                            _: "%d Approval dipilih",
                            0: "Pilih item dan tekan tombol Proses approval untuk memproses Approval karyawan",
                        }
                    },
                },
                "ajax": {
                    "url": "{{ route('getApproval.index') }}",
                    // "data": function(data) {
                    //     data._token = "{{ csrf_token() }}";
                    //     data.dari = $('#filterStart-all').val();
                    //     data.sampai = $('#filterEnd-all').val();
                    //     data.status = '*';
                    // }
                },
                columnDefs: [{
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
                    "selector": 'td:not(:nth-child(2), :nth-child(17),:nth-child(18),:nth-child(19),:nth-child(20),:nth-child(21),:nth-child(22),:nth-child(23),:nth-child(24),:nth-child(25),:nth-child(26),:nth-child(27))',
                },
                //Set column definition initialisation properties.
                "fixedColumns": {
                    left: 3,
                    right: 0,
                },
                autoWidth: true,
                columns: [{
                        data: 'select_orders',
                        name: 'select_orders',
                        className: 'cursor-pointer',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'cursor-pointer',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        title: 'masuk',
                        data: 'ttl',
                        name: 'ttl',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'STB',
                        data: 'stb',
                        name: 'stb',
                        className: 'cuspad0'
                    },
                    {
                        title: 'NIK',
                        data: 'nik',
                        name: 'nik',
                        visible: false,
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'nama',
                        data: 'nama',
                        name: 'nama',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'gender',
                        data: 'gender',
                        name: 'gender',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'email',
                        data: 'email',
                        name: 'email',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'status',
                        data: 'status',
                        name: 'status',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'No map',
                        data: 'nomap',
                        name: 'nomap',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'bagian',
                        data: 'bagian',
                        name: 'bagian',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'grup',
                        data: 'grup',
                        name: 'grup',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'profesi',
                        data: 'profesi',
                        name: 'profesi',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'pendidikan',
                        data: 'pendidikan',
                        name: 'pendidikan',
                        className: 'cuspad0 text-center'
                    },
                    {
                        title: 'jurusan',
                        data: 'jurusan',
                        name: 'jurusan',
                        className: 'cuspad0'
                    },
                    {
                        title: 'status',
                        data: 'status',
                        name: 'status',
                        className: 'cuspad0'
                    },
                ],
                "initComplete": function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                }
            });
            $('.datatable-hasil tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="' +
                    $(this).text() + '" />'
                );
            });

            $('#modalApproval').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                // console.log(count);

                $.each(tableApproval.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tableApproval.rows('.selected').data();
                });
                // console.log(itemTables);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: '{{ url('prosesApproval') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        // id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-approval').html(data);
                        // alert(itemTables);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });
        });
    </script>
@endsection
