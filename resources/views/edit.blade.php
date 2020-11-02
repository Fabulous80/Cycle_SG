<!DOCTYPE html>
<html>
	@extends('layouts.app')

	<body>
		<?php include("navbar.php"); ?>

		<div class="container">
			<div class="row">
				<div class="col-3">
					<h2>Cycling Routes</h2><br>
                    @foreach ($players as $player)
                        <h4> <a href='/edit/{{$player->PlayerName}}'>{{$player->PlayerName}}</a></h4>
                    @endforeach
				</div>
				<div class="col-9">
					@if(@isset($name))
					<form method = "post" enctype="multipart/form-data" action = "{{ route('editPlayer')}}">
						@csrf
						<h2>Player</h2>
						<input class="player" type="text" name="player" value="{{$name}}">
						<h2>Distance</h2>
						<input class="distance" type="text" name="distance" value="{{$desc->Distance}}">
						<h2>Description</h2>
						<textarea class="desc" name="description">{{$desc->Description}}</textarea>
						<input type="file" name="image">
						<input type="submit" value="Submit" name="upload">
						<textarea name="oldplayer" style="visibility: hidden;">{{$name}}</textarea>

					</form>
					 <form method= "post" action ="{{route('deletePlayer')}}">
                        @csrf
                        
                        <img id="hide" src="{{asset('uploads/player/' . $desc->Image)}}" alt="Image" height="200">
                        <textarea style="visibility: hidden;" name="nameDEL">{{$name}}</textarea>
						<br>
						<div class="btns">
                        <input type="submit" name="delete" value="Delete Route"> 
                        </div>
                    </form>
					@else
					<h2>Choose a route to edit!</h2>
					@endif
				</div>
			</div>
		</div>

	</body>
</html>