<?php

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.

// $resources = curl_init($url);
// curl_setopt($resources, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($resources); // gets all the data;
// $info = curl_getinfo($resources); // get details
// echo '<pre>';
// var_dump($info);
// echo '</pre>';
// echo $result;

// Get response status code

// set_opt_array

// Post request

$resources = curl_init();
$user = [
    'name' => 'John Doe',
    'username' => 'john',
    'email' => 'john@example.com'
];

curl_setopt_array($resources, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['content-type:application/json'],
    CURLOPT_POSTFIELDS => json_encode($user)

]);

$result = curl_exec($resources);
curl_close($resources);
echo $result;
