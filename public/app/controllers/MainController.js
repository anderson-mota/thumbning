/**
 * @ngdoc controller
 * @name Main
 *
 * @description
 * _Please update the description and dependencies._
 *
 * @requires $scope
 * */
angular.module('app', []).controller('MainController', ['$scope', function($scope){
    Dropzone.autoDiscover = false;
    $scope.dropzoneConfig = {
        'options': { // passed into the Dropzone constructor
            'url': 'upload'
        },
        'eventHandlers': {
            'sending': function (file, xhr, formData) {

            },
            'success': function (file, response) {

            }
        }
    }
}]);
