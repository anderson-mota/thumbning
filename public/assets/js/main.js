var app=angular.module("app",[]);angular.module("app").controller("Main",function(n){n.dropzoneConfig={options:{url:"upload"},eventHandlers:{sending:function(n,o,e){},success:function(n,o){}}}}),angular.module("app",[]).directive("dropzone",function(){return{restrict:"A",link:function(n,o,e){var r,a;r=n[e.dropzone],a=new Dropzone(o[0],r.options),angular.forEach(r.eventHandlers,function(n,o){a.on(o,n)})}}});