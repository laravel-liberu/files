<?php

namespace LaravelLiberu\Files\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use LaravelLiberu\Files\Models\Upload as Model;
use LaravelLiberu\Users\Models\User;

class Upload
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin() || $user->isSupervisor()) {
            return true;
        }
    }

    public function view(User $user, Model $upload)
    {
        return $this->ownsUpload($user, $upload);
    }

    public function share(User $user, Model $upload)
    {
        return $this->ownsUpload($user, $upload);
    }

    public function destroy(User $user, Model $upload)
    {
        return $this->ownsUpload($user, $upload);
    }

    private function ownsUpload(User $user, Model $upload)
    {
        return $user->id === (int) $upload->created_by;
    }
}
