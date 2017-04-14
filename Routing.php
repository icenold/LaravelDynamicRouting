/*
Convention for controller Names: 
-Every controller should end with the word "Controller"(case sensitive) e.g: 'PersonController','StudentController'

Convention for browser Routes: 
-going to "http://domain/Student/Grade" will use the Grade_get() function from the class StudentController(notice match casing)
-going to "http://domain/students/grades" will use the grades_get() function from the class studentsController(notice match casing)  
*/


<?php
Route::get('/{controller}/{action}',function($controller,$action,Request $request){
    $className = "App\Http\Controllers\\$controller"."Controller";
  
    if(!class_exists($className)){
       throw new Symfony\Component\HttpKernel\Exception\HttpException(404,"CONTROLLER $controller UNDEFINED!");
    }
    $classInstance = new $className();
    
    $actionName = $action."_get";
    if(!method_exists($classInstance,$actionName)){
        throw new Symfony\Component\HttpKernel\Exception\HttpException(404,"ACTION $action UNDEFINED!");
    }
    return $classInstance->$actionName($request);
});

Route::post('/{controller}/{action}',function($controller,$action,Request $request){
    $className = "App\Http\Controllers\\$controller"."Controller";
  
    if(!class_exists($className)){
       throw new Symfony\Component\HttpKernel\Exception\HttpException(404,"CONTROLLER $controller UNDEFINED!");
    }
    $classInstance = new $className();
    
    $actionName = $action."_post";
    if(!method_exists($classInstance,$actionName)){
        throw new Symfony\Component\HttpKernel\Exception\HttpException(404,"ACTION $action UNDEFINED!");
    }
    return $classInstance->$actionName($request);
});
