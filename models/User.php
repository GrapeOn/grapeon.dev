<?php

require_once __DIR__ . '/BaseModel.php';   

class User extends Model
{
    protected static $table = 'users';
    
    protected function insert()
    {
        self::dbConnect();
        $stmt = self::$dbc->prepare("INSERT INTO users (first_name, last_name, email_address, password) 
            VALUES (:first_name, :last_name, :email_address, :password)");
        
        $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
        $stmt->bindValue(':email_address', $this->email_address, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
        
        $stmt->execute();

    }

    protected function update()
    {
        self::dbConnect();
        $stmt = self::$dbc->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email_address = :email_address, password = :password WHERE id = :id");

        $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
        $stmt->bindValue(':email_address', $this->email_address, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_STR);

        $stmt->execute();
    }

    
    public static function find($id)
    {
        self::dbConnect();
        $query = "SELECT * FROM users WHERE id= :id";
        $stmt = self::$dbc->prepare($query);
         $stmt->bindValue(':id', $id, PDO::PARAM_STR);
         $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $instance = null;
        if (!empty($result)) {
            $instance = new static($result); 
        }
        return $instance;
    }

    public static function findByUserName($username)
    {
        self::dbConnect();
        $query = "SELECT * FROM users WHERE username= :username";
        $stmt = self::$dbc->prepare($query);
         $stmt->bindValue(':username', $username, PDO::PARAM_STR);
         $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC); // every result from a db returns an array
        
        $instance = null;
        if (!empty($result)) {
            $instance = new static($result); 
        }
        return $instance;
    }

    public static function all()
    {
        self::dbConnect();
        $stmt = self::$dbc->query("SELECT * from static::$table");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
