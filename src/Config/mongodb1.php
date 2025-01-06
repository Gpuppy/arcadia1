<?php

require 'vendor/autoload.php'; // Include Composer autoload file

/*use MongoDB\Client;

try {
    // Connect to MongoDB
    $client = new Client("mongodb+srv://username:password@cluster.mongodb.net/?retryWrites=true&w=majority");

    // Select a database
    $database = $client->mongodb; // Replace 'test' with your database name

    // Select a collection
    $collection = $database->users; // Replace 'users' with your collection name

    // Insert a document
    $result = $collection->insertOne([
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'created_at' => new \MongoDB\BSON\UTCDateTime(),
    ]);

    echo "Inserted document with ID: " . $result->getInsertedId();

    // Find documents
    $documents = $collection->find();

    foreach ($documents as $doc) {
        echo "<pre>" . print_r($doc, true) . "</pre>";
    }
} catch (\MongoDB\Driver\Exception\Exception $e) {
    echo "Error: " . $e->getMessage();
}*/
use Exception;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;
// Replace the placeholder with your Atlas connection string
$uri = 'mongodb+srv://mongo:mongophp@cluster0.mz4dm.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0';
// Specify Stable API version 1
$apiVersion = new ServerApi(ServerApi::V1);
// Create a new client and connect to the server
$client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);
try {
    // Send a ping to confirm a successful connection
    $client->selectDatabase('admin')->command(['ping' => 1]);
    echo "Pinged your deployment. You successfully connected to MongoDB!\n";
} catch (Exception $e) {
    printf($e->getMessage());
}

?>

