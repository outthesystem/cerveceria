var app = angular.module('CRUD_permissions', ['ngAnimate']
    , ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);

    app.directive('ngEnter', function () { //a directive to 'enter key press' in elements with the "ng-enter" attribute

        return function (scope, element, attrs) {

            element.bind("keydown keypress", function (event) {
                if (event.which === 13) {
                    scope.$apply(function () {
                        scope.$eval(attrs.ngEnter);
                    });

                    event.preventDefault();
                }
            });
        };
    })


app.controller('permissionsController', ['$scope', '$http', function ($scope, $http) {

  $scope.permissions = [];

  $scope.queryBy = '$';

  // List categoriess
  $scope.LoadPermissions = function () {
      $http.get(base_url + '/getPermissions')
      .then(function success(e) {
              $scope.permissions = e.data.permissions;
          });
  };

  $scope.LoadPermissions();

  $scope.errors = [];

    $scope.permission = {
        name: '',
        roles: ''
    };

    $scope.initPermission = function () {
        $scope.resetForm();
        $("#add_new_permission").modal('show');
    };

    // Add new Category
    $scope.addPermission = function () {
        $http.post(base_url + '/permission', {
          name: $scope.permission.name,
          roles: $scope.permission.roles
        }).then(function success(e) {
            $scope.resetForm();
            $scope.permissions.push(e.data.permission);
            $("#add_new_permission").modal('hide');
            $.notify({
            // options
              message: 'Datos guardados correctamente.'
            },{
              // settings
              type: 'info',
              placement: {
                from: "top",
                align: "center"
              },
            });
        }, function error(error) {
          $("#add_new_permission").modal('hide');
          console.log(error);
          $.notify({
        	// options
          	message: 'Ha ocurrido un error.'
          },{
          	// settings
          	type: 'danger',
            placement: {
              from: "top",
              align: "center"
            },
          });
        });
    };

    $scope.recordErrors = function (error) {
        $scope.errors = [];
        if (error.data.errors.name) {
            $scope.errors.push(error.data.errors.name[0]);
        }
        if (error.data.errors.roles) {
            $scope.errors.push(error.data.errors.roles[0]);
        }
    };

    $scope.resetForm = function () {
        $scope.permission.name = '';
        $scope.permission.roles = '';
        $scope.errors = [];
    };

    $scope.edit_permission = {};
    // initialize update action
    $scope.initEdit = function (index) {
        $scope.errors = [];
        $scope.edit_permission = $scope.permissions[index];
        $scope.permission.name = '';
        $scope.permission.roles = '';
        $("#edit_permission").modal('show');
    };

    // update the given category
    $scope.updatePermission = function () {
        $http.put(base_url + '/permission/' + $scope.edit_permission.id, {
            name: $scope.edit_permission.name,
            roles: $scope.edit_permission.roles
        }).then(function success(e) {
            $scope.errors = [];
            $("#edit_permission").modal('hide');
            $.notify({
            // options
              message: 'Datos actualizados correctamente.'
            },{
              // settings
              type: 'info',
              placement: {
                from: "top",
                align: "center"
              },
            });
        },  function error(error) {
          $("#edit_permission").modal('hide');
          $.notify({
          // options
            message: error
          },{
            // settings
            type: 'danger',
            placement: {
              from: "top",
              align: "center"
            },
          });
         console.log(error);
        });
    };

    // delete the given category
    $scope.deletePermission = function (index) {

        var conf = confirm("Estas seguro de eliminar este permiso?");

        if (conf === true) {
            $http.delete(base_url + '/permission/' + $scope.permissions[index].id)
                .then(function success(e) {
                    $scope.permissions.splice(index, 1);
                    $.notify({
                    // options
                      message: 'Permiso eliminado correctamente.'
                    },{
                      // settings
                      type: 'info',
                      placement: {
                    		from: "top",
                    		align: "center"
                    	},
                    });
                },  function error(error) {
                  console.log(error);
                  $.notify({
                  // options
                    message: 'Ha ocurrido un error.'
                  },{
                    // settings
                    type: 'danger',
                    placement: {
                  		from: "top",
                  		align: "center"
                  	},
                  });
                });
        }
    };

}]);
