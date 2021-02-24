/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should be filtered through this file 
 * and eventually saved back into the `/assets/js/app.js` file.
 *
 * @package   Initiator
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2019-2020 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/benlumia007/initiator
 */

/**
 * A simple immediately-invoked function expression to kick-start
 * things and encapsulate our code.
 *
 * @since  1.0.0 
 * @access public
 * @return void
 */
( function( $ ) {
	// Hide/show toggle button on scroll

	var position, direction, previous;

	$(window).scroll(function(){
		if( $(this).scrollTop() >= position ){
			direction = 'down';
			if(direction !== previous){
				$('.menu-toggle').addClass('hide');

				previous = direction;
			}
		} else {
			direction = 'up';
			if(direction !== previous){
				$('.menu-toggle').removeClass('hide');

				previous = direction;
			}
		}
		position = $(this).scrollTop();
	});
} )( jQuery );