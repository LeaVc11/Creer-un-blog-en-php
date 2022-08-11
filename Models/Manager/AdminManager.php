<?php

namespace App\models\Manager;

use App\Models\Class\User;

class AdminManager extends DbManager
{
    public function isAdmin(User $user)
    {
        if ($user->getRole() === 'admin') {
            return true;
        }
        return false;
    }
}