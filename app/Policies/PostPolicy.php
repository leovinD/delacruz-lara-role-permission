<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Post $post): bool
    {

        // if($user->hasRole('admin') || $user->hasRole('super_admin')){
        //     return true;
        // }

        //check if the user has a role of admin or editor
        if($user->hasAnyRole(['admin', 'editor'])){
            return true;
        }

        return $user->can('view any post');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        if($user->hasAnyRole(['admin', 'super_admin'])){
            return true;
        }
        
        if($user->hasRole('editor') && $user->can('view posts')){
            return true;
        }

        if($user->hasRole('author') && $user->id === $post->user_id){
            return true;
        }

        return $user->can('view posts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasAnyRole(['admin', 'manager', 'editor', 'author', 'contributor']);

        if($user->hasRole('admin') || $user->hasRole('editor')){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
         // Admin and manager can edit all posts
        //  if ($user->hasAnyRole(['admin', 'manager', 'editor'])) {
        //     return true;
        // }

        // Author can edit their own posts
        // return $user->hasRole('author') && $user->id === $post->user_id;

        if($user->hasRole('admin')){
            return true;
        }

        if($user->hasRole('editor')  && $user->can('update posts')){
            return true;
        }

        if($user->hasRole('author') && $user->id === $post->user_id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        // Admin and manager can delete all posts
        // if ($user->hasAnyRole(['admin', 'manager'])) {
        //     return true;
        // }

        // Author can delete their own posts
        // return $user->hasRole('author') && $user->id === $post->user_id;

        if($user->hasRole('admin')){
            return true;
        }

        if($user->hasRole('editor')  && $user->can('delete posts')){
            return true;
        }

        if($user->hasRole('author') && $user->id === $post->user_id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        if($user->hasAnyRole(['admin', 'super_admin'])){
            return true;
        }
        
        if($user->hasRole('editor') && $user->can('restore posts')){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        if($user->hasAnyRole(['admin', 'super_admin'])){
            return true;
        }
        
        if($user->hasRole('editor') && $user->can('force delete posts')){
            return true;
        }

        return false;
    }

    // public function publish(User $user): bool
    // {
    //     return $user->hasAnyRole(['admin', 'manager', 'editor']);
    // }
}
