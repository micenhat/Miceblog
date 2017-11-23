<?php

namespace App\Policies;

use App\Model\admin\admin;
use App\Model\user;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Admin  $admin
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
        
        return $this->getPermission($user,10);
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
