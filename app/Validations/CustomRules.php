<?php

namespace App\Validations;

use App\Models\UsuarioModel;

class CustomRules
{
    public function check_pass($value, string $usr, array $data, ?string &$error = "The password does not match"): bool
    {
        //creo un modelo de usuario para buscar al usuario en la base de datos
        $usuarioModel = new UsuarioModel();
        //se busca el usuario en función de como quiera ingresar el usuario, con su nombre de usuario o email
        $usuario = $usuarioModel->where('usuario',$data[$usr])->orWhere('email', $data[$usr])->first();

        //si la contraseña en la base de datos coincide con la ingresada, regresa verdaderi
        return password_verify($value, $usuario['pass']);
    }
}

?>