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

$route['default_controller']='home';
$route['home']='home';
$route['login']="login";
$route['registration']="registration";
$route['management']="management/index";
$route['schools']="schools";
$route['student_list']="student_list";
$route['subject_list']="subject_list";
$route['epaper/(:any)'] = "epaper/epaper_info";
$route['epaper']="epaper";
$route['epaper/newslatter']="epaper/newslatter";

$route['publication']="publication";
$route['blog']="blog";
$route['under']="under";





/*admin routing*/     

/*admin register*/     
$route['admin/register'] = 'admin/register';
$route['admin/register/status/(:any)'] = 'admin/register/status/$1';

/*admin register*/     

$route['api/mahakosalapi/state'] = "api/mahakosalapi/state";
$route['state'] = "api/mahakosalapi/state";
$route['chairman'] = "chairman";

$route['admin/gallery'] = 'admin/gallery';

$route['admin/jeevika'] = 'admin/jeevika';

$route['admin/general_secretary'] = 'admin/general_secretary';

$route['admin/chairman'] = 'admin/chairman';

$route['admin/brochure'] = 'admin/brochure';

$route['admin/faculty'] = 'admin/faculty';

$route['admin/courses'] = 'admin/courses';

$route['admin/trustee'] = 'admin/trustee';

$route['admin/news'] = 'admin/news';

$route['admin/album'] = 'admin/album';





$route['admin'] = 'site/adminIndex';

$route['courses'] = "Course";

$route['admin-dashboard'] = 'admin/profile/dashboard';



$route['default_controller'] = "home";

$route['gallery/:any'] = "gallery";

$route['news/:any'] = "news";



$route['general_secretary'] = "general_secretary";

$route['admission_process'] = "admission_process";

$route['trustee'] = "trustee";

$route['chairperson'] = "chairperson";

$route['secretary'] = "secretary";

$route['trasty'] = "trasty";

$route['department'] = "department";

$route['faculty'] = "faculty";



$route['facility'] = "facility";

$route['brochure'] = "brochure";

$route['jeevika'] = "jeevika";

$route['contact_us'] = "contact";

$route['(:any)']= "cms/index/$1";

$route['404_override']='';

/*end 404 routing*/

$route['translate_uri_dashes'] = FALSE;