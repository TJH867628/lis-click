<?php

namespace App\Http\Controllers;

use App\Models\tbl_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Exception;

class LoginController extends Controller
{
    public $table = 'lis.account';

    // Display the login page
    function index()
    {
        return view('page.visitor.login.login');
    }

    // Return email string (for testing purposes)
    public function email()
    {
        return 'email';
    }

    // Handle login check
    function check(Request $request)
    {
        session()->flush();
        $request->session()->start();
        $email = $request->input('email');
        $password = hash('sha512', $request->input('password'));
        $maxAttempts = 5;

        // Retrieve user information from the database
        $userInfo = DB::table('tbl_account')->where('email', $email)->first();
        $this->clearSession($request);

        // Check if the user has exceeded the maximum number of login attempts
        $attempts = $request->session()->get('login_attempts', 0);
        if ($this->hasExceededMaxAttempts($attempts, $maxAttempts, $request)) {
            return $this->handleExceededAttempts($request, $maxAttempts, $attempts);
        }

        // Validate user credentials
        if ($userInfo && $userInfo->password == $password) {
            $request->session()->remove('login_attempts');
            return $this->handleSuccessfulLogin($request, $userInfo, $email);
        } else {
            return $this->handleFailedLogin($request, $maxAttempts, $attempts);
        }
    }

    // Clear session data
    private function clearSession($request)
    {
        $request->session()->remove('LoggedUser');
        $request->session()->remove('LoggedAdmin');
        $request->session()->remove('LoggedSuperAdmin');
        $request->session()->remove('LoggedJKReviewer');
        $request->session()->remove('LoggedJKParticipants');
        $request->session()->remove('LoggedReviewer');
    }

    // Check if the user has exceeded the maximum number of login attempts
    private function hasExceededMaxAttempts($attempts, $maxAttempts, $request)
    {
        return $attempts >= $maxAttempts - 1;
    }

    // Handle the case when the user has exceeded the maximum number of login attempts
    private function handleExceededAttempts($request, $maxAttempts, $attempts)
    {
        if ($maxAttempts - $attempts == 1 && !$request->session()->has('suspend_login')) {
            $suspendTime = time() + 60; // Add 5 minutes to the current time
            $request->session()->put('suspend_login', $suspendTime);
        }
        if (time() < $request->session()->get('suspend_login')) {
            return redirect()->back()->with('fail', "Too many attempts <br> Please try again at " . date("H:i:s", ($request->session()->get('suspend_login'))));
        } else {
            $request->session()->put('login_attempts', 0);
            $request->session()->remove('suspend_login');
            $attempts = $request->session()->get('login_attempts', 0);
        }
    }

    // Handle successful login
    private function handleSuccessfulLogin($request, $userInfo, $email)
    {
        if ($userInfo->isAdmin === 0) {
            $request->session()->put('LoggedUser', $userInfo->email);
            return redirect('homePage');
        } else if ($userInfo->isAdmin === 1) {
            return $this->handleAdminLogin($request, $email);
        }
    }

    // Handle admin login
    private function handleAdminLogin($request, $email)
    {
        $AdminInfo = DB::table('tbl_admin_info')->where('email', $email)->first();
        if ($AdminInfo->status === 1) { // check the status of admin
            return $this->redirectAdmin($request, $AdminInfo);
        } else {
            return redirect()->back()->with('fail', 'Your Admin Status is not Active, Please contact with management department');
        }
    }

    // Redirect admin based on their role
    private function redirectAdmin($request, $AdminInfo)
    {
        switch ($AdminInfo->adminRole) {
            case "Super":
                $request->session()->put('LoggedSuperAdmin', $AdminInfo->email);
                return redirect('superAdminHomePage');
            case "JK Reviewer":
                $request->session()->put('LoggedJKReviewer', $AdminInfo->email);
                return redirect('JKReviewerHomePage');
            case "JK Pendaftaran":
                $request->session()->put('LoggedJKPendaftaran', $AdminInfo->email);
                return redirect('JkPendaftaranHomePage');
            case "JK Bendahari":
                $request->session()->put('LoggedJKBendahari', $AdminInfo->email);
                return redirect('JKBendahariHomePage');
            case "Reviewer":
                $request->session()->put('LoggedReviewer', $AdminInfo->email);
                return redirect('ReviewerHomePage');
            case "Floor Manager":
                $request->session()->put('LoggedFloorManager', $AdminInfo->email);
                return redirect('FloorManagerHomePage');
            default:
                return redirect()->back()->with('fail', 'Invalid Admin Role');
        }
    }

    // Handle failed login attempts
    private function handleFailedLogin($request, $maxAttempts, $attempts)
    {
        if ($attempts <= $maxAttempts + 1) {
            $attempts++;
        }
        $request->session()->put('login_attempts', $attempts);
        return redirect()->back()->with('fail', 'Email or Password is Invalid<br>Remaining Chances: ' . ($maxAttempts - $attempts));
    }
}
