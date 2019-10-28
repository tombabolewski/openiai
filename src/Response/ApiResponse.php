<?php


namespace Tombabolewski\Openiai\Response;


use Exception;

class ApiResponse implements \ArrayAccess, \Traversable, \Iterator
{
    protected $parentMethod;
    protected $pagesTotal;
    protected $currentPage;
    protected $requestParams;

    public function __construct(&$parentMethod, $body, $params = [])
    {
        $this->parentMethod = $parentMethod;
        $this->currentPage = new ResultPage($body);
        $this->requestParams = $params;
    }

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return $offset >= 0
            && $offset < $this->pagesTotal;
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     * @throws Exception
     */
    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new Exception('Offset does not exist');
        }
        if ($this->current()->getPage() !== $offset) {
            $this->currentPage = $this->getParentMethod()->exec($offset, $this->requestParams);
        }
        return $this->current();
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     * @throws Exception
     */
    public function offsetSet($offset, $value)
    {
        throw new Exception('Setting offset value is not possible.
         Use the right API method to insert or update stuff.');
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     * @throws Exception
     */
    public function offsetUnset($offset)
    {
        throw new Exception('Unsetting offset value is not possible.
         Use the right API method to insert or update stuff.');
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->currentPage;
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $nextPage = $this->getParentMethod()->getPage() + 1;
        if (!$this->offsetExists($nextPage)){
            $this->currentPage = $this->getParentMethod()->exec($nextPage, $this->requestParams);
        }
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->current()->getPage();
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return isset($this->currentPage)
            && !is_null($this->currentPage);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->currentPage = $this->getParentMethod()->exec(0, $this->requestParams);
    }

    /**
     * @return mixed
     */
    public function getParentMethod()
    {
        return $this->parentMethod;
    }
}