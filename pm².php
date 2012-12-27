<?php

	error_reporting(0);

	/**
	 * Prints a string but adds a new line.
	 *
	 * @param string $string The string to print
	 * @return void
	 */
	function pl($string = '')
	{
		echo $string . PHP_EOL;
	}

	/**
	 * Resolve a package manager to it's git URI or a list of available package managers
	 *
	 * @param string $package_manager The package manager to resolve.
	 * @return string|array A git URI or array of package managers
	 */
	function resolve($package_manager = NULL)
	{
		$package_managers = [

			'bower'    => 'https://github.com/twitter/bower.git',
			'composer' => 'https://github.com/composer/composer'

		];

		return $package_manager
			? $package_managers[$package_manager]
			: array_keys($package_managers);
	}

	/**
	 * Shows the help screen
	 *
	 * @return void
	 */
	function show_help()
	{
		pl('Welcome to PM² a package manager for package managers.');
		pl(                                                        );
		pl('Usage:                                                ');
		pl(                                                        );
		pl('      help    <command>                               ');
		pl('      install <package manager>                       ');
		pl('      list                                            ');
		pl('      update  <package manager>                       ');
		pl('      upgrade                                         ');
		pl(                                                        );
	}


	/**
	 * Shows the available package managers
	 *
	 * @return void
	 */
	function show_available_package_managers()
	{
		pl('Available package managers:                   ');
		pl(                                                );
		pl(implode(PHP_EOL, resolve()) . PHP_EOL);

	}

	/**
	 * This is our main logic, we expect at least one parameter (the command)
	 *
	 *
	 */
	call_user_func(function($command, $arg) {
		switch ($command) {

			//
			// List functionality
			//

			case 'list':
				show_available_package_managers();
				break;

			//
			// Install and Update functionality
			//

			case 'install':
			case 'update':

				if (!$arg) {
					show_help();
				}

				if (!($uri = resolve($arg))) {
					pl('Package manager ' . $arg . ' is not available.');
					pl(                                                );

					show_available_package_managers();
					exit(-2);
				}

				if ($command == 'install') {

					//
					// Install functionality
					//



				} else {

					//
					// Update functionality
					//



				}

				break;

			case 'upgrade':

				$uri  = 'https://raw.github.com/dotink/pmsquared/master/pm%C2%B2.php';
				$code = file_get_contents($uri);

				if (!$code) {
					pl('Could not fetch the latest version of PM².');
					exit(-3);
				} elseif ($code == file_get_contents(__FILE__)) {
					pl('You already have the latest version.');
					exit(0);
				} elseif (file_put_contents(__FILE__, $code)) {
					pl('Upgrade successful!');
					exit(0);
				} else {
					pl('Could not upgrade PM², please check your permissions.');
					exit(-4);
				}
				break;


			default:
				show_help();
				exit(-1);
		}

	}, $argv[1], $argv[2]);





