<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

// ROTAS DO SITE
Route::group(['namespace' => 'Candidate'], function()
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('vagas', 'HomeController@jobs')->name('home.jobs');
    Route::get('recrutador', 'HomeController@recruiter')->name('company');
    Route::get('carreiras', 'CareersController@index')->name('home.careers');
    Route::get('contato', 'ContactController@index')->name('home.contact');
    Route::get('sobre', 'AboutController@index')->name('home.about');

    // ROTAS DO DASH DO CANDIDATO
    Route::group(['middleware' => ['auth:candidate']], function()
    {
        Route::group(['prefix' => 'candidato'], function() {
            Route::get('/', ['as'=>'candidate.dash',  'uses' => 'CandidateController@index']);
            Route::get('/perfil', 'CandidateController@profile')->name('candidate.profile');
            Route::put('/', 'CandidateController@update')->name('candidate.update');
        });

        Route::group(['prefix' => '/job'], function() {
            Route::post('/{job}/apply', 'JobsController@apply')->name('jobs.apply');
        });

    });
});


// ROTAS DO DASH ADMIN
Route::group(['prefix'=>'/recrutador',  'namespace' => 'Recruiter', 'middleware' => ['auth']], function()
{
    Route::get('/', ['as' => 'admin.dash', 'uses' => 'AdminController@index']);
    Route::get('/configuracoes', ['as' => 'admin.settings', 'uses' => 'AdminController@settings']);

    Route::get('/candidatos', ['as' => 'candidates', 'uses' => 'CandidateController@index']);
    Route::get('/candidatos/{id}', ['as' => 'candidates.show', 'uses' => 'CandidateController@show']);

    Route::get('/historico', ['name'=>'Histórico', 'as' => 'admin.histories', 'uses' => 'HistoriesController@index']);
    Route::resource('/categorias', 'JobCategoriesController',  [
        'names' => [
            'index' => 'job-categories',
            'create' => 'job-categories.create',
            'store' => 'job-categories.store',
            'show' => 'job-categories.show',
            'edit' => 'job-categories.edit',
            'update' => 'job-categories.update',
            'destroy' => 'job-categories.destoy'
        ]
    ]);
    Route::post('/categorias/{id}', ['as' => 'job-categories.delete', 'uses' => 'JobCategoriesController@delete']);


    // JOB REGIME
    Route::resource('/regime-contratacoes', 'JobRegimeController', [
        'names' => [
            'index' => 'job-regime',
            'create' => 'job-regime.create',
            'store' => 'job-regime.store',
            'edit' => 'job-regime.edit',
            'update' => 'job-regime.update',
            'destroy' => 'job-regime.destoy'
        ]
    ]);
    Route::post('/regime-contratacoes/{id}', ['as' => 'job-regime.delete', 'uses' => 'JobRegimeController@delete']);

    // SPECIALIZATIONS
    Route::resource('/especializacoes', 'SpecializationController', [
        'names' => [
            'index' => 'specialization',
            'create' => 'specialization.create',
            'store' => 'specialization.store',
            'edit' => 'specialization.edit',
            'update' => 'specialization.update',
            'destroy' => 'specialization.destoy'
        ]
    ]);
    Route::post('/especializacoes/{id}', ['as' => 'specialization.delete', 'uses' => 'SpecializationController@delete']);


    // SPECIALIZATIONS
    Route::resource('/proficiencias', 'ProficienciesController', [
        'names' => [
            'index' => 'proficiencie',
            'create' => 'proficiencie.create',
            'store' => 'proficiencie.store',
            'edit' => 'proficiencie.edit',
            'update' => 'proficiencie.update',
            'destroy' => 'proficiencie.destoy'
        ]
    ]);
    Route::post('proficiencias/{id}', ['as' => 'proficiencie.delete', 'uses' => 'ProficienciesController@delete']);

    // SPECIALIZATIONS
    Route::resource('/habilidades', 'SkillsController', [
        'names' => [
            'index' => 'skill',
            'create' => 'skill.create',
            'store' => 'skill.store',
            'edit' => 'skill.edit',
            'update' => 'skill.update',
            'destroy' => 'skill.destoy'
        ]
    ]);
    Route::post('/habilidades/{id}', ['as' => 'skill.delete', 'uses' => 'SkillsController@delete']);
    Route::get('/habilidades/visualizar/{id}', ['as' => 'skill.show', 'uses' => 'SkillsController@show']);


    // SPECIALIZATIONS
    Route::resource('/vagas', 'JobController', [
        'names' => [
            'index' => 'jobs',
            'create' => 'jobs.create',
            'store' => 'jobs.store',
            'show' => 'jobs.show',
            'edit' => 'jobs.edit',
            'update' => 'jobs.update',
            'destroy' => 'jobs.destoy'
        ]
    ]);
    Route::post('/vagas/{id}', ['as' => 'jobs.delete', 'uses' => 'JobController@delete']);
    Route::post('/vagas/publicar/{id}', ['as' => 'jobs.publish', 'uses' => 'JobController@publish']);
    Route::post('/vagas/concluir/{id}', ['as' => 'jobs.finished', 'uses' => 'JobController@finished']);
    Route::post('/vagas/favoritar/{id}', ['as' => 'jobs.favorite', 'uses' => 'JobController@favorite']);
    Route::post('/vagas/rejeitar/{id}', ['as' => 'jobs.reject', 'uses' => 'JobController@reject']);

    // RECRUTADORES
    Route::resource('/recrutadores', 'RecruitersController', [
        'names' => [
            'index' => 'recruiter',
            'create' => 'recruiter.create',
            'store' => 'recruiter.store',
            'edit' => 'recruiter.edit',
            'show' => 'recruiter.show',
            'update' => 'recruiter.update',
            'destroy' => 'recruiter.destoy'
        ]
    ]);
    Route::post('/recrutadores/{id}', ['as' => 'recruiter.delete', 'uses' => 'RecruitersController@delete']);
    Route::post('/recrutadores/password-resend/{id}', ['as' => 'recruiter.resend-password', 'uses' => 'RecruitersController@passowrdResend']);
    Route::post('/recrutadores/change-status/{id}', ['as' => 'recruiter.status', 'uses' => 'RecruitersController@status']);

    // RECRUTADORES
    Route::resource('/beneficios', 'BenefitsController', [
        'names' => [
            'index' => 'benefits',
            'create' => 'benefits.create',
            'store' => 'benefits.store',
            'edit' => 'benefits.edit',
            'update' => 'benefits.update',
            'destroy' => 'benefits.destoy'
        ]
    ]);
    Route::post('/beneficios/{id}', ['as' => 'benefits.delete', 'uses' => 'BenefitsController@delete']);

    // CARGOS
    Route::resource('/cargos', 'PositionsController', [
        'names' => [
            'index' => 'positions',
            'create' => 'positions.create',
            'store' => 'positions.store',
            'edit' => 'positions.edit',
            'update' => 'positions.update',
            'destroy' => 'positions.destoy'
        ]
    ]);
    Route::post('/cargos/{id}', ['as' => 'positions.delete', 'uses' => 'PositionsController@delete']);

    // CARRERIAS
    Route::resource('/carreiras', 'CareersController', [
        'names' => [
            'index' => 'careers',
            'create' => 'careers.create',
            'store' => 'careers.store',
            'edit' => 'careers.edit',
            'update' => 'careers.update',
            'destroy' => 'careers.destoy'
        ]
    ]);
    Route::post('/carreiras/{id}', ['as' => 'careers.delete', 'uses' => 'CareersController@delete']);


    // CARRERIAS
    Route::resource('/redes-sociais', 'SocialNetworkController', [
        'names' => [
            'index' => 'social.networks',
            'create' => 'social.networks.create',
            'store' => 'social.networks.store',
            'edit' => 'social.networks.edit',
            'update' => 'social.networks.update',
            'destroy' => 'social.networks.destoy'
        ]
    ]);
    Route::post('/redes-sociais/{id}', ['as' => 'social.networks.delete', 'uses' => 'SocialNetworkController@delete']);
});

