<?php

namespace App\Http\Service;

use Carbon\Carbon;
use App\Models\Notebook;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;

class NotebookService
{
    protected $url;

    // Constructor
    public function __construct($url) {
        $this->url = $url;
    }

    public function scrape() {
        $httpClient = HttpClient::create();
        $browser = new HttpBrowser($httpClient);

        $crawler = $browser->request('GET', $this->url);

        return $this->scrapeNotebooksFromUrl($crawler, $browser);
    }


    private function scrapeNotebooksFromUrl($crawler, $browser) {
        $pagesCount = $crawler->filter('.end')->attr('href');

        $queryString = parse_url($pagesCount, PHP_URL_QUERY);

        parse_str($queryString, $params);

        $currentPage = isset($params['currentPage']) ? $params['currentPage'] : 0;

        $pagesCount = range(0, $currentPage);


        foreach($pagesCount as $page) {
            if($page != 0) {
                $url = (string)$this->url . '?currentPage=' . (string)$page;
            } else {
                $url = $this->url;
            }

            $crawler = $browser->request('GET', $url);

            $articles = $crawler->filter('.product');

            $articles->each(function (Crawler $nodeProduct) {
                if (Notebook::where('model', '=', $nodeProduct->filter('.product-carousel--href')->text())->first() == null) {
                    $notebookModel = $nodeProduct->filter('.product-carousel--href')->text();
                    $notebookPrice = preg_replace('/[^0-9]/', '', $nodeProduct->filter('.product-carousel--info-newprice')->text());
                    $notebookDiscount = $nodeProduct->filter('.product-carousel--discount')->text();
                    $notebookPreviousPrice = preg_replace('/[^0-9]/', '', $nodeProduct->filter('.product-carousel--info-oldprice')->text());
                    $notebookImgUrl = $nodeProduct->filter('div.product-carousel--image img')->attr('src');

                    Notebook::create([
                        'model' => $notebookModel,
                        'price' => $notebookPrice,
                        'discount' => $notebookDiscount,
                        'previous_price' => $notebookPreviousPrice,
                        'img_url' => $notebookImgUrl,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            });
        }

    }
}
