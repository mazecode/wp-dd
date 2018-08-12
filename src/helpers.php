<?php 

if (!function_exists('d')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  args
     * @return void
     */
    function d(...$args): void
    {
        foreach ($args as $x): 
			(new MazeCode\Debug\Dumper)->dump($x);
		endforeach;
		
		die(1);
    }
}