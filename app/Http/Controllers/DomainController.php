<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    /**
     * Exibe todos os tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDomains()
    {
        // Recupere todos os tickets do banco de dados
        $domains = Domain::all();

        // Retorne a view 'dashboard' e passe os dados dos tickets usando compact()
        return view('homeDomain', compact('domains'));
    }

    public function createDomainForm()
    {
        return view('createDomain');
    }

    public function createDomain(Request $request)
    {
        $name = $request->input('nome');
        $domainValue = $request->input('dominio');

        // Validação dos campos
        $request->validate([
            'nome' => 'required|string',
            'dominio' => 'required|string'
        ]);

        $userId = null;

        if (Auth::check()) {
            $userId = Auth::id();
        }

        $domain = new Domain;
        $domain->name = $name;
        $domain->domain = $domainValue;
        $domain->created_by = $userId;
        $domain->status = "Ativo";
        $domain->created_at = now();

        $domain->save();

        return redirect()->route('paramsSystem');
    }

    public function getDomainId($id)
    {
        // Recupere todos os tickets do banco de dados
        $domainData = Domain::where('id', $id)->first();

        // Retorne a view 'dashboard' e passe os dados dos tickets usando compact()
        return view('viewDomain', compact('domainData'));
    }

    public function deletarDomain($id)
    {
        $domain = Domain::where('id', $id)->first();
        if ($domain) {
            $domain->delete();

            return redirect()->route('paramsSystem');
        }
    }

    public function updateDomainForm($id)
    {
        $domainData = Domain::where('id', $id)->first();

        // Retorne a view 'dashboard' e passe os dados dos tickets usando compact()
        return view('editDomain', compact('domainData'));
    }

    public function updateDomain(Request $request, $id)
    {
        $domain = Domain::where('id', $id)->first();

        if (!$domain) {
            return redirect()->route('dashboard')->with('error', 'domain não encontrado');
        }

        // Atualize os campos do domain com base nos dados do formulário
        $domain->name = $request->input('name');
        $domain->domain = $request->input('domain');
        $domain->status = $request->input('status');

        $domain->save();

        return redirect()->route('dashboard')->with('success', 'domain atualizado com sucesso');
    }
}
