<?php

namespace Drupal\example\Form;

use Drupal\Core\Form\FormBase;


/**
 * Implements an example form.
 */
class ExampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'demo_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
  
      $form['name'] = [
          '#type' => 'tel',
          '#title' => $this->t('Hi...Enter Your Name'),
          '#required' => TRUE,
      ];
      
      $form['phone_number'] = [
          '#type' => 'tel',
          '#title' => $this->t('Your phone number'),
          '#required' => TRUE,
      ];
      
      if(isset($form['name']))
      {
          //drupal_add_js('jQuery(document).ready(function () { alert("Hello!"); });', 'inline');
          $form['#attached']['library'][] = 'example/example-static-js';
          
      }
      
      $user = $form_state['storage']['user'];
      
      $data = ['user' => $user];
      
      if(isset($form['phone_number']))
      {
          //drupal_add_js('jQuery(document).ready(function () { console.log($user); });', 'inline');
          $form['#attached']['library'][] = 'example/example-dynamic-js';
          $form['#attached']['drupalSettings']['example']['exampleDynamicJs'] = $data;
      }
      
  
  
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }
  }
  
  }