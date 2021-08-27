<?php

namespace Drupal\job\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\job\Entity\CandidateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\job\Entity\Candidate;

/**
 * Class CandidateController.
 *
 *  Returns responses for Candidate routes.
 */
class CandidateController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  protected $dateFormatter;

  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\Renderer
   */
  protected $renderer;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->dateFormatter = $container->get('date.formatter');
    $instance->renderer = $container->get('renderer');
    return $instance;
  }

  /**
   * Displays a Candidate revision.
   *
   * @param int $candidate_revision
   *   The Candidate revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($candidate_revision) {
    $candidate = $this->entityTypeManager()->getStorage('candidate')
      ->loadRevision($candidate_revision);
    $view_builder = $this->entityTypeManager()->getViewBuilder('candidate');

    return $view_builder->view($candidate);
  }

  /**
   * Page title callback for a Candidate revision.
   *
   * @param int $candidate_revision
   *   The Candidate revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($candidate_revision) {
    $candidate = $this->entityTypeManager()->getStorage('candidate')
      ->loadRevision($candidate_revision);
    return $this->t('Revision of %title from %date', [
      '%title' => $candidate->label(),
      '%date' => $this->dateFormatter->format($candidate->getRevisionCreationTime()),
    ]);
  }

  /**
   * Generates an overview table of older revisions of a Candidate.
   *
   * @param \Drupal\job\Entity\CandidateInterface $candidate
   *   A Candidate object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(CandidateInterface $candidate) {
    $account = $this->currentUser();
    $candidate_storage = $this->entityTypeManager()->getStorage('candidate');

    $langcode = $candidate->language()->getId();
    $langname = $candidate->language()->getName();
    $languages = $candidate->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $candidate->label()]) : $this->t('Revisions for %title', ['%title' => $candidate->label()]);

    $header = [$this->t('Revision'), $this->t('Operations')];
    $revert_permission = (($account->hasPermission("revert all candidate revisions") || $account->hasPermission('administer candidate entities')));
    $delete_permission = (($account->hasPermission("delete all candidate revisions") || $account->hasPermission('administer candidate entities')));

    $rows = [];

    $vids = $candidate_storage->revisionIds($candidate);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\job\CandidateInterface $revision */
      $revision = $candidate_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = $this->dateFormatter->format($revision->getRevisionCreationTime(), 'short');
        if ($vid != $candidate->getRevisionId()) {
          $link = $this->l($date, new Url('entity.candidate.revision', [
            'candidate' => $candidate->id(),
            'candidate_revision' => $vid,
          ]));
        }
        else {
          $link = $candidate->link($date);
        }

        $row = [];
        $column = [
          'data' => [
            '#type' => 'inline_template',
            '#template' => '{% trans %}{{ date }} by {{ username }}{% endtrans %}{% if message %}<p class="revision-log">{{ message }}</p>{% endif %}',
            '#context' => [
              'date' => $link,
              'username' => $this->renderer->renderPlain($username),
              'message' => [
                '#markup' => $revision->getRevisionLogMessage(),
                '#allowed_tags' => Xss::getHtmlTagList(),
              ],
            ],
          ],
        ];
        $row[] = $column;

        if ($latest_revision) {
          $row[] = [
            'data' => [
              '#prefix' => '<em>',
              '#markup' => $this->t('Current revision'),
              '#suffix' => '</em>',
            ],
          ];
          foreach ($row as &$current) {
            $current['class'] = ['revision-current'];
          }
          $latest_revision = FALSE;
        }
        else {
          $links = [];
          if ($revert_permission) {
            $links['revert'] = [
              'title' => $this->t('Revert'),
              'url' => $has_translations ?
              Url::fromRoute('entity.candidate.translation_revert', [
                'candidate' => $candidate->id(),
                'candidate_revision' => $vid,
                'langcode' => $langcode,
              ]) :
              Url::fromRoute('entity.candidate.revision_revert', [
                'candidate' => $candidate->id(),
                'candidate_revision' => $vid,
              ]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('entity.candidate.revision_delete', [
                'candidate' => $candidate->id(),
                'candidate_revision' => $vid,
              ]),
            ];
          }

          $row[] = [
            'data' => [
              '#type' => 'operations',
              '#links' => $links,
            ],
          ];
        }

        $rows[] = $row;
      }
    }

    $build['candidate_revisions_table'] = [
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    ];

    return $build;
  }

  function job_apply($id)
  {
    $form = \Drupal::formBuilder()->getForm('\Drupal\job\Form\Candidature', $id);
    return [
      '#type' => 'markup',
      '#prefix' => '<div class="title_candidate"><h2 style="Color:darkblue;text-align: center ">Postulez pour cet emploi maintenant :</h2><br><div class="testcandidate">',
      '#markup' => '<img class ="img-candidate candidate" src="https://istefan.ro/img/hero/web-developer-newsletter-coder-stefan-iordache.jpg">',
      $form,

    ];
  }

}
