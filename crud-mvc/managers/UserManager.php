<?php 

class UserManager extends AbstractManager {

    public function __construct(){
        parent::__construct();
    }

     
       public function findALL(): array { 

    $query = $this->db->prepare("SELECT * FROM users");
    $query->execute();

    $users = [];

    $datas = $query->fetchAll(PDO::FETCH_ASSOC); // récupère toutes les lignes

    foreach ($datas as $data){
        $user = new User(
            $data['id'],
            $data['firstName'],
            $data['lastName'],
            $data['email']
        );

        $users[] = $user;
    }
  
       }
       
     //******************************
     //************************************
       
       public function findOne(int $id): User{
       
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

   $user= new User(
        $data['id'],
        $data['firstName'],
        $data['lastName'],
        $data['email']

    );
    return $user;
    
} 

//***********************************************
//*************************************************
     public function create (User $user){
         
         $query = $this->db->prepare(
            "INSERT INTO users (firstName, lastName, email)
             VALUES (:firstName, :lastName, :email,)"
        );

        $parameters = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
        ];
 

        $query->execute($parameters);

        $user->setId($this->db->lastInsertId());

        return $user;
    }
    
    //***********************************************
    //*********************************
    public function check_create(User $user):void{
        
       if ($newUser->getId() !== null) {
        echo "User créé avec succès";
    } else {
        echo "Erreur lors de la création";
    }
    }
    
    
    
    //**********************************************
    //**********************************************************
       public function update(User $user) : User{
        

    $query = $this->db->prepare(
        "UPDATE users 
         SET firstName = :firstName,
             lastName = :lastName,
             email = :email,

         WHERE id = :id"
    );

    $params = [
        'id' => $user->getId(),
        'firstName' => $user->getFirstName(),
        'lastName' => $user->getLastName(),
        'email' => $user->getEmail(),

    ];

    $query->execute($params);

    return $user;
}
     //*****************************************************
     //************************************************
     public function check_update():void {
         
         
         
         
     }
    
       //*******************************
       //***********************************
       
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