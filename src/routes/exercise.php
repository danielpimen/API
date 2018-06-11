<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';
require('../config/db.php');

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$app->get('/hello/daniel', function (Request $request, Response $response, array $args) {
    echo 'Hi Daniel';
});

//Get all Exercises 

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

//Get Free Weight Training Exercises(2,5,7,11,14,24)

$app->get('/api/exercises/free_weight', function(Request $request, Response $response){
    $sql = "SELECT * FROM exercises WHERE apparatus IN (2,5,7,11,14,24)";
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

//Get Machine Weight Training(8,9,10,12,17,19)

$app->get('/api/exercises/machine_weight', function(Request $request, Response $response){
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

//Get Body Weight Exercises(4,13,16,18,23)

$app->get('/api/exercises/body_weight', function(Request $request, Response $response){
    $sql = "SELECT * FROM exercises WHERE apparatus IN (4,13,16,18,23)";
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

//Get Flexibility Training(3,6,21,22)

$app->get('/api/exercises/flexibility', function(Request $request, Response $response){
    $sql = "SELECT * FROM exercises WHERE apparatus IN (3,6,21,22)";
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


//Get Misc Exercises(1, 15, 20)

$app->get('/api/exercises/other', function(Request $request, Response $response){
    $sql = "SELECT * FROM exercises WHERE apparatus IN (1,15,20)";
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