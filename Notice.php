<?php

namespace Origami\Notice;

use Illuminate\Support\Facades\Session;

class Notice
{
    /**
     * @var string
     */
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @param $message
     */
    public function success($message)
    {
        $this->message($message, 'success');
    }

    /**
     * @param $message
     */
    public function error($message)
    {
        $this->message($message, 'danger');
    }

    /**
     * @param $message
     * @param string $title
     */
    public function overlay($message, $title = 'Information')
    {
        $this->message($message);
        Session::flash($this->key . '.title', $title);
        Session::flash($this->key . '.overlay', true);
    }

    /**
     * @param $message
     * @param string $level
     */
    public function message($message, $level = 'info')
    {
        Session::flash($this->key . '.message', $message);
        Session::flash($this->key . '.level', $level);
    }

    /**
     * @return Flash
    */
    public function flash()
    {
        if (!Session::has($this->key . '.message')) {
            return false;
        }

        return new Flash(
            Session::get($this->key . '.message'),
            Session::get($this->key . '.level'),
            Session::get($this->key . '.title'),
            Session::get($this->key . '.overlay', false)
        );
    }
}
