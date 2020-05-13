<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Inicio';
$route[ROUTE_CADASTRO] = 'dashbord/Cadastro';
$route[ROUTE_MARCACAO_PONTO] = 'dashbord/Ponto';
$route[ROUTE_HISTORICO_PONTO] = 'dashbord/Ponto/historico';
$route[ROUTE_LOGOUT] = 'dashbord/Autenticacao/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
