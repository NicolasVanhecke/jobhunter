@extends( 'components.layout' )

@section( 'content' )
<div class="cities">
	<h1>Create new city</h1>

	@include( 'includes.form-errors' )

    <form method="post" action="/admin/cities">
        @csrf
        <div class="form-item mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Ex: New York City">
        </div>
        <div class="form-item mb-3">
            <label for="state">State</label>
            <input type="text" class="form-control" name="state" id="state" placeholder="Ex: New York">
        </div>
        <div class="form-item mb-3">
            <label for="postcode">Postcode</label>
            <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Ex: 10001">
        </div>

        <div class="form-item">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>

    </form>

</div>
@endsection
