<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php if (isset($page_title) && !empty($page_title)): ?>
    <title><?php echo $page_title . NAME; ?></title>
  <?php else: ?>
    <title><?php echo NAME; ?></title>
  <?php endif; ?>

  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/default.ico" />

  <!-- BEGIN Styles -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/_front-end-src/fontawesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/_front-end-src/index.css" />
  <!-- END Styles -->
</head>
<body>
  <header>
    <?php require 'utils/navbar.php'; ?>
  </header>
  <main>
    <div class="container">
      <?php $this->renderInTemplate($name, $data); ?>
    </div>
  </main>
  <footer>
    <?php require 'utils/footer.php'; ?>
  </footer>

  <script src="<?php echo BASE_URL; ?>/_front-end-src/all.js"></script>
</body>
</html>
