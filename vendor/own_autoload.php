<?php

class MyAutoload
{
    /** @var array[] */
    private array $prefixes = [];

    public function register()
    {
        spl_autoload_register(function ($class) {

            foreach ($this->prefixes as $prefix => $base_dir) {
                if (0 === strpos($class, $prefix)) {
                    $pathWithoutPrefix = str_replace($prefix, '', $class);
                    $file = $base_dir . str_replace('\\', '/', $pathWithoutPrefix) . '.php';
                }
            }

            if (file_exists($file)) {
                require_once $file;
            }
        });
    }

    public function addNamespace($prefix, $base_dir)
    {
        // normalize namespace prefix
        $prefix = trim($prefix, '\\');

        // normalize the base directory with a trailing separator
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR);

        // initialize the namespace prefix array
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = [];
        }

        $this->prefixes[$prefix] = $base_dir;
    }
}

$autoloader = new MyAutoload();
$autoloader->addNamespace('App', 'src');
$autoloader->addNamespace('AnotherSrc', 'app');
$autoloader->addNamespace('Example\Something', 'example');
$autoloader->register();
