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
