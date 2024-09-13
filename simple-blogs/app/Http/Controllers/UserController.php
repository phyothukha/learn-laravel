<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function clacTax($salary, $taxPercentage = 0.15)
    {
        return floor($salary * $taxPercentage);
    }

    public function netSalary($salary)
    {
        return $salary - $this->clacTax($salary);
    }
    public function index()
    {
        $users = User::where("nation", "mm")->paginate(5)->through(function ($user) {
            $user->tax = $this->clacTax($user->salary);
            $user->net_salary = $this->netSalary($user->salary);
            return $user;
        });
        return $users;
    }
}
