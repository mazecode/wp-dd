<?php

namespace MazeCode;

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class DumpDie
{
    public function __construct()
    {
        // parent::__construct();
    }
    /**
     * Dump a value with elegance.
     *
     * @param  mixed  $value
     * @return void
     */
    public static function dd($param)
    {
        array_map(function ($arg) {
            $arg = is_object($arg) ? new \ReflectionClass($arg) : $arg;
			$dd = PHP_SAPI === 'cli' ? new CliDumper() : new HtmlDumpDie(null, 'utf-8');
			var_dump($dd);
            $dd->dump((new VarCloner)->cloneVar($arg));
        }, $param);
        die;
    }
}
