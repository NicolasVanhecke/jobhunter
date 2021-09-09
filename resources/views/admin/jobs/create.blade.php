@extends( 'components.layout' )

@section( 'content' )
<div class="jobs">
	<h1>Create new job</h1>

	@include( 'includes.form-errors' )

    <form method="post" action="/admin/jobs">
        @csrf

        <div class="form-item mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title"
			placeholder="Ex: Webdeveloper" value="{{ old( 'title' ) }}">
        </div>

		<div class="form-item mb-3">
			<label for="company_id">Company</label>
			<select name="company_id" class="form-control">
				@if( !old( 'company_id' ) )
					<option value="" selected disabled hidden>Choose a company</option>
				@endif
				@foreach( $companies as $company )
					<option value="{{ $company->id }}" {{ ( old( 'company_id' ) === $company->id ) ? 'selected' : '' }}>{{ $company->name }}</option>
				@endforeach
            </select>
        </div>

		<div class="form-item mb-3">
			<label for="city_id">City</label>
			<select name="city_id" class="form-control">
				@if( !old( 'city_id' ) )
					<option value="" selected disabled hidden>Choose a city</option>
				@endif
				@foreach( $cities as $city )
					<option value="{{ $city->id }}" {{ ( old( 'city_id' ) === $city->id ) ? 'selected' : '' }}>{{ $city->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-item mb-3">
            <label for="intro">Intro</label>
            <input type="text" class="form-control" name="intro" id="intro"
			placeholder="Ex: Intro for job" value="{{ old( 'intro' ) }}">
        </div>

        <div class="form-item mb-3">
			<label for="description">Description</label>
    		<textarea class="form-control" name="description" id="description">{{ old( 'description' ) }}</textarea>
        </div>

        <div class="form-item mb-3">
            <label for="contact">Contact</label>
            <input type="email" class="form-control" name="contact" id="contact"
			placeholder="Ex: jobs@agency.be" value="{{ old( 'contact' ) }}">
        </div>

        <div class="form-item mb-3">
			<label for="type">Job type</label>
			<select name="type" class="form-control">
				<option value="" selected disabled hidden>Choose a job type</option>
                <option value="Blue Collar" {{ ( old( 'type' ) === 'Blue Collar' ) ? 'selected' : '' }}>Blue Collar</option>
                <option value="White Collar" {{ ( old( 'type' ) === 'White Collar' ) ? 'selected' : '' }}>White Collar</option>
            </select>
        </div>

        <div class="form-item">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>

    </form>

</div>
@endsection
