angular.module("app",[]).controller("MainController",["$scope",function(n){Dropzone.autoDiscover=!1,n.dropzoneConfig={options:{url:"upload"},eventHandlers:{sending:function(n,o,e){},success:function(n,o){}}}}]),angular.module("app").directive("dropzone",function(){return{restrict:"A",link:function(n,o,e){var r,t;r=n[e.dropzone],t=new Dropzone(o[0],r.options),angular.forEach(r.eventHandlers,function(n,o){t.on(o,n)})}}});