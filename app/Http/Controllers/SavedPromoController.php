<?php

namespace App\Http\Controllers;

use App\Models\SavedPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SavedPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($id)
    {
        $check = DB::table('saved')
            ->where('id_user', '=', Session::get('id'))
            ->where('id_promo', '=', $id)->get();

        $post = DB::table('saved')->insert([
            'id_user'=>Session::get('id'),
            'id_promo'=>$id,
        ]);

        if ($post){
            return back()->with('successSaved', 'Saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavedPromo  $savedPromo
     * @return \Illuminate\Http\Response
     */
    public function show(SavedPromo $savedPromo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavedPromo  $savedPromo
     * @return \Illuminate\Http\Response
     */
    public function edit(SavedPromo $savedPromo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavedPromo  $savedPromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavedPromo $savedPromo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavedPromo  $savedPromo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('saved')->where('id', '=', $id)->delete();

        if ($delete){
            return back()->with('successRemove', 'You have deleted the promo from your saved promo list.');
        }
    }
}
