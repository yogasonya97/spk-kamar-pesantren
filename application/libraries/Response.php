<?php 

class Response
{
    function json($res)
    {
        echo json_encode($res);
    }
}