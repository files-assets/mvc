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
  $dbconfig = array(
    'host'     => 'localhost', // Host (IP);
    'name'     => 'project',   // Nome do banco;
    'user'     => 'root',      // Nome do usuário;
    'password' => '',          // Senha do usuário;
    'options'  => array(
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
  );

  global $pdo;
  try {

    $pdo = new PDO(
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

  /**
   * @param string $location - Corresponde à URL.
   */
  function location ($location) {
    $location = BASE_URL . $location;
    echo '<meta http-equiv="refresh" content="0; url='. $location .'" />';
    echo '<meta http-equiv="refresh" content="1; url='. $location .'" />';
  }
?>
