<?php

class DefaultController extends AbstractController
{
   public function index(): void
{
    $createdAt = new DateTime(); // date actuelle

    $user = new User(9,
        "Hassan",
        "coucou",
        "ali@email.com",
        "123456",
        $createdAt
    );

    $manager = new UserManager();
    $users = $manager->create($user);

    var_dump($users);

    $this->render("index", []);
}
    
    
}