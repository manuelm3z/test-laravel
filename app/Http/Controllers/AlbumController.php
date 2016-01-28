<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Log;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use App\Artist;

class AlbumController extends Controller {
	/**
	 * To show albums
	 */
	public function index() {
		$data = [];
		foreach (Album::all() as $key => $album) {
		 	$temp = $album;
		 	$temp['artists'] = $album->artists;
		 	$data[] = $temp;
		};
		return $data;
	}

	/**
	 * To create albums
	 */
	public function store(Request $request) {
		$album = new Album();
		$album->title = $request->input('title');
		$album->publication = $request->input('publication');
		$album->save();

		$artists = $request->input('artists');
		foreach ($artists as $key => $value) {
			$album->artists()->create([
		    	'name' => $value['name'],
		    	'rol' => $value['rol']
		    ]);
		}
		return ['created' => true];
	}

	/**
	 * To update albums
	 */
	public function update(Request $request, $id) {
		$album = Album::find($id);
		if ($request->has('title')) {
		    $album->title = $request->input('title');
		}
		if ($request->has('publication')) {
		    $album->publication = $request->input('publication');
		}
		$album->save();
		if ($request->has('artists')) {
			$artists = $request->input('artists');
			foreach ($album->artists as $k => $artist_db) {
				foreach ($artists as $j => $artist) {
					$delete = true;
					if (isset($artist['id'])) {
						if ($artist_db->id == $artist['id']) {
							$artist_db->name = $artist['name'];
							$artist_db->rol = $artist['rol'];
							$delete = false;
							$artist_db->save();
							
							/*var_dump('Actualizo a ' . $artist['name']);*/
							break;
						} 
					} else {
						$album->artists()->create($artist);
						
						/*var_dump('Creo a' . $artist['name']);*/
					}
				}
				if ($delete == true) {
					$artist_db->delete();
					
					/*var_dump('Elimino a' . $artist_db->name);*/
				}
			}
		}
		return ['updated' => true];
	}

	/**
	 * To show an album
	 */
	public function show($id) {
		$data = Album::find($id);
		$data['artists'] = $data->artists;
		return $data;
	}

	/**
	 * To delete albums
	 */
	public function destroy($id) {
		$album = Album::find($id);
		foreach ($album->artists as $key => $value) {
			$value->delete();
		}
		$album->delete();
		return ['deleted' => true];
	}

}
