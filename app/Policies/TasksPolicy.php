<?php

namespace App\Policies;
use App\Project;
use App\User;
use App\ProjectTasks;
use Illuminate\Auth\Access\HandlesAuthorization;

class TasksPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any project tasks.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the project tasks.
     *
     * @param User $user
     * @param ProjectTasks $projectTasks
     * @return mixed
     */
    public function view(User $user, ProjectTasks $projectTasks)
    {
        //
    }

    /**
     * Determine whether the user can create project tasks.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
      return $project->owner_id == $user->id;
    }

    /**
     * Determine whether the user can update the project tasks.
     *
     * @param User $user
     * @param ProjectTasks $projectTasks
     * @return mixed
     */
    public function update(User $user, ProjectTasks $projectTasks)
    {
        //
    }

    /**
     * Determine whether the user can delete the project tasks.
     *
     * @param User $user
     * @param ProjectTasks $projectTasks
     * @return mixed
     */
    public function delete(User $user, ProjectTasks $projectTasks)
    {
        //
    }

    /**
     * Determine whether the user can restore the project tasks.
     *
     * @param User $user
     * @param ProjectTasks $projectTasks
     * @return mixed
     */
    public function restore(User $user, ProjectTasks $projectTasks)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project tasks.
     *
     * @param User $user
     * @param ProjectTasks $projectTasks
     * @return mixed
     */
    public function forceDelete(User $user, ProjectTasks $projectTasks)
    {
        //
    }
}
