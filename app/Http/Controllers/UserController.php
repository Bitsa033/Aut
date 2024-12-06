<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as FacadesMail;

class UserController extends Controller
{
    /**
     * Connexion
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $user = Auth::user();
            $user['message'] = "Connexion réussie";

            /**
             * @var User $user
             */
            $user['token'] = $user->createToken($user->name)->plainTextToken;
            return new ResourcesUser($user);
            // return redirect()->intended('dashboard');
        }

        return $user['message'] = "Connexion impossible, email ou mot de passe incorrect";
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Utilisateur déconnecté'], 200);
    }

    /**
     * Enregistrement d'un nouvel utilisateur
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'adress' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'adress' => $request->get('adress'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user['message'] = "Données enregistrées avec succès";

        return new ResourcesUser($user);
    }

    /**
     * On affiche l'utilisateur par son id.
     */
    public function show(string $id)
    {
        $user = User::findOrfail($id);
        return new ResourcesUser($user);
    }

    /**
     * Mise à jour des données d'un utilisateur déja existant.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'adress' => 'required|string',
            'phone' => 'required|string',
            // 'email' => 'required|email',
            // 'password' => 'required|min:8'
        ]);
        $user = User::findOrfail($id);
        $user->update([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'adress' => $request->get('adress'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            // 'password' => Hash::make($request->get('password')),
        ]);

        $user['message'] = "Donnée modifiées avec succès";

        return new ResourcesUser($user);
    }

    /**
     * Suppression d'un utlilisateur de la base de données.
     */
    public function destroy(string $id)
    {
        $user = User::findOrfail($id);
        $user->destroy($id);
        $user['message'] = "Donnée supprimée avec succès";
        return new ResourcesUser($user);
    }

    /**
     * Lien pour réinitialiser le mot de passe
     */
    function passwordResetView()
    {
        return view('auth.passwords.reset');
    }

    /**
     * reinitialisation du mot de passe
     */
    public function resetPassword(Request $request)
    {
        $findUser = DB::table('users')->where('email', $request->request->get('email'))->first();
        $id = $findUser->id;
        $user = User::findOrfail($id);
        // dd($user);
        $user->update([
            'password' => Hash::make($request->get('password')),
        ]);

        // $user['message'] = "Mot de passe réinitialisé avec succès";

        return redirect()->route('login')->with('resetPaswordTry', 'Vous avez recemment modifié votre mot de passe.Veuillez vous connecter');
    }

    /**
     * Lien pour envoyer le code de verification
     */
    public function viewEmailForSendCode()
    {
        return view("auth.viewEmailForSendCode");
    }

    /**
     * Lien pour verifier le code de verification
     */
    public function verificationCodeView()
    {
        return view("auth.verificationCodeView");
    }

    /**
     * vrification du code
     */
    public function verificationCodeAction(Request $request)
    {
        $code = $request->get('code');
        $code_db = DB::table('code_verifications')->where('code', $code)->first();

        if ($code_db == null) {
            # code...
            return redirect()->route("verificationCodeView")->with("message", "Le code que vous avez saisie est incorrect.Veuillez saisir celui qui se trouve dans votre boite email et recommencez !");
        } else {
            $email = $code_db->email;
            return redirect()->route("home");
        }

        // FacadesMail::to($email)->send(new VerificationCode($email, $code_al));
    }
}
