/*
Convention for controller Names:
-
-
-Every controller should end with the word "Controller"(case sensitive) e.g: 'PersonController','StudentController' 

Convention for browser Routes:   
-going to "http://domain/Student/Grade" will use the Grade_get() function from the class StudentController(notice match casing)
-going to "http://domain/students/grades" will use the grades_get() function from the class studentsController(notice match casing)  

*/



<?php
Route::any('/{controller}/{action}',function($controller,$action,Illuminate\Http\Request $request){
    $className = "App\Http\Controllers\\$controller"."Controller";
  
    if(!class_exists($className)){
       throw new Symfony\Component\HttpKernel\Exception\HttpException(404,"CONTROLLER $controller UNDEFINED!");
    }

    $classInstance = new $className();
    $method = $request->method();
    $actionName = $action."_".strtolower($method);

    if(!method_exists($classInstance,$actionName)){
        throw new Symfony\Component\HttpKernel\Exception\HttpException(404,"METHOD or ACTION '$actionName' is UNDEFINED on class $className");
    }
    return $classInstance->$actionName($request);
});

Route::get('/{controller}',function($controller,Illuminate\Http\Request $request){
    $className = "App\Http\Controllers\\$controller"."Controller";
  
    if(!class_exists($className)){
       throw new Symfony\Component\HttpKernel\Exception\HttpException(404,"CONTROLLER $controller UNDEFINED!");
    }

    $classInstance = new $className();

    if(!method_exists($classInstance,'index')){
        throw new Symfony\Component\HttpKernel\Exception\HttpException(404,"METHOD or ACTION 'index' is UNDEFINED on class $className");
    }
    return $classInstance->index($request);
});




