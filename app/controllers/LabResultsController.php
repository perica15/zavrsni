<?php

namespace App\Controllers;

use App\Core\App;

class LabResultsController
{

	public function index()
	{
		$exams = App::get('myfinal')->selectAll('lab_exam');
		$patients = App::get('myfinal')->selectAll('patients');
		$types = App::get('myfinal')->selectAll('exam_type');
		$exDetails = App::get('myfinal')->selectAll('exam_type_details');

		if (is_array($exams)) {
			foreach ($exams as $ex){
				if (is_array($patients)) {
					foreach ($patients as $p) {
						if ($ex->patient_Id == $p->id){
							$ex->patientObj = $p;
						}
					}
				}

			if (is_array($types)){
					foreach ($types as $t){
					if ($ex->tip_Id == $t->id) {
						$ex->typeObj = $t;
					}
			
				}
			}
		}

	}

if (is_array($types)){
	foreach ($types as $type) {
		if (is_array($exDetails)) {
			foreach ($exDetails as $d) {
				if ($d->typeId == $type->id) {
					$type->detalis[] = $d;
				}
			}
		}
	}
}
return view('lab_results' , compact('exams' , 'types'));
}

public function save()
{
	if ($_POST) {
		$pregled = interval($_POST['exam_Id']);

		$upValue = trim($_POST['1']);
		$downValue = trim($_POST['2']);
		$puls = trim($_POST['3']);
		$value = trim($_POST['4']);
		$lastMeal = trim($_POST['5']);
		$value2 = trim($_POST['6']);
		$lastMael2 = trim($_POST['7']);

		$examObj = App::get('myfinal')->selectById('lab_exam' , $exam);

		$id = App::get('myfinal')->insert('lab_results' , [
			'exam_Id' => $exam
		]);

		if ($examObj->tip_Id == 1) {
			App::get('myfinal')->insert('lab_results_details' , [
				'results_Id' => $id,
				'exam_type_details_Id' => 1,
				'lab_results' => $upValue
			]);

			App::get('myfinal')->insert('lab_results_details' , [
				'results_Id' => $id,
				'exam_type_details_Id' => 2,
				'lab_results' => $downValue
			]);

			App::get('myfinal')->insert('lab_results_details' , [
				'results_Id' => $id,
				'exam_type_details_Id' => 3,
				'lab_results' => $puls
			]);

			if ($examObj->tip_Id == 2) {
			App::get('myfinal')->insert('lab_results_details' , [
				'results_Id' => $id,
				'exam_type_details_Id' => 4,
				'lab_results' => $value
			]);

			App::get('myfinal')->insert('lab_results_details' , [
				'results_Id' => $id,
				'exam_type_details_Id' => 5,
				'lab_results' => $lastMael
			]);

			if ($examObj->tip_Id == 3) {
			App::get('myfinal')->insert('lab_results_details' , [
				'results_Id' => $id,
				'exam_type_details_Id' => 6,
				'lab_results' => $value2
			]);

			App::get('myfinal')->insert('lab_results_details' , [
				'results_Id' => $id,
				'exam_type_details_Id' => 7,
				'lab_results' => $lastMael2
			]);
		}
	}

	return redirect ('lab_results');
}
}