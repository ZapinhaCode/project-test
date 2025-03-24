<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\User;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;
    
    #[Test]
    public function user_can_view_product_list()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        Produto::factory()->create(['nome' => 'Produto 1', 'preco' => 100]);
        Produto::factory()->create(['nome' => 'Produto 2', 'preco' => 150]);
        $response = $this->get(route('produtos.index'));
        $response->assertStatus(200);
        $response->assertSee('Produto 1');
        $response->assertSee('Produto 2');
    }

    #[Test]
    public function user_can_create_a_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->post('/produtos', [
            'nome' => 'Produto Teste',
            'preco' => 99.99,
        ]);
    
        $response->assertRedirect(route('produtos.index')); // Verifique se o redirecionamento é correto
        $response->assertSessionHas('success', 'Produto cadastrado com sucesso');
    
        $this->assertDatabaseHas('produtos', [
            'nome' => 'Produto Teste',
            'preco' => 99.99
        ]);
    }

    #[Test]
    public function user_can_edit_a_product()
    {
        // Cria um usuário e faz login
        $user = User::factory()->create();
        $this->actingAs($user); // Simula o login do usuário

        // Cria um produto de exemplo
        $produto = Produto::factory()->create([
            'nome' => 'Produto Antigo',
            'preco' => 99.99
        ]);

        // Envia a requisição GET para o formulário de edição do produto
        $response = $this->get(route('produtos.edit', $produto->id));

        // Verifica se a página de edição foi carregada corretamente
        $response->assertStatus(200);

        // Verifica se os dados do produto estão presentes no formulário
        $response->assertSee('Produto Antigo');
        $response->assertSee('99.99');
    }

    #[Test]
    public function user_can_update_a_product()
    {
        // Cria um usuário e faz login
        $user = User::factory()->create();
        $this->actingAs($user); // Simula o login do usuário

        // Cria um produto de exemplo
        $produto = Produto::factory()->create([
            'nome' => 'Produto Antigo',
            'preco' => 99.99
        ]);

        // Envia a requisição PUT para atualizar o produto
        $response = $this->put(route('produtos.update', $produto->id), [
            'nome' => 'Produto Atualizado',
            'preco' => 120.00
        ]);

        // Verifica o redirecionamento após a atualização
        $response->assertRedirect(route('produtos.index'));

        // Verifica se os dados foram realmente atualizados no banco
        $this->assertDatabaseHas('produtos', [
            'id' => $produto->id,
            'nome' => 'Produto Atualizado',
            'preco' => 120.00
        ]);
    }

    #[Test]
    public function user_can_delete_a_product()
    {
        // Cria um usuário e faz login
        $user = User::factory()->create();
        $this->actingAs($user); // Simula o login do usuário
    
        // Cria um produto de exemplo
        $produto = Produto::factory()->create([
            'nome' => 'Produto a Deletar',
            'preco' => 50.00
        ]);
    
        // Envia a requisição DELETE para deletar o produto
        $response = $this->delete(route('produtos.destroy', $produto->id));
    
        // Verifica o redirecionamento após a exclusão
        $response->assertRedirect(route('produtos.index'));
    
        // Verifica se o produto foi removido do banco de dados
        $this->assertDatabaseMissing('produtos', [
            'id' => $produto->id,
            'nome' => 'Produto a Deletar'
        ]);
    }
}
