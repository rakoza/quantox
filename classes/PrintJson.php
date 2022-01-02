<?php

class PrintJson
{
    public function __invoke(Result $result)
    {
        header('Content-type: text/javascript');
        echo json_encode($result->getArray(), JSON_PRETTY_PRINT);
    }
}

