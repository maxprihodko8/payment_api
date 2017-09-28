<?php
namespace Deployer;

require 'recipe/symfony3.php';

set('application', '/var/www/html/payment_api_test');
//set('release_path', 'hs');

set('git_tty', true);
set('git_recursive', false);
set('default_stage', 'staging');

set('repository', 'git@github.com:maxprihodko8/payment_api.git');

host('ps3.thehost.com.ua')
    ->user('poolglass1')
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '/var/www/poolglass1/data/www/www.digithive.ru/hs')
    ->set('bin/php', 'php-7.1 -d disable_functions=')
    ->set('writable_mode', 'chmod')
    ->set('keep_releases', 2)
    ->set('stage', 'staging');

host('localhost')
    ->user('pn-user30')
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '{{application}}')
    ->set('password', 'pn-user30')
    ->set('stage', 'staging');

task('build', function () {
    run('cd {{release_path}} && build');
});


before('deploy:vendors', 'deploy:php_change_version');

task('deploy:php_change_version', function () {
    run("alias php='php-7.1'");
});

after('deploy:failed', 'deploy:unlock');


//before('deploy:symlink', 'database:migrate');

task('database:rebuild', function () {
    if (askConfirmation('Rebuild database?', false)) {
        run('php {{release_path}}/{{bin_dir}}/console doctrine:database:drop --force --env={{env}}');
        run('php {{release_path}}/{{bin_dir}}/console doctrine:database:create --env={{env}}');
        run('php {{release_path}}/{{bin_dir}}/console doctrine:schema:create --env={{env}}');
        run('php {{release_path}}/{{bin_dir}}/console doctrine:fixtures:load --no-interaction --env={{env}}');
    }
})->desc('Rebuild database')->onHosts('test');
after('deploy:assetic:dump', 'database:rebuild');
