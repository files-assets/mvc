<?php
  /**
   * Definições Iniciais:
   */
  date_default_timezone_set('America/Sao_Paulo');

  define('NAME', 'Project Name');
  define('BASE_URL', 'http://project.dev');

  /**
   * Conexão com a base de dados:
   */
  $dbconfig = [
    'host'     => 'localhost', // Host (IP);
    'name'     => 'project',   // Nome do banco;
    'user'     => 'root',      // Nome do usuário;
    'password' => '',          // Senha do usuário;
    'options'  => [
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]
  ];

  global $pdo;
  try {
    $pdo = new PDO (
      'mysql:host='. $dbconfig['host'] .';dbname='. $dbconfig['name'],
      $dbconfig['user'],
      $dbconfig['password'],
      $dbconfig['options']
    );
  } catch (PDOException $error) {
    echo '<hr />';
    echo '<p style="font-family: sans-serif;"><strong>Houve um problema durante a conexão com o banco de dados.</strong></p>';
    echo '<p style="font-family: sans-serif;">Tente alterar os valores no arquivo <samp>config.php</samp> na raiz do projeto.</p>';
    echo '<hr />';
    echo '<p style="font-family: sans-serif;">Erro detalhado:</p>';
    echo '<pre style="font-family: monospace;">'. $error->getMessage() .'</pre>';
    echo '<hr />';
    echo '<p style="font-family: sans-serif; text-align: center;">&copy; '. NAME .'</p>';
    echo '<hr />';

    exit;
  }

  function location ($location, int $time = 0) {
    $location = BASE_URL . $location;

    echo '<meta http-equiv="refresh" content="'. $time .'; url='. $location .'" />';

    $time++;
    echo '<meta http-equiv="refresh" content="'. $time .'; url='. $location .'" />';
  }

  function param_get($name, $strip = true, $type = 'string')
  {
    if (!isset($_GET, $_GET[$name]) || gettype($_GET[$name]) !== $type || empty($_GET[$name])) {
      return false;
    }
    return $strip ? htmlspecialchars($_GET[$name]) : $_GET[$name];
  }

  function param_post($name, $strip = true, $type = 'string')
  {
    if (!isset($_POST, $_POST[$name]) || gettype($_POST[$name]) !== $type || empty($_POST[$name])) {
      return false;
    }
    return $strip ? htmlspecialchars($_POST[$name]) : $_POST[$name];
  }

  function debug ($content, $mode = false) {
    echo '<code><pre>';
    if ($mode) {
      echo var_dump($content);
    } else {
      echo print_r($content);
    }
    echo '</pre></code>';
  }
?>
