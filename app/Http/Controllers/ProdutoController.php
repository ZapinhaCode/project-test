<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $produtos = Produto::all();
        return view('/produtos/produtos', compact('produtos'));
    }

    public function create() {
        return view('/produtos/cadastra_produto');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();
            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->save();
            DB::commit();
            return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao cadastrar produto');
        }
    }

    public function edit($id) {
        $produto = Produto::find($id);
        return view('/produtos/edita_produto', compact('produto'));
    }

    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            $produto = Produto::find($id);
            $produto->update([
                'nome' => $request->nome,
                'preco' => $request->preco
            ]);
            DB::commit();
            return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao atualizar produto');
        }
    }

    public function destroy($id) {
        try {
            DB::beginTransaction();
            $produto = Produto::find($id);
            $produto->delete();
            DB::commit();
            return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao excluir produto');
        }
    }
}
