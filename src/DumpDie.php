<?php

namespace MazeCode;

use Symfony\Component\VarDumper\Cloner\VarCloner;

class DumpDie
{
    /**
     * Dump a value with elegance.
     *
     * @param  mixed  $value
     * @return void
     */
    public static function dd($param)
    {
        array_map(function ($arg) {
            $dd = new HtmlDumpDie;
            $dd->dump((new VarCloner)->cloneVar($arg));
        }, $param);
        die;
    }
}
