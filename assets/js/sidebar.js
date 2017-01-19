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

		var windowHeight   = $window.height(),
		    bodyHeight     = $body.height(),
		    adminbarOffset = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0,
		    sidebarHeight  = 0,
		    topOffset      = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;

		$sidebar.children().each( function() {

			sidebarHeight = sidebarHeight + $( this ).outerHeight( true );

		});

		if ( sidebarHeight + adminbarOffset > windowHeight ) {

			if ( windowPos > lastWindowPos ) {

				if ( top ) {

					top = false;

					$sidebar.attr( 'style', 'top: ' + topOffset + 'px; height: ' + sidebarHeight + 'px;' );

				} else if ( ! bottom && windowPos + windowHeight >= ( sidebarHeight + $sidebar.offset().top - 10 ) && sidebarHeight + adminbarOffset < bodyHeight ) {

					bottom = true;

					$sidebar.removeAttr( 'style' ).attr( 'style', 'position: fixed; bottom: 0; height: auto;' );

				}

			} else if ( windowPos < lastWindowPos ) {

				if ( bottom ) {

					bottom = false;

					$sidebar.attr( 'style', 'top: ' + topOffset + 'px; height: ' + sidebarHeight + 'px;' );

				} else if ( ! top && windowPos + adminbarOffset < $sidebar.offset().top ) {

					top = true;

					$sidebar.attr( 'style', 'position: fixed; top: ' + adminbarOffset + 'px; height: ' + sidebarHeight + 'px;' );

				}

			} else {

				var height = ( sidebarHeight + adminbarOffset > bodyHeight + adminbarOffset ) ? 'auto' : '100%';

				top = bottom = false;

				$sidebar.attr( 'style', 'top: ' + topOffset + 'px; height: ' + height + ';' );

			}

		} else if ( ! top ) {

			top = true;

			$sidebar.attr( 'style', 'position:fixed;' );

		}

		lastWindowPos = windowPos;

	}

} )( jQuery );
