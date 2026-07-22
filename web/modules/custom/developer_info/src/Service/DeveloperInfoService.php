<?php

namespace Drupal\developer_info\Service;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Session\AccountProxyInterface;

class DeveloperInfoService {

  protected ConfigFactoryInterface $configFactory;
  protected AccountProxyInterface $currentUser;

  public function __construct(
    ConfigFactoryInterface $configFactory,
    AccountProxyInterface $currentUser
  ) {
    $this->configFactory = $configFactory;
    $this->currentUser = $currentUser;
  }

  public function getDeveloperInfo(): array {

    return [
      'developer' => 'Ryan Buenconsejo',
      'project' => 'Drupal Engineering Demo',
      'environment' => 'Development',
      'user' => $this->currentUser->getDisplayName(),
      'php' => PHP_VERSION,
      'drupal' => \Drupal::VERSION,
      'time' => date('F j, Y g:i A'),
    ];

  }

}
