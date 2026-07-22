<?php

namespace Drupal\developer_info\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\developer_info\Service\DeveloperInfoService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DeveloperInfoController extends ControllerBase {

  protected DeveloperInfoService $developerInfoService;

  public function __construct(DeveloperInfoService $developerInfoService) {
    $this->developerInfoService = $developerInfoService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('developer_info.service')
    );
  }

  public function content() {

    $info = $this->developerInfoService->getDeveloperInfo();

    return [
      '#theme' => 'item_list',
      '#title' => 'Developer Information',
      '#items' => [
        'Developer: ' . $info['developer'],
        'Project: ' . $info['project'],
        'Environment: ' . $info['environment'],
        'PHP: ' . $info['php'],
        'Drupal: ' . $info['drupal'],
        'User: ' . $info['user'],
        'Time: ' . $info['time'],
      ],
    ];

  }

}
