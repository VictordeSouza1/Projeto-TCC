<?php

namespace App\Policies;

use App\Models\Treatment;
use App\Models\User;
use App\Http\Controllers\PermissionController;

class TreatmentPolicy
{
    /**
     * Determine whether the user can view any treatments.
     */
    public function viewAny(User $user): bool
    {
        return PermissionController::isAuthorized('tratamento.index');
    }

    /**
     * Determine whether the user can view a treatment.
     */
    public function view(User $user, Treatment $treatment): bool
    {
        return PermissionController::isAuthorized('tratamento.index');
    }

    /**
     * Determine whether the user can create treatments.
     */
    public function create(User $user): bool
    {
        return PermissionController::isAuthorized('tratamento.create');
    }

    /**
     * Determine whether the user can update a treatment.
     */
    public function update(User $user, Treatment $treatment): bool
    {
        return PermissionController::isAuthorized('tratamento.edit');
    }

    /**
     * Determine whether the user can delete a treatment.
     */
    public function delete(User $user, Treatment $treatment): bool
    {
        return PermissionController::isAuthorized('tratamento.delete');
    }

    /**
     * Determine whether the user can restore a treatment.
     */
    public function restore(User $user, Treatment $treatment): bool
    {
        return PermissionController::isAuthorized('tratamento.delete');
    }

    /**
     * Determine whether the user can permanently delete a treatment.
     */
    public function forceDelete(User $user, Treatment $treatment): bool
    {
        return PermissionController::isAuthorized('tratamento.delete');
    }
}
