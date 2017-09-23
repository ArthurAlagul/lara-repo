<?php
namespace LaraRepo\Criteria\General\Order;

use LaraRepo\Contracts\RepositoryInterface;
use LaraRepo\Criteria\Criteria;

class SortCriteria extends Criteria
{
    /**
     * @var
     */
    private $column;

    /**
     * @var
     */
    private $order;

    /**
     * @var
     */
    private $fixColumns;

    /**
     * @param $column
     * @param $order
     */
    public function __construct($column, $order = 'asc', $fixColumns = true)
    {
        $this->column = $column;
        $this->order = $order;
    }

    /**
     * @param $modelQuery
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($modelQuery, RepositoryInterface $repository)
    {
        if ($this->fixColumns) {
            return $modelQuery->orderBy($repository->fixColumns($this->column), $this->order);
        }

        return $modelQuery->orderBy($this->column, $this->order);
    }

}
