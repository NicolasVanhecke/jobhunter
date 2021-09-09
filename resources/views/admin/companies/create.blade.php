@extends( 'components.layout' )

@section( 'content' )
<div class="companies">
	<h1>Create new company</h1>

	@include( 'includes.form-errors' )

    <form method="post" action="/admin/companies">
        @csrf
        <div class="form-item mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Ex: Hermano Accountants">
        </div>
        <div class="form-item mb-3">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Ex: Accountancy & more">
        </div>

        <div class="form-item">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>

    </form>

</div>
@endsection
