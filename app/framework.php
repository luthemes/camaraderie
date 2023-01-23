<?php
/**
 * Camaraderie ( framework.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
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
$camaraderie->provider( Camaraderie\Menu\Provider::class );
$camaraderie->provider( Camaraderie\Mix\Provider::class );
$camaraderie->provider( Camaraderie\Sidebar\Provider::class );
$camaraderie->provider( Camaraderie\ThemeLayouts\Provider::class );


/**
 * Boot the framework
 */
$camaraderie->boot();