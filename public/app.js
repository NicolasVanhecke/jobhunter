$( document ).ready( function(){
    console.log( 'ready' );
    // toggleCollarFilter();
    // selectCompanyFilter();
    // selectCityFilter();
});

$( document ).change( function(){
    console.log( 'change' );
    selectCompanyFilter();
    selectCityFilter();
});

function toggleCollarFilter(){
    $( '.job-filter-collar' ).on( 'click', function( e ) {
        $( this ).toggleClass( 'toggle-checked' );
        let selected = $( this ).attr( 'data-collar' );
        $( '.job' ).each( function( ){
            if( $( this ).attr( 'data-type' ) === selected ){
                $( this ).toggle();
            }
        });
    });
}

function selectCompanyFilter(){
    let selected = $( '#city-filter option:selected' ).val();
    console.log( selected );
    $( '.job' ).each( function( ){
        if( $( this ).attr( 'data-city' ) === selected ){
            $( this ).toggle();
        }
    });
    // $( '.job-filter-collar' ).on( 'click', function( e ) {
    //     $( this ).toggleClass( 'toggle-checked' );
    //     let selected = $( this ).attr( 'data-collar' );
    //     $( '.job' ).each( function( ){
    //         if( $( this ).attr( 'data-type' ) === selected ){
    //             $( this ).toggle();
    //             console.log( 'toggling' );
    //         }
    //     });
    // });
}

function selectCityFilter(){
    //
}
