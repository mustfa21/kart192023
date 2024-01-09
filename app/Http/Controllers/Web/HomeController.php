<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\WorkProcess;
use App\Models\WhyChooseUs;
use App\Models\Testimonial;
use App\Models\Subscriber;
use App\Mail\Subscription;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Counter;
use App\Models\Pricing;
use App\Models\Setting;
use App\Models\Certificate;

use App\Models\Slider;
use App\Models\Client;
use App\Models\Page;
use Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    //     if(LaravelLocalization::getCurrentLocale()==="ar"){
    //     $id =2;
    //     Language::where('id', '=', 1)->update([
    //         'default' => 0,
    //         'status' => 1
    //     ]);
    //   Language::where('id', '=', $id)->update([
    //         'default' => 1,
    //         'status' => 1
    //     ]);

    // }else{
    //         $id =1;
    //         Language::where('id', '=', 2)->update([
    //             'default' => 0,
    //             'status' => 1
    //         ]);
    //         Language::where('id', '=', $id)->update([
    //             'default' => 1,
    //             'status' => 1
    //         ]);

    //     }
     // Sliders
        $data['sliders'] = Slider::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();
            // Sliders
        $data['certificates'] = Certificate::where('status', '1')
        ->orderBy('id', 'desc')
        ->get();


        // Chooses
        $data['chooses'] = WhyChooseUs::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Services
        $data['services'] = Service::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Portfolios
        $data['portfolios'] = Portfolio::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->take(10)
                            ->get();

        // Counters
        $data['counters'] = Counter::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Pricings
        $data['pricings'] = Pricing::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Processes
        $data['processes'] = WorkProcess::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Testimonials
        $data['testimonials'] = Testimonial::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        // Clients
        $data['clients'] = Client::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        return view('web.index', $data);
    }
    public function lang($id){
        if($id ==2){

           Language::where('id', '=', $id)->update([
                'default' => 1,
                'status' => 1
            ]);
            Language::where('id', '=', 1)->update([
                'default' => 0,
                'status' => 1
            ]);

        }else{

                Language::where('id', '=', $id)->update([
                    'default' => 1,
                    'status' => 1
                ]);
                Language::where('id', '=', 2)->update([
                    'default' => 0,
                    'status' => 1
                ]);

            }
            return redirect()->back();
        }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subscribe(Request $request)
    {
        // Field Validation
        $request->validate([
            'email' => 'required|email',
        ]);

        $subscriber = Subscriber::where('email', $request->email)->first();

        if(!isset($subscriber)){
            Subscriber::create($request->all());
        }

        // Notify to User
        $template = EmailTemplate::where('slug', 'subscription')->first();
        $setting = Setting::where('status', '1')->first();

        if(isset($template) && isset($setting)){

            // Passing data to email template
            $data['email'] = $request->email;

            // Mail Information
            $data['subject'] = $template->title;
            $data['from'] = $setting->contact_mail;
            $data['sender'] = $setting->title;
            $data['message'] = $template->description;

            // Send Mail
            Mail::to($data['email'])->send(new Subscription($data));

        }

        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function page($slug)
    {
        // Page
        $data['page'] = Page::where('slug', $slug)->where('status', 1)->firstOrFail();

        return view('web.page-single', $data);
    }
}
