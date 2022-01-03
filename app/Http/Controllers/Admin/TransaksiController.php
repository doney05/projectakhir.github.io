<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransaksiRequest;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\TravelPackage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Transaksi::with([
            'details', 'travel_package'
        ])->get();

        return view('pages.admin.transaksi.index',[
            'items' => $items
        ]);

        // $items = Transaksi::with([
        //     'details', 'travel_package', 'user'
        // ])->get();
        // if ($request->ajax()) {
        //     return Datatables::of($items)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($data){
        //             $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="fa fa-pencil-alt"></i></a>';
        //                     $button .= '&nbsp;&nbsp;';
        //                     $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';     
        //                     return $button;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // return view('pages.admin.transaksi');
    
    }
    public function create()
    {
        $travel_packages = TravelPackage::all();
        return view('pages.admin.transaksi.create',[
            'travel_packages' => $travel_packages
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiRequest $request)
    {
        $data = $request -> all();
        $data['slug'] = Str::slug($request->title);

        Transaksi::create($data);

        return redirect()->route('transaction.index');

        // $id = $request->id;
        
        // $post   =  Transaksi::updateOrCreate(['id' => $id],
        //             [
        //                 'title' => $request->title,
        //                 'location' => $request->location,
        //                 'departure_date' => $request->departure_date,
        //                 'duration' => $request->duration,
        //                 'type' => $request->type,
        //                 'price' => $request->price
        //             ]); 

        // return response()->json($post);
    }

    public function update(TransaksiRequest $request, $id)
    {
        $data = $request -> all();
        $data['slug'] = Str::slug($request->title);

        $item = Transaksi::findOrFail($id);
        $item->update($data);
        return redirect()->route('transaction.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Request $request)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $where = array('id' => $id);
        $item  = Transaksi::with([
            'details', 'travel_package'
        ])->findOrFail($id);
     
        return view('pages.admin.transaksi.detail',[
            'item' =>$item
        ]);
        // return response()->json($post);
    }

    public function edit($id)
    {
        $item = Transaksi::findOrFail($id);
        return view('pages.admin.transaksi.edit', compact('item'));
        // $where = array('id' => $id);
        // $post  = Transaksi::where($where)->first();
     
        // return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = Transaksi::where('id',$id)->delete();
     
        // return response()->json($post);
        $item = Transaksi::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }
}
