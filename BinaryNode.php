<?php

/**
 * Class BinaryNode
 */

class BinaryNode
{
	private $value;
	public $left = null;
	public $right = null;

	/**
	 * BinaryNode constructor.
	 * @param $item
	 */
	public function __construct($item)
	{
		$this->value = $item;
	}

	public function dump()
	{
		if ($this->left !== null) {
			$this->left->dump();
		}

		var_dump($this->value);

		if ($this->right !== null) {
			$this->right->dump();
		}

	}

	/**
	 * @param $value
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}
}