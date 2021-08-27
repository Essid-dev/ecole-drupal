<?php

namespace Drupal\job;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\job\Entity\CandidateInterface;

/**
 * Defines the storage handler class for Candidate entities.
 *
 * This extends the base storage class, adding required special handling for
 * Candidate entities.
 *
 * @ingroup job
 */
class CandidateStorage extends SqlContentEntityStorage implements CandidateStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(CandidateInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {candidate_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {candidate_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(CandidateInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {candidate_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('candidate_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
