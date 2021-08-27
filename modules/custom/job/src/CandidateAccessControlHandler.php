<?php

namespace Drupal\job;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Candidate entity.
 *
 * @see \Drupal\job\Entity\Candidate.
 */
class CandidateAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\job\Entity\CandidateInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished candidate entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published candidate entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit candidate entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete candidate entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add candidate entities');
  }


}
