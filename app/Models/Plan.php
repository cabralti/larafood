<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'url',
        'price',
        'description'
    ];

    /**
     * Get Profiles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * Profile not linked with this profile
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function ($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->where('plan_profile.plan_id', $this->id);
        })->where(function ($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $profiles;
    }

    public function details()
    {
        // 1 - N
        return $this->hasMany(DetailPlan::class);
    }

    public function search($filter = null)
    {
        $results = $this
            ->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate();
        return $results;
    }
}
