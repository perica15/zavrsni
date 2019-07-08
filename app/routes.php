<?php

$router->get('', 'PagesController@home');
$router->get('lab', 'PagesController@about');
$router->get('patient', 'PagesController@contact');

$router->get('doctors', 'DoctorsController@index');
$router->post('doctors','DoctorsController@store');
$router->post('doctors/update','DoctorsController@update');
$router->get('doctors/delete', 'DoctorsController@delete');
$router->get('doctors/edit', 'DoctorsController@edit');

$router->get('patients' , 'PatientsController@index');
$router->post('patients' , 'PatientsController@store');

$router->get('exam' , 'ExamController@indexType');
$router->post('exam' , 'ExamController@store');

$router->get('results' ,'LabResultsController@index');
$router->post('saveresult' ,'LabResultsController@save');