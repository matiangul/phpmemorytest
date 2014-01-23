<?php
namespace Bank\Tests;

class TestCase extends \PHPUnit_Framework_TestCase
{
    private static $memory;

    private static function formatBytes($bytes, $precision = 2) { 
      $unit=array('B','kB','MB','Gb','Tb','Pb');
      return round($bytes/pow(1024,($i=floor(log($bytes,1024)))),2).' '.$unit[$i];
    }

    public static function setUpBeforeClass()
    {
      self::$memory = memory_get_usage();
      print_r(str_pad("Class: ", 15).get_called_class().PHP_EOL);
      print_r(str_pad("Memory before: ", 15).self::formatBytes(memory_get_usage()).PHP_EOL);
    }

    public static function tearDownAfterClass()
    {
      $actualMemory = memory_get_usage() - self::$memory;
      print_r(PHP_EOL.str_pad("Used memory: ", 15).self::formatBytes($actualMemory).PHP_EOL);
      print_r(str_pad("Memory after: ", 15).self::formatBytes(memory_get_usage()).PHP_EOL.PHP_EOL);
    }
}