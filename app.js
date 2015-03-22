var app = angular.module('angularPostPHP', ['ngTouch', 'ui.grid', 'ui.grid.autoResize', 'ui.grid.pagination']);

// Used to query PHP pages for user requests of Plane data and display info in ui-grid.
app.controller('planeCtrl', function ($scope, $http) {

    // Pagination info - planes_by_date_grid
    $scope.planes_by_date_grid = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 25
    };

    // Grid defs - planes_by_date_grid
    $scope.planes_by_date_grid.columnDefs = [
        { name:'DateTime', displayName:'Date', width:90 },
        { name:'N_NUMBER', displayName:'N_NUMBER', width:110 },
        { name:'MANUFACTURER', displayName:'Manufacturer', width:150 },
        { name:'Plane_TYPE', displayName:'Type', width:75 },
        { name:'YEAR_MADE', displayName:'Year Made', width:100 },
        { name:'Data_TEXT', displayName:'Message Data', width:1200 }
    ];

    //  Gets a JSON response for messages by date, by POSTing to PHP page.  Sends this reponse to ui-grid to be displayed.
    $scope.find_messages_by_date = function () {

        var request = $http({
            method: "post",
            url: "find_messages_by_date.php",
            data: {
                user_input: $scope.user_input
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        });
        /* Successful HTTP post request or not */
        request.success(function (data) {

                $scope.planes_by_date_grid.data = data;

        });
    }

    // Pagination info - planes_by_model_grid
    $scope.planes_by_model_grid = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 25
    };

    // Grid defs - planes_by_model_grid
    $scope.planes_by_model_grid.columnDefs = [
        { name:'DateTime', displayName:'DateTime', width:90 },
        { name:'Manufacturer', displayName:'Manufacturer', width:110 },
        { name:'Model', displayName:'Model', width:150 },
        { name:'MSG', displayName:'MSG', width:1200 }
    ];


    //  Gets a JSON response of plane models, by POSTing to PHP page.  Sends this reponse to ui-grid to be displayed.
    $scope.find_messages_by_model = function () {

        var request = $http({
            method: "post",
            url: "find_planes_by_model.php",
            data: {
                user_input: $scope.user_input
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        });
        /* Successful HTTP post request or not */
        request.success(function (data) {

            $scope.planes_by_model_grid.data = data;

        });
    }

});
