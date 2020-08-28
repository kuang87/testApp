<?php


namespace App\Services;


use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class ScraperService
{
    public function scrap($url)
    {
        $client = new Client(HttpClient::create([
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'timeout' => 60,
        ]));

//        $crawler = $client->xmlHttpRequest('GET', $url);
        $crawler = $client->request('GET', $url);
//        dd($crawler);

        $titles = [];

        try{
            do{
            $titles = array_merge($titles, $crawler->filter('.card__content a.card__title')->each(function ($node){
                return $node->text();
            }));
                if (!empty($link = $crawler->selectLink('Показать ещё')->link())){
                    $crawler = $client->click($crawler->selectLink('Показать ещё')->link());
                }
            } while($link);
        }catch (\Exception $exception){

        }



//        $titles = array_merge($titles, $crawler->filter('.card__content a.card__title')->each(function ($node){
//            return $node->text();
//        }));
        dd($titles);
        exit();
        return compact('titles');
    }
}
