<?php

if ( ! function_exists('notice') ) {
    function notice($message = null, $level = 'info') {
        $instance = app('origami.notice');

        if ( is_null($message) ) {
            return $instance;
        }

        $instance->message($message, $level);
    }
}