<?php
/**
 * Dida Framework  -- A Rapid Development Framework
 * Copyright (c) Zeupin LLC. (http://zeupin.com)
 *
 * Licensed under The MIT License.
 * Redistributions of files must retain the above copyright notice.
 */

namespace Dida\Log;

class Log
{
    const VERSION = '20180508';

    public static $dir = null;


    public static function write($var)
    {
        $num_args = func_num_args();
        if (!$num_args) {
            return false;
        }

        if (self::$dir === null || !file_exists(self::$dir) || !is_dir(self::$dir)) {
            return false;
        }

        $date = date('Y-m-d');
        $file = realpath(self::$dir) . DIRECTORY_SEPARATOR . "{$date}.log";

        $args = func_get_args();

        $output = [];
        $time = date("H:i:s");
        foreach ($args as $arg) {
            $content = var_export($arg, true);
            $output[] = "$time $content\n";
        }

        $result = file_put_contents($file, implode('', $output), FILE_APPEND + LOCK_EX);

        return ($result === false) ? false : true;
    }


    public static function writeTo($file, $var)
    {
        $num_args = func_num_args();
        if (!$num_args) {
            return false;
        }

        if (self::$dir === null || !file_exists(self::$dir) || !is_dir(self::$dir)) {
            return false;
        }

        $target = realpath(self::$dir) . DIRECTORY_SEPARATOR . "$file";

        $args = func_get_args();

        $output = [];
        $time = date("H:i:s");
        for ($i = 1; $i < $num_args; $i++) {
            $arg = $args[$i];
            $content = var_export($arg, true);
            $output[] = "$time $content\n";
        }

        $result = file_put_contents($target, implode('', $output), FILE_APPEND + LOCK_EX);

        return ($result === false) ? false : true;
    }
}
