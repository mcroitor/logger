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
namespace mc;

class logger {

    public const INFO = 1;  // standard color
    public const PASS = 2;  // green color
    public const WARN = 4;  // yellow color
    public const ERROR = 8; // red color
    public const FAIL = 16; // red color
    public const DEBUG = self::INFO | self::PASS;
    
    /**
     * 
     * @param string $logfile
     */
    public function __construct(string $logfile = "php://stdout");

    /**
     * enable / disable debug logging
     * @param bool $enable
     */
    public function enableDebug(bool $enable = true);

    /**
     * write a message with specific log type marker
     * @param string $data
     * @param string $log_type
     */
    private function write(string $data,string  $log_type);

    /**
     * info message
     * @param string $data
     */
    public function info(string $data);

    /**
     * warn message
     * @param string $data
     */
    public function warn(string $data);

    /**
     * pass message
     * @param string $data
     */
    public function pass(string $data);

    /**
     * error message
     * @param string $data
     */
    public function error(string $data);

    /**
     * fail message
     * @param string $data
     */
    public function fail(string $data);

    /**
     * debug message
     * @param string $data
     * @param bool $debug
     */
    public function debug(string $data, bool $debug = false);

    /**
     * stdout logger builder
     * @return \mc\logger
     */
    public static function stdout();

    /**
     * stderr logger builder
     * @return \mc\logger
     */
    public static function stderr();
}
```

## Example

```PHP
$logger = \mc\logger::stdout(); // or new \mc\logger()

$logger->info("Info message");
$logger->error("this is a dummy error message");
```
