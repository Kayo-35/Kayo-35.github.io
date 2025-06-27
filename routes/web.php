<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("home");
})->name("home");

Route::get("/pessoa", [PessoaController::class, "index"])->name("pessoa");

//Rota para processamento do formulário de cadastro de pessoa
Route::post("/pessoa/cadastro", [PessoaController::class, "processar"])->name(
    "pessoa.cadastro"
);

//Utilizada para impedir acesso manual a rota /pessoa/cadastro
Route::get("/pessoa/cadastro", function () {
    return redirect()->back();
});

Route::get("/pessoa/lista", [PessoaController::class, "listar"])->name(
    "pessoa.listar"
);
