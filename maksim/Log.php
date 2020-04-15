<?php

namespace maksim;
use core\LogInterface;
use core\LogAbstract;
/**
 *
 */
class Log extends LogAbstract implements LogInterface
{
    public static function log($str)
    {
        self::Instance()->log[] = $str;
    }

    public static function write()
    {
        self::Instance()->_write();
    }

    public function _write()
    {
        foreach (self::Instance()->log as $value) {
            echo $value;
            echo "\n";
        }
    }
}