<?php

use Carbon\Carbon;
use App\Http\Controllers\Daftar;
use App\Http\Controllers\Absensi;
use App\Http\Controllers\DBLokal;
use App\Http\Controllers\Database;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Penerimaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrasi;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Datatables\DataOL;
use App\Http\Controllers\Datatables\DataPHL;
use App\Http\Controllers\Datatables\DataPos;
use App\Http\Controllers\Datatables\DataTHR;
use App\Http\Controllers\Datatables\DataCuti;
use App\Http\Controllers\Datatables\DataUpah;
use App\Http\Controllers\Datatables\DataAlpha;
use App\Http\Controllers\Datatables\DataLoker;
use App\Http\Controllers\Datatables\DataShift;
use App\Http\Controllers\Datatables\DataSurat;
use App\Http\Controllers\Datatables\DataUsers;
use App\Http\Controllers\Datatables\DataFinger;
use App\Http\Controllers\Datatables\DataLembur;
use App\Http\Controllers\Datatables\DataEntitas;
use App\Http\Controllers\Datatables\DataLamaran;
use App\Http\Controllers\Datatables\DataPayroll;
use App\Http\Controllers\Datatables\DataACCItems;
use App\Http\Controllers\Datatables\DataKaryawan;
use App\Http\Controllers\Datatables\DataPengguna;
use App\Http\Controllers\Datatables\DataHariLibur;
use App\Http\Controllers\Datatables\DataTerlambat;
use App\Http\Controllers\Datatables\DataWawancara;
use Illuminate\Contracts\Auth\Access\Authorizable;
use App\Http\Controllers\Datatables\DataFingerODBC;
use App\Http\Controllers\Datatables\DataKomunikasi;
use App\Http\Controllers\Datatables\DataFingerMYSQL;
use App\Http\Controllers\Datatables\DataTarifLembur;
use App\Http\Controllers\Datatables\DataAbsensiLocal;
use App\Http\Controllers\Datatables\DataFixedAbsensi;
use App\Http\Controllers\Datatables\DataUserinfoODBC;
use App\Http\Controllers\Datatables\DataAbsensiServer;
use App\Http\Controllers\Datatables\DataACCKomunikasi;
use App\Http\Controllers\Datatables\DataApproval;
use App\Http\Controllers\Datatables\DataUserinfoMYSQL;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Datatables\DataLegalitasKaryawan;
use App\Http\Controllers\Datatables\DataLegalitasKaryawanOl;
use App\Http\Controllers\Datatables\DataLegalitasKaryawanPhl;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
// Route::get('logs', [AuthController::class, 'index']);

// Route::get('/', function () {
//     if (Auth::check()) {
//         $judul = "Dashboard";
//         $countLamaran = DB::table('penerimaan_lamaran')->count();
//         $countKaryawan = DB::table('penerimaan_karyawan')->where('status', 'like', '%Aktif%')->count();
//         $countKomunikasi = DB::table('absensi_komunikasiitm')->count();
//         $absensi = DB::table('absensi_absensi')->orderBy('tanggal', 'desc')->limit('1')->get();
//         $kontrak = DB::table('penerimaan_legalitas')->where('nmsurat', 'Perjanjian Kontrak')->where('tglak', '>', date('Y-m-d'))->orderBy('tglak', 'asc')->limit('50')->get();
//         $sp = DB::table('penerimaan_legalitas')->where('nmsurat', 'Surat Peringatan (SP)')->where('legalitastgl', '>=', now()->subMonths(6))->orderBy('legalitastgl', 'desc')->limit('50')->get();

//         foreach ($absensi as $ab) {
//             $absen = Carbon::parse($ab->tanggal)->format('d-m-Y');
//         }
//         // dd('ASJHAJSHAJSHJAHS');

//         // return view('products.dashboard', [
//         //     'judul' => $judul,
//         //     'lamaran' => $countLamaran,
//         //     'karyawan' => $countKaryawan,
//         //     'komunikasi' => $countKomunikasi,
//         //     'absen' => $absen,
//         //     'kontrak' => $kontrak,
//         //     'sp' => $sp,
//         // ]);

