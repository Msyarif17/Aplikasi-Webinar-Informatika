<?php

namespace App\Http\Controllers\BackEnd;
use App\Models\Jadwal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManageJadwalController extends Controller
{
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Jadwal::with([
                'narasumber' => function($query){
                    return $query->withTrashed();
                }])->withTrashed())
                ->addColumn('judul', function (Jadwal $Jadwal) {
                    return $Jadwal->judul;
                })
                ->addColumn('narasumber_name', function (Jadwal $Jadwal) {
                    return $Jadwal->narasumber->name;
                })
                ->addColumn('jadwal', function (Jadwal $Jadwal) {
                    return $Jadwal->jadwal;
                })
                ->addColumn('action', function (Jadwal $Jadwal) {

                    return \view('back-end.webinar.button_action', compact('Jadwal'));
                })
                ->addColumn('status', function (Jadwal $Jadwal) {
                    if ($Jadwal->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('back-end.webinar.index');

        }
    }
}
