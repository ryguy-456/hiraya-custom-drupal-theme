<?php

namespace Drupal\hiraya_api\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class HirayaApiController {

  public function hello() {
    return new JsonResponse([
      'message' => 'Hello from HIRAYA API!',
      'status' => 'success',
    ]);
  }

  public function projects() {
    $nodes = \Drupal::entityTypeManager()
      ->getStorage('node')
      ->loadByProperties([
        'type' => 'project',
        'status' => 1,
      ]);

    $projects = [];

    foreach ($nodes as $node) {
      $projects[] = [
        'id' => $node->id(),
        'title' => $node->getTitle(),
        'description' => $node->get('field_description')->value,
        'type' => $node->hasField('field_project_type')
          ? $node->get('field_project_type')->value
          : '',
      ];
    }

    return new JsonResponse($projects);
  }

}
