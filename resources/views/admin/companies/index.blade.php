@extends( 'components.layout' )

@section( 'content' )
<div class="companies">
	<div class="title-wrapper">
		<h1>Companies</h1>
		<a href="/admin/companies/create" class="btn btn-primary">Create new company</a>
	</div>

	<div class="company-flex-wrapper">
	    @foreach( $companies as $company )
			<div class="company">
	            <h1>{{ $company->name }}</h1>
	            <p>{{ $company->description }}</p>
				<a href="/admin/companies/{{ $company->id }}" class="btn btn-primary">More info</a>
	        </div>
	    @endforeach
	</div>

</div>

{{ $companies->links() }}

@endsection
