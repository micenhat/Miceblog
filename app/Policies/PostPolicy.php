<?php

namespace App\Policies;

use App\Model\admin\admin;
use App\Model\user\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can create posts.
     *
     * @param  \App\Model\admin\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user,5);
        return $this->getPermission($user,14);
    }

    /**
     * Determine whether the admin can update the post.
     *
     * @param  \App\Model\admin\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,7);
        return $this->getPermission($user,11);
    }

    /**
     * Determine whether the admin can delete the post.
     *
     * @param  \App\Model\admin\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user,6);
        return $this->getPermission($user,10);
    }
    public function tag(admin $user)
    {
        return $this->getPermission($user,13);
    }
    public function category(admin $user)
    {
        return $this->getPermission($user,12);
    }
    public function role(admin $user)
    {
        return $this->getPermission($user,17);
    }
    public function permission(admin $user)
    {
        return $this->getPermission($user,18);
    }
    protected function getPermission($user,$p_id){
        foreach ($user->roles as $role){
            foreach($role->permissions as  $permission){
                if($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }
}
