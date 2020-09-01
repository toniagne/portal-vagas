<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialNetwork extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'icon'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_social_networks', 'social_network_id', 'candidate_id')
            ->withPivot(['url'])
            ->withTimestamps();
    }
}
