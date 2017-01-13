( function( $ ) {

	var $window        = $( window ),
			$sidebar       = $( '.side-masthead' ),
			$sidebarInner  = $( '.side-masthead-inner' ),
			$body          = $( 'body' ),
			windowWidth    = $window.width(),
			lastWindowPos  = 0,
			top            = false,
			bottom         = false;

	$( document ).ready( function() {

		$( document ).scroll( scroll );

	} );

	function scroll() {

		var windowPos = $window.scrollTop();

		if ( 955 > windowWidth ) {

			return;

		}

		var windowHeight   = $window.height(),
		    bodyHeight     = $body.height(),
		    adminbarOffset = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0,
				sidebarHeight  = $sidebarInner.height() + 40;

		if ( sidebarHeight + adminbarOffset > windowHeight ) {

			if ( windowPos > lastWindowPos ) {

				if ( top ) {

					top = false;

					topOffset = ( $sidebarInner.offset().top > 0 ) ? $sidebarInner.offset().top - adminbarOffset : 0;

					$sidebarInner.attr( 'style', 'top: ' + topOffset + 'px;' );

				} else if ( ! bottom && windowPos + windowHeight > ( sidebarHeight + 20 ) + $sidebar.offset().top && sidebarHeight + adminbarOffset < bodyHeight ) {

					bottom = true;

					$sidebarInner.attr( 'style', 'position: fixed; width: 180px; bottom: 0;' );

				}

			} else if ( windowPos < lastWindowPos ) {

				if ( bottom ) {

					bottom = false;

					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;

					$sidebarInner.attr( 'style', 'position: fixed; width: 180px; bottom: 0;' );

				} else if ( ! top && windowPos + adminbarOffset < $sidebarInner.offset().top ) { // not correct

					top = true;

					$sidebarInner.attr( 'style', 'position: relative;' );

				}

			} else {

				top = bottom = false;

				topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;

				$sidebarInner.attr( 'style', 'top: ' + topOffset + 'px;' );

			}

		} else if ( ! top ) {

			top = true;

			$sidebar.attr( 'style', 'position: fixed; margin-top:' + adminbarOffset + 'px' );

		}

		lastWindowPos = windowPos;

	}

} )( jQuery );
