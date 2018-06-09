var app = angular.module('CRUD_users', ['ngAnimate']
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


app.controller('UsersController', ['$scope', '$http', function ($scope, $http) {

  $scope.users = [];

  $scope.queryBy = '$';

  // List categoriess
  $scope.LoadUsers = function () {
      $http.get(base_url + '/getUsers')
      .then(function success(e) {
              $scope.users = e.data.users;
          });
  };

  $scope.LoadUsers();

  $scope.errors = [];

    $scope.user = {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
    };

    $scope.initUser = function () {
        $scope.resetForm();
        $("#add_new_user").modal('show');
    };

    // Add new Category
    $scope.addUser = function () {
        $http.post(base_url + '/user', {
          name: $scope.user.name,
          email: $scope.user.email,
          password: $scope.user.password,
          password_confirmation: $scope.user.password_confirmation,
        }).then(function success(e) {
            $scope.resetForm();
            $scope.users.push(e.data.user);
            $("#add_new_user").modal('hide');
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
          $("#add_new_user").modal('hide');
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
        if (error.data.errors.email) {
            $scope.errors.push(error.data.errors.email[0]);
        }
        if (error.data.errors.password) {
            $scope.errors.push(error.data.errors.password[0]);
        }
        if (error.data.errors.password_confirmation) {
            $scope.errors.push(error.data.errors.password_confirmation[0]);
        }
    };

    $scope.resetForm = function () {
        $scope.user.name = '';
        $scope.user.email = '';
        $scope.user.password = '';
        $scope.user.password_confirmation = '';
        $scope.errors = [];
    };

    $scope.edit_user = {};
    // initialize update action
    $scope.initEdit = function (index) {
        $scope.errors = [];
        $scope.edit_user = $scope.users[index];
        $scope.user.name = '';
        $scope.user.email = '';
        $scope.user.password = '';
        $scope.user.password_confirmation = '';
        $("#edit_user").modal('show');
    };

    // update the given category
    $scope.updateUser = function () {
        $http.put(base_url + '/user/' + $scope.edit_user.id, {
            name: $scope.edit_user.name,
            email: $scope.edit_user.email,
            password: $scope.edit_user.password,
            password_confirmation: $scope.edit_user.password_confirmation
        }).then(function success(e) {
            $scope.errors = [];
            $("#edit_user").modal('hide');
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
          $("#edit_user").modal('hide');
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
    $scope.deleteUser = function (index) {

        var conf = confirm("Estas seguro de eliminar este usuario?");

        if (conf === true) {
            $http.delete(base_url + '/user/' + $scope.users[index].id)
                .then(function success(e) {
                    $scope.users.splice(index, 1);
                    $.notify({
                    // options
                      message: 'Usuario eliminado correctamente.'
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
