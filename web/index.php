<?php require_once('config.php'); ?>
<?php
require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$app->post('/api/data', function() use($app) {
  global $conn;
  if(isset($_POST["name"])){
    $name = esc_html($_POST["name"]);
    $sql = "INSERT INTO data (name)
    VALUES ('$name')";
		mysqli_query($conn, $query);
    
    $dataId = mysql_insert_id($conn);
    return $dataId;
  }else{
    return "WHOOPS";
  }

});

$app->get('/api/data', function() use($app) {

  global $conn;
  $sql = "SELECT * FROM data";
  $result = mysql_query($conn, $sql);

  $data = mysql_fetch_all($result, MYSQL_ASSOC);

  return $app['twig']->render('display.twig',['data' => $data]);

});

$app->run();
