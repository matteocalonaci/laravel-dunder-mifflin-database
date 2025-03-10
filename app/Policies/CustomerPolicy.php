<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Customer;

class CustomerPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Customer $customer)
    {
        return $user->isAdmin() || $customer->employee_id === $user->id;
    }

    public function create(User $user)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function update(User $user, Customer $customer)
    {
        return $user->isAdmin() || $customer->employee_id === $user->id;
    }

    public function delete(User $user, Customer $customer)
    {
        return $user->isAdmin();
    }
}
