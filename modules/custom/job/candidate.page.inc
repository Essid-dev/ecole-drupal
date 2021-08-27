<?php

/**
 * @file
 * Contains candidate.page.inc.
 *
 * Page callback for Candidate entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Candidate templates.
 *
 * Default template: candidate.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_candidate(array &$variables) {
  // Fetch Candidate Entity Object.
  $candidate = $variables['elements']['#candidate'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
