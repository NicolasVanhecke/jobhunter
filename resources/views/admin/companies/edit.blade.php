@extends( 'components.layout' )

@section( 'content' )
<div class="companies">
	<h1>Edit {{ $company->name }}</h1>

	@include( 'includes.form-errors' )

    <form method="post" action="/admin/companies/{{ $company->id }}">
        @csrf
		@method('PUT')
        <div class="form-item mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $company->name }}">
        </div>
        <div class="form-item mb-3">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $company->description }}">
        </div>

        <div class="form-item">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>

</div>
@endsection
