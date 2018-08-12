<?php

namespace MazeCode\Debug;

use MazeCode\DumpDie;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class Dumper
{
    /**
     * Dump a value with elegance.
     *
     * @param  mixed  $value
     * @return void
     */
    public function dump($value): void
    {
		// $value = (new DumpDie())->objDump($value);
        if (class_exists(CliDumper::class)):
			// if (PHP_SAPI !== 'cli') echo "<style>pre.sf-dump .sf-dump-compact { display: block !important; }</style>";
			$dumper = in_array(PHP_SAPI, ['cli', 'phpdbg']) ? new CliDumper : new HtmlDumper;
            $dumper->dump((new VarCloner())->cloneVar($value));
        else:
            var_dump($value);
        endif;
	}
}
