<?php
/**
 * Backdrop Fonts
 * 
 * @package   Backdrop Fonts
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2019-2022. Benjamin Lu
 * @link      https://github.com/benlumia007/backdrop-fonts
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Backdrop\Fonts;
use Benlumia007\Backdrop\Contracts\Bootable;

class Component implements Bootable {
	/**
	 * Loads enqueue();
	 * 
	 * THe enqueue(); is used to define any scripts and styles that's going to be used part of a theme.
	 * 
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		/**
		 * This will load Fonts as part of the theme. Fira Sans, Merriweather, and Tangerine. For more information
		 * regarding this feature, please go to the following url. https://google-webfonts-helper.herokuapp.com/fonts
		 */
		array_map( function( $file ) {
			wp_enqueue_style( "backdrop-$file", get_parent_theme_file_uri( "/vendor/benlumia007/backdrop-fonts/fonts/$file.css" ) );
		}, [
			'fira-sans',
			'merriweather',
			'tangerine'
		] );
	}

	/**
	 * 
	 */
	public function boot() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
	}
}