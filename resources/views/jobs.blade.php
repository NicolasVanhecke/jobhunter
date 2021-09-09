@extends( 'components.layout' )

@section( 'content' )
<div class="jobs">
    <h1>Jobs</h1>

    @foreach( $jobs as $job )
        <div class="job" data-type="{{ $job->type }}" data-city="{{ $job->city->name ?? 'unknown' }}" data-company="{{ $job->company->name ?? 'unknown' }}">
            <h1>{{ $job->title }}</h1>
            <p class="job-info">
                <i class="fas fa-location-arrow"></i> {{ $job->city->name ?? 'unknown' }}
                <i class="fas {{ $job->type === 'Blue Collar' ? 'fa-tools' : 'fa-briefcase' }}"></i> {{ $job->type }}
                <i class="fas fa-building"></i> {{ $job->company->name ?? 'unknown'  }}
            </p>
            <p>{{ $job->intro }}</p>
            <p>For more information contact <b>{{ $job->company->name ?? 'unknown' }}</b> at <a href=mailto:{{ $job->contact }}>{{ $job->contact }}</a></p>
            <a href="/jobs/{{ $job->id }}" class="btn btn-primary">More info</a>
        </div>
    @endforeach

    {{ $jobs->links() }}

</div>
@endsection