//     } else {
//         return redirect("login")->withSuccess('Opps! You do not have access');
//     }
// });

// Modules Source untuk datatables
Route::resources([
    'getSurat' => DataSurat::class,
    'getPos'    => DataPos::class,
    'getLamaran' => DataLamaran::class,
    'getWawancara' => DataWawancara::class,
    'getKaryawan' => DataKaryawan::class,
    'getCuti' => DataCuti::class,
    'getOL' => DataOL::class,
    'getPHL' => DataPHL::class,
    'getLegalitasKaryawan' => DataLegalitasKaryawan::class,
    'getLegalitasKaryawanOl' => DataLegalitasKaryawanOl::class,
    'getLegalitasKaryawanPhl' => DataLegalitasKaryawanPhl::class,
    'getAbsensiServer' => DataAbsensiServer::class,
    'getUserODBC' => DataUserinfoODBC::class,
    'getUserMYSQL' => DataUserinfoMYSQL::class,
    'getFingerprint' => DataFinger::class,
    'getFingerODBC' => DataFingerODBC::class,
    'getFingerMYSQL' => DataFingerMYSQL::class,
    'getLembur' => DataTarifLembur::class,
    'getLibur'  => DataHariLibur::class,
    'getshift' => DataShift::class,
    'getentitas' => DataEntitas::class,
    'getListKomunikasi' => DataKomunikasi::class,
    'getAccKomunikasi' => DataACCKomunikasi::class,
    'getAccKomunikasiitems' => DataACCItems::class,
    'getLoker' => DataLoker::class,
    'getPayroll' => DataPayroll::class,
    'getTunjanganHariRaya' => DataTHR::class,
    'getTerlambat' => DataTerlambat::class,
    'getUpah' => DataUpah::class,
    'getPengguna' => DataPengguna::class,
    'getDataUsers' => DataUsers::class,
    'getLembur' => DataLembur::class,
    'getAlphaDatatables' => DataAlpha::class,
    'getApproval' => DataApproval::class,
]);

// Modules Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('post-login', 'postLogin')->name('login.post');
    Route::get('registration', 'registration')->name('register');
    Route::post('post-registration', 'postRegistration')->name('register.post');
    Route::get('dashboard', 'dashboard');
    Route::get('logout', 'logout')->name('logout');
    Route::post('/update-location', 'updateLocation')->name('update.location');
    Route::get('/', 'dashboard');
});

// Modules Daftar
Route::controller(Daftar::class)->group(function () {

    //Routes Pos Pekerjaan DONE
    Route::get('daftar/pos', 'pos')->name('daftar/pos');
    Route::post('storedataPos', 'storePos');
    Route::post('listPos', 'listPos');
    Route::post('pos/update', 'updatePos');

    //Routes Tarif Lembur DONE
    Route::get('daftar/tariflembur', 'tariflembur')->name('daftar/tariflembur');
    Route::post('storedataLembur', 'storelembur');
    Route::post('viewlembur', 'lemburview');
    Route::post('update/lembur', 'updatelembur');

    //Routes libur nasional DONE
    Route::get('daftar/liburnas', 'liburnas')->name('daftar/liburnas');
    // Route::post('getLibur', 'getLibur')->name('getLibur');
    Route::post('storedataLibur', 'storelibur');
    Route::post('detail/liburnas', 'liburnasview');
    // Route::post('update/liburnas', 'updateliburnas');
    Route::post('generateYear', 'generateLiburNasional');
    Route::post('updatelibur', 'updatelibur')->name('updatelibur');
    Route::get('daftar/prosesLibnas/{id}', 'prosesLibnas')->name('daftar/prosesLibnas/{id}');
    Route::get('daftar/kembalikanLibnas/{id}', 'kembalikanLibnas')->name('daftar/kembalikanLibnas/{id}');


    //routes Surat-surat DONE
    Route::get('daftar/surat', 'surat')->name('daftar/surat');
    Route::post('storedataSurat', 'storeSurat');
    Route::post('update/surat', 'updatesurat');
    Route::post('detail/surat', 'viewsurat');

    //routes jadwal shif DONE
    Route::get('daftar/jadwalshift', 'jadwalshift')->name('daftar/jadwalshift');
    Route::post('storedatashift', 'storeshift');
    Route::post('viewshift', 'shiftview');
    Route::post('shift/update', 'updateshif');

    //Routes daftar entitas
    Route::get('daftar/entitas', 'entitas');
    Route::post('detail/entitas', 'viewentitas');
    Route::post('storedataEntitas', 'storeentitas');
    Route::post('update/entitas', 'updateentitas');

    // Routes Lowongan Pekerjaan
    // Route::get('daftar/loker', 'loker');
    // Route::post('storeDataLoker', 'storeLoker');

    //Routes data upah
    Route::get('daftar/upah', 'upah');
    Route::post('update/upah', 'updateupah');

    //Routes Daftar Users
    Route::get('daftar/users', 'users');
    Route::post('daftar/store', 'storeusers');
    Route::post('daftar/update', 'updateUsers');
});

