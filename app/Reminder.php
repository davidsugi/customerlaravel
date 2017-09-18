 <?php
namespace App;

use Mail;
use App\User;
use App\Mail\DomainExpired;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class Reminder extends Controller
{
    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sends($id)
    {
        $user = User::findOrFail($id);
        Mail::to($user->email)->send(new DomainExpired());
    }
}

