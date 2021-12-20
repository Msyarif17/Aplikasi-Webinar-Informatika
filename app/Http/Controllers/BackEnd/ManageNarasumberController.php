<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Narasumber;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ManageNarasumberController extends Controller
{
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Narasumber::query())
                ->addColumn('name', function (Narasumber $narasumber) {
                    return $narasumber->name;
                })
                ->addColumn('institusi', function (Narasumber $narasumber) {
                    return $narasumber->institusi;
                })
                ->addColumn('motivasi', function (Narasumber $narasumber) {
                    return $narasumber->motivation;
                })
                ->addColumn('action', function (Narasumber $narasumber) {

                    return \view('back-end.narasumber.button_action', compact('narasumber'));
                })
                ->addColumn('status', function (Narasumber $narasumber) {
                    if ($narasumber->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('back-end.narasumber.index');

        }
    }
    // public function index(Request $request)
    // {
    //     $data = Narasumber::orderBy('id','DESC')->paginate(5);
    //     return view('back-end.narasumber.index',compact('data'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('back-end.narasumber.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required',
            'institusi' => 'required',
            'motivation' => 'required',
            
        ]);
    
        $input = $request->all();
        
        $input['image'] = base64_encode(file_get_contents($request->file('image')->pat‌​h()));
        $narasumber = Narasumber::create($input);
        
    
        return redirect()->route('admin.manage-narasumber.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $narasumber = Narasumber::find($id);
        return view('back-end.narasumber.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $narasumber = Narasumber::find($id);
        return view('back-end.narasumber.edit',compact('narasumber'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required',
            'institusi' => 'required',
            'motivasi' => 'required',
            
        ]);
    
        $input = $request->all();
        $image = $request->file('image');
        $image->storeAs('public/image/', 'narasumber-'.$image->hashName());
        $input['image'] = '/image/narasumber-'.$image->hashName();
        $narasumber = Narasumber::find($id);
        $narasumber->update($input);
        
        $narasumber->assignRole('narasumber');
    
        return redirect()->route('admin.manage-narasumber.index')
                        ->with('success','Narasumber updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Narasumber::find($id)->delete();
        return redirect()->route('admin.manage-narasumber.index')
                        ->with('success','Narasumber deleted successfully');
    }
}
