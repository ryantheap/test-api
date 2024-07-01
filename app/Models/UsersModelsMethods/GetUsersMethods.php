<?php

namespace App\Models\UsersModelsMethods;
use PDO;
trait GetUsersMethods {
   
    function getUsers($args) {
        
        $where = '';
        foreach (array_keys($args) as $index => $key) {
            $where .= ($index > 0 ? ' AND ' : '') . $key . " = " . $args[$key];
        }
        if($where) {
            $where = "WHERE ".$where;
        }
        $sql = "SELECT * from users $where";
        $stmt = $this->db->query($sql);
    
        if ($stmt->execute()) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($users) {
                 return $users;
            }
            return false;
        }
        return false;
    }

}