<?php
class Router {
    
    public function handleRequest() : void {
    
      $ctrl  = new UserController();
      
    if(isset($_GET["route"])){
        $route = $_GET["route"];
        
        if($route === "show"){
            $ctrl->show();
        }
        else if ($route ==="create" ){
         $ctrl->create();   
        }
        else if ($route==="check_create"){
            $ctrl->checkCreate();
        }
        else if ($route==="delete"){
            $ctrl->delete();
        }
         else if ($route==="update"){
            $ctrl->update();
        }
        
        

    }else{
        $ctrl->list();
    }
    
    }
    
 
    
}
