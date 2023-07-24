<?php
use Illuminate\Support\Facades\Route;

/**
* Templates & Templates Pages Routes
**/
// Home Page
Route::get('/', 'Templates\PagesController@homeView')->name('homeView');

// About Page
Route::group(['prefix' => 'about'], function(){
  Route::get('/', 'Templates\PagesController@aboutView')->name('aboutView');
  Route::get('/{slug}', 'Templates\PagesController@aboutDetailView')->name('aboutDetailView');
});

// Project Pages
Route::get('/projects', 'Templates\ProjectsController@projectsView')->name('projectsView');
Route::get('/project/{slug}', 'Templates\ProjectsController@projectDetailView')->name('projectDetailView');

// Contact Page
Route::get('/contact', 'Templates\PagesController@contactView')->name('contactView');
Route::post('/contact', 'Templates\PagesController@sentEmail')->name('sentEmail');

// Defalt Authenticatin
Auth::routes();


/**
* Admin & Admin Pages Routes
**/
Route::group(['prefix' => 'admin'], function(){
  // Admin View with Authenticatin
  Route::get('/', 'Admin\PagesController@adminView')->name('adminView');
  Route::get('/login', 'Admin\Auth\AuthController@showLoginForm')->name('loginView');
  Route::post('/login', 'Admin\Auth\AuthController@processLogin')->name('processLogin');
  Route::post('/logout', function(){
    Auth::logout();
    return redirect()->back();
  })->name('customLogoutPath');

  // Pages route
  Route::group(['prefix' => 'pages'], function(){
    Route::group(['prefix' => 'contact'], function(){
      Route::get('/contact-info', 'Admin\ContactController@adminContactView')->name('adminContactView');
      Route::get('/add-contact', 'Admin\ContactController@addContact')->name('addContact');
      Route::post('/add-contact', 'Admin\ContactController@storeContact')->name('storeContact');
      Route::get('/edit-contact/{id}', 'Admin\ContactController@editContact')->name('editContact');
      Route::post('/edit-contact/{id}', 'Admin\ContactController@updatedContact')->name('updatedContact');
      Route::get('/delete-contact/{id}', 'Admin\ContactController@deletedContact')->name('deletedContact');
    });
  });

  // Categories route
  Route::group(['prefix' => 'category'], function(){
    Route::get('/lists', 'Admin\CategoryController@categoryListsView')->name('categoryListsView');
    Route::get('/add-category', 'Admin\CategoryController@addCategory')->name('addCategory');
    Route::post('/add-category', 'Admin\CategoryController@storeCategory')->name('storeCategory');
    Route::get('/edit-category/{id}', 'Admin\CategoryController@editCategory')->name('editCategory');
    Route::post('/edit-category/{id}', 'Admin\CategoryController@updatedCategory')->name('updatedCategory');
    Route::get('/delete-category/{id}', 'Admin\CategoryController@deleteCategory')->name('deleteCategory');
  });

  // Services route
  Route::group(['prefix' => 'service'], function(){
    Route::get('/lists', 'Admin\ServiceController@serviceLists')->name('serviceLists');
    Route::get('/add-service', 'Admin\ServiceController@addService')->name('addService');
    Route::post('/add-service', 'Admin\ServiceController@storeService')->name('storeService');
    Route::get('/edit-service/{id}', 'Admin\ServiceController@editService')->name('editService');
    Route::post('/edit-service/{id}', 'Admin\ServiceController@updatedService')->name('updatedService');
    Route::get('/delete-service/{id}', 'Admin\ServiceController@deleteService')->name('deleteService');
  });

  // Clients route
  Route::group(['prefix' => 'client'], function(){
    Route::get('/lists', 'Admin\ClientController@clientLists')->name('clientLists');
    Route::get('/add-client', 'Admin\ClientController@addClient')->name('addClient');
    Route::post('/add-client', 'Admin\ClientController@storeClient')->name('storeClient');
    Route::get('/edit-client/{id}', 'Admin\ClientController@editClient')->name('editClient');
    Route::post('/edit-client/{id}', 'Admin\ClientController@updatedClient')->name('updatedClient');
    Route::get('/delete-client/{id}', 'Admin\ClientController@deleteClient')->name('deleteClient');
  });

  // Clients route
  Route::group(['prefix' => 'project'], function(){
    Route::get('/lists', 'Admin\ProjectController@projectLists')->name('projectLists');
    Route::get('/add-project', 'Admin\ProjectController@addProject')->name('addProject');
    Route::post('/add-project', 'Admin\ProjectController@storeProject')->name('storeProject');
    Route::get('/edit-project/{id}', 'Admin\ProjectController@editProject')->name('editProject');
    Route::post('/edit-project/{id}', 'Admin\ProjectController@updatedProject')->name('updatedProject');
    Route::get('/delete-project/{id}', 'Admin\ProjectController@deleteProject')->name('deleteProject');
    // Status Route
    Route::get('/projectstatus/{id}/{s}', 'Admin\ProjectController@projectStatus')->name('projectStatus');
  });

  // Team Route
  Route::group(['prefix' => 'team'], function(){
    Route::get('/lists', 'Admin\TeamController@teamLists')->name('teamLists');
    Route::get('/add-team', 'Admin\TeamController@addTeam')->name('addTeam');
    Route::post('/add-team', 'Admin\TeamController@storeTeam')->name('storeTeam');
    Route::get('/edit-team/{id}', 'Admin\TeamController@editTeam')->name('editTeam');
    Route::post('/edit-team/{id}', 'Admin\TeamController@updatedTeam')->name('updatedTeam');
    Route::get('/delete-team/{id}', 'Admin\TeamController@deleteTeam')->name('deleteTeam');

    Route::group(['prefix' => 'skill'], function(){
      Route::get('/lists', 'Admin\SkillController@skillLists')->name('skillLists');
      Route::get('/add-skill', 'Admin\SkillController@addSkill')->name('addSkill');
      Route::post('/add-skill', 'Admin\SkillController@storeSkill')->name('storeSkill');
      Route::get('/edit-skill/{id}', 'Admin\SkillController@editSkill')->name('editSkill');
      Route::post('/edit-skill/{id}', 'Admin\SkillController@updatedSkill')->name('updatedSkill');
      Route::get('/delete-skill/{id}', 'Admin\SkillController@deleteSkill')->name('deleteSkill');
    });
  });
});
