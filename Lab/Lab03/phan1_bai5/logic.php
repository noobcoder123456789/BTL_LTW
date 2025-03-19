<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        exit(0);
    }

    $expression = $_POST["expression"];
    
    try {
        $phpCode = 'return (' . str_replace('^', '**', $expression) . ');';        
        $evalResult = eval($phpCode);
        $result = is_numeric($evalResult) ? $evalResult : "Error";
    } 
    catch (DivisionByZeroError $e) {
        $result = "Error";
    } 
    catch (Throwable $e) {
        $result = "Error";
    }

    print $result;
?>