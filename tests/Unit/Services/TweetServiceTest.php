<?php

namespace Tests\Unit\Services;

use App\Modules\ImageUpload\ImageManagerInterface;
use Mockery;
use App\Services\TweetService;
use PHPUnit\Framework\TestCase;

class TweetServiceTest extends TestCase
{
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

        $imageManager = Mockery::mock(ImageManagerInterface::class);
        $tweetService = new TweetService($imageManager);
        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);

        $result = $tweetService->checkOwnTweet(2, 1);
        $this->assertFalse($result);
    }
}
