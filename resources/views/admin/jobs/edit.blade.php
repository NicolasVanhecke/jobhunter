@extends( 'components.layout' )

@section( 'content' )
<div class="jobs">
	<h1>Edit {{ $job->name }}</h1>

	@include( 'includes.form-errors' )

    <form method="post" action="/admin/jobs/{{ $job->id }}">
        @csrf
		@method('PUT')

		<div class="form-item mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $job->title }}">
        </div>

		<div class="form-item mb-3">
			<label for="contact">Company</label>
			<select name="company_id" id="company_id" class="form-control">
				@foreach( $companies as $company )
					<option value="{{ $company->id }}" {{ ( $company->id === $job->company_id ) ? 'selected' : '' }}>{{ $company->name }}</option>
				@endforeach
            </select>
        </div>

		<div class="form-item mb-3">
			<label for="contact">City</label>
			<select name="city_id" class="form-control">
				@foreach( $cities as $city )
					<option value="{{ $city->id }}" {{ ( $city->id === $job->city_id ) ? 'selected' : '' }}>{{ $city->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-item mb-3">
            <label for="intro">Intro</label>
            <input type="text" class="form-control" name="intro" id="intro" value="{{ $job->intro }}">
        </div>

        <div class="form-item mb-3">
			<label for="description">Description</label>
    		<textarea class="form-control" name="description" id="description">{{ $job->description }}</textarea>
        </div>

        <div class="form-item mb-3">
            <label for="contact">Contact</label>
            <input type="email" class="form-control" name="contact" id="contact" value="{{ $job->contact }}">
        </div>

        <div class="form-item mb-3">
			<label for="type">Job type</label>
			<select name="type" class="form-control">
				<option value="" selected disabled hidden>Choose a job type</option>
                <option value="Blue Collar" {{ ( $job->type === 'Blue Collar' ) ? 'selected' : '' }}>Blue Collar</option>
                <option value="White Collar" {{ ( $job->type == 'White Collar' ) ? 'selected' : '' }}>White Collar</option>
            </select>
        </div>

        <div class="form-item">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>

</div>
@endsection
