<?php

class HomeModel extends BaseModel
{
    public  function getLastPosts(int $maxCount=5):array
    {
        $statement= self::$db->query(
            "SELECT posts.id, title, content, date, full_name ".
            "FROM posts left join users on posts.user_id=users.id ".
            "order by date desc limit $maxCount");
        return $statement->fetch_all(MYSQLI_ASSOC);

    }

    public  function getPostById(int $id){
        $statement=self::$db->prepare(
            "Select posts.id, title, content, date, full_name ".
            "from posts left join users on posts.user_id=users.id ".
            "where posts.id=?");
        $statement->bind_param("i",$id);
        $statement->execute();
        $result=$statement->get_result()->fetch_assoc();
        return $result;
        
    }

}
