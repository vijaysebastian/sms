<?php namespace Modules\Faveosms\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Container\Container;

class PackageMigrationCommand extends Command {

	/**
     * Name of the command.
     * 
     * @param string
     */
    protected $name = 'package:migrate';
    
    /**
     * Necessary to let people know, in case the name wasn't clear enough.
     * 
     * @param string
     */
    protected $description = 'Migrate my incredibly necessary package migration files.';
    
    /**
     * Setup the application container as we'll need this for running migrations.
     */
    public function __construct(Container $app)
    {
      $this->app = $app;
    }
    
    /**
     * Run the package migrations.
     */
    public function handle()
    {
        $migrations = $this->app->make('migration.repository');
        $migrations->createRepository();
        
        $migrator = $this->app->make('migrator');
        $migrator->run(__DIR__.'/../src/migrations');
        $migrator->run(__DIR__.'/Fixtures/Migrations');
    }

}
