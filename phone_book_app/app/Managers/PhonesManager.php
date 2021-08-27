<?php

namespace App\Managers;

use App\Http\Requests\UpdatePhoneRequest;
use App\Repositories\PhonesRepository;
use App\Http\Requests\StorePhoneRequest;

class PhonesManager
{
    public function __construct(private PhonesRepository $repository)
    {
    }


    public function storePhoneNumber(StorePhoneRequest $request)
    {
        $request->validated();
        $this->repository->storePhoneNumber($request);
    }

    public function updatePhoneNumber(UpdatePhoneRequest $request, $id)
    {

        $request->validated();
        $this->repository->updatePhoneNumber($request, $id);
    }

    public function getPhoneNumber(int $id)
    {
        $phoneCollection = collect($this->repository->getPhoneNumber($id));

        return $phoneCollection;
    }

    public function deletePhoneNumber(int $id)
    {
        $this->repository->deletePhoneNumber($id);
    }

    public function getPhoneShares(int $id)
    {
        $shares = $this->repository->getPhoneShares($id);
        return $shares;
    }


}
