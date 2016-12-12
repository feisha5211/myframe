<?php
    function xp($param) {
        return empty($_POST[$param]) ? null : $_POST[$param];
    }
    
    function p($param) {
        var_dump($param);
    }
