@extends( 'components.layout' )

@section( 'content' )
<div class="jobs">

    <div class="title-wrapper">
        <h1>Jobs</h1>
        <a href="/admin/jobs/create" class="btn btn-primary">Create new job</a>
	</div>

    @foreach( $jobs as $job )

        @include( 'includes.job-card' )

    @endforeach

</div>

{{ $jobs->links() }}

@endsection
