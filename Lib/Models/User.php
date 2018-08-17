<?php

namespace Lib\Models;
use Lib\Core\Database;

/**
 * Class User
 * @package Lib\Models
 */
class User extends Database{
    /**
     * The database table name to which this class User represents
     *
     * @var string
     */
    private $table = "users";

    /**
     * Gets all the users
     */
    public function getAllUsers() {
        $sql = "SELECT * FROM $this->table";
        $db = new Database();
        return $db->_db->query($sql);
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