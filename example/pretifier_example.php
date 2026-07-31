<?php

include_once __DIR__ . '/../src/Mc/Logger.php';

function pretifier(string $data, int $logType): string
{
    $WHITE = "\033[0;37m"; // white
    $colors = [
        \Mc\Logger::INFO => "\033[0;37m", // white
        \Mc\Logger::PASS => "\033[0;32m", // green
        \Mc\Logger::ERROR => "\033[0;31m", // red
        \Mc\Logger::WARN => "\033[0;33m", // yellow
        \Mc\Logger::FAIL => "\033[0;31m", // red
        \Mc\Logger::DEBUG => "\033[0;34m", // blue
    ];
    $type = \Mc\Logger::LOG_TYPE[$logType];
    return $colors[$logType] . \date("Y-m-d H:i:s") . "\t{$type}: {$data}" . $WHITE . PHP_EOL;
}

$logger = \Mc\Logger::stdout();
$logger->setPretifier('pretifier');

$logger->info("Info message");
$logger->fail("fail message");
echo "this is a dummy error message" . PHP_EOL;
$logger->error("this is a dummy error message");
$logger->warn("this is a dummy warn message");
$logger->pass("this is a dummy pass message");
$logger->debug("this debug message never appears");
$logger->debug("this debug message will be shown", true);
