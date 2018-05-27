<?php

return [
    'rpc_hostname' => env('NOXUS_RPC_HOSTNAME', 'localhost:9091'),
    // 单位：microseconds
    'rpc_timeout' => 3 * 1000 * 1000,
];