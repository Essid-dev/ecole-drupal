<?php

namespace Drupal\job\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Console\Bootstrap\Drupal;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\job\Entity\Job;
use Drupal\job\Entity\JobInterface;
use Drupal\Code\Database\Database;
use Symfony\Component\DependencyInjection\ContainerInterface;
use \Drupal\Core\Form\FormState;
use \Drupal\Core\Form\FormInterface;
use Drupal\Core\Render\Markup;
use Drupal\Core\Link;
use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Entity\Query;


/**
 * Class JobController.
 *
 *  Returns responses for Job routes.
 */
class JobController extends ControllerBase implements ContainerInjectionInterface
{

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
  public static function create(ContainerInterface $container)
  {
    $instance = parent::create($container);
    $instance->dateFormatter = $container->get('date.formatter');
    $instance->renderer = $container->get('renderer');
    return $instance;
  }

  /**
   * Displays a Job revision.
   *
   * @param int $job_revision
   *   The Job revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($job_revision)
  {
    $job = $this->entityTypeManager()->getStorage('job')
      ->loadRevision($job_revision);
    $view_builder = $this->entityTypeManager()->getViewBuilder('job');

    return $view_builder->view($job);
  }

  /**
   * Page title callback for a Job revision.
   *
   * @param int $job_revision
   *   The Job revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($job_revision)
  {
    $job = $this->entityTypeManager()->getStorage('job')
      ->loadRevision($job_revision);
    return $this->t('Revision of %title from %date', [
      '%title' => $job->label(),
      '%date' => $this->dateFormatter->format($job->getRevisionCreationTime()),
    ]);
  }

  /**
   * Generates an overview table of older revisions of a Job.
   *
   * @param \Drupal\job\Entity\JobInterface $job
   *   A Job object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(JobInterface $job)
  {
    $account = $this->currentUser();
    $job_storage = $this->entityTypeManager()->getStorage('job');

    $langcode = $job->language()->getId();
    $langname = $job->language()->getName();
    $languages = $job->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $job->label()]) : $this->t('Revisions for %title', ['%title' => $job->label()]);

    $header = [$this->t('Revision'), $this->t('Operations')];
    $revert_permission = (($account->hasPermission("revert all job revisions") || $account->hasPermission('administer job entities')));
    $delete_permission = (($account->hasPermission("delete all job revisions") || $account->hasPermission('administer job entities')));

    $rows = [];

    $vids = $job_storage->revisionIds($job);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\job\JobInterface $revision */
      $revision = $job_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = $this->dateFormatter->format($revision->getRevisionCreationTime(), 'short');
        if ($vid != $job->getRevisionId()) {
          $link = $this->l($date, new Url('entity.job.revision', [
            'job' => $job->id(),
            'job_revision' => $vid,
          ]));
        } else {
          $link = $job->link($date);
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
        } else {
          $links = [];
          if ($revert_permission) {
            $links['revert'] = [
              'title' => $this->t('Revert'),
              'url' => $has_translations ?
                Url::fromRoute('entity.job.translation_revert', [
                  'job' => $job->id(),
                  'job_revision' => $vid,
                  'langcode' => $langcode,
                ]) :
                Url::fromRoute('entity.job.revision_revert', [
                  'job' => $job->id(),
                  'job_revision' => $vid,
                ]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('entity.job.revision_delete', [
                'job' => $job->id(),
                'job_revision' => $vid,
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

    $build['job_revisions_table'] = [
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    ];

    return $build;
  }

  function index()
  {
    return [
      '#theme' => 'home',
    ];
  }

  public function joblist()
  {
    $form_state = new FormState();
    $form_state->setRebuild();
    $search_form = $this->formBuilder()->getForm('\Drupal\job\Form\SearchForm');
    $query = \Drupal::database();
    $result = $query->select('job_field_data', 'j')
      ->fields('j', ['id', 'name', 'description', 'date', 'ville', 'Salaire'])
      ->execute()
      ->fetchAll(\PDO::FETCH_OBJ);
    $data = [];
    foreach ($result as $row) {
      $data[] = [
        'id' => $row->id,
        'name' => $row->name,
        'description' => $row->description,
        'date' => $row->date,
        'ville' => $row->ville,
        'salaire' => $row->Salaire,
      ];
    }
    return [
      '#theme' => 'jobs',
      '#data' => $data,
      '#form' => $search_form,
    ];
  }

  function job_detail($id)
  {
    #$search_form = \Drupal::formBuilder()->getForm('\Drupal\job\Form\SearchForm');
    $query = \Drupal::database();
    $result = $query->query("SELECT * FROM {job_field_data} WHERE id = :jobid", [
      ':jobid' => $id,
    ]);
    foreach ($result as $row) {
      $data[] = [
        'id' => $row->id,
        'name' => $row->name,
        'description' => $row->Description,
        'date' => $row->Date,
        'ville' => $row->ville,
        'salaire' => $row->Salaire,
      ];
    }
    return [
      '#theme' => 'job_detail',
      #'form' => $search_form,
      '#data' => $data,
    ];
  }

  function job_result($data){
    $query = \Drupal::entityQuery('job','*');
    $group = $query
      ->orConditionGroup()
      ->condition('name','%'. db_like($data) . '%', 'LIKE')
      ->condition('ville','%'. db_like($data) . '%', 'LIKE')
      ->condition('Salaire', $data , '=');
    $entity_ids = $query
      ->condition($group)
      ->execute();
    $jobs=Job::loadMultiple($entity_ids);
    $search_result = [];
    foreach ($jobs as $row){
      $search_result[] = [
        'id' => $row->getId(),
        'name' => $row->getName(),
        'description' => $row->getDescription(),
        'date' => $row->getDate(),
        'ville' => $row->getCity(),
        'salaire' => $row->getSalary(),
      ];
    }
    return [
      '#theme' => 'job_result',
      '#data' => $search_result,
    ];
  }

 /* function search_job()
  {
    $key =$_REQUEST['keys'];
      $query = \Drupal::database();
      $result = db_select('job_field_data', 'p')
        ->fields('p')
        ->condition('name','%'. db_like($key) . '%', 'LIKE')
        ->execute()
        ->fetchAll();
      $data = [];
      foreach ($result as $row){
        $data[] = [
          'id' => $row->id,
          'name' => $row->name,
          'description' => $row->Description,
          'date' => $row->Date,
          'ville' => $row->ville,
          'salaire' => $row->Salaire,
        ];
      }
      return [
        '#theme' => 'jobs',
        '#data' => $data,
      ];
    }
*/

  function admin_jobs()
  {
    $query = \Drupal::database();
    $result = $query->select('job_field_data', 'j')
      ->fields('j', ['id', 'name', 'description', 'date', 'ville', 'Salaire'])
      ->execute()->fetchAll(\PDO::FETCH_OBJ);
    $data = [];
    foreach ($result as $row) {
      $data[] = [
        'name' => $row->name,
        'description' => $row->description,
        'date' => $row->date,
        'ville' => $row->ville,
        'salaire' => $row->Salaire,
        new FormattableMarkup('<a href=":link">View</a>', [':link' => "/admin/content/job/" . $row->id]),
      ];
    }
    $header = array('Poste', 'Description', 'Date', 'Ville', 'Salaire', 'Operation');
    $build['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $data,
    ];
    $build['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $data,
      '#empty' => t('No content has been found.'),
    ];
    return [
      '#type' => '#markup',
      '#markup' => render($build)
    ];
  }

  function admin_job_detail($id)
  {
    $query = \Drupal::database();
    $result = $query->query("SELECT * FROM {job_field_data} WHERE id = :jobid", [
      ':jobid' => $id,
    ]);
    foreach ($result as $row) {
      $data[] = [
        'name' => $row->name,
        'description' => $row->Description,
        'date' => $row->Date,
        'ville' => $row->ville,
        'salaire' => $row->Salaire,
      ];
    }
    $header = array('Poste', 'Description', 'Date', 'Ville', 'Salaire');
    $build['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $data,
    ];
    $build['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $data,
      '#empty' => t('No content has been found.'),
    ];
    return [
      '#type' => '#markup',
      '#markup' => render($build)
    ];
  }
}
