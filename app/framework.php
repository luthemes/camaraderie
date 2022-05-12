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

/**
 * Create a new framework instance
 *
 * This will create an instance of the framework allowing you to initialize the theme.
 */
$camaraderie = new Benlumia007\Backdrop\Framework();

/**
 * Register Service Provider with the Framework
 */
$camaraderie->provider( Camaraderie\Menu\Provider::class );
$camaraderie->provider( Camaraderie\Sidebar\Provider::class );
$camaraderie->provider( Camaraderie\Customize\Provider::class );
$camaraderie->provider( Camaraderie\ThemeLayouts\Provider::class );
$camaraderie->provider( Camaraderie\Admin\Provider::class );
$camaraderie->provider( Camaraderie\Update\Provider::class );

/**
 * Boot the framework
 */
$camaraderie->boot();