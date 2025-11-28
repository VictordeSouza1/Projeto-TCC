<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\PermissionController;

class ProductPolicy
{
    /**
     * Determine whether the user can view any products.
     */
    public function viewAny(User $user): bool
    {
        return PermissionController::isAuthorized('loja.index');
    }

    /**
     * Determine whether the user can view a product.
     */
    public function view(User $user, Product $product): bool
    {
        return PermissionController::isAuthorized('loja.index');
    }

    /**
     * Determine whether the user can create products.
     */
    public function create(User $user): bool
    {
        return PermissionController::isAuthorized('loja.create');
    }

    /**
     * Determine whether the user can update a product.
     */
    public function update(User $user, Product $product): bool
    {
        return PermissionController::isAuthorized('loja.edit');
    }

    /**
     * Determine whether the user can delete a product.
     */
    public function delete(User $user, Product $product): bool
    {
        return PermissionController::isAuthorized('loja.delete');
    }

    /**
     * Determine whether the user can restore a product.
     */
    public function restore(User $user, Product $product): bool
    {
        return PermissionController::isAuthorized('loja.delete');
    }

    /**
     * Determine whether the user can permanently delete a product.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return PermissionController::isAuthorized('loja.delete');
    }
}
