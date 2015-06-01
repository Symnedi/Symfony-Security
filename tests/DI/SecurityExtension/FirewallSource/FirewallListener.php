<?php

namespace Symnedi\Security\Tests\DI\SecurityExtension\FirewallSource;

use Nette\Application\AbortException;
use Nette\Application\Application;
use Nette\Application\Request;
use Nette\Security\User;
use Symnedi\Security\Contract\Http\FirewallListenerInterface;


class FirewallListener implements FirewallListenerInterface
{

	/**
	 * @var User
	 */
	private $user;


	public function __construct(User $user)
	{
		$this->user = $user;
	}


	/**
	 * {@inheritdoc}
	 */
	public function getFirewallName()
	{
		return 'adminFirewall';
	}


	/**
	 * {@inheritdoc}
	 */
	public function handle(Application $application, Request $applicationRequest)
	{
		if ( ! $this->user->isLoggedIn()) {
			throw new AbortException;
		}

		if ( ! $this->user->isInRole('admin')) {
			throw new AbortException;
		}
	}

}