@extends( 'components.layout' )

@section( 'content' )
<div class="cities">
	<h1>City</h1>
    <div class="city">
        <h1>{{ $city->name }}</h1>
        <p>{{ $city->state }} | {{ $city->postcode }}</p>

		<div class="admin-actions-wrapper mt-4 pt-2">
			<a href="/admin/cities/{{ $city->id }}/edit" class="btn btn-warning mx-2">Edit</a>
			<form method="POST" action="/admin/cities/{{ $city->id }}/softDelete">
				@csrf
				@method('PUT')
				<button type="submit" class="btn btn-danger">Delete {{ $city->name }}</button>
			</form>
    	</div>
    </div>
</div>


<div class="jobs mt-5">
    <h1>All jobs in {{ $city->name }} ({{ $jobs->count() }})</h1>
    @foreach( $jobs as $job )

		@include( 'includes.job-card' )

	@endforeach
</div>
@endsection
