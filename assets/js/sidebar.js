( function( $ ) {

	var $window        = $( window ),
	    $sidebar       = $( '.side-masthead' ),
	    $body          = $( 'body' ),
	    lastWindowPos  = 0,
	    top            = false,
	    bottom         = false;

	$( document ).ready( function() {

		$( document ).on( 'scroll', scroll );
		$( window ).on( 'resize', scroll );

		for ( var i = 1; i < 6; i++ ) {

			setTimeout( scroll, 100 * i );

		}

	} );

	function scroll() {

		var windowPos   = $window.scrollTop(),
		    windowWidth = $window.width();

		if ( 881 > windowWidth ) {

			$sidebar.attr( 'style', 'top: 0;' );

			return;

		}

		$sidebar.attr( 'style', 'top: ' + $sidebar.offset().top + 'px;' );

		var windowHeight   = $window.height(),
		    bodyHeight     = $body.height(),
		    adminbarOffset = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0,
		    sidebarHeight  = 0;

		$sidebar.children().each( function() {

			sidebarHeight = sidebarHeight + $( this ).outerHeight( true );

		});

		if ( sidebarHeight + adminbarOffset > windowHeight ) {

			if ( windowPos > lastWindowPos ) {

				if ( top ) {

					top = false;

					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );

				} else if ( ! bottom && windowPos + windowHeight >= ( sidebarHeight + $sidebar.offset().top - 10 ) && sidebarHeight + adminbarOffset < bodyHeight ) {

					bottom = true;

					$sidebar.attr( 'style', 'position: fixed; bottom: 0; height: auto;' );

				}

			} else if ( windowPos < lastWindowPos ) {

				topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;

				if ( bottom ) {

					bottom = false;

					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );

				} else if ( ! top && windowPos + adminbarOffset < $sidebar.offset().top ) {

					top = true;

					$sidebar.attr( 'style', 'position: fixed; top: ' + adminbarOffset + 'px; height: 100%' );

				}

			} else {

				top = bottom = false;

				topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;

				$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );

			}

		} else if ( ! top ) {

			top = true;

			$sidebar.attr( 'style', 'position: fixed; height:100%' );

		}

		lastWindowPos = windowPos;

	}

} )( jQuery );
