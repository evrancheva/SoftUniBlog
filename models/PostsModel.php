<?php

/**
 * Created by PhpStorm.
 * User: alenn_000
 * Date: 14.8.2016 г.
 * Time: 16:38
 */
class PostsModel extends BaseModel
{
    public function getAll():array
    {
        $statement= self::$db->query(
            "Select * from posts order by date desc");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    public function getById(int $id)
    {
        $statement=self::$db->prepare(
            "Select * from posts where id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result=$statement->get_result()->fetch_assoc();
        return $result;
    }
    public function create(string $title, string $content, int $user_id):bool
    {
        $statement=self::$db->prepare(
            "Insert into posts(title, content, user_id) values(?,?,?)");
        $statement->bind_param("ssi",$title, $content, $user_id);
        $statement->execute();
        return $statement->affected_rows==1;
    }

    public function edit(string $id, string $title, string $content, string $date, int $user_id):bool
    {
        $statement=self::$db->prepare(
            "Update posts set title=?, ".
        "content = ?, date=?, user_id=? where id=?");
        $statement->bind_param("sssii",$title, $content, $date, $user_id, $id);
        $statement->execute();
        return $statement->affected_rows>=0;
    }
    public function delete(int $id):bool
    {
            $statement= self::$db->prepare(
                "Delete from posts where id=?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows==1;
    }

}