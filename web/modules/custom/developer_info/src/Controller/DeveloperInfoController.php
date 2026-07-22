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

    $markup = '
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h2 class="mb-0">Developer Information</h2>
        </div>

        <div class="card-body">

          <table class="table table-striped">
            <tbody>
              <tr>
                <th>Author</th>
                <td>'.$info['developer'].'</td>
              </tr>

              <tr>
                <th>Project</th>
                <td>'.$info['project'].'</td>
              </tr>

              <tr>
                <th>Environment</th>
                <td><span class="badge bg-success">'.$info['environment'].'</span></td>
              </tr>

              <tr>
                <th>Drupal</th>
                <td>'.$info['drupal'].'</td>
              </tr>

              <tr>
                <th>PHP</th>
                <td>'.$info['php'].'</td>
              </tr>

              <tr>
                <th>Current User</th>
                <td>'.$info['user'].'</td>
              </tr>

              <tr>
                <th>Generated</th>
                <td>'.$info['time'].'</td>
              </tr>

            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
</div>';

return [
  '#markup' => $markup,
];


  }

}
