<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\City;
use App\Models\Company;

use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'admin/jobs.index', [
            'jobs' => Job::paginate( 10 ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin/jobs/create', [
            'cities' => City::all(),
            'companies' => Company::all()
        ]);
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
            'title' => 'required',
            'company_id' => 'required',
            'city_id' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'contact' => 'required|email',
            'type' => 'required'
        ]);

        if( $validator->fails() ){
            return redirect()->route( 'admin/jobs/create' )
                        ->withErrors( $validator )
                        ->withInput()
                        ->with( 'danger', 'Job could not be created.' );
        }

        // Job::create( $request );
        $job = new Job;
        $job->title = $request->title;
        $job->company_id = $request->company_id;
        $job->city_id = $request->city_id;
        $job->intro = $request->intro;
        $job->description = $request->description;
        $job->contact = $request->contact;
        $job->type = $request->type;
        $job->save();

        return redirect()->route( 'jobs.index' )->with( 'success', 'New job created.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view( 'admin/jobs/show', [
            'job' => Job::findOrFail( $id ),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view( 'admin/jobs/edit', [
            'job' => Job::findOrFail( $id ),
            'companies' => Company::all(),
            'cities' => City::all(),
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
        $validator = Validator::make( $request->all(), [
            'title' => 'required',
            'company_id' => 'required',
            'city_id' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'contact' => 'required|email',
            'type' => 'required'
        ]);

        if( $validator->fails() ){
            return redirect()->route( 'jobs.edit', [
                'job' => Job::findOrFail( $id ),
                'companies' => Company::all(),
                'cities' => City::all(),
            ] )
                            ->withErrors( $validator )
                            ->withInput()
                            ->with( 'danger', 'Job could not be updated.' );
        }

        $job = Job::findOrFail( $id );
        $job->title = $request->input('title');
        $job->company_id = $request->input('company_id');
        $job->city_id = $request->input('city_id');
        $job->intro = $request->input('intro');
        $job->description = $request->input('description');
        $job->contact = $request->input('contact');
        $job->type = $request->input('type');
        $job->save();

        return redirect()->route( 'jobs.show', [
            'job' => $job
        ])->with( 'success', 'Job updated.' );
    }

    /**
     * Marks item in database as deleted, but keeps record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete( $id )
    {
        $job = Job::findOrFail( $id );
        $job->deleted_at = '2021-09-07 10:24:04';
        $job->save();

        return redirect()->route( 'jobs.index' )->with( 'info', 'Job deleted.' );
    }
}
