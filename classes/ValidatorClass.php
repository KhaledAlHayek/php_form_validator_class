<?php 
  
  class UserValidator{
    private $data;
    private $errors = [];
    private static $fields = ["username", "email"];

    public function __construct($post_data){
      $this->data = $post_data;
    }
    public function validate_form() {
      foreach(self::$fields as $field):
        if(!array_key_exists($field, $this->data)){
          trigger_error("{$field} is not in the data we need");
          return;
        }
      endforeach;
      $this->validate_username();
      $this->validate_email();
      return $this->errors;
    }
    private function validate_username() {
      $val = trim($this->data["username"]);
      if(empty($val)):
        $this->add_error("username", "username cannot be empty.");
      else:
        if(!preg_match("/^[a-zA-Z0-9]{6,12}$/", $val)):
          $this->add_error("username", "username must be valid!");
        endif;
      endif;
    }

    private function validate_email() {
      $email = trim($this->data["email"]);
      if(empty($email)):
        $this->add_error("email", "email cannot be empty.");
      else:
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
          $this->add_error("email", "email must be valid!");
        endif;
      endif;
    }
    private function add_error($key, $error_msg){
      $this->errors[$key] = $error_msg;
    }
  }