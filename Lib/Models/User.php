<?php

namespace Lib\Models;

class User {
    private $table = "users";

    public function getAllUsers() {
        $sql = "SELECT * FROM $this->table";

    }
}