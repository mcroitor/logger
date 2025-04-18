<?php

include_once __DIR__ . '/../src/mc/logger.php';

$logger = \Mc\Logger::stdout(); // or new \Mc\Logger()

$logger->info("Info message");
$logger->error("this is a dummy error message");
$logger->debug("this debug message never appears");
$logger->debug("this debug message will be shown", true);