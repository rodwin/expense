<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author rodwin
 */
use Expense\Admin\Users\UserRepositoryInterface;

class UsersController extends BaseController {

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function getIndex()
    {
        $users = $this->users->findAll();
        
        return View::make('users.index', compact('users'));
    }

}