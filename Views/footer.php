<?php
$request_uri = mb_strtolower($_SERVER['REQUEST_URI']);

$substr_path = substr($request_uri, mb_strlen(DOC_ROOT));

?>
<footer>
    <div>Request URI: <?=$request_uri?></div>
    <div>Substring Path: <?=$substr_path?></div>
    <div>App Root: <?=APP_ROOT?></div>
    <div>Also copyright</div>
</footer>
