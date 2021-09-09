@extends( 'components.layout' )

@section( 'content' )
<div class="companies">
    <h1>Company</h1>
    <div class="company">
        <h1>{{ $company->name }}</h1>
        <p>{{ $company->description }}</p>

        <div class="admin-actions-wrapper mt-4 pt-2">
            <a href="/admin/companies/{{ $company->id }}/edit" class="btn btn-warning mx-2">Edit</a>
            <form method="POST" action="/admin/companies/{{ $company->id }}/softDelete">
            	@csrf
            	@method('PUT')
            	<button type="submit" class="btn btn-danger">Delete {{ $company->name }}</button>
            </form>
        </div>
    </div>
</div>


<div class="jobs mt-5">
    <h1>All jobs at {{ $company->name }} ({{ $jobs->count() }})</h1>
    @foreach( $jobs as $job )

        @include( 'includes.job-card' )

    @endforeach
</div>
@endsection
