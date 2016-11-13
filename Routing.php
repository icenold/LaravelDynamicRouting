/*
Convention for controller Names:
-Every controller should end with the word "Controller"(case sensitive) e.g: 'PersonController','StudentController'

Convention for browser Routes:
-going to "http://domain/Student/Grade" will use the Grade() function from the class StudentController(notice match casing)
-going to "http://domain/students/grades" will use the grades() function from the class studentsController(notice match casing)
*/

Route::get('/{controllerName}/{action}',function(Request $request,$controllerName, $action){
    $className = "App\Http\Controllers\\$controllerName"."Controller";
    $controllerObject = new $className();
    return $controllerObject->$action($request);
});
