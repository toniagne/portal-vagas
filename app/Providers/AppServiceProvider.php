<?php

namespace App\Providers;

use App\Models\Candidate;
use App\Models\CandidateExperience;
use App\Models\Career;
use App\Models\City;
use App\Models\History;
use App\Models\Job;
use App\Models\JobRegime;
use App\Models\Proficiency;
use App\Models\Role;
use App\Models\SocialNetwork;
use App\Models\Specialization;
use App\Models\State;
use App\Observers\HistoryObserver;
use App\Observers\JobRegimeObserver;
use App\Observers\JobsCategoryObserver;
use App\Observers\JobsObserver;
use App\Observers\ProficiencyObserver;
use App\Observers\SpecializationObserver;
use App\Observers\CityObserver;
use App\Observers\CareerObserver;
use App\Observers\CandidateObserver;
use App\Observers\CandidateExperienceObserver;
use App\Observers\SocialNetworkObserver;
use App\Observers\RoleObserver;
use App\Observers\StateObserver;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // HELPER PARA CONVERSÃO DE NUMEROS MONETÁRIOS
        Blade::directive('convertMoney', function ($money) {
            return "R$ <?php echo  number_format($money, 2, '.', ',');  ?>";
        });


       Schema::defaultStringLength(191);

        view()->composer('*', function($view)
        {
            view()->share('auth', Auth::guard()->user() ?: Auth::guard('candidate')->user());

            if(Route::current() && Str::contains(
                Arr::get(Route::current()->getAction(), 'namespace'), ['Recruiter'])
            ) {

            }
        });



       //OBSERVADORES
        City::observe(CityObserver::class);
        CandidateExperience::observe(CandidateExperienceObserver::class);
//        Candidate::observe(CandidateObserver::class);
        Career::observe(CareerObserver::class);
        History::observe(HistoryObserver::class);
        Job::observe(JobsObserver::class);
        JobCategory::observe(JobsCategoryObserver::class);
        JobRegime::observe(JobRegimeObserver::class);
        Proficiency::observe(ProficiencyObserver::class);
        Role::observe(RoleObserver::class);
        SocialNetwork::observe(SocialNetworkObserver::class);
        Specialization::observe(SpecializationObserver::class);
        State::observe(StateObserver::class);



    }
}
