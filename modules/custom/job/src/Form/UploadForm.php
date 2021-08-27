<?php

namespace Drupal\job\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 * Class UploadForm.
 */
class UploadForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'upload_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form = array(
      '#attributes' => array('enctype' => 'multipart/form-data'),
    );

    $form['file_upload_details'] = array(
      '#markup' => t('<b>The File</b>'),
    );

    $validators = array(
      'file_validate_extensions' => array('pdf'),
    );


    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('name'),
      '#description' => $this->t('name of candidate form'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('last name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('email'),
      '#weight' => '0',
    ];
    $form['upload_cv'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('upload cv'),
      '#description' => $this->t('upload cv for candidate'),
      '#upload_location' => 'public://files/',
      '#name' => 'my_file',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
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
    $form_file = $form_state->getValue('upload_cv', 0);
    if (isset($form_file[0]) && !empty($form_file[0])) {
      $file = File::load($form_file[0]);
      $file->setPermanent();
      $file->save();


      $formfile = $form_state->getValue('upload_cv');
      if ($formfile) {
        $oNewFile = File::load(reset($formfile));
        $oNewFile->setPermanent();
        dd($oNewFile->getFilename());
      }

      $insert_data = db_insert('candidate_field_data')
        ->fields(array(
          'name' => $form_state->getValue('name'),
          'last_name' => $form_state->getValue('last_name'),
          'email' => $form_state->getValue('upload_cv'),
        ))->execute();
    }
  }

}
