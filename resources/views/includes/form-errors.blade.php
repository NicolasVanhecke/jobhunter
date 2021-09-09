<div class="error-wrapper">
    @if( $errors->any() )
        @foreach( $errors->all() as $error )
            <div class="alert alert-warning" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
</div>
