<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase {
    use DatabaseMigrations;

    public function test_user_can_login() {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);
    
        $this->browse(function (Browser $browser) use ($user) {
            $browser->pause(3000)
                ->visit('/login')
                ->pause(3000)
                ->type('email', $user->email)
                ->pause(1000)
                ->type('password', 'password')
                ->pause(1000)
                ->press('Login')
                ->pause(3000)
                ->assertPathIs('/home');
        });
    }

    public function test_user_can_register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->pause(2000)
                ->type('name', 'Novo Usuário')
                ->pause(1000)
                ->type('email', 'newuser@example.com')
                ->pause(1000)
                ->type('password', 'password')
                ->pause(1000)
                ->type('password_confirmation', 'password')
                ->pause(1000)
                ->press('Register')
                ->pause(2000)
                ->assertPathIs('/home');
        });

        $this->assertDatabaseHas('users', [
            'email' => 'newuser@example.com',
        ]);
    }
}
