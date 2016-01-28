var app = angular.module('app', ['ngResource']);

/**
 * Configuring interpolators
 */
app.config(['$interpolateProvider', function ($interpolateProvider) { 
	$interpolateProvider.startSymbol('{[{');
	$interpolateProvider.endSymbol('}]}'); 
}]);

/**
 * Controller for Albums
 */
app.controller('AlbumsController', ['$scope', 'Album', function ($scope, Album) {
	$scope.album = {};

	$scope.numArtists = [0];

	$scope.save = function (form) {
		if (form.$valid) {
			if ($scope.album.edit == true) {
				var album = Album.get({albumId: $scope.album.id}, function() {
					angular.extend(album, $scope.album);
					album.$update();
                });
			} else {
				$scope.entry = new Album();
				angular.extend($scope.entry, $scope.album);
				$scope.entry.$save(function () {
					$scope.getAlbums();
                });
			}
			form.$setPristine();
            form.$setUntouched();
            $scope.numArtists = [0];
            $scope.album = {};
		}
	};

	$scope.albums = [];

	$scope.getAlbums = function () {
		Album.query({}, function (data) {
			$scope.albums = data;
		});
	};

	$scope.getAlbums();

    /**
     * Load album on form
     */
	$scope.load = function (album) {
		$scope.album = album;
		$scope.album.edit = true;
		$scope.numArtists = [];
		for (var i = 0; i <= album.artists.length - 1; i++) {
			$scope.numArtists.push(i);
		};
	};

    /**
     * Add new field for artists
     */
	$scope.add = function () {
		$scope.numArtists.push($scope.numArtists.length);
	}

	/**
	 * Remove fields for artists
	 */
	$scope.remove = function (index) {
		$scope.numArtists.splice(index, 1);
		$scope.album.artists.splice(index, 1);
	}

	/**
	 * Remove albums
	 */
	$scope.delete = function (index) {
		var album = Album.delete({albumId: $scope.albums[index].id}, function () {
			$scope.albums.splice(index, 1);
		});
	};
}]);

/**
 * Factory for model album
 */
app.factory('Album', ['$resource', function ($resource) {
    return $resource(
    	'/album/:albumId',
    	{albumId:'@id'},
    	{
    		update: {
    			method: 'PUT' // this method issues a PUT request
            }
        });
}]);
//# sourceMappingURL=app.js.map