// Modules Upload Gambar
Route::controller(ImageController::class)->group(function () {
    Route::get('penerimaan/image-upload', 'index');
    Route::post('penerimaan/image-upload', 'store')->name('image.store');
    Route::post('penerimaan/image-upload2', 'storeKTP')->name('image.storeKTP');
});

// Modules Penerimaan
Route::controller(Penerimaan::class)->group(function () {
    Route::get('penerimaan/lowongan', 'lowongan')->name('penerimaan.lowongan');
    Route::get('penerimaan/tambahlowongan', 'addLowongan')->name('penerimaan.tambahlowongan');
    Route::get('penerimaan/editlowongan/{id}', 'editLowongan')->name('penerimaan.editlowongan');
    Route::post('reviewLowongan', 'reviewLowongan');
    Route::post('storeLowongan', 'storeLowongan')->name('lowongan.store');
    Route::post('updateLowongan/{id}', 'updateLowongan')->name('lowongan.update');
    Route::post('/update-release/{id}', 'updateRelease')->name('updateRelease');
    Route::delete('destroylowongan/{id}', 'destroyLowongan')->name('lowongan.destroy');

    Route::get('penerimaan/lamaran', 'lamaran')->name('penerimaan/lamaran');
    Route::post('listLamaran', 'listLamaran');
    Route::post('viewFoto', 'viewFoto');
    Route::post('penerimaan/wawancaraa', 'byWhatsappWawancaraa')->name('proseswwn');

    Route::get('penerimaan/wawancara', 'wawancara')->name('penerimaan/wawancara');
    Route::get('penerimaan/karyawan', 'karyawan')->name('penerimaan/karyawan');
    Route::get('penerimaan/legalitas', 'legalitas')->name('penerimaan/legalitas');
    Route::get('penerimaan/massUpload', 'uploadMassalLegalitas')->name('penerimaan/massUpload');

    Route::get('penerimaan/approval', 'approval')->name('penerimaan/approval');
    Route::post('penerimaan/prosesApproval', 'prosesApproval')->name('penerimaan/prosesApproval');

    Route::get('penerimaan/karyawan/edit/{id}', 'editKaryawan')->name('penerimaan/karyawan/edit/{id}');
    Route::post('penerimaan/karyawaneditdata', 'karyawaneditdata')->name('penerimaan/karyawaneditdata');

    Route::get('penerimaan/printLamaran/{id}', 'printLamaran')->name('penerimaan.printLamaran');


    Route::post('storedataLamaran', 'storeLamaran');
    Route::post('checkLamaran', 'checkLamaran');
    Route::post('storeChecklistLamaran', 'storeChecklistLamaran');
    Route::post('cancelWawancara', 'cancelWawancara');
    Route::post('prosesWawancara', 'prosesWawancara');
    Route::post('checkWawancara', 'checkWawancara');
    Route::post('checkWawancaraX', 'checkWawancaraX');
    Route::post('storeChecklistWawancara', 'storeChecklistWawancara');
    Route::post('storeHasilWawancara', 'storeHasilWawancara');
    Route::post('listKaryawan', 'listKaryawan');
    Route::post('listStb', 'listStb');
    Route::post('addModal', 'addModal');
    Route::post('editModal', 'editModal');
    Route::get('penerimaan/legalitas/edit/{id}', 'legalEdit')->name('penerimaan/legalitas/edit/{id}');
    Route::post('storedataLegalitas', 'storedataLegalitas');
    Route::post('storedataEditLegalitas', 'storedataEditLegalitas');
    Route::post('storeUpdateKaryawan', 'storeUpdateKaryawan');
    Route::post('getTableBasic', 'getTableBasic');
    Route::post('getTablePerjanjian', 'getTablePerjanjian');
    Route::post('getTableInternal', 'getTableInternal');
    Route::post('getTableStatus', 'getTableStatus');
    Route::post('getTableCuti', 'getTableCuti');
    Route::post('basicdelete', 'basicdelete');
    Route::post('perjanjiandelete', 'perjanjiandelete');
    Route::post('statusdelete', 'statusdelete');
    Route::post('internaldelete', 'internaldelete');
    Route::get('export_excel_legalitas', 'exportLegalitas')->name('export_excel_legalitas');
    Route::get('penerimaan/scanner', 'scanner')->name('penerimaan/scanner');
});

