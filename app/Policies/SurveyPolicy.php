<?php

namespace App\Policies;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SurveyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Todos pueden ver la lista de encuestas
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Survey $survey): bool
    {
        if ($survey->is_active) {
            return true; // Cualquiera puede ver una encuesta activa
        }
        return $user->id === $survey->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Usuarios autenticados pueden crear encuestas
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Survey $survey): bool
    {
        return $user->id === $survey->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Survey $survey): bool
    {
        return $user->id === $survey->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Survey $survey): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Survey $survey): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the survey results.
     */
    public function viewResults(User $user, Survey $survey): bool
    {
        return $user->id === $survey->user_id;
    }

    /**
     * Determine whether the user can respond to the survey.
     */
    public function respond(User $user, Survey $survey): bool
    {
        // No permitir responder si ya respondió
        if ($survey->responses()->where('user_id', $user->id)->exists()) {
            return false;
        }

        // No permitir responder si la encuesta expiró
        if ($survey->expires_at && $survey->expires_at->isPast()) {
            return false;
        }

        return $survey->is_active;
    }
}
