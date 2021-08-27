<?php
  namespace Drupal\test\Controller;
  use Drupal\Core\Controller\ControllerBase;
  use Drupal\Core\StringTranslation\StringTranslation;
/*
 * Class ArticleController
 *
 * @package Drupal\test\Controller
 */
  class ArticleController extends ControllerBase {

    public function demo(){
      $build = [
        '#type' => 'markup',
        '#markup' => $this->t('hello world'),
        '#title'=> $this->t('Title test'),
        ];
      return $build;
    }
  }
