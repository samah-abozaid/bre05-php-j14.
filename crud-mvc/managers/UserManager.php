<?php 

class UserManager extends AbstractManager {

    public function __construct(){
        parent::__construct();
    }

    // Insérer en base de données
    public function create(User $user) : User {

        $query = $this->db->prepare(
            "INSERT INTO users (firstName, lastName, email, password)
             VALUES (:firstName, :lastName, :email, :password)"
        );

        $params = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ];

        $query->execute($params);

        $user->setId($this->db->lastInsertId());

        return $user;
    }
    //*************************************************
    //***************************************************
    public function update(User $user) : User{
        

    $query = $this->db->prepare(
        "UPDATE users 
         SET firstName = :firstName,
             lastName = :lastName,
             email = :email,
             password = :password
         WHERE id = :id"
    );

    $params = [
        'id' => $user->getId(),
        'firstName' => $user->getFirstName(),
        'lastName' => $user->getLastName(),
        'email' => $user->getEmail(),
        'password' => $user->getPassword()
    ];

    $query->execute($params);

    return $user;
}
       //***********************
       //*****************************************
 public function findAll() : array {

    $query = $this->db->prepare("SELECT * FROM users");
    $query->execute();

    $users = [];

    $datas = $query->fetchAll(PDO::FETCH_ASSOC); // récupère toutes les lignes

    foreach ($datas as $data){
        $user = new User(
            $data['id'],
            $data['firstName'],
            $data['lastName'],
            $data['email'],
            $data['password'],
            DateTime::createFromFormat('Y-m-d H:i:s', $data['created_at'])
        );

        $users[] = $user;
    }

    return $users;
}      
     //************************
     //****************************
     
   public function findById(int $id) : ?User {

    $query = $this->db->prepare(
        "SELECT * FROM users WHERE id = :id"
    );

    $query->execute([
        'id' => $id
    ]);

    $data = $query->fetch(PDO::FETCH_ASSOC);

    if(!$data){
        return null;
    }

    return new User(
        $data['id'],
        $data['firstName'],
        $data['lastName'],
        $data['email'],
        $data['password'],
         DateTime::createFromFormat('Y-m-d H:i:s', $data['created_at'])
    );
}     
        
    public function delete(int $id) : void {

    $query = $this->db->prepare(
        "DELETE FROM users WHERE id = :id"
    );

    $query->execute([
        'id' => $id
    ]);
}    
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

?>