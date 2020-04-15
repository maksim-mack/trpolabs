<?php
	namespace maksim;
	/**
	 * 
	 */
	class Log extends \core\LogAbstract implements \core\LogInterface
	{
		public static function log($str){
            self::Instance()->log[]=$str;
		}
   		public static function write(){
            self::Instance()->_write();
   		}
   		public function _write(){
            foreach (self::Instance()->log as $value)
            {
                echo $value;
                echo "\n";
            }
   		}
	}