<?php
/**
 * Disabling Kirki's telemetry module so the data about users is not gathered.
 *
 * @package Salzburg Blog
 */
add_filter( 'kirki_telemetry', '__return_false' );
