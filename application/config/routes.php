<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Auth/index';
$route['/'] = 'Auth/index';

$route['login'] = 'Auth/login';
$route['logout'] = 'Auth/logout';
$route['register'] = 'Auth/register';
$route['auth/login-proses'] = 'Auth/sign';
$route['auth/register-proses'] = 'Auth/registerProses';

$route['report/rank'] = 'Report/Rank/index';
$route['report/rank/filter-per-month'] = 'Report/Rank/filterPerMonth';
$route['report/rank/filter-per-year'] = 'Report/Rank/filterPerYear';
$route['report/rank/cetak-pdf'] = 'Report/Rank/cetakPdf';

$route['admin'] = 'Admin/Dashboard/index';
$route['admin/get-rank-kamar-per-month'] = 'Admin/Dashboard/getRankKamarPerMonth';
$route['admin/master/kamar'] = 'Admin/Master/Kamar/index';
$route['admin/master/kamar/get-list-data-kamar'] = 'Admin/Master/Kamar/getListDataKamar';
$route['admin/master/kamar/save'] = 'Admin/Master/Kamar/save';
$route['admin/master/kamar/delete'] = 'Admin/Master/Kamar/delete';


$route['admin/master/kriteria'] = 'Admin/Master/Kriteria/index';
$route['admin/master/kriteria/get-list-data-kriteria'] = 'Admin/Master/Kriteria/getListDataKriteria';
$route['admin/master/kriteria/save'] = 'Admin/Master/Kriteria/save';
$route['admin/master/kriteria/delete'] = 'Admin/Master/Kriteria/delete';



$route['client'] = 'Clients/Dashboard/index';
$route['client/get-rank-kamar-per-month'] = 'Clients/Dashboard/getRankKamarPerMonth';


$route['404_override'] = 'ErrorHandle/onProgressPage';
$route['error-403_override'] = 'ErrorHandle/forbiddenError403';
$route['translate_uri_dashes'] = FALSE;
