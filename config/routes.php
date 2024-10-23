<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(
	'/test' => 'test#index',
	'/' => 'task#index',
	'/lang' => 'task#lang',
	'/create' => 'task#create',
	'/read' => 'task#read',
	'/update' => 'task#update',
	'/delete' => 'task#delete',
	'/add' => 'task#add',
	'/confirmUpdate' => 'task#confirmUpdate',
	'/updateTask' => 'task#taskUpdate',
	'/deleteTask' => 'task#taskDelete',
	'/confirmDelete' => 'task#confirmDelete',
	'/success' => 'task#success',
	'/successUpdate' => 'task#successUpdate',
	'/successDelete' => 'task#successDelete',
);
