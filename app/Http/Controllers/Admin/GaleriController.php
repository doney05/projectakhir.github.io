<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use App\Http\Requests\GaleriRequest;
use Illuminate\Contracts\Cache\Store;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Galeri::with(['travel_package'])
        ->get();
        
        return view('pages.admin.galeri-travel.galeri-travel', [
            'items' => $items
        ]);
    //     $items = Galeri::get();
    //     if ($request->ajax()) {
    //         return DataTables::of($items)
    //         ->addIndexColumn()
    //         ->addColumn('action', function($data){
    //             $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="fa fa-pencil-alt"></i></a>';
    //             $button .= '&nbsp;&nbsp;';
    //             $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';     
    //             return $button;
    //     })
    //     ->rawColumns(['action'])
    //     ->make(true);
    //    }
    //     return view('pages.admin.galeri-travel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages =TravelPackage::all();
        return view('pages.admin.galeri-travel.create',[
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriRequest $request)
    {
        $data = $request -> all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );
        Galeri::create($data);
        return redirect()->route('galeri-travel.index');
        // $item
        // $id = $request->id;

        // $post = Galeri::updateOrCreate(['id' => $id],
        // [
        //     'paket_travel' => $request->paket_travel,
        //     'image' => $request->file('image')->st
            
        // ]);
        // return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Galeri::findOrFail($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.galeri-travel.edit', [
            'item' => $item,
            'travel_packages' => $travel_packages
        ]);
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
        $data = $request -> all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = Galeri::findOrFail($id);

        $item->update($data);

        return redirect()->route('galeri-travel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);
        $item->delete();
        
        return redirect()->route('galeri-travel.index');
    }
}
