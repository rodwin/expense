<?php

namespace Expense\Admin\Users;

use User;

class UserRepository implements UserRepositoryInterface {
    
    public function findAll() {
        
        return User::all();
        
    }

    public function findByID($id) {

        return User::findOrFail($id);
        
    }

    public function findByEmail($email) {
        
        return User::where('email', '=', $email)->firstOrFail();
        
    }

}
