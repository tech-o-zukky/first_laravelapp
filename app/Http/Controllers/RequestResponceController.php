<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

// list2-15
class RequestResponceController extends Controller
{
    public function index(Request $request, Response $response) {

        $html = <<<EOF

<html>
<head>
<title>RequestResponse</title>
<style>
    body {font-size: 16pt; color: #999; }
    h1 {font-size: 120pt; text-align: right; color: #eee; 
        margin: -50px 0px -50px 0px; }
</style>
</head>
<body>

<h1>RequestResponse</h1>
<h3>Request</h3>
<pre>{$request}</pre>
<h3>Response</h3>
<pre>{$response}</pre>

</body>
</html>
EOF;

        $response -> setContent($html);
        return $response;
    }
}