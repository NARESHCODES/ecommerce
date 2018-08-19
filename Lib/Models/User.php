<?php

namespace Lib\Models;
use Lib\Core\errorException;
use Lib\Core\Database;

/**
 * Class User
 *
 * @package Lib\Models
 */
class User extends Database{
    /**
     * The database table name to which this class User represents
     *
     * @var string
     */
    protected $table = "users";


        /**
     * Creates new user with the data submitted from the form
     *
     * @param $data
     * @throws \Exception
     */
    public function create($data) {
        if(empty($data['full_name'])) {
            throw new errorException("Full name is required field, please fill in full name.");
        }

        if(empty($data['email'])) {
            throw new errorException("Email is required field, please fill in Email address.");
        }

        if(strlen($data['password']) < 5) {
            throw new errorException("Password field must be at least 5 characters long.");
        }
        
        $stmt = $this->_connection->prepare("SELECT id FROM users WHERE username=?");
        $stmt->execute([$data['username']]);
        if($stmt->rowCount() > 0) {
            throw new \Exception("Username <strong>{$data['username']}</strong> already exists. Please choose different username.");
        }

        $sql = "INSERT INTO $this->table SET 
                full_name=?,
                username=?,
                email=?,
                password=?,
                photo_name=?,
                status=?
                ";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([
            $data['full_name'],
            $data['username'],
            $data['email'],
            md5($data['password']),
            $data['photo_name'],
            $data['status']
        ]);
    }

public function update($data, $id) {
        if(empty($data['full_name'])) {
            throw new errorException("Full name is required field, please provide full name.");
        }

        if(empty($data['email'])) {
            throw new errorException("Email is required field, please provide Email address.");
        }

        if(!empty($data['password']) && strlen($data['password']) < 5) {
            throw new errorException("Password field must be at least 5 characters long.");
        }

        if(!empty($data['password'])) {
            $sql = "UPDATE $this->table SET 
                full_name=?,
                email=?,
                password=?,
                photo_name=?,
                status=?
                WHERE id=?";

            $updateData = [
                $data['full_name'],
                $data['email'],
                md5($data['password']),
                $data['photo_name'],
                $data['status'],
                $id
            ];
        }
        else {
            $sql = "UPDATE $this->table SET 
                full_name=?,
                email=?,
                photo_name=?,
                status=?
                WHERE id=?";
            $updateData = [
                $data['full_name'],
                $data['email'],
                $data['photo_name'],
                $data['status'],
                $id
            ];
        }

        $statement = $this->_connection->prepare($sql);
        $statement->execute($updateData);
    }



      /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function checkLogin($username, $password) {
        $sql = "SELECT * FROM $this->table WHERE username=? AND password=? ";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([$username, md5($password)]);

        if($statement->rowCount() > 0) {
            $_SESSION['_admin_user'] = true;
            $row = $statement->fetch(\PDO::FETCH_ASSOC);
            
            $statement=$this->_connection->prepare("UPDATE $this->table SET last_login=? WHERE id=?");
            $statement->execute([date('Y-m-d H:i:s'),$row['id']]);

            $_SESSION['_admin_user']=true;
            $_SESSION['_user'] = $row;
            return $row;
        }
        else {
            return false;
        }
    }

    /**
     *
     */
    public function logout() {
        session_destroy();
    }

    /**
     * Checks whether an admin user is logged in or not,
     * Returns true if logged in, false otherwise.
     *
     * @return bool
     */
    public function isAdminLogin() {
        if(isset($_SESSION['_admin_user'])) {
            return true;
        }
        else {
            return false;
        }
    }
}