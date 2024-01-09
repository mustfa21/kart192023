<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Models\Portfolio;
use App\Models\Client;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Portfolio Categories                                
        $data['portfolio_categories'] = PortfolioCategory::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Portfolios                                
        $data['portfolios'] = Portfolio::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        // Chooses
        $data['chooses'] = WhyChooseUs::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Clients
        $data['clients'] = Client::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        return view('web.portfolios', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        // Portfolio Category
        $data['portfolio_category'] = PortfolioCategory::where('slug', $slug)->first();

        // Portfolios                                
        $data['portfolios'] = Portfolio::with('categories')
                            ->whereHas('categories', function($query) use ($slug) {
                                $query->where('slug', $slug);
                                $query->where('status', '1');
                            })
                            ->where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        // Chooses
        $data['chooses'] = WhyChooseUs::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Clients
        $data['clients'] = Client::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        return view('web.portfolio-category', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Portfolio                                
        $data['portfolio'] = Portfolio::where('slug', $slug)
                        ->where('status', '1')
                        ->firstOrFail();

        return view('web.portfolio-single', $data);
    }
}
