<?php

namespace App\Http\Controllers\BackEnd;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Moderator;
use App\Models\Narasumber;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ZoomOauthController;

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
                    return Carbon::parse($Jadwal->jadwal)->format('l, d F Y, H:m A');
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
    public function create(){
        $narasumber = Narasumber::pluck('name','id')->all();
        $moderator = Moderator::pluck('name','id')->all();
        return view('back-end.webinar.create',compact('narasumber','moderator'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'thumbnail' => 'required',
            'deskripsi' => 'required',
            'narasumber_id' => 'required',
            'moderator_id' => 'required',
            'jadwal' => 'required',
        ]);
        $input = $request->all();
        $image = $request->file('thumbnail');
        $input['thumbnail'] = base64_encode(file_get_contents($request->file('thumbnail')));
        $generateLinkZoom = new ZoomOauthController;
        $input['link'] = $generateLinkZoom->generateLinkZoom($request->judul,$input['jadwal']);
        $input['narasumber_id'] = implode("",$request->narasumber_id);
        $input['moderator_id'] = implode("",$request->moderator_id);
        
        Jadwal::create($input);
    
        return redirect()->route('admin.manage-jadwal.index')
                         ->with('success','Webinar created successfully');
    }
    public function edit($id)
    {
        $narasumber = Narasumber::pluck('name','id')->all();
        $moderator = Moderator::pluck('name','id')->all();
        $webinar = Jadwal::find($id);
        return view('back-end.webinar.edit',compact('webinar','narasumber','moderator'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'thumbnail' => 'required',
            'deskripsi' => 'required',
            'narasumber_id' => 'required',
            'moderator_id' => 'required',
            'jadwal' => 'required',
        ]);
        $input = $request->all();
        $image = $request->file('thumbnail');
        
        $input['thumbnail'] = base64_encode(file_get_contents($request->file('thumbnail')));
        
        $input['narasumber_id'] = implode("",$request->narasumber_id);
        $input['moderator_id'] = implode("",$request->moderator_id);
        
        Jadwal::find($id)->update($input);
    
        return redirect()->route('admin.manage-jadwal.index')
                         ->with('success','Webinar created successfully');
    }
    public function destroy($id)
    {
        
        Jadwal::find($id)->delete();
        return redirect()->route('admin.manage-jadwal.index')
                        ->with('success','Webinar deleted successfully');
    }
    public function restore($id){
        Jadwal::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.manage-jadwal.index')->with('message', 'Sukses restore data');
    }
    
}
