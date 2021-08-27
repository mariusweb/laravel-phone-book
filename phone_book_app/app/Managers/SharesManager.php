<?php

namespace App\Managers;

use App\Http\Requests\DestroyShareRequest;
use App\Repositories\PhonesRepository;
use App\Repositories\SharesRepository;
use App\Http\Requests\StoreShareRequest;

class SharesManager
{
    public function __construct(
        private SharesRepository $sharesRepository,
        private PhonesRepository $phonesRepository
    )
    {
    }

    public function shareWithUser(StoreShareRequest $request)
    {
        $request->validated();
        $this->sharesRepository->shareWithUser($request);
    }

    public function getPhoneId(StoreShareRequest $request)
    {
        return $request->phone_id;
    }

    public function destroyShare(DestroyShareRequest $request)
    {
        $request->validated();
        $this->sharesRepository->destroyShare($request);
    }

    public function getPhoneNumber($id)
    {
        $phoneCollection = collect($this->phonesRepository->getPhoneNumber($id));
        return $phoneCollection;
    }

    public function getPhoneShares($id)
    {
        $shares = $this->phonesRepository->getPhoneShares($id);
        return $shares;
    }

    public function getSharesId(int|string|null $id, mixed $phone_id, mixed $user_shares_id)
    {
        $share = $this->sharesRepository->getSharesId($id, $phone_id, $user_shares_id);
        return $share->id;
    }


}
