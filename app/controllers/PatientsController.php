<?php

namespace App\Controllers;

use App\Core\App;

class PatientsController
{
	public function index()
	{
		$doctors = App::get('myfinal')->selectAll('doctors');

		return view('patients' , compact('doctors'));
	}

	public function store()
	{
		App::get('myfinal')->insert('patients' , [
			'name' => $_POST['name'] ,
			'jmbg' => $_POST['jmbg'] ,
			'no_medic' => $_POST['no_medic'] ,
			'doctor_Id' => $_POST['doctors']
		]);

		return redirect('patients');
	}
}