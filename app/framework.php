<?php
/**
 * Boot the Framework
 *
 * @package   Camaraderie
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2017-2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/camaraderie
 */
# ------------------------------------------------------------------------------
# Create a new application.
# ------------------------------------------------------------------------------
#
# Creates the one true instance of the Hybrid Core application. You may access
# this instance via the `Backdrop\app()` function or `Backdrop\App` static class
# after the application has booted.
$camaraderie = Backdrop\booted() ? Backdrop\app() : new Backdrop\Core\Application();

# ------------------------------------------------------------------------------
# Register default service providers with the application.
# ------------------------------------------------------------------------------
#
# Before booting the application, default service providers that are necessary
# for running the theme. Service providers are essentially the backbone of the
# bootstrapping process.
$camaraderie->provider( Backdrop\FontAwesome\Provider::class );
$camaraderie->provider( Backdrop\Fonts\Provider::class );
$camaraderie->provider( Backdrop\Template\Provider::class );


# ------------------------------------------------------------------------------
# Register additional service providers with the theme.
# ------------------------------------------------------------------------------
#
# Before booting the application, add any additional service providers that are
# necessary for running the theme. Service providers are essentially the backbone
# of the bootstrapping process.
$camaraderie->provider( Camaraderie\Admin\Provider::class );
$camaraderie->provider( Camaraderie\Customize\Provider::class );
$camaraderie->provider( Camaraderie\Customize\Jetpack\Provider::class );
$camaraderie->provider( Camaraderie\Customize\Layouts\Provider::class );
$camaraderie->provider( Camaraderie\Mix\Provider::class );


/**
 * Boot the framework
 */
$camaraderie->boot();