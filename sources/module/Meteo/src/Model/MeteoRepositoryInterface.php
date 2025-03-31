<?php
namespace Meteo\Model;

interface MeteoRepositoryInterface
{
    /**
     * Return a single blog post.
     *
     * @param  int $city Identifier of the post to return.
     * @return Post
     */
    public function findMeteo($city);
}