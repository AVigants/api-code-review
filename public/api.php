<?php

header('Content-type: application/json; charset=utf-8');
$output = [
    'message' => "Hello world",
    'status' => "success"
];

$firstnames = json_decode(file_get_contents('../code/firstnames.json'), true);
$lastnames = json_decode(file_get_contents('../code/lastnames.json'), true);

if (array_key_exists('fields', $_REQUEST) && is_array($_REQUEST['fields'])) {
    $gender = ['male', 'female'];
    $gender = $gender[rand(0, 1)];

    $old = [1, 100];

    if (array_key_exists('firstname', array_flip($_REQUEST['fields']))) {
        $all_names = $firstnames[$gender];

        $count = count($all_names);
        $rand_key = rand(0, $count - 1);
        $firstname = $all_names[$rand_key];


        unset($output['message']);
        $output['firstname'] = $firstname;
    }

    if (array_key_exists('lastname', array_flip($_REQUEST['fields']))) {
        $all_names = $lastnames[$gender];

        $count = count($all_names);
        $rand_key = rand(0, $count - 1);
        $lastname = $all_names[$rand_key];



        unset($output['message']);
        $output['lastname'] = $lastname;
    }
}


echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);