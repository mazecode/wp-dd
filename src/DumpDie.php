<?php

namespace MazeCode;

class DumpDie
{
    protected $param = array();
    private $out = array();

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
    public static function dumper($param):void
    {
        array_map(function ($arg) {
            $dd = PHP_SAPI === 'cli' ? new CliDumper() : new HtmlDumpDie(null, 'utf-8');
            $dd->dump((new VarCloner)->cloneVar($arg));
        }, $param);
    }

    public function objDump($param)
    {
		return is_object($param) ? (new Helper($param))->out : $param;
	}
}

class Helper
{
    protected $reflector;
	protected $object;
	public $out;
	
    public function __construct($object)
    {
        $this->object = $object;
		$this->reflector = new \ReflectionClass($object);
		$this->out = $this->reflector;
    }

    public function __get($property)
    {
        $property = $this->reflector->getProperty($property);
        $property->setAccessible(true);
        return $property->getValue($this->object);
    }
}