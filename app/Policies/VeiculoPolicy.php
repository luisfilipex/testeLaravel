<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Auth\Access\HandlesAuthorization;

class VeiculoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create veiculos.
     */
    public function create(User $user)
{
    return $user->isAdmin();
}

public function update(User $user, Veiculo $veiculo)
{
    return $user->isAdmin();
}

public function delete(User $user, Veiculo $veiculo)
{
    return $user->isAdmin();
}

}
