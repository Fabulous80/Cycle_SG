<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use File;



class UploadController extends Controller
{
    public function index(){
    	$players = Upload::all();
    	return view('welcome')->with('players', $players);
    }

    public function display($name){
		$players = Upload::all();
    	$desc = Upload::where('PlayerName', $name)->first();
    	return view('welcome', [
			'players' => $players,
    		'name' => $name,
    		'desc' => $desc
    	]);
    }

    public function show(){
    	return view('upload');
    }

    public function store(Request $request){
    	$player = new Upload();

		$player->PlayerName = request('player');
		$player->Distance = request('distance');
    	$player->Description = request('description');

    	if($request->hasfile('image')){
    		$file = request('image');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time(). '.' . $extension;
    		$file->move('uploads/player/', $filename);
    		$player->Image = $filename;
     	} else{
     		$player->Image = '';
     	}

    	$store = $player->save();
    	if($store){
    		return redirect('/upload');
    	}
    }

    public function delete(){
    	$delete = Upload::where('PlayerName', request('nameDEL'))->first();
    	$destinationPath = 'uploads/player/';
    	File::delete($destinationPath. $delete->Image);
    	$deleted = Upload::where('PlayerName', request('nameDEL'))->delete();

    	if($deleted){
			
    		return redirect('/');
    	}
    }

    public function showedit(){
    	$players = Upload::all();
    	return view('edit')->with('players', $players);
    }

    public function showeditplayer($name){
    	$players = Upload::all();
    	$desc = Upload::where('PlayerName', $name)->first();
    	return view('edit', [
    		'players' => $players,
			'name' => $name,
			'distance' => $desc,
    		'desc' => $desc
    	]);
    }

    public function edit(Request $request){
    	$update = Upload::where('PlayerName', request('oldplayer'))->first();
		$update->PlayerName = request('player');
		$update->Distance = request('Distance');
    	$update->Description = request('description');

    	if($request->hasfile('image')){
    		$file = request('image');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time(). '.' . $extension;
    		$file->move('uploads/player/', $filename);
    		$update->Image = $filename;
     	}

     	$updated = $update->save();
     	if($updated){
     		return redirect('/edit');
     	}
    }
}
