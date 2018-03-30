<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'larabbs');

// Project name
set('repository', 'git@gitee.com:dengyupeng/larabbs.git');


// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);

// Hosts

host('eiomi_test')
    ->stage('test')
    ->set('branch','dev')
    ->set('deploy_path', '/var/www/larabbs');
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');

