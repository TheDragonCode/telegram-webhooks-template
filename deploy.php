<?php

// @formatter:off

declare(strict_types=1);

namespace Deployer;

require 'contrib/php-fpm.php';

require 'contrib/telegram.php';

require 'recipe/laravel.php';

// Config

set('application', 'The Dragon Code: Webhooks Template');
set('repository', 'git@github.com:TheDragonCode/telegram-webhooks-template.git');
set('php_fpm_version', '8.1');

set('telegram_token', $_SERVER['TELEGRAM_BOT_TOKEN'] ?? '');
set('telegram_chat_id', $_SERVER['TELEGRAM_LOGS_CHAT_ID'] ?? '');

set('telegram_text', 'Deploying `{{branch}}` to *{{target}}*' . PHP_EOL . PHP_EOL . '*Application*: {{application}}');
set('telegram_success_text', 'Deployed some fresh code to *{{target}}*' . PHP_EOL . PHP_EOL . '*Application*: {{application}}');
set('telegram_failure_text', 'Something went wrong during deployment to *{{target}}*' . PHP_EOL . PHP_EOL . '*Application*: {{application}}');

// Hosts

host('production')
    ->setHostname('37.143.9.153')
    ->setRemoteUser('forge')
    ->setDeployPath('~/domains/telegram-webhooks-template');

// Tasks

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:optimize:clear',
    'artisan:optimize',
    'artisan:event:cache',
    'artisan:migrate',
    'deploy:publish',
    'php-fpm:reload',
    'artisan:actions',
]);

task('artisan:actions', function () {
    cd('{{release_path}}');
    run('{{bin/php}} artisan actions');
});

before('deploy', 'telegram:notify');

after('deploy:success', 'telegram:notify:success');

after('deploy:failed', 'deploy:unlock');
after('deploy:failed', 'telegram:notify:failure');
