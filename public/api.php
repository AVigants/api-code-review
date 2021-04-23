<?php
    // header('Content-type: application/json; charset=utf-8');
    $output = [
        'message' => "Hello world",
        'status' => "success"
    ];
    $firstnames = json_decode(file_get_contents("../code/firstnames.json"), true);
    $lastnames = json_decode(file_get_contents('../code/lastnames.json'), true);
    $images = json_decode(file_get_contents('../code/images.json'), true);

    if ($_REQUEST['fields']) {
        $gender = ['male', 'female'];
        $gender = $gender[rand(0, 1)];
        $old = [1, 100];

        if ($_REQUEST['fields'] === 'firstname') {
            unset($output['message']);

            $all_names = $firstnames[$gender];
            $count = count($all_names);
            $rand_key = rand(0, $count - 1);
            $firstname = $all_names[$rand_key];
            $output['firstname'] = $firstname;
        }
        if ($_REQUEST['fields'] === 'lastname') {
            unset($output['message']);

            $all_names = $lastnames[$gender];
            $count = count($all_names);
            $rand_key = rand(0, $count - 1);
            $lastname = $all_names[$rand_key];
            $output['lastname'] = $lastname;
        }
        if ($_REQUEST['fields'] === 'old') { //'OLD' nevis 'YEARS'
            unset($output['message']);

            $ods = rand(1, 100);
            $output['years old'] = $ods; //wtf kāda jēga no tā iepriekšējā ($ods <= 18) etc. check? 😂
        }
        if ($_REQUEST['fields'] === 'image') {  //'IMAGE' nevis 'IMAGES'
            unset($output['message']);

            $all_names = $images[$gender];
            $count = count($all_names);
            $rand_key = rand(0, $count - 1);
            $final_image = $all_names[$rand_key];
            $output['image'] = "/api/public/images/" . $final_image . '.jpg'; //nepareizs ceļš - now it should work. If you open this in a new tab, then you will get the image.
        }
        if ($_REQUEST['fields'] === 'email') {
            unset($output['message']);

            $number = rand(0, 9999); //man nepatika ka sākas no 10 😅 - sākas no 0
            
            $all_names = $firstnames[$gender];
            //kāda jēga bija no "if (in_array('firstname', $_REQUEST['fields'])) {" ? es viņu izņēmu ārā. Starp citu, viņš bija nepareizs = in_array sagaida kā otro parametru array, bet saņem string. Pareizi būtu vnk $_REQUEST, nevis $_REQUEST['fields']

            $count = count($all_names);
            $rand_key = rand(0, $count - 1);
            $firstname = $all_names[$rand_key];

            $output['email'] = $firstname . $number . "@mail.com";
            
        }
    }

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>


<body>
    <?php if($_REQUEST['fields'] === 'image') { ?> 
        <img src="<?= $output['image']?>" height="100px">
    <?php } ?>
</body>

<!-- šis ir viens no 100 veidiem kā parādīt bildi. a little confsuing to look at but its basically a php if check and then if it is true, it will print whatever is inside (<img src="<?= $output['image']?>" height="100px">) -->