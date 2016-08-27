<?php

class UsersModel extends BaseModel
{
    public function getAll() : array {
        $statement= self::$db->query(
            "Select * from users order by username");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    public function login(string $username, string $password){
        $statement=self::$db->prepare(
            "Select id, password_hash from users where username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result=$statement->get_result()->fetch_assoc();
        if(password_verify($password, $result['password_hash']))
        return $result['id'];
        return false;

    }

    public function register(string $username, string $password, string $full_name){
        $password_hash= password_hash($password, PASSWORD_DEFAULT);
        $statement=self::$db->prepare(
            "Insert into users (username, password_hash, full_name) values (?,?,?)");
        $statement->bind_param("sss", $username, $password_hash, $full_name);
        $statement->execute();
        if($statement->affected_rows!=1){
            return false;
        }
        $user_id=self::$db->query("Select last_insert_id()")->fetch_row()[0];
        return $user_id ;
    }

    // TODO: your database access functions for the user register / login will come here ...
}
