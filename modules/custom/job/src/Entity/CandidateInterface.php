<?php

namespace Drupal\job\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Candidate entities.
 *
 * @ingroup job
 */
interface CandidateInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Candidate name.
   *
   * @return string
   *   Name of the Candidate.
   */
  public function getName();

  /**
   * Sets the Candidate name.
   *
   * @param string $name
   *   The Candidate name.
   *
   * @return \Drupal\job\Entity\CandidateInterface
   *   The called Candidate entity.
   */
  public function setName($name);

  /**
   * Gets the Candidate creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Candidate.
   */
  public function getCreatedTime();

  /**
   * Sets the Candidate creation timestamp.
   *
   * @param int $timestamp
   *   The Candidate creation timestamp.
   *
   * @return \Drupal\job\Entity\CandidateInterface
   *   The called Candidate entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the Candidate revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Candidate revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\job\Entity\CandidateInterface
   *   The called Candidate entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Candidate revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Candidate revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\job\Entity\CandidateInterface
   *   The called Candidate entity.
   */
  public function setRevisionUserId($uid);

}
