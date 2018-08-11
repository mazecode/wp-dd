<?php

namespace MazeCode;

use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class HtmlDumpDie extends HtmlDumper
{
    public static $defaultOutput = 'php://output';
    protected $dumpHeader;
    protected $dumpPrefix     = '<pre class=sf-dump id=%s data-indent-pad="%s">';
    protected $dumpSuffix     = '</pre><script>Sfdump(%s)</script>';
    protected $dumpId         = 'sf-dump';
    protected $colors         = true;
    protected $headerIsDumped = true;
    protected $lastDepth      = -1;
    protected $styles         = array(
		'default'   => 'background-color:#ffffff; color:#FF8400; line-height:1.2em; font:12px "Fira Code", "Monoid", monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:99999; word-break: break-all',
        'num'       => 'font-weight:bold; color:#1299DA; font:12px "Fira Code", "Monoid", monospace; ',
        'const'     => 'font-weight:bold; font:12px "Fira Code", "Monoid", monospace; ',
        'str'       => 'font-weight:bold; color:#56DB3A; font:12px "Fira Code", "Monoid", monospace; ',
        'note'      => 'color:#1299DA; font:12px "Fira Code", "Monoid", monospace;',
        'ref'       => 'color:#A0A0A0; font:12px "Fira Code", "Monoid", monospace;',
        'public'    => 'color:#000000; font:12px "Fira Code", "Monoid", monospace;',
        'protected' => 'color:#000000; font:12px "Fira Code", "Monoid", monospace;',
        'private'   => 'color:#000000; font:12px "Fira Code", "Monoid", monospace;',
        'meta'      => 'color:#B729D9; font:12px "Fira Code", "Monoid", monospace;',
        'key'       => 'color:#56DB3A; font:12px "Fira Code", "Monoid", monospace;',
        'index'     => 'color:#1299DA; font:12px "Fira Code", "Monoid", monospace;',
        'ellipsis'  => 'color:#FF8400; font:12px "Fira Code", "Monoid", monospace;',
        'ns'        => 'user-select:none;',
    );
    private $displayOptions = array(
        'maxDepth'        => 3,
        'maxStringLength' => 160,
        'fileLinkFormat'  => null,
    );
    private $extraDisplayOptions = array();

    public function __construct()
    {
		parent::__construct();
		$this->setDisplayOptions($this->displayOptions);
    }
}

dump(new HtmlDumpDie());
