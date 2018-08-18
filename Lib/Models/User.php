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
            if($row['status']==0){
                throw new errorException("Your account has been suspended, please contact administrator");
            }
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