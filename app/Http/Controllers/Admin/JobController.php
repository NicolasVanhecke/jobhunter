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
        // Validate the form
        $validator = $this->formValidator( $request );

        if( $validator->fails() ){
            return redirect()->route( 'admin/jobs/create' )
                        ->withErrors( $validator )
                        ->withInput()
                        ->with( 'danger', 'Job could not be created.' );
        }

        // Create the job
        $job = new Job;
        $this->save( $job, $request );

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
        // Validate the form
        $validator = $this->formValidator( $request );

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

        // Find the job and update
        $job = Job::findOrFail( $id );
        $this->save( $job, $request );

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

    /**
     * Validate form request.
     *
     * @param  Request  $request
     * @return object
     */
    private function formValidator( $request ){
        return Validator::make( $request->all(), [
            'title' => 'required',
            'company_id' => 'required',
            'city_id' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'contact' => 'required|email',
            'type' => 'required'
        ]);
    }

    /**
     * Saves the job for create and update.
     *
     * @param  Job  $job
     * @param  Request  $request
     */
    private function save( Job $job, Request $request ){
        $job->title = $request->input('title');
        $job->company_id = $request->input('company_id');
        $job->city_id = $request->input('city_id');
        $job->intro = $request->input('intro');
        $job->description = $request->input('description');
        $job->contact = $request->input('contact');
        $job->type = $request->input('type');
        $job->save();
    }
}
