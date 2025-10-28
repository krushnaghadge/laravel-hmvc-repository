<?php

namespace App\Services;

use App\Repositories\PostRepositoryInterface;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAll();
    }

    public function getPostById($id)
    {
        return $this->postRepository->find($id);
    }

    public function createPost($data)
    {
        return $this->postRepository->create($data);
    }

    public function updatePost($id, $data)
    {
        return $this->postRepository->update($id, $data);
    }

    public function deletePost($id)
    {
        return $this->postRepository->delete($id);
    }
}
