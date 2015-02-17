<?php namespace Origami\Notice;

class Flash {


	public function __construct(
		$message,
		$level,
		$title,
		$overlay
	)
	{
		$this->message = $message;
		$this->level = $level;
		$this->title = $title;
		$this->overlay = $overlay;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function getLevel()
	{
		return $this->level;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function isOverlay()
	{
		return (boolean) $this->overlay;
	}

}