<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class HDSnippetsCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'hds:restart';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Restart HDSnippets application.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->info('*** Executing HDSnippets migrations');
		$this->call('migrate');
		
		$this->info('*** Resetting Migrations');
		$this->call('migrate:reset', array('--quiet' => ' s' ) );

		$this->info('*** Executing HDSnippets migrations');
		$this->call('migrate');

		$this->info('*** Executing Sentry migrations ');
		$this->call('migrate', array('--package' => 'cartalyst/sentry') );

		$this->info('*** Seeding DB');
		$this->call('db:seed');
		
		$this->info('*** Clearing Cache');
		$this->call('cache:clear');

		$this->info('*** Finish');
		
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}