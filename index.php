<?php
/**
 * Index template.
 *
 * This template should never be loaded on a site unless a plugin is doing
 * something that it shouldn't be doing or something weird is going on. We're
 * leaving the below code as an absolute fallback in case this file is loaded.
 * All it does is correctly load up our `public/views/index.php` template.
 * 
 * @package   Camaraderie
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/camaraderie
 */

// Access the view template engine.
$engine = Benlumia007\Backdrop\App::resolve( 'view/engine' );

// Load the index template.
$engine->display( 'index' );