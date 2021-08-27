<?php

namespace Drupal\job;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface CandidateStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Candidate revision IDs for a specific Candidate.
   *
   * @param \Drupal\job\Entity\CandidateInterface $entity
   *   The Candidate entity.
   *
   * @return int[]
   *   Candidate revision IDs (in ascending order).
   */
  public function revisionIds(CandidateInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Candidate author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Candidate revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\job\Entity\CandidateInterface $entity
   *   The Candidate entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(CandidateInterface $entity);

  /**
   * Unsets the language for all Candidate with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
