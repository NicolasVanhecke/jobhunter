<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Job;

use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'admin/cities/index', [
            'cities' => City::paginate( 10 )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin/cities/create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'name' => 'required',
            'state' => 'required',
            'postcode' => 'required'
        ]);

        if( $validator->fails() ){
            return redirect()->route( 'admin/cities/create' )
                        ->withErrors( $validator )
                        ->withInput()
                        ->with( 'danger', 'City could not be created.' );
        }

        $city = new City;
        $city->name = $request->name;
        $city->state = $request->state;
        $city->postcode = $request->postcode;
        $city->save();

        return redirect()->route( 'cities.index' )->with( 'success', 'New city created.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        // dd(Job::where( 'city_id', $id )->get());
        return view( 'admin/cities/show', [
            'jobs' => Job::where( 'city_id', $id )->get(),
            'city' => City::findOrFail( $id )
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        return view( 'admin/cities/edit', [
            'city' => City::findOrFail( $id )
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $validator = Validator::make( $request->all(), [
            'name' => 'required',
            'state' => 'required',
            'postcode' => 'required'
        ]);

        if( $validator->fails() ){
            return redirect()->route( 'cities.edit', $id )
                            ->withErrors( $validator )
                            ->withInput()
                            ->with( 'danger', 'City could not be updated.' );
        }

        $city = City::findOrFail( $id );
        $city->name = $request->input('name');
        $city->state = $request->input('state');
        $city->postcode = $request->input('postcode');
        $city->save();

        return redirect()->route( 'cities.show', [
            'city' => $city
        ])->with( 'success', 'City updated.' );
    }

    /**
     * Marks item in database as deleted, but keeps record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete( $id )
    {
        // Soft delete the city
        $city = City::findOrFail( $id );
        $city->deleted_at = '2021-09-07 10:24:04';
        $city->save();

        // Find all jobs linked to this city, and remove the city_id foreignKey
        Job::where( 'city_id', $id )->update( [ 'city_id' => null ] );

        return redirect()->route( 'cities.index' )->with( 'info', 'City deleted.' );
    }
}