// Modules Absensi
Route::controller(Absensi::class)->group(function () {

    Route::get('export_excel_lamaran', 'exportLamaran')->name('export_excel_lamaran');
    Route::get('absensi/absensi', 'absensi')->name('absensi/absensi');
    Route::get('absensi/fingerprint', 'fingerprint')->name('absensi/fingerprint');
    Route::get('absensi/komunikasi', 'komunikasi')->name('absensi/komunikasi');
    Route::get('absensi/cuti', 'cuti')->name('absensi/cuti');

    Route::get('absenkosong', 'absenkosong')->name('absenkosong');

    Route::post('getabsensi', 'getabsensi')->name('getabsensi');
    Route::post('listAbsensiDetail', 'listAbsensiDetail');
    Route::post('getalpha', 'getalpha')->name('getalpha');
    Route::post('getalphabydate', 'getalphabydate')->name('getalphabydate');
    Route::post('storedataKomunikasi', 'storeKomunikasi');
    Route::post('storedataAcc', 'storedataAcc');

    Route::get('absensi/komunikasi/printKomunikasi/{id}', 'printSurat')->name('absensi/komunikasi/printKomunikasi/{id}');
    Route::post('checkAccKomunikasi', 'checkAccKomunikasi');
    Route::post('absensi/storeAcc', 'storeKomunikasiAcc')->name('absensi/storeAcc');
    Route::post('syncKom', 'syncKom')->name('syncKom');
    Route::post('getcuti', 'getNewCuti')->name('getcuti');
    Route::post('fixUmum', 'fixUmum')->name('fixUmum');
    Route::post('exportAbsen', 'exportAbsensi')->name('exportAbsen');
    Route::post('exportSKD', 'exportSKD')->name('exportSKD');
    Route::post('absensi/printAbsen', 'printAbsen')->name('absensi/printAbsen');
    Route::post('checkProses', 'checkProses');
    Route::post('storedataF1', 'storedataF1');
    Route::post('storedataAlpa', 'storedataAlpa');
    Route::post('syncCuti', 'syncCuti')->name('syncCuti');
});

