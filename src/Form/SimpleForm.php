<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
//use Drupal\Core\Messenger\MessengerInterface;

/**
 *  Our simple form class
 */
class SimpleForm extends FormBase {
  
 /**
   * (@inheritdoc)
   * 
   *  @return string
   */
  public function getFormId() {
    return 'drupalup_simple_form';
  }
  
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('User name'),
    ];
      
    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Choose the role'),
    ];
    
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Change'),
    ];
    
    return $form;
  }
  
  /**
   * (@inheritdoc)
   * 
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $current_user = \Drupal::currentUser();
    $roles = $current_user->getRoles();
  
    if (!in_array('administrator', $roles)) {
      $this->messenger()->addError  (t('Administrator may have access to this operation only'));
      return;
    }
    
    // this is for debug
    drupal_set_message(print_r($roles, 1));
    
    // hext will be a all necessary logic
  }
} 

