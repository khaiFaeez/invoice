var app = angular.module('clerkApp', []);


app.controller("SearchCtrl", ['$scope', '$http', function($scope, $http) {
        $scope.url = 'search/script/search.php';

        $scope.search= function(isValid) {


            if (isValid) {
              

                $http.post($scope.url, {"data": $scope.keywords}).
                        then(function(data, status) {
                            $scope.status = status;
                            $scope.data = data;
                            $scope.result = data.data.records;  
                        })
            }else{
                
                  alert('Form is not valid');
            }

        }

    }]);

