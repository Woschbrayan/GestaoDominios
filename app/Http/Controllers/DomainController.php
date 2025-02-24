<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $domains = Domain::with('company')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhereHas('company', function ($q) use ($search) {
                                 $q->where('name', 'like', "%{$search}%");
                             });
            })
            ->paginate(10);
    
        return view('domains.index', compact('domains'));
    }

    public function expired(Request $request)
    {
        $search = $request->input('search');
    
        $domains = Domain::with('company')
            ->where('status', 'Expirado')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhereHas('company', function ($q) use ($search) {
                                 $q->where('name', 'like', "%{$search}%");
                             });
            })
            ->paginate(10);
    
        return view('domains.expired', compact('domains'));
    }

    public function active(Request $request)
    {
        $search = $request->input('search');

        $domains = Domain::with('company')
            ->where('status', 'Ativo')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhereHas('company', function ($q) use ($search) {
                                 $q->where('name', 'like', "%{$search}%");
                             });
            })
            ->paginate(10);

        return view('domains.active', compact('domains'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('domains.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:domains',
            'company_id' => 'required',
            'status' => 'required',
            'expiration_date' => 'required|date',
        ], [
            'name.unique' => 'Erro ao cadastrar o domínio. Verifique se ele já não está cadastrado.',
        ]);
        
    
        try {
            Domain::create([
                'user_id' => Auth::id(),
                'company_id' => $request->company_id,
                'name' => $request->name,
                'status' => $request->status,
                'expiration_date' => $request->expiration_date,
            ]);
    
            return redirect('/domains')->with('success', 'Domínio cadastrado com sucesso!');
        } catch (QueryException $e) {
            return redirect()->back()
                             ->withInput()
                             ->withErrors(['error' => 'Erro ao cadastrar o domínio. Verifique se ele já não está cadastrado.']);
        }
    }
    

    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        $companies = Company::all();
        return view('domains.edit', compact('domain', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $domain = Domain::findOrFail($id);
    
        $request->validate([
            'name' => 'required|unique:domains,name,'.$domain->id,
            'company_id' => 'required',
            'status' => 'required',
            // 'expiration_date' => 'required|date',
        ], [
            'name.unique' => 'Erro ao atualizar o domínio. Verifique se o nome já está em uso.',
        ]);
    
        try {
            $domain->update($request->all());
            return redirect('/domains')->with('success', 'Domínio atualizado com sucesso!');
        } catch (QueryException $e) {
            return redirect()->back()
                             ->withInput()
                             ->withErrors(['error' => 'Erro ao atualizar o domínio. Verifique os dados e tente novamente.']);
        }
    }
    

    public function destroy($id)
    {
        try {
            $domain = Domain::findOrFail($id);
            $domain->delete();

            return redirect('/domains')->with('success', 'Domínio excluído com sucesso!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors('Erro ao excluir o domínio. Pode haver dependências atreladas.');
        }
    }
}
