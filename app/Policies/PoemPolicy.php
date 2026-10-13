<?php

namespace App\Policies;

use App\Models\Poem;
use App\Models\User;

/**
 * Ownership policy for poems: anyone may list or view poems, but only the
 * author may create, edit, delete, or restore them. Draft visibility
 * (404 for non-authors) is enforced in the controller, not here.
 */
class PoemPolicy
{
    /**
     * Anyone can see the poem listing; draft filtering happens in the controller.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Anyone can view a poem's show page; unpublished poems are hidden by the controller.
     */
    public function view(User $user, Poem $poem): bool
    {
        return true;
    }

    /**
     * Any logged-in user can write poems.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Only the poem's author can edit it.
     */
    public function update(User $user, Poem $poem): bool
    {
        return $user->id === $poem->user_id;
    }

    /**
     * Only the poem's author can delete (soft-delete) it.
     */
    public function delete(User $user, Poem $poem): bool
    {
        return $user->id === $poem->user_id;
    }

    /**
     * Only the poem's author can restore a soft-deleted poem.
     */
    public function restore(User $user, Poem $poem): bool
    {
        return $user->id === $poem->user_id;
    }

    /**
     * Only the poem's author can permanently delete it.
     */
    public function forceDelete(User $user, Poem $poem): bool
    {
        return $user->id === $poem->user_id;
    }
}
