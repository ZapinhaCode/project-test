<?php

namespace Tests\Browser;

use App\Models\Produto;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class ProdutoTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_create_a_product() {
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

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/produtos/create')
            ->pause(1000)
            ->type('nome', 'Produto Teste')
            ->pause(1000)
            ->type('preco', '99.99')
            ->pause(1000)
            ->press('Cadastrar')
            ->pause(3000)
            ->assertSee('Produto cadastrado com sucesso');        
        });

        $this->assertDatabaseHas('produtos', [
            'nome' => 'Produto Teste',
            'preco' => 99.99,
        ]);
    }

    public function test_user_can_edit_a_product() {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);
    
        $produto = Produto::create([
            'nome' => 'Produto Teste',
            'preco' => 99.99,
        ]);
    
        $this->browse(function (Browser $browser) use ($user, $produto) {
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
    
        $this->browse(function (Browser $browser) use ($produto) {
            $browser->visit(route('produtos.edit', $produto->id))
                ->pause(1000)
                ->type('nome', 'Produto Editado')
                ->pause(1000)
                ->type('preco', '199.99')
                ->pause(1000)
                ->press('Atualizar')
                ->pause(3000)
                ->assertSee('Produto atualizado com sucesso');        
        });
    
        $this->assertDatabaseHas('produtos', [
            'nome' => 'Produto Editado',
            'preco' => 199.99,
        ]);
    }

    public function test_user_can_delete_a_product() {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);
    
        $produto = Produto::create([
            'nome' => 'Produto para Excluir',
            'preco' => 99.99,
        ]);
    
        $this->browse(function (Browser $browser) use ($user, $produto) {
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
    
        $this->browse(function (Browser $browser) use ($produto) {
            $browser->visit(route('produtos.index'))
                ->pause(1000)
                ->press('Excluir', $produto->id)
                ->pause(3000)
                ->assertSee('Produto excluído com sucesso');
        });
    
        $this->assertDatabaseMissing('produtos', [
            'nome' => 'Produto para Excluir',
            'preco' => 99.99,
        ]);
    }
}
