<?php

namespace Drupal\job\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Job entities.
 *
 * @ingroup job
 */
interface JobInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Job name.
   *
   * @return string
   *   Name of the Job.
   */
  public function getName();

  /**
   * Sets the Job name.
   *
   * @param string $name
   *   The Job name.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setName($name);

  /**
   * Gets the Job description.
   *
   * @return string
   *   Description of the Job.
   */
  public function getDescription();

  /**
   * Sets the Job description.
   *
   * @param string $description
   *   The Job description.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setDescription(string $description);

  /**
   * Gets the Job description.
   *
   * @return string
   *   Description of the Date.
   */
  public function getDate();

  /**
   * Sets the Job date.
   *
   * @param string $date
   *   The Job description.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setDate(string $date);

  /**
   * Gets the Job description.
   *
   * @return string
   *   Description of the Salary.
   */
  public function getSalary();

  /**
   * Sets the Job salary.
   *
   * @param string $salary
   *   The Job Salary.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setSalary(string $salary);

  /**
   * Gets the Job city.
   *
   * @return string
   *   Description of the City.
   */
  public function getCity();

  /**
   * Sets the Job city.
   *
   * @param string $city
   *   The Job City.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setCity(string $city);

  /**
   * Gets the Job Id.
   *
   * @return integer
   *   Description of the Id.
   */
  public function getId();

  /**
   * Sets the Job city.
   *
   * @param integer $id
   *   The Job Id.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setId(string $id);

  /**
   * Gets the Job creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Job.
   */
  public function getCreatedTime();

  /**
   * Sets the Job creation timestamp.
   *
   * @param int $timestamp
   *   The Job creation timestamp.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the Job revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Job revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Job revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Job revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\job\Entity\JobInterface
   *   The called Job entity.
   */
  public function setRevisionUserId($uid);

}
