/**
 * @ngdoc directive
 * @name dropzone
 *
 * @description
 * _Please update the description and restriction._
 *
 * @restrict A
 * */
angular.module('app')
    .directive('dropzone', function () {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                var config, dropzone;

                config = scope[attrs.dropzone];

                // create a Dropzone for the element with the given options
                dropzone = new Dropzone(element[0], config.options);

                // bind the given event handlers
                angular.forEach(config.eventHandlers, function (handler, event) {
                    dropzone.on(event, handler);
                });
            }
        };
});
