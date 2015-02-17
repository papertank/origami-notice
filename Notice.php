<?php namespace Origami\Notice;

use Illuminate\Session\Store;

class Notice {

    /**
     * @var \Illuminate\Session\Store
     */
    private $session;

    /**
     * @var string
     */
    protected $key;

    /**
     * @param Store $session
     */
    function __construct(Store $session, $key)
    {
        $this->session = $session;
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
     */
    public function overlay($message, $title = 'Information')
    {
        $this->message($message);
        $this->session->flash($this->key.'.title', $title);
        $this->session->flash($this->key.'.overlay', true);
    }

    /**
     * @param $message
     * @param string $level
     */
    public function message($message, $level = 'info')
    {
        $this->session->flash($this->key.'.message', $message);
        $this->session->flash($this->key.'.level', $level);
    }

    /**
     * @return Flash
    */
    public function flash()
    {
        return new Flash(
            $this->session->get($this->key.'.message'),
            $this->session->get($this->key.'.level'),
            $this->session->get($this->key.'.title'),
            $this->session->get($this->get.'.overlay', false)
        );
    }


}