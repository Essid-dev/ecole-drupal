<?php

namespace Drupal\job\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Candidate entities.
 */
class CandidateViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
