<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class NewsletterController extends Controller
{
    public function __construct(private Request $request){

    }
    public function __invoke(Newsletter $newsletter)
    {
        $this->request->validate(['email' => ['required', 'email','min:5']]);
        try {
            $newsletter->subscribe($this->request->get('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to the newsletter, we\'re sorry'
            ]);
        }
        return back()->with('success', 'Congratulations! You are now subscribed to the newsletter');
    }

}

