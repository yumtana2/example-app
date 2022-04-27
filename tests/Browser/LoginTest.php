<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSuccessfulLogin()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $browser->visit('/login') // 指定したパスに遷移する処理。パスをログイン画面に変更
            ->type('email', $user->email)
                ->type('password', 'password') // Userファクトリーはデフォルトが’password’なので変更しなくて良い
                ->press('LOG IN') // ログインボタン押下
                ->assertPathIs('/tweet') // /tweetに遷移したことを確認
                ->assertSee('つぶやきアプリ'); // ページ内に「つぶやきアプリ」と表示されていることの確認
        });
    }
}
