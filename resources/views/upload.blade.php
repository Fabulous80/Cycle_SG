<!DOCTYPE html>
<html>
	@extends('layouts.app')
	<body>
		<?php include("navbar.php"); ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
					<form method = "post" enctype="multipart/form-data" action = "{{ route('addUpload')}}">
						@csrf
						<h2>Route Name</h2>
						<input class="player" type="text" name="player">
						<h2>Distance(in km)</h2>
						<input class="distance" type="text" name="distance"><br>
						<br>
						<h2>Description</h2>
						<textarea class="desc" name="description"></textarea>
						<input type="file" name="image">
						<input type="submit" value="Submit" name="upload">
					</form>
				</div>
				<div class="col-2"></div>
			</div>
		</div>

	</body>
</html>