@extends( 'components.layout' )

@section( 'content' )
<div class="cities">

	<div class="title-wrapper">
		<h1>Cities</h1>
		<a href="/admin/cities/create" class="btn btn-primary">Create new city</a>
	</div>

	<div class="city-flex-wrapper">
	    @foreach( $cities as $city )
	        <div class="city">
	            <h1>{{ $city->name }}</h1>
	            <p>{{ $city->state }} | {{ $city->postcode }}</p>
				<a href="/admin/cities/{{ $city->id }}" class="btn btn-primary">More info</a>
	        </div>
	    @endforeach
	</div>
</div>

{{ $cities->links() }}

@endsection
