<?php
namespace Expense\Admin\Users;

interface UserRepositoryInterface {
    
    public function findAll();
    
    public function findByID($id);
    
    public function findByEmail($email);

}
