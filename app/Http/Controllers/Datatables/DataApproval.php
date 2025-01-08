<?php

namespace App\Http\Controllers\Datatables;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class DataApproval extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('penerimaan_karyawan')
                ->where('status', 'like', '%PHL%')
                ->orderBy('nama', 'asc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('select_orders', function ($row) {
                    return '';
                })
                ->addColumn('ttl', function ($row) {
                    if ($row->tglmasuk) {
                        $tgl_indo = Carbon::createFromFormat('Y-m-d', $row->tglmasuk)->format('d/m/Y');
                    } else {
                        $tgl_indo = '';
                    }
                    return $tgl_indo;
                })
                ->addColumn('action', function ($row) {
                    if ($row->acc_phl == 1) {
                        $btn = '
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Edit Data Legalitas Karyawan" class="btn btn-sm btn-info btn-icon"><i class="fa-solid fa-print"></i></a>
                     <a href="approval/edit/' . $row->userid . '" data-toggle="tooltip" data-placement="top" title="Edit Data Legalitas Karyawan" class="btn btn-sm btn-success btn-icon"><i class="fa-solid fa-file-signature"></i></a>';
                        return $btn;
                    }
                })
                ->rawColumns(['status', 'action', 'select_orders', 'ttl', 'umur'])
                ->make(true);
        }
        return view('products.02_penerimaan.approval');
    }
}
