<?php 

namespace Blog\Model;

use InvalidArgumentException;
use RuntimeException;

class LaminasDbSqlRepository implements PostRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function findAllPosts()
    {
    }

    /**
     * {@inheritDoc}
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function findPost($id)
    {
    }
}