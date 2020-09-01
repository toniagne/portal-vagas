<?php

namespace App\Models;

use App\Notifications\SendEmailVerificationNotification;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;

class Candidate extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes, CanResetPassword;

    protected $guard = 'candidate';
    protected $broker = 'candidates';

    protected $fillable = [
        'city_id',
        'career_id',
        'job_regime_id',
        'proficiency_id',
        'specialization_id',
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'born_date',
        'email_verified',
        'profile_strength',
        'profile_completed',
        'english_proficiency',
        'address_street',
        'address_number',
        'address_neighborhood',
        'address_complement',
        'deficient',
        'active',
    ];

    /**
     * Send the email verification
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
       $this->notify(new SendEmailVerificationNotification);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jobRegime()
    {
        return $this->belongsTo(JobRegime::class, 'job_regime_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proficiency()
    {
        return $this->belongsTo(Proficiency::class, 'proficiency_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function networks()
    {
        return $this->belongsToMany(SocialNetwork::class, 'candidate_social_networks', 'candidate_id', 'social_network_id')
            ->withPivot(['url'])
            ->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences()
    {
        return $this->hasMany(CandidateExperience::class, 'candidate_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificates()
    {
        return $this->hasMany(CandidateCertificates::class, 'candidate_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'candidate_skills', 'candidate_id', 'skill_id')
            ->withPivot(['level'])
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_applications', 'candidate_id', 'job_id')
            ->withPivot(['matching'])
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salary()
    {
        return $this->hasMany(CandidateWageClaim::class, 'candidate_id', 'id');
    }


    public function getSkills(){
        return $this->hasMany(CandidateSkill::class, 'candidate_id', 'id');
    }

    // RETORNA AS VAGAS INSCRITAS
    public function applications(){
        return $this->hasMany(JobApplication::class, 'candidate_id', 'id');
    }


    /**
     * @return string
     */
    public function getGuardAttribute()
    {
        return $this->guard;
    }

    /**
     * @return int
     */
    public function getProfileStrengthAttribute()
    {
        $strength = 0;
        $strengthValue = 15;

        if ($this->specialization()->count())  $strength+= $strengthValue;

        if ($this->experiences()->count())     $strength+= $strengthValue;

        if ($this->certificates()->count())    $strength+= $strengthValue;

        if ($this->skills()->count())          $strength+= $strengthValue;

        if ($this->city()->count())            $strength+= 5;

        $strength+= $this->calculateInformationStrength();


        return $strength;
    }


    /**
     * @return float
     */
    public function calculateInformationStrength()
    {
        // valor total da soma das verificações unitarias acima.
        $amountUnitStrength = 65;

        // valor de cada atributo para verificação, com base no valor total, dividido pelo numero restante de colunas para verificação
        $strengthPerAttribute = $this->getStrengthAttributesValue($amountUnitStrength);

        $informationStrength = 0;

        foreach($this->getStrengthAttributes() as $attribute)
        {
            if ( !empty($this->attributes[$attribute])) $informationStrength+= $strengthPerAttribute;
        }

        return round($informationStrength);
    }

    /**
     * @param $amountStrength
     * @return float
     */
    public function getStrengthAttributesValue($amountStrength)
    {
        $strengthToVerify = (100 - $amountStrength);

        return round(($strengthToVerify / count($this->getStrengthAttributes())), 2);
    }

    /**
     * @return array
     */
    public function getStrengthAttributes()
    {
        return [
            'born_date',
            'phone',
            'email_verified_at',
            'avatar',
            'english_proficiency',
            'personal_summary',
            'address_street',
            'address_number',
            'address_neighborhood',
        ];
    }

    // RETORNA AS HABILIDADES
    public function employedSituation(){
        switch ($this->employed){
            case 0: return 'Desempregado'; ;break;
            case 1: return 'Empregado'; break;
        }


    }
}
