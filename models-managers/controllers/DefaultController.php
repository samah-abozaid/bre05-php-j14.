<?php

class DefaultController extends AbstractController
{
    public function index() : void
    {
        
    // $user = new User(1, "Hassan", "soso", "ali@email.com", "123456");
    $manager = new UserManager();
   $users =  $manager->findAll();
   var_dump($users);
    $this->render("index", []);
       
        
    }
    
    
}