<?php

namespace Tests\Unit\Services;
use Mockery;
use App\Services\TweetService;
use PHPUnit\Framework\TestCase;

class TweetServiceTest extends TestCase
{
    public function test_get_tweets()
    {
        $mock = Mockery::mock('alias:App\Models\Tweet');
        $mock->shouldReceive('with->orderBy->get')->andReturn([
            (object)[
                'id' => 1,
                'user_id' => 1
            ], [
                'id' => 2,
                'user_id' => 2
            ], [
                'id' => 3,
                'user_id' => 3
            ]]);

        $tweetService = new TweetService();
        $tweets = $tweetService->getTweets();
        $this->assertCount(3, $tweets);
    }

    /**
     * A basic unit test example.
     *
     * @runInSeparateProcess ※phpunitに関しては有効。Mockeryが強力なため、他テストとは違うプロセスで動くようアノテーション追加
     * @return void
     */
    public function test_check_own_tweet()
    {
        // Mockeryでモック作成
        $mock = Mockery::mock('alias:App\Models\Tweet'); // モックオブジェクトを作成
        // Tweet::where('id', $tweetId)->first();が実行された場合の処理
        // 本来はメソッド名の指定だが、元がメソッドチェーンのためこの書き方。メソッドが呼び出された時に、id=1, user_id=1のオブジェクトを返却する
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);

        $tweetService = new TweetService();
        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);

        $result = $tweetService->checkOwnTweet(2,1);
        $this->assertFalse($result);
    }
}
