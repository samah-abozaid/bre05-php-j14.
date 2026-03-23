<?php

class UserController extends AbstractController
{
    public function list(): void
    {
        $manager = new UserManager();
        $users = $manager->findAll();

        $this->render("list", ["users" => $users]);
    }

    public function show(int $id): void
    {
        $manager = new UserManager();
        $user = $manager->findOne($id);

        $this->render("show", ["user" => $user]);
    }

    public function create(User $user): void
    {
        $manager = new UserManager();
        $user = $manager->create($user);

        $this->render("create", ["user" => $user]);
    }

    public function update(User $user): void
    {
        $manager = new UserManager();
        $user = $manager->update($user);

        $this->render("update", ["user" => $user]);
    }

    public function delete(int $id): void
    {
        $manager = new UserManager();
        $manager->delete($id);

        $this->render("delete", []);
    }
}