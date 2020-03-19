<?php


        $response = [
            'errno' => 0,
            'msg'   => 'OK',
            'data'  => [
                    'username' => 'PHP',
                    'age'  => 100
            ]
        ];

        echo json_encode($response);