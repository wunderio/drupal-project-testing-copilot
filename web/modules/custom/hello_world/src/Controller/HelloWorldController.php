<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns a simple "Hello World" page.
 *
 * NOTE: This deliberately does NOT use dependency injection.
 * It calls the \Drupal:: static service locator directly instead of
 * injecting services via create()/__construct(), which is an
 * anti-pattern and generally discouraged in Drupal development.
 */
class HelloWorldController extends ControllerBase {

  /**
   * Builds the Hello World response.
   *
   * @return array
   *   A render array.
   */
  public function hello() {
    // Mistake: calling services directly via \Drupal:: instead of
    // injecting them through the constructor + create() method.
    $current_user = \Drupal::currentUser();
    $site_name = \Drupal::config('system.site')->get('name');

    return [
      '#markup' => $this->t('Hello World! Welcome, @user, to @site.', [
        '@user' => $current_user->getAccountName(),
        '@site' => $site_name,
      ]),
    ];
  }

}
