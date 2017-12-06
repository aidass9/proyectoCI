<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['noticias'] = 'FrontOffice/noticias';
$route['eventosfinalizados'] = 'FrontOffice/eventosFinalizados';
$route['loggin'] = 'FrontOffice/usuarios/index';
$route['registrar-usuario'] = 'FrontOffice/usuarios/panelCrearUsuario';
$route['evento/(:any)'] = 'FrontOffice/eventosFinalizados/detalle/$1';

/* BACKOFFICE */
$route['backoffice'] = 'BackOffice/BackOfficeInicio';

/* BACKOFFICE EVENTOS*/
$route['backoffice/eventos/(:any)'] = 'BackOffice/BackOfficeEventos/index/$1';
$route['backoffice/eventos'] = 'BackOffice/BackOfficeEventos/index';
$route['backoffice/evento/crear'] = 'BackOffice/BackOfficeEventos/panelCrear';
$route['backoffice/evento/editar/(:any)'] = 'BackOffice/BackOfficeEventos/panelEditar/$1';

/* BACKOFFICE USUARIOS*/
$route['backoffice/usuarios/(:any)'] = 'BackOffice/BackOfficeUsuarios/index/$1';
$route['backoffice/usuarios'] = 'BackOffice/BackOfficeUsuarios/index';
$route['backoffice/usuario/crear'] = 'BackOffice/BackOfficeUsuarios/panelCrear';
$route['backoffice/usuario/editar/(:any)'] = 'BackOffice/BackOfficeUsuarios/panelEditar/$1';

/* BACKOFFICE NOTICIAS*/
$route['backoffice/noticias/(:any)'] = 'BackOffice/BackOfficeNoticias/index/$1';
$route['backoffice/noticias'] = 'BackOffice/BackOfficeNoticias/index';
$route['backoffice/noticia/crear'] = 'BackOffice/BackOfficeNoticias/panelCrear';
$route['backoffice/noticia/editar/(:any)'] = 'BackOffice/BackOfficeNoticias/panelEditar/$1';

/* BACKOFFICE ROLES*/
$route['backoffice/roles/(:any)'] = 'BackOffice/BackOfficeRoles/index/$1';
$route['backoffice/roles'] = 'BackOffice/BackOfficeRoles/index';
$route['backoffice/rol/crear'] = 'BackOffice/BackOfficeRoles/panelCrear';
$route['backoffice/rol/editar/(:any)'] = 'BackOffice/BackOfficeRoles/panelEditar/$1';

/* BACKOFFICE TIPOS*/
$route['backoffice/tipos/(:any)'] = 'BackOffice/BackOfficeTipos/index/$1';
$route['backoffice/tipos'] = 'BackOffice/BackOfficeTipos/index';
$route['backoffice/tipo/crear'] = 'BackOffice/BackOfficeTipos/panelCrear';
$route['backoffice/tipo/editar/(:any)'] = 'BackOffice/BackOfficeTipos/panelEditar/$1';



$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;