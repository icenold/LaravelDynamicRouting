/*
Convention for controller Names:
-Every controller should end with the word "Controller"(case sensitive) e.g: 'PersonController','StudentController'

Convention for browser Routes:
-going to "http://domain/Student/Grade" will use the Grade_get() function from the class StudentController(notice match casing)
-going to "http://domain/students/grades" will use the grades_get() function from the class studentsController(notice match casing)
*/

Route::get('/{controller}/{action}',function($controller,$action,Request $request){
    $className = "App\Http\Controllers\\$controller"."Controller";
    $classInstance = new $className();
    $actionName = $action."_get";
    return $classInstance->$actionName($request);
});

Route::post('/{controller}/{action}',function($controller,$action,Request $request){
    $className = "App\Http\Controllers\\$controller"."Controller";
    $classInstance = new $className();
    $actionName = $action."_post";
    return $classInstance->$actionName($request);
});
