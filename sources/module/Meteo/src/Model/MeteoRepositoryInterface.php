<?php
namespace Meteo\Model;

interface MeteoRepositoryInterface
{
    /**
     * Return a set of all blog posts that we can iterate over.
     *
     * Each entry should be a Post instance.
     *
     * @return Post[]
     */
    public function findAllPosts($city);

    /**
     * Return a single blog post.
     *
     * @param  int $city Identifier of the post to return.
     * @return Post
     */
    public function findMeteo($city);
}