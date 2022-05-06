<?php

namespace Tests\Feature\Tweet;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    // テスト実行前後、DBが初期化される
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_successed()
    {
        $this->markTestSkipped('スキップ');
        $user = User::factory()->create(); // ユーザーを作成
        $tweet = Tweet::factory()->create(['user_id' => $user->id]); // つぶやきを作成

        $this->actingAs($user); // 指定したユーザーでログインした状態にする

        $response = $this->delete('/tweet/delete/' . $tweet->id);
        $response->assertRedirect('/tweet');
    }
}
