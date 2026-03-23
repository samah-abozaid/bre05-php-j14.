<?php 

class UserManager extends AbstractManager {

    public function __construct(){
        parent::__construct();
    }

    // Insérer en base de données
    public function create(User $user) : User {

        $query = $this->db->prepare(
            "INSERT INTO users (firstName, lastName, email, password,created_at)
             VALUES (:firstName, :lastName, :email, :password,:created_at)"
        );

        $parameters = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
              'created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s')
            // DateTime::createFromFormat('Y-m-d H:i:s', $data['created_at'])
        ];
 

        $query->execute($parameters);

        $user->setId($this->db->lastInsertId());

        return $user;
    }
    //  public function create(User $user) : User {
    
    // $query = $this->db->prepare("INSERT INTO users (firstname, lastname, email, password, created_at)
    // VALUES (:firstname, :lastname, :email, :password, :created_at)");
    
    // $parameters = [
    //     "firstname" => $user->getFirstName(),
    //     "lastname" => $user->getLastName(),
    //     "email" => $user->getEmail(),
    //     "password" => $user->getPassword(),
    //     "created_at" => $user->getCreatedAt()->format('Y-m-d H:i:s')
    //     ];
        
    
    // $query->execute($parameters);
    
    
    
    // $id = $this->db->lastInsertId();
    // $user->setId($id);
    
    
    
    // return $user;
    
    // }
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