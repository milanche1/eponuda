<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Notebook;
use Illuminate\Http\Request;
use App\Http\Service\NotebookService;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;

class NotebooksController extends Controller
{
    public function index()
    {
        $scrape = (new NotebookService('https://www.tehnomanija.rs/c/kompjuteri-hardware-i-kancelarijska-oprema/laptopovi-100304'))->scrape();

        return view('store', [
            'notebooks' => Notebook::paginate(20)
        ]);

    }
}
