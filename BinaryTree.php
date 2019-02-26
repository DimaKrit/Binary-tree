<?php

require_once __DIR__ . '/BinaryNode.php';

/**
 * Class BinaryTree
 */

class BinaryTree
{
	private $rootNode = null;
	private $deepestlevel;
	private $deepNode;

	/**
	 * @param $item
	 */
	public function insert($item)
	{
		$node = new BinaryNode($item);
		if ($this->isEmpty()) {
			$this->rootNode = $node;
		} else {
			$this->insertNode($node, $this->rootNode);
		}
	}

	/**
	 * @param $node
	 * @param $subtree
	 */
	private function insertNode($node, &$subtree)
	{
		if ($subtree === null) {
			$subtree = $node;
		} else {
			if ($node->getValue() > $subtree->getValue()) {
				$this->insertNode($node, $subtree->right);
			} else {
				if ($node->getValue() < $subtree->getValue()) {
					$this->insertNode($node, $subtree->left);
				}
			}
		}
	}

	public function isEmpty()
	{
		return $this->rootNode === null;
	}

	public function deep()
	{
		$this->find($this->rootNode, 0);
		return $this->deepNode;
	}

	/**
	 * @param $node
	 * @param $level
	 */
	public function find($node, $level)
	{
		if ($node != null) {
			$this->find($node->left, ++$level);
			if ($level > $this->deepestlevel) {
				$this->deepNode = $node->getValue();
				$this->deepestlevel = $level;
			}
			$this->find($node->right, $level);
		}
	}

	public function getFullTree()
	{
		$this->rootNode->dump();
	}

}


$binnar = new BinaryTree();

$binnar->insert('Ithem5');
$binnar->insert('Ithem2');
$binnar->insert('Ithem3');
$binnar->insert('Ithem5');
$binnar->insert('Ithem5');
$binnar->insert('Ithem6');
$binnar->insert('Ithem7');
$binnar->insert('Ithem1');
$binnar->insert('Ithem4');
$binnar->insert('Ithem11');

//echo $binnar->getFullTree();

echo $binnar->deep();
