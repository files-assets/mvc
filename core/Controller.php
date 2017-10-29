<?php
  class Controller
  {
    public function render ($name, $data = array(), $loadBase = true)
    {
      extract($data);

      if ($loadBase) {
        require 'views/templates/main.php';
      } else {
        require 'views/'. $name .'.php';
      }
    }

    public function renderInTemplate ($name, $data = array())
    {
      extract($data);
      require 'views/'. $name .'.php';
    }

    public function param_get($name, $type = 'string')
    {
      if (!isset($_GET, $_GET[$name]) || gettype($_GET[$name]) !== $type || empty($_GET[$name])) {
        return false;
      }
      return $_GET[$name];
    }

    public function param_post($name, $type = 'string')
    {
      if (!isset($_POST, $_POST[$name]) || gettype($_POST[$name]) !== $type || empty($_POST[$name])) {
        return false;
      }
      return $_POST[$name];
    }
  }
?>
