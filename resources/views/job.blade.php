@extends( 'components.layout' )

@section( 'content' )
<div class="jobs">
    <h1>{{ $job->title }}</h1>
    <div class="job">
        <p class="job-info">
            <i class="fas fa-location-arrow"></i> {{ $job->city->name ?? 'unknown' }}
            <i class="fas {{ $job->type === 'Blue Collar' ? 'fa-tools' : 'fa-briefcase' }}"></i> {{ $job->type }}
            <i class="fas fa-building"></i> {{ $job->company->name ?? 'unknown' }}
        </p>
        <p>{{ $job->intro }}</p>
        <p>{{ $job->description }}</p>
        <p>For more information contact <b>{{ $job->company->name ?? 'unknown' }}</b> at <a href=mailto:{{ $job->contact }}>{{ $job->contact }}</a></p>
        <a href="/jobs" class="btn btn-primary">Back to all jobs</a>
    </div>
</div>
@endsection
