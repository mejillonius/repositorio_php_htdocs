<?php

    include_once '../models/ErrorHandler.php';

    $errorHander = new ErrorHandler();

    $errorHander->setError('Error en prueba 1');

    $errorHander->responseAjax();