<?php
print_r($_POST);

print_r("\n<strong>Chaves:</strong>\n\n");

print_r(array_keys($_POST));


print_r('<h3>Saida:</h3>');

var_dump('name =>'.$_POST['name']);
var_dump('contents[emai] => '.$_POST['contents']['email']);
var_dump('contents[formacao] => '.$_POST['contents']['formacao']);