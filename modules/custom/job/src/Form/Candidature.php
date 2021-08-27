<?php

namespace Drupal\job\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\job\Entity\Candidate;
use Drupal\job\Entity\CandidateInterface;
use \Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class Candidature.
 */
class Candidature extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'candidature';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom :'),
      '#placeholder' => $this->t('Nom ...'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#required' => TRUE,
    ];
    $form['last_name'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Prénom ...'),
      '#title' => $this->t(' Prénom :'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#required' => TRUE,
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t(' Email :'),
      '#placeholder' => $this->t('Email ...'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#required' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Postuler !'),
      '#attributes' => array('class' => array('candidate_button')),
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

    $current_path = substr(\Drupal::service('path.current')->getPath(), 1);
    $path_args = explode('/', $current_path);
    $fetch_email= db_select('candidate_field_data', 'j')
      ->fields('j')
      ->condition('email', $form_state->getValue('email'),'=')
      ->execute()
      ->fetchAssoc();
    if($fetch_email){
      \Drupal::messenger()->addMessage('Vous avez déja postuler a cette offre !');
    }
    else{
      $candidate = Candidate::create([
        'name' => $form_state->getValue('name'),
        'last_name' => $form_state->getValue('last_name'),
        'email' => $form_state->getValue('email'),
        'job_id' => $path_args[2],
      ]);
      $candidate->save();
      $job = db_select('job_field_data', 'j')
        ->fields('j')
        ->condition('id', $path_args[2],'=')
        ->execute()
        ->fetchAssoc();
      $send_mail = new \Drupal\Core\Mail\Plugin\Mail\PhpMail();
      $from = $form_state->getValue('email');
      $message['headers'] = array(
        'content-type' => 'text/html',
        'MIME-Version' => '1.0',
        'reply-to' => $from,
        'from' => '<'.$from.'>'
      );
      $current_time = \Drupal::time()->getCurrentTime();
      $timenow = date('d/M/y', $current_time);
      $message['to'] = "ibraslime94@gmail.com";
      $message['subject'] = 'Demande de travail';
      $message['body'] = $form_state->getValue('name')." ". $form_state->getValue('last_name')." "."à envoyer un demande de travail de poste "." ".$job["name"]." "."a"." ".$timenow.".";
      $result = $send_mail->mail($message);
      if ($result != true) {
        \Drupal::messenger()->addMessage(('oops, un erreur pour votre demande,merci de contacter topwork.'), 'error');
      }
      else{
        \Drupal::messenger()->addMessage('Merci'.' '.$form_state->getValue('name').' '.'Votre demande a été envoyer avec succès !');
      }
    }
  }
}