// Modules Penarikan Data Mesin Fingerprint
Route::controller(DBLokal::class)->group(function () {
    Route::get('lokal/mesinfinger', 'mesinfinger')->name('lokal/mesinfinger');
    Route::get('lokal/daftarfinger', 'daftarfinger')->name('lokal/daftarfinger');
    Route::get('lokal/rawfinger', 'rawfinger')->name('lokal/rawfinger');
    Route::get('lokal/localabsence', 'localabsence')->name('lokal/localabsence');

    Route::post('syncFromAccess', 'syncFromAccess');
    Route::post('syncFromSelectedMysql', 'syncFromSelectedMysql');
    Route::post('syncCheckinout', 'syncCheckinout');
    Route::post('syncAbsen', 'syncAbsen');
    Route::post('uploadAbsen', 'uploadAbsen');
    Route::post('perbaruiUploadAbsen', 'perbaruiUploadAbsen');
    Route::post('UploadFixedAbsen', 'UploadFixedAbsen');
    Route::post('refreshUploadAbsen', 'refreshUploadAbsen');
    Route::get('loaderlocal', 'loading');
});

// Modules Administrasi
Route::controller(Administrasi::class)->group(function () {
    Route::get('administrasi/payroll', 'payroll')->name('administrasi/payroll');
    Route::get('administrasi/thr', 'thr')->name('administrasi/thr');
    Route::get('administrasi/terlambat', 'terlambat')->name('administrasi/terlambat');
    Route::get('administrasi/bpjs', 'bpjs')->name('administrasi/bpjs');
    Route::get('administrasi/kupon', 'kupon')->name('administrasi/kupon');
    Route::get('administrasi/lembur', 'lembur')->name('administrasi/lembur');

    Route::get('/payroll/export_excel', 'exportPayroll')->name('/payroll/export_excel');
    Route::get('/payroll/export_excel_absensi', 'exportAbsenPayroll')->name('/payroll/export_excel_absensi');
    Route::post('getpayroll', 'getpayroll')->name('getpayroll');
    Route::post('generatePayroll', 'generatePayroll')->name('generatePayroll');
    Route::post('generateKaryawan', 'generateKaryawan')->name('generateKaryawan');
    Route::post('generateBPJS', 'generateBPJS')->name('generateBPJS');
    Route::post('/umr/update', 'updateumr')->name('/umr/update');
    Route::post('importPayroll', 'importPayroll')->name('importPayroll');
    Route::post('importAbsenPayroll', 'importAbsenPayroll')->name('importAbsenPayroll');
    Route::post('pilihFixAbsen', 'pilihFixAbsen')->name('pilihFixAbsen');
    Route::post('listBPJSKaryawan', 'listBPJSKaryawan');
    Route::post('pos/update', 'updatePos');
    Route::post('updateBPJS', 'updateBPJS');
    Route::post('bpjsupdate', 'updateUpahBpjs')->name('bpjsupdate');
    Route::post('administrasi/tambahanPayroll', 'uploadTambahanPayroll')->name('administrasi/tambahanPayroll');
    Route::post('administrasi/kelolalevel', 'kelolalevel')->name('administrasi/kelolalevel');
    Route::post('administrasi/tambahanAbsensi', 'uploadtambahanAbsensi')->name('administrasi/tambahanAbsensi');
    Route::post('/administrasi/updateTambahanPayroll', 'updateTambahanPayroll')->name('/administrasi/updateTambahanPayroll');
    Route::post('getSlipgaji', 'getSlipgaji');
    Route::post('rekapPayroll', 'rekapPayroll');
    Route::post('administrasi/printPayroll', 'printPayroll')->name('administrasi/printPayroll');
    Route::post('editLevelKaryawan', 'editLevelKaryawan');
    Route::post('storeUpdateLevelKaryawan', 'storeUpdateLevelKaryawan');

    Route::post('generateTunjangan', 'generateTunjangan');
});

// Modules Database
Route::controller(Database::class)->group(function () {
    Route::get('database/lokasi', 'lokasi')->name('database/lokasi');

    //data pengguna
    Route::get('database/pengguna', 'pengguna');
    Route::post('store/pengguna', 'store');
    Route::post('update/pengguna', 'update');
});
