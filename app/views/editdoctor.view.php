<?php require('app/views/partials/head.php') ?>
<h2>Edit Doctor <?= $doctor->name ?></h2>
	<form method="POST" action="/zavrsni/doctors/update">
		<div>
			<label for="name">Name</label>
			<input id="name" type="text" name="name" value="<?= $doctor->name ?>">
			<input type="hidden" name="id" value="<?= $doctor->id ?>">
		</div>
		<br>
		<div>
			<button>Snimi</button>
		</div>
	</form>
<?php require('app/views/partials/footer.php') ?>