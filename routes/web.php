<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("home");
})->name("home");

Route::get("/pessoa", [PessoaController::class, "index"])->name("pessoa");

Route::post("/pessoa/cadastro", [PessoaController::class, "processar"])->name(
    "pessoa.cadastro"
);

Route::post("/pessoa/lista", [PessoaController::class, "listar"])->name(
    "pessoa.listar"
);
