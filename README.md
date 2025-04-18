# Simple PHP logger library

Simple PHP logger library. Default output to the STDOUT.

## project usage

You can use my simple [module manager](https://github.com/mcroitor/module_manager),
just include in `modules.json`:

```json
[{
    "user" : "mcroitor",
    "repository" : "logger",
    "branch" : "master",
    "source" : "./src"
}]
```

and install it.

## Interface

```PHP
namespace Mc;

class Logger
{

    public const INFO = 1;  // standard color
    public const PASS = 2;  // green color
    public const WARN = 4;  // yellow color
    public const ERROR = 8; // red color
    public const FAIL = 16; // red color
    public const DEBUG = self::INFO | self::PASS;

    /**
     * @param string $logFile
     */
    public function __construct(string $logFile = "php://stdout");

    /**
     * set a output pretifier function
     * @param callable $pretifier
     */
    public function setPretifier(callable $pretifier): void;

    /**
     * enable / disable debug logging
     * @param bool $enable
     */
    public function enableDebug(bool $enable = true): void;

    /**
     * write a message with specific log type marker
     * @param string $data
     * @param string $logType
     */
    private function write(string $data, string  $logType): void;

    /**
     * info message
     * @param string $data
     */
    public function info(string $data): void;

    /**
     * warn message
     * @param string $data
     */
    public function warn(string $data): void;

    /**
     * pass message
     * @param string $data
     */
    public function pass(string $data): void;

    /**
     * error message
     * @param string $data
     */
    public function error(string $data): void;

    /**
     * fail message
     * @param string $data
     */
    public function fail(string $data): void;

    /**
     * debug message
     * @param string $data
     * @param bool $debug
     */
    public function debug(string $data, bool $debug = false): void;

    /**
     * stdout logger builder
     * @return \Mc\Logger
     */
    public static function stdout(): Logger;

    /**
     * stderr logger builder
     * @return \Mc\Logger
     */
    public static function stderr(): Logger;
}
```

## Example

```PHP
$logger = \Mc\Logger::stdout(); // or new \Mc\Logger()

$logger->info("Info message");
$logger->error("this is a dummy error message");
```
