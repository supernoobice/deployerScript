<?php
// install first
// curl -LO https://deployer.org/deployer.phar
// mv deployer.phar /usr/local/bin/dep
// chmod +x /usr/local/bin/dep

namespace Deployer;
require 'recipe/common.php';

// // Project name
// set('application', 'my_project');

// // Project repository
// set('repository', 'YOUR REPOSITORY');

// // [Optional] Allocate tty for git clone. Default value is false.
// set('git_tty', true); 

// // Shared files/dirs between deploys 
// set('shared_files', []);
// set('shared_dirs', []);

// // Writable dirs by web server 
// set('writable_dirs', []);


// // Hosts

// host('domain.com')
//     ->user('USER')
//     ->set('deploy_path', '~/public_html');    
    

// // Tasks

// desc('Deploy your project');
// task('deploy', [
//     'deploy:info',
//     'deploy:prepare',
//     'deploy:lock',
//     'deploy:release',
//     'deploy:update_code',
//     'deploy:shared',
//     'deploy:writable',
//     'deploy:vendors',
//     'deploy:clear_paths',
//     'deploy:symlink',
//     'deploy:unlock',
//     'cleanup',
//     'success'
// ]);

// // [Optional] If deploy fails automatically unlock.
// after('deploy:failed', 'deploy:unlock');

set('default_stage', 'production');

host('jeffreydelara.com')
  ->user('USER')
  ->stage('production')    
  ->set('deploy_path', '~/public_html');

task('pwd', function () {
  $result = run('pwd');
  writeln("Current dir: $result");
});
task('goprod', function() {
  writeln('<info>Deploying...</info>');


  $appFiles = [
    'index.php',
    'folder'
  ];

  $deployPath = '~/public_html';

  foreach ($appFiles as $file) 
  {
    upload($file, $deployPath . '/' . $file);
  }
  writeln('<info>Deployment is done.</info>');
});