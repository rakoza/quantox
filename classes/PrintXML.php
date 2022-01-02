<?php

class PrintXML
{
    public function __invoke(Result $result)
    {
        $res = $result->getArray();
        $grades = implode(',', $res['grades']);

header('Content-Type: application/xml; charset=utf-8');
echo <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<student>
  <id>{$res['id']}</id>
  <name>{$res['name']}</name>
  <grades>{$grades}</grades>
  <average>{$res['average']}</average>
  <pass>{$res['pass']}</pass>
</student>
EOT;
    }
}

