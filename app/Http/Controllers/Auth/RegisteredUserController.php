<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\articles;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'prename' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:20', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255','regex:/^[\w.+\-]+@zig\.univ\.sn$/i', 'unique:'.User::class], // email @zig.univ.sn seulement
            'matricule' => ['required', 'string', 'max:9', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // @if(Str::endsWith($phrase, 'le monde'))
        //     <p>La phrase se termine bien par "le monde".</p>
        // @endif

        $user = User::create([
            'prename' => $request->prename,
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'matricule' => $request->matricule,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    // Liste des Users
    public function all()
    {
        $users= User::where(['statut'=>'client'])->get();        
        // dd($users);
        return view('admin.users.index', compact('users',));
    }

    // Liste de reglement users
    public function userReglement() {
        // Obtenir la date d'aujourd'hui
        $today = Carbon::now()->format('d/m'); // Format jour et mois

        // Récupérer les utilisateurs inscrits sur le meme jour et mois qu'aujourd'hui
        $userDay = User::whereRaw("DATE_FORMAT(created_at, '%d/%m') = ?", [$today])->get();

        return view('admin.users.reglement', compact('userDay'));
    }

    // Activation users
    public function activate($users)
    {
        $users= User::FindOrFail($users);
        $users->update(['paiement'=> 1]);
        // dd($users);
        return redirect()->back()->with('success', 'Utilisateur activé avec succès.');
    }

    // Desactivation users
    public function desactivate($users)
    {
        $users= User::FindOrFail($users);
        $users->update(['paiement'=> 0]);
        // dd($users);
        return redirect()->back()->with('success', 'Utilisateur desactivé avec succès.');
    }

}
