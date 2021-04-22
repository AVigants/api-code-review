<?php

header('Content-type: application/json; charset=utf-8');
$output = [
    'message' => "Hello world",
    'status' => "success"
];

$firstnames = json_decode(file_get_contents('../code/firstnames.json'), true);
$lastnames = json_decode(file_get_contents('../code/lastnames.json'), true);
$images = json_decode(file_get_contents('../code/images.json'), true);

if (array_key_exists('fields', $_REQUEST) && is_array($_REQUEST['fields'])) {
    $gender = ['male', 'female'];
    $gender = $gender[rand(0, 1)];

    if ($_REQUEST['fields'] === 'firstname'))) {
        $all_names = $firstnames[$gender];

        $count = count($all_names);
        $rand_key = rand(0, $count - 1);
        $firstname = $all_names[$rand_key];


        unset($output['message']);
        $output['firstname'] = $firstname;
    }

    if ($_REQUEST['fields'] === 'lastname'))) {
        $all_names = $lastnames[$gender];

        $count = count($all_names);
        $rand_key = rand(0, $count - 1);
        $lastname = $all_names[$rand_key];



        unset($output['message']);
        $output['lastname'] = $lastname;
    }

    if ($_REQUEST['fields'] === 'years'))) {
        unset($output['message']);
        /*
        $ods = rand(1, 18 * 100);
        if ($ods <= 18) {
            $output['years old'] = $ods;
        }
        else {
            $devider = (1800 - 18) / (100 - 18);

            $output['years old'] = floor($ods / $devider) + 18;
        }
        */

        $ods = rand(1, 1800);
        if ($ods <= 18) {
            $output['years old'] = $ods;
        }
        else {
            $ods = rand(19, 100);
            $output['years old'] = $ods;
        }
    }

    if ($_REQUEST['fields'] === 'images'))) {
        $all_names = $images[$gender];

        $count = count($all_names);
        $rand_key = rand(0, $count - 1);
        $images = $all_names[$rand_key];


        unset($output['message']);
        $output['image'] = "http://localhost:8877/images/" . $images;
    }

    if ($_REQUEST['fields'] === 'email'))) {
        unset($output['message']);
        $number = rand(10, 9999);

        if (in_array('firstname', $_REQUEST['fields'])) {
            $output['email'] = $firstname . $number . "@mail.com";
        } else {
            $all_names = $firstnames[$gender];

            $count = count($all_names);
            $rand_key = rand(0, $count - 1);
            $firstname = $all_names[$rand_key];

            $output['email'] = $firstname . $number . "@mail.com";
        }
    }
}


echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);