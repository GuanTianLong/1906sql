<?php

$data = [
    'errno' => 0,
    'msg'   => 'OK',
    'data'  => [
        'status'    => 1            // 0 未支付  1已支付
    ]
];

echo json_encode($data);