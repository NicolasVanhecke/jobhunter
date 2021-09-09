<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Job;

use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'admin/companies/index', [
            'companies' => Company::paginate( 10 )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin/companies/create' );
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
            'description' => 'required'
        ]);

        if( $validator->fails() ){
            return redirect()->route( 'companies.create' )
                        ->withErrors( $validator )
                        ->withInput()
                        ->with( 'danger', 'Company could not be created.' );
        }

        $company = new Company;
        $company->name = $request->name;
        $company->description = $request->description;
        $company->save();

        return redirect()->route( 'companies.index' )->with( 'success', 'New company created.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view( 'admin/companies/show', [
            'jobs' => Job::where( 'company_id', $id )->get(),
            'company' => Company::findOrFail( $id )
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
        return view( 'admin/companies/edit', [
            'company' => Company::findOrFail( $id )
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
            'name' => 'required',
            'description' => 'required'
        ]);

        if( $validator->fails() ){
            return redirect()->route( 'companies.edit', $id )
                            ->withErrors( $validator )
                            ->withInput()
                            ->with( 'danger', 'Company could not be updated.' );
        }

        $company = Company::findOrFail( $id );
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->save();

        return redirect()->route( 'companies.show', [
            'company' => $company
        ])->with( 'success', 'Company updated.' );
    }

    /**
     * Marks item in database as deleted, but keeps record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete( $id )
    {
        // Soft delete the company
        $company = Company::findOrFail( $id );
        $company->deleted_at = '2021-09-07 10:24:04';
        $company->save();

        // Find all jobs linked to this company, and remove the company_id foreignKey
        Job::where( 'company_id', $id )->update( [ 'company_id' => null ] );

        return redirect()->route( 'companies.index' )->with( 'info', 'Company deleted.' );
    }
}
