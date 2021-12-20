<?php

namespace App\Http\Controllers\BackEnd;

use Carbon\Carbon;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
class ManageLaporanController extends Controller
{
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Jadwal::with([
                'narasumber' => function($query){
                    return $query->withTrashed();       
                },
                'peserta' => function($query){
                    return $query;       
                }
                ])->withTrashed())
                ->addColumn('judul', function (Jadwal $Jadwal) {
                    return $Jadwal->judul;
                })
                ->addColumn('narasumber_name', function (Jadwal $Jadwal) {
                    return $Jadwal->narasumber->name;
                })
                ->addColumn('jumlah_peserta', function (Jadwal $Jadwal) {
                    return $Jadwal->peserta->count();
                })
                ->addColumn('jadwal', function (Jadwal $Jadwal) {
                    return Carbon::parse($Jadwal->jadwal)->format('l, d F Y, H:m A');
                })
                ->make(true);
        } else {
            return view('back-end.laporan.index');

        }
    }
}
