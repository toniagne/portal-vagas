<?php

namespace App\Models;

use App\Models\JobCategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'job_category_id',
        'job_regime_id',
        'proficiency_id',
        'specialization_id',
        'title',
        'primary_activities',
        'mandatory_requirements',
        'differential_knowledges',
        'wage_start',
        'wage_end',
        'wage_negociation',
        'published',
        'finished',
    ];


    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function regime()
    {
        return $this->belongsTo(JobRegime::class, 'job_regime_id');
    }

    public function proficiency()
    {
        return $this->belongsTo(Proficiency::class, 'proficiency_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function applications(){
        return $this->hasMany(JobApplication::class, 'job_id', 'id');
    }

    public function getSkills(){
        return $this->hasMany(JobSkill::class, 'job_id', 'id');
    }

    public function getBenefits(){
        return $this->hasMany(JobBenefit::class, 'job_id', 'id');
    }

    public function skills()
    {
        return $this->belongsToMany(JobSkill::class, 'job_skills', 'job_id', 'skill_id')->withTimestamps();
    }

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'job_benefits', 'job_id', 'job_benefit_id')->withTimestamps();
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'job_applications', 'job_id', 'candidate_id')
            ->withPivot(['matching'])
            ->withTimestamps();
    }

    public function scopeNotFinished($query)
    {
        return $query->where('finished', 0);
    }

    public function scopeHasPublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeWageNegotiation($query)
    {
        return $query->where('wage_negociation', 1);
    }

    public function getDaysGoAttribute()
    {
        $day = Carbon::now()->diffInDays($this->attributes['created_at']);

        return $day ? "{$day} dias atrás" : 'Hoje';
    }

    public function setSkills($args){
        $this->skills()->sync($args);
    }

    public function setBenefits($args){
        $this->benefits()->sync($args);
    }

    public static function convertMonetary($args){
        $numberConverted = str_replace(".", "", $args);
        return number_format( floatval($numberConverted), 2, '.', '');
    }

    public function published(){
        switch($this->published){
            case 0: return "Em análise"; break;
            case 1: return "Publicado"; break;
        }
    }

    public function finished(){
        switch($this->finished){
            case 0: return "Aceitando candidaturas"; break;
            case 1: return "Vencida"; break;
        }
    }
}
