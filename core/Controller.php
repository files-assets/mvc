<?php
  class Controller
  {
    public function render ($name, $data = [], $loadBase = true)
    {
      extract($data);

      if (!$loadBase) {
        require 'views/templates/secondary-template.php';
      } else {
        require 'views/templates/primary-template.php';
      }
    }

    public function renderInTemplate ($name, $data = [])
    {
      extract($data);

      require 'views/'. $name .'.php';
    }
  }
?>
