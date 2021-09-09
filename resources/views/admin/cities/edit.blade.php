@extends( 'components.layout' )

@section( 'content' )
<div class="cities">
	<h1>Edit {{ $city->name }}</h1>

	@include( 'includes.form-errors' )

    <form method="post" action="/admin/cities/{{ $city->id }}">
        @csrf
		@method('PUT')
        <div class="form-item mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $city->name }}">
        </div>
        <div class="form-item mb-3">
            <label for="state">State</label>
            <input type="text" class="form-control" name="state" id="state" value="{{ $city->state }}">
        </div>
        <div class="form-item mb-3">
            <label for="postcode">Postcode</label>
            <input type="text" class="form-control" name="postcode" id="postcode" value="{{ $city->postcode }}">
        </div>

        <div class="form-item">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>

</div>
@endsection
