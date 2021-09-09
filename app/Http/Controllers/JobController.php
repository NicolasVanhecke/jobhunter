<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\City;
use App\Models\Company;

use Illuminate\Support\Facades\DB;


class JobController extends Controller
{
    /**
     * TEMP FOR TESTING
     *     */
    public function home()
    {
        // return view( 'jobs', [
        //     'jobs' => Job::all()
        // ]);
    }

    /**
     * List all jobs.
     *
     * @return \Illuminate\View\View
     */
    public function listAllJobs()
    {
        return view( 'jobs', [
            'jobs' => Job::paginate( 10 ),
            'cities' => City::all(),
            'companies' => Company::all(),
        ])->with( 'success', 'Flash working.' );
    }

    /**
     * Show job details.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function jobDetails( $id )
    {
        return view( 'job', [
            'job' => Job::findOrFail( $id )
        ]);
        // return view( 'job', [
        //     'job' => Job::findOrFail( $id )
        // ]);
    }
}
