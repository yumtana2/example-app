<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;

class TweetService
{
    public function getTweets()
    {
        return Tweet::orderBy('created_at', 'DESC')->get();
    }

    /**
     * 自分のツイートかチェックする
     * @param int $userId
     * @param int $tweetId
     * @return bool
     */
    public function checkOwnTweet(int $userId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet) {
            return false;
        }
        return $tweet->user_id === $userId;
    }

    public function countYesterdayTweets(): int
    {
        return
            Tweet::whereDate('created_at', '>=', Carbon::yesterday()->toDayDateTimeString())
                ->whereDate('created_at', '<', Carbon::today()->toDateTimeString())
                ->count();
    }
}
