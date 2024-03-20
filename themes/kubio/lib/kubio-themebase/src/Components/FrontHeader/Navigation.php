<?php


namespace Kubio\Theme\Components\FrontHeader;

use ColibriWP\Theme\Components\FrontHeader\NavBar;
use ColibriWP\Theme\Defaults;
use Kubio\Theme\Components\Common\NavigationStyle;

class Navigation extends NavBar {
	static $settings_prefix = 'front-header.navigation.';

	public static function style() {
		return NavigationStyle::getInstance( static::getPrefix(), static::selectiveRefreshSelector() );
	}

	// temporary, overwritten the function to disable overlap
	public function printNavigationClasses() {
		$classes = array();
		$prefix  = static::getPrefix();

		if ( $this->mod( "{$prefix}props.overlap", Defaults::get( "{$prefix}props.overlap", false ) ) ) {
			$classes[] = 'h-navigation_overlap';
		}
		if ( $width = $this->mod( "{$prefix}props.width", 'boxed' ) ) {
			$classes[] = "kubio-theme-nav-{$width}";
		}

		echo esc_attr( implode( ' ', $classes ) );
	}
}
