<?php

namespace App\Controllers;

use App\Core\App;

class DoctorsController
{
	public function index()
	{
		$doctors = App::get('myfinal')->selectAll('doctors');

		return view('doctors', compact('doctors'));
	}

	public function edit()
	{
		$doctor = App::get('myfinal')->selectById('doctors' , $_GET['id']);

		return view('editdoctor' , compact('doctor'));
	}

	public function store()
	{
		App::get('myfinal')->insert('doctors', [
			'name' => $_POST["name"],
			'specialist' => $_POST['specialist']
		]);

		return redirect('doctors');
	}

	public function update()
	{
		App::get('myfinal')->update('doctors', [
			'name' => $_POST['name']
		], $_POST["id"]);

		return redirect('doctors');
	}

	public function delete() 
	{
		App::get('myfinal')->delete('doctors', $_GET[
			'id']);

		return redirect('doctors');
	}
}
