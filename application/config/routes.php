<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['noticias'] = 'FrontOffice/noticias';
$route['eventosFinalizados'] = 'FrontOffice/eventosFinalizados';
$route['loggin'] = 'FrontOffice/usuarios/index';

$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


