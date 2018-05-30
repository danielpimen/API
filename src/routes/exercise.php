<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    echo '{name}';
});

$app->get('/api/exercises', function(Request $request, Response $response){
    $sql = "SELECT * FROM exercises";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $exercises = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($exercises);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
$app->run();