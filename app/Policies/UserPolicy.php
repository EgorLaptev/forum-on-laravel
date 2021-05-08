<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function demote(User $user, User $targetUser)
    {
        if($targetUser['role_id'] == 3) return false;

        if($user['role_id'] >= 2) {
            if($user['role_id'] == 2) {
                if($targetUser['role_id'] <= 1) return true;
                else return false;
            } else return true;
        } else return false;
    }

    public function empowerment(User $user, User $targetUser)
    {

        if(
           ( /* Admins can empowerment everything*/
                $user['role_id'] == 3 &&
                $targetUser['role_id'] <= 2
           )
            ||
           ( /* Moders can empowerment only users */
                $user['role_id'] == 2 &&
                $targetUser['role_id'] == 0
           )
        ) return true;

    }

    public function delete(User $targetUser)
    {
        return true;
    }

}
