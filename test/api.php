<?php

	$arr = [
        [
            'title' => 'Some title1',
            'description' => 'Description1'
        ],
        [
            'title' => 'Some title2',
            'description' => 'Description2'
        ],
        [
            'title' => 'Some title2',
            'description' => 'Description2'
        ]
    ];

    $json = json_encode($arr);

    echo $json;