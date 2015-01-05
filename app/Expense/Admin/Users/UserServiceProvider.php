<?php 
namespace Expense\Admin\Users;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app['\Expense\Admin\Users\UserRepositoryInterface'] = function() {
            return new UserRepository();
        };
    }

}