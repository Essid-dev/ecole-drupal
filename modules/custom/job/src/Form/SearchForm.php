<?php

namespace Drupal\job\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Code\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Routing;

/**
 * Class SearchForm.
 */
class SearchForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'search_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['search'] = [
      '#type' => 'textfield',
      '#title' => $this->t('search'),
      '#weight' => '0',
      '#placeholder' => $this->t('Titre de poste ou mot-clé  ...'),
      '#maxlength' => 64,
      '#size' => 64,
      '#attributes' => array('class' => array('searchTerm')),
      '#required' => TRUE,
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Search'),
      '#button_type' => 'primary',
      '#attributes' => array('class' => array('search_button')),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);


  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRedirect('job.search_result', array('data' => $form_state->getValue('search')));

  }

}
