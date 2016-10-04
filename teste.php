<?php

$aluno = [
            "Nome" => "Fabiano Alves Falcão",
            "CPF" => preg_replace('/[^0-9]/', '', "926.261.306-72"),
            "Apelido" => "Gordinho",
            "NomeCracha" => "",
            "Trabalhando" => "1",
            "Telefone" => preg_replace('/[^0-9]/', '', "(33) 3412-1896"),
            "Celular" => preg_replace('/[^0-9]/', '', "(33) 98826-6638"),
            "Email" => "fabiano.falcao@ifmg.edu.br",
            "Senha" => "123456",
        ];
var_dump($aluno);

$aluno['idAluno'] = 10;

var_dump($aluno);

