<?php

namespace App\Managers;

use App\Repositories\UsersRepository;

class UsersManager
{
    public function __construct(
        private UsersRepository $usersRepository
    )
    {
    }

    public function searchUser($searchTerm)
    {
        $searchTerm = '%' . $searchTerm . '%';
        return $this->usersRepository->searchUser($searchTerm);
    }

    public function searchUserPhoneBook($searchTerm)
    {
        $searchTerm = '%' . $searchTerm . '%';

        return $this->usersRepository->searchUserPhoneBook($searchTerm);
    }
}
