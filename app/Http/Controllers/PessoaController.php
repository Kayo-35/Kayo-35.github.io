<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    //Controlador para gerenciamento de pessoas Ex1
    public function index()
    {
        return view("pessoas");
    }

    public function processar(Request $request)
    {
        //Validação dos dados inseridos
        $dataHj = date("Y-m-d");
        $validar = $request->validate(
            [
                "nm_nome" => "required|string|max:50",
                "dt_nascimento" => "required|date|before:" . $dataHj,
                "nm_email" => "required|email",
            ],
            [
                "nm_nome.required" => "Preencha seu nome!",
                "nm_nome.max" => "Caracters máximos ultrapassados!",
                "dt_nascimento.required" => "Preencha sua data de nascimento",
                "dt_nascimento.before" =>
                    "Data Inválida! Você não pode ter nascido depois de hoje!",
                "nm_email.required" => "Forneça seu email!",
                "nm_email.email" => "Forneça um endereço de email válido!",
            ]
        );

        return view("pessoas", ["dados" => $validar]);
    }

    public function listar()
    {
        $pessoas = Pessoa::all();
        return view("pessoas", ["saida", $pessoas]);
    }
}
