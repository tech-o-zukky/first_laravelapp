<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// start list2-11
global $head, $style, $body, $end;

$head = '<html><head>';

$style = <<<EOF
<style>
    body {font-size: 16pt; color: #999; }
    h1 {font-size: 100pt; text-align: right; color: #eee; 
        margin: -40px 0px -50px 0px; }
</style>
EOF;

$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt) {
    return "<{$tag}>".$txt."</{$tag}>";
}
// end list2-11

class HelloController extends Controller
{
    // add start list2-11
    public function index() {
        global $head, $style, $body, $end;

        $html = $head.tag('title', 'Hello/Index').$style.$body
                .tag('h1','Index').tag('p', 'this is Index page')
                .'<a href="/hello/other">go to Other page</a>'
                .$end;

        return $html;
    }

    public function other() {
        global $head, $style, $body, $end;

        $html = $head.tag('title', 'Hello/Order').$style.$body
                .tag('h1','Order').tag('p', 'this is Other page')
                .$end;

        return $html;
    }
    // add end 

/* del start list2-11
    public function index($id='noname', $pass='unknown') {
        return <<<EOF
<html>
<head>
<title>Hello/Index</title>
<style>
    body {font-size: 16pt; color: #999; }
    h1 {font-size: 100pt; text-align: right; color: #eee; 
        margin: -40px 0px -50px 0px; }
</style>
</head>
<body>

<h1>Index</h1>
<p>これは、Helloコントローラのindexアクションです。</p>
<ul>
    <li>ID: {$id}</li>
    <li>PASS: {$pass}</li>
</ul>

</body>
</html>
EOF;
    }
*/
}
