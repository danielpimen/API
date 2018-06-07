<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';
require('../config/db.php');

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$app->get('/hello/daniel', function (Request $request, Response $response, array $args) {
    echo 'Hi Daniel';
});

$app->get('/api/exercises', function(Request $request, Response $response){
    $sql = "SELECT * FROM exercises";
    try{
        // Get DB Object
        echo 'hell';
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

$app->get('/api/exercises2', function(Request $request, Response $response){
    $sql = "SELECT * FROM exercises WHERE category = 2";
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

$app->get('/api/exercises/3', function(Request $request, Response $response){
    $sql = "SELECT * FROM exercises WHERE category = 3";
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