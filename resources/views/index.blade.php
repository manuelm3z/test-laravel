<!DOCTYPE html>
<html lang=es ng-app="app">
    <head>
        <title>Discos</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand">Super Discs</a>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-container">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu">
                    <li>
                        <a class="white-letter active">
                            <i class="fa fa-pie-chart"></i>
                            <span class="title">Albuns</span>
                        </a>
                    </li>
                </ul>
            </div>
            <section class="page-content" ng-controller="AlbumsController">
                <div class="wrapper album">
                    <div class="contenedor">
                        <div class="row title">
                            <div class="col-md-12">
                                <p>Album information</p>
                            </div>
                        </div>
                        <div class="row body">
                            <div class="col-md-12">
                                <form name="albumForm" class="form-horizontal" role="form" ng-submit="save(albumForm)">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="title"><b>Title</b></label>
                                        <div class="col-sm-10">
                                            <input ng-model="album.title" type="text" class="form-control" id="title" placeholder="Enter the title" ng-required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="publication"><b>Publication</b></label>
                                        <div class="col-sm-10">
                                            <input ng-model="album.publication" type="text" class="form-control" id="publication" placeholder="YYYY/MM/DD" ng-required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-6" for="artists"><b>Artists</b></label>
                                    </div>
                                    <div ng-repeat="num in numArtists">
                                        <div class="form-group col-md-5">
                                            <label class="control-label col-sm-3" for="artists"><b>Name</b></label>
                                            <div class="col-sm-9">
                                                <input ng-model="album.artists[num].name" type="text" class="form-control" id="artists" placeholder="Enter de name" ng-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="control-label col-sm-3" for="artists"><b>Rol</b></label>
                                            <div class="col-sm-9">
                                                <input ng-model="album.artists[num].rol" type="text" class="form-control" id="artists" placeholder="Enter de rol" ng-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2" ng-if="numArtists.length > 1 && num < numArtists.length - 1">
                                            <button type="button" class="btn btn-danger" ng-click="remove(num)">-</button>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-success" ng-click="add()">+</button>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="contenedor">
                        <div class="row title">
                            <div class="col-md-12">
                                <p>Album List</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Publication</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="album in albums">
                                            <td>{[{ album.title }]}</td>
                                            <td>{[{ album.publication }]}</td>
                                            <td>
                                                <div class="btn-group btn-group-xs" role="group">
                                                    <button type="button" class="btn btn-primary" ng-click="load(album)">Update</button>
                                                    <button type="button" class="btn btn-danger" ng-click="delete($index)">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer>
        </footer>
        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bower_components/angular/angular.min.js"></script>
        <script type="text/javascript" src="bower_components/angular-resource/angular-resource.min.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
