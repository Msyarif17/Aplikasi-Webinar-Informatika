<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Moderator;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ManageModeratorController extends Controller
{
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Moderator::query())
                ->addColumn('name', function (Moderator $moderator) {
                    return $moderator->name;
                })
                ->addColumn('action', function (Moderator $moderator) {

                    return \view('back-end.moderator.button_action', compact('moderator'));
                })
                ->addColumn('status', function (Moderator $moderator) {
                    if ($moderator->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('back-end.moderator.index');

        }
    }
    // public function index(Request $request)
    // {
    //     $data = Moderator::orderBy('id','DESC')->paginate(5);
    //     return view('back-end.moderator.index',compact('data'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('back-end.moderator.create');
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
            'name' => 'required',
            
        ]);
    
        $input = $request->all();
        
    
        $moderator = Moderator::create($input);
        
    
        return redirect()->route('admin.manage-moderator.index')
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
        $moderator = Moderator::find($id);
        return view('back-end.moderator.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moderator = Moderator::find($id);
        return view('back-end.moderator.edit',compact('User','roles','userRole'));
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
            'name' => 'required',
            'institusi' => 'required',
            'motivasi' => 'required',
            
        ]);
    
        $input = $request->all();
        
    
        $moderator = Moderator::find($id);
        $moderator->update($input);
        
        $moderator->assignRole('Moderator');
    
        return redirect()->route('admin.manage-Moderator.index')
                        ->with('success','Moderator updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Moderator::find($id)->delete();
        return redirect()->route('admin.manage-Moderator.index')
                        ->with('success','Moderator deleted successfully');
    }
}
