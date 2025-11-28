<?php

namespace App\Policies;

use App\Models\Planta;
use App\Models\User;
use App\Http\Controllers\PermissionController;

class PlantaPolicy
{
    public function viewAny(User $user): bool
    {
        return PermissionController::isAuthorized('planta.index');
    }
    /*
     * Pode ver planta específica
     */
    public function view(User $user, Planta $planta): bool
    {
        return PermissionController::isAuthorized('planta.index'); 
        // ou: 'planta.view' se você tiver essa permissão separada
    }

    /**
     * Pode criar
     */
    public function create(User $user): bool
    {
        return PermissionController::isAuthorized('planta.create');
    }

    /**
     * Pode atualizar
     */
    public function update(User $user, Planta $planta): bool
    {
        return PermissionController::isAuthorized('planta.edit');
    }

    /**
     * Pode deletar
     */
    public function delete(User $user, Planta $planta): bool
    {
        return PermissionController::isAuthorized('planta.delete');
    }

    /**
     * Pode restaurar (se tiver soft delete)
     */
    public function restore(User $user, Planta $planta): bool
    {
        return PermissionController::isAuthorized('planta.restore');
    }
    /**
     * Pode deletar permanentemente
     */
    public function forceDelete(User $user, Planta $planta): bool
    {
        return PermissionController::isAuthorized('planta.delete');
    }
}
