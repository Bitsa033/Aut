<?php

namespace App\Http\Controllers;

use App\Mail\emailResetLink;
use Illuminate\Http\Request;
use App\Mail\UserMessage;
use App\Mail\VerificationCode;
use App\Models\CodeVerification;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CodeVerificationNotification;
use App\Notification\UserNotification;
use App\Notifications\UserNotification as NotificationsUserNotification;

class SendMailController extends Controller
{
    public function passwordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->get('email');

        $user = User::where('email', $email)->get();

        if ($user != null) {
            Notification::send($user, new NotificationsUserNotification($user));

            return redirect()->route("password.request")->with("message", "Nous avons envoyé un lien de réinitialisation du mot de passe dans votre boite email.");
        } else {
            return redirect()->route("password.request")->with("userNotExist", "Cet email n'existe pas dans notre base de donnée, créez votre compte si vous n'en avez pas !");
        }
    }

    public function sendCodeEmailConfirmation(Request $request)
    {

        $email = $request->get('email');
        $email_code_validation = DB::table('code_verifications')->where('email', $email)->first();
        $user = User::where('email', $email)->get();
        // $sub = "Code de verification";
        $code = rand(1000, 4000);

        if ($email_code_validation != null) {
            // $code = $user_db->code;
            $id_code = $email_code_validation->id;
            $update_code = CodeVerification::findOrfail($id_code);
            $update_code->update([
                'code' => $code,
            ]);
        } else {
            CodeVerification::create([
                'email' => $email,
                'code' => $code
            ]);
        }
        // FacadesMail::to($email)->send(new VerificationCode($email, $code_al));
        Notification::send($user, new CodeVerificationNotification($email_code_validation, $code));


        return redirect()->route("verificationCodeView")->with('email', $email);
    }
}
