<?php

namespace App\Models\UsersModelsMethods;
use PDO;
trait DeleteUsersMethods {
   
    function deleteUsers($id) {
        $sql = "DELETE FROM users  WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

   

}