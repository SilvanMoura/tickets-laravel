<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Domain;

class UserController extends Controller
{
    public function addUsersTemplate()
    {
        return view('addUsersTemplate');
    }

    public function registroUser(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'tipo_de_usuario' => 'required|string',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $pass = password_hash($request->input('password'), PASSWORD_BCRYPT);
        $type = $request->input('tipo_de_usuario');

        list($username, $domain) = explode("@", $email);

        $domainInstance = new Domain();
        $resultDomain = $domainInstance::where('domain', $domain)->get();

        $userInstance = new User;
        $resultEmail = $userInstance::where('email', $email)->get();
        
        if (!count($resultDomain) && !count($resultEmail)) {
            echo "<pre>"; print_r("1"); echo "</pre>";
            $userInstance->name = $name;
            $userInstance->email = $email;
            $userInstance->password = $pass;
            $userInstance->user_type = $type;
            $userInstance->status = "Ativo";
            echo "<pre>"; print_r("1"); echo "</pre>";
            // Salve o user no banco de dados
            $userInstance->save();

            // Redirecione ou retorne uma resposta, por exemplo:
            return redirect()->route('dashboard');
        }
    }
}
