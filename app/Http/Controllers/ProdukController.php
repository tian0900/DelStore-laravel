<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user['listUser'] = Produk::all();
        return view('produk')->with($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());die();

       
        $info = new Produk();
        $info->name = $request->name;
        $info->harga = $request->harga;
        $info->deskripsi = $request->deskripsi;
        $info->category_id = $request->category_id;
        if ($request->hasFile('image')){
            $file= $request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/produk',$file);
            $info->image = $file;
        } 
        $info -> save();
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = Produk::find($id);
        return view('editproduk',compact('update'));
    }

    public function update(request $request, $id){
        $update = Produk::find($id);
            $file = $update->image;
            if ($request->hasFile('image')){
                $file= $request->file('image')->getClientOriginalName();
                $request->file('image')->move('images/produk',$file);
                $update->image = $file;
            }   
            $update->name= $request->name;
            $update->harga= $request->harga;
            $update->image = $file;
            $update->deskripsi = $request->deskripsi;
            $update -> save();
           
            return redirect('/produk    ');         
    
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
    public function delete($id)
    {
        $delete = Produk::find($id);
        if($delete->delete()){}
          return redirect()->back();
    }

}
