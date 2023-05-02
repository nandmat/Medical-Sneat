<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function store(Request $request)
  {
    $user = $request->validate([
        'name' => ['required', 'min:3'],
        'cpf' => ['required'],
        'email' => ['required', 'email'],
        'telefone' => ['required'],
        'cidade' => ['required'],
        'estado' => ['required'],
        'password' => ['required', 'min:6'],
        'terms' => ['required']
    ],
    [
        'name' => 'Informe um nome válido',
        'cpf' => 'Informe um CPF válido',
        'email' => 'Informe um email válido',
        'telefone' => 'Informe um telefone válido',
        'cidade' => 'A cidade informada não é válida',
        'estado' => 'O estado informado não é valido',
        'password' => 'Senha inválida',
        'terms' => 'Para se registrar em nossa plataforma é preciso aceitar os termos de política e privacidade'
    ]);

    $user['password'] = bcrypt($user['password']);

    if($user = User::create($user))
    {
        return redirect()->route('auth.login.index');

    } else {
        User::destroy($user['id']);
        return redirect()->back()->with('erro', 'Dados inválidos');
    }
  }

  public function update(Request $request, $id)
  {
    if(!empty($id))
    {
        $user = $request->validate([
            'name' => ['required', 'min:3'],
            'cpf' => ['required'],
            'email' => ['required', 'email'],
            'telefone' => ['required'],
            'cidade' => ['required'],
            'estado' => ['required'],
            'password' => ['required', 'min:6']
        ],
        [
            'name' => 'Informe um nome válido',
            'cpf' => 'Informe um CPF válido',
            'email' => 'Informe um email válido',
            'telefone' => 'Informe um telefone válido',
            'cidade' => 'A cidade informada não é válida',
            'estado' => 'O estado informado não é valido',
            'password' => 'Senha inválida'
        ]);

        if(User::where('id', $id)->update($user))
        {
            return redirect()->route('dashboard');
        }else {
            return redirect()->back()->with('danger', 'Não foi possivel atualizar seus dados, tente novamente!');
        }
    }
  }

  public function destroy(Request $request, $id)
  {
    if($request->destroyConfirm)
    {
        if(!empty($id))
        {
        if(User::destroy($id))
        {
            return redirect()->route('auth.login.index');
        } else{
            return redirect()->back()->with('danger', 'Não foi possivel deletar seus dados, tente novamente!');
            }
        }
    }
  }
}
