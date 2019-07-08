<?php require('app/views/partials/head.php') ?>
	<h1>Add Result</h1>
	<form method="POST" action="zavrsni/saveresult">
		<label>Pregled:</label>
		<select name="pregled_Id" autocomplete="off">
			<option value="" selected="selected">select</option>
			<?php foreach($exams as $ex): ?>
				<option value="<?=$ex->id?>"><?= $ex->date_time ." ".$ex->patientObj->name.' - '.$ex->typeObj->name; ?></option>
			<?php endforeach; ?>
		</select>

		<?php foreach ($types as $type): ?>
			<div>
				<h2><?php echo $type->name; ?></h2>
				<?php foreach ($type->detalis as $d): ?>
					<label><?php echo $d->name; ?></label>
					<input type="text" name="<?php echo $d->id; ?>">
				<?php endforeach: ?>
			</div>
		<?php endforeach; ?>

		<button type="submit">Submit</button>
	</form>
	
<?php require('app/views/partials/footer.php') ?>