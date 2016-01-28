<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlbumTest extends TestCase {
	use WithoutMiddleware;

	public function testAlbumCreate() {
		/*$data = $this->getData();
		// We create an album and verify the answer
		$this->post('/album', $data)
		    ->seeJsonEquals(['created' => true]);*/
        $temp = ['title' => 'Follow the Leader'];
        $temp['artists'][] = [
		    'id' => 6,
	        'name' => 'Jonathan Davis',
	        'rol' => 'Voz'
	    ];
	    $temp['artists'][] = [
		    'id' => 8,
	        'name' => 'James Shaffer',
	        'rol' => 'Guitarra'
	    ];
	    $temp['artists'][] = [
		    'id' => 9,
	        'name' => 'Ray Luzier',
	        'rol' => 'Batería'
	    ];
	    $temp['artists'][] = [
	        'id' => 15,
	        'name' => 'Zac Baird',
	        'rol' => 'Teclado'
	    ];
	    $temp['artists'][] = [
	        'name' => 'Reginald Arvizu 2',
	        'rol' => 'Bajo'
	    ];
       
		$data = $this->getData($temp);
		// We update the newly created album
		$this->put('/album/2', $data)
		    ->dump()
		    ->seeJsonEquals(['updated' => true]);

		// We get the data of the same album updated
		// and verify that name is the right
		$this->get('/album/1')
		    ->seeJson(['title' => 'Weathered']);

		// We deleted the album
		$this->delete('/album/1')
		    ->seeJson(['deleted' => true]);
	}

	public function getData($custom = array()) {
		$data = [
		    'title' => 'Human Clay',
		    'publication' => '1999-09-28'
		];
		$data['artists'][] = [
		    'name' => 'Scott Stapp',
		    'rol' => 'Voz'
		];
		$data['artists'][] = [
		    'name' => 'Mark Tremonti',
		    'rol' => 'Guitarra'
		];
		$data['artists'][] = [
		    'name' => 'Brian Marshall',
		    'rol' => 'Bajo'
		];
		$data['artists'][] = [
		    'name' => 'Scott Phillips',
		    'rol' => 'Batería'
		];
		$data = array_merge($data, $custom);
        return $data;
	}
}
?>