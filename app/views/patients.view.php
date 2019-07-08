<?php require('app/views/partials/head.php') ?>
	<h1>Add Patients</h1>
	<form method="POST" action="/zavrsni/patients">
		<label>Name:</label>
		<input type="text" name="name">
		<label>jmbg:</label>
		<input type="text" name="jmbg">
		<label>no_medic:</label>
		<input type="text" name="no_medic">
		<label>Doctor:</label>
			<select name="doctor_Id" autocomplete="off">
				<option value="volvo" selected="selected">select</option>

				<?php foreach($doctors as $doctor): ?>

					<option value="<?$doctor->id?>"><?=$doctor->name ?></option>
				<?php endforeach; ?>

			</select>

			<button type="submit">Submit</button>
	</form>
<?php require('app/views/partials/footer.php') ?>