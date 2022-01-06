# Simpl PHP logger library

Simple PHP logger library. Default output to the STDOUT. 

## Interface

```PHP
namespace mc;

class logger {

    public const INFO = 1;  // standard color
    public const PASS = 2;  // green color
    public const WARN = 4;  // yellow color
    public const ERROR = 8; // red color
    public const FAIL = 16; // red color
    
    /**
     * 
     * @param string $logfile
     */
    public function __construct(string $logfile = "php://stdout");

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
     * stdout logger builder
     * @return \mc\logger
     */
    public static function stdout();
}

```

## Example

```PHP
$logger = \mc\logger::stdout(); // or new \mc\logger()

$logger->info("Info message");
$logger->error("this is a dummy error message");
```