<?php

namespace App\Repositories;

use App\Http\Requests\DestroyShareRequest;
use App\Models\Share;
use App\Http\Requests\StoreShareRequest;

class SharesRepository
{

    public function shareWithUser(StoreShareRequest $request)
    {
        Share::create([
            'user_sharing_id' => auth()->id(),
            'phone_id' => $request->phone_id,
            'user_shares_id' => $request->user_shares_id
        ]);
    }

    public function destroyShare(DestroyShareRequest $request)
    {
        Share::where('phone_id', $request->phone_id)
            ->where('user_shares_id', $request->user_shares_id)
            ->where('user_sharing_id', auth()->id())
            ->delete();
    }

    public function getSharesId(int|string|null $id, mixed $phone_id, mixed $user_shares_id)
    {
        return Share::where('phone_id', $phone_id)
            ->where('user_shares_id', $user_shares_id)
            ->where('user_sharing_id', $id)->first();
    }
}
