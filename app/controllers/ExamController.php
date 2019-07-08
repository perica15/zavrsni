<?php

namespace App\Controllers;

use App\Core\App;

class ExamController
{

	public function indexType()
	{
		$exams = App::get('myfinal')->sellectAll('exam_type');
		$patients = App::get('myfinal')->selectAll('patients');

		return view('exam' , compact('exams' , 'patients'));
	}

	public function store()
	{
		App::get('myfinal')->insert('lab_exam' , [
			'date_time' => $_POST['date_time'] ,
			'patient_Id' => $_POST['patient_Id']
			'tip_Id' => $_POST['tip_Id']
		]);

		return redirect('exam');
	}
}