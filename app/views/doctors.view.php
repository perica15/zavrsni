<?php require('app/views/partials/head.php') ?>
	<h1>Submit your name</h1>
	<form method="POST" action="/zavrsni/doctors">
		<label>Name:</label>
		<input type="text" name="name">
		<button type="submit">Submit</button>
	</form>
	<h1>Doktor:</h1>
	<ul>
		<?php foreach($doctors as $doctor): ?>
			<li><?= $doctor->name ?>
			<form method="GET" action="/zavrsni/doctors/delete" style="display: inline-block;">
				<input type="hidden" name="id" value="<?= $doctor->id ?>">
				<button>
					 <i class="fa fa-trash" aria-hidden="true"></i>
				</button>
			</form>	
			<a href="/zavrsni/doctors/edit?id=<?= $doctor->id ?>" class="fa fa-pencil" aria-hidden="true"></a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php require('app/views/partials/footer.php') ?>