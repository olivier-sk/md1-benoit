<?php

namespace librairy;

use Psr\Log\LoggerTrait;


class Logger {
    use LoggerTrait ;
    public function __construct() {
        //echo 'created' ;
    }

    public function doEcho ($message, $color) {
        return '<div style="color:'.$color.'">'.$message.'</div>' ;
    }


    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        //var_dump('<div class="'.$level.'">'.$message.'</div>') ;
        echo '<div class="'.$level.'">'.$message.'</div>' ;
    }
}