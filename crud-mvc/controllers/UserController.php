<?php

class UserController extends AbstractController
{
    public function list(): array {
        
        $users = []; 
        $this->render("list", ["users" => $users]);
    }

    public function show(User $user): void {
        $user = null;
        $this->render("show", ["user" => $user]);
    }

    public function create(User $user): void {
        $this->render("create", []);
    }

    public function update(User $user): void {
        $user = null; 
        $this->render("update", ["user" => $user]);
    }
    public function checkCreate(User $user): void {
     
        
    }
    
    public function checkUpdate(User $user): void { 
        }

    public function delete(): void {
        
        $this->render("delete", []);
    }
}