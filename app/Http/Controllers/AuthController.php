<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluator;
use App\Models\Admin;
use App\Models\Student;

class AuthController extends Controller
{
    public function customValidate(Request $request)
    {
        
        // Extract user type from the request
        $userType = request()->input('userType');
        $email = request()->input('email');
        $password = request()->input('password');

        // Perform actions based on user type
        switch ($userType) {
            case 'evaluator':
                $evaluator = Evaluator::where('email', $email)->where('password', $password)->first();
                if($evaluator){
                    return redirect()->route('evaluator.dashboard',['id' => $evaluator->id]);
                }
                break;
            case 'student':
                $student = Student::where('email', $email)->where('password', $password)->first();
                if($student){
                    return redirect()->route('student.dashboard',['id' => $student->id]);
                }
                break;
            case 'admin':
                $admin = Admin::where('email', $email)->where('password', $password)->first();
                if($admin){
                    return redirect()->route('admin.dashboard',['id' => $admin->id]);
                };
                break;
            default:
                return redirect()->route('loginInForm');
            break;
        }
        
        //Redirect to login page if user not authenticated
        return redirect()->route('loginInForm');
    }
}
