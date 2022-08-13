<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataPromo = DB::table('promo')
                ->find($id);

        return view('frontOffice.detailPromo', compact('dataPromo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('promo')
            ->first();

        $dataPromo = [
            'dataPromo' => $data
        ];

//        dd($dataPromo);

        return view('backOffice.editPromo', $dataPromo);
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
        $query = DB::table('promo')
            ->where('id', '=', $id)
            ->update([
                'name' => $request->input('name'),
                'id_website' => $request->input('provider'),
                'description' => $request->input('description'),
            ]);

        return redirect('/promo')->with('success', 'Update promo success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::table('promo')->where('id', $id)->delete();
        return redirect('/promo')->with('success', 'Delete user success');
    }

    public function expire()
    {
        $query = DB::table('promo')->where('end_date', '<=', Carbon::now()->toDateString())->
            where('end_date', '!=', '')->
            delete();
//        echo Carbon::now()->toDateString();
        return redirect('/');
    }
}
