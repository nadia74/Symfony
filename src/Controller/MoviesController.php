<?php

namespace App\Controller;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\UserManager;

class MoviesController extends AbstractController
{
    private $apikey;
    private $twig;
    private $movies = [];
    private $poster = [];
    private $size = "300";

    private $userManager;

    //initialiser l'attribut dans le constructeur
    public function __construct(UserManager $usermanager)
    {
        $this->userManager = $usermanager;
        $this->apikey = "53541229f01fe0aec71f6c7d7418751c";
    }

    public function makeRequest(){

        $search = "";
        $title = "";
        $poster = "";
        $overview = "";
        $release="";
        $id ="";
        $language ="";
        $genre="";


        if (isset($_GET["movie_name"])){
            $search = $_GET["movie_name"];
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/search/movie?api_key=$this->apikey&query=$search");

            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                    foreach ($results as $key => $value){

                        if ($key === "poster_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                    }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
            }

        }
        if (isset($_GET["actors"])){
            $search = $_GET["actors"];
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/search/person?api_key=$this->apikey&query=$search");

            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                    foreach($results["known_for"] as $kf){
                        foreach ($kf as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                    }
                }
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==1){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=28");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }
    
    if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==2){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=12");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

    if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==3){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=16");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==4){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=35");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==5){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=80");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==6){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=99");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==7){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=18");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==8){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=10751");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==9){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=14");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==10){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=36");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==11){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=27");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==12){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=10402");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==13){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=9648");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==14){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=10749");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==15){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=878");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }
    
        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==16){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=10770");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==17){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=53");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==18){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=10752");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

        if (isset($_GET["checkboxes"]) && $_GET["checkboxes"]==19){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&with_genres=37");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }

if (isset($_GET["year"])){
            $client = HttpClient::create();
            $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?api_key=$this->apikey&primary_release_date.gte=".$_GET['year']."-01-01&primary_release_date.lte=".$_GET['year']."-12-31");
            if ($response->getStatusCode() ===200){
                $response = $response->toArray();
                foreach ($response["results"] as $results){
                        foreach ($results as $key => $value){
                        if ($key === "backdrop_path") {
                        $poster = "http://image.tmdb.org/t/p/w$this->size/" . $value;
                        }
                        if ($key === "original_title") {
                            
                            $title = $value;
                        }
                        if ($key === "overview") {
                            
                            $overview = $value;
                        }

                        if ($key === "release_date") {
                            
                            $release = $value;
                        }
                        if ($key === "id") {
                            
                            $release = $value;
                        }
                        if ($key ==="original_language"){
                            $language =$value;
                        }
                        if ($key ==="genres"){
                            $genres =$value;
                        }

                        }
                    array_push($this->movies, ["title" => $title, "poster" => $poster, "overview" => $overview, "release_date" => $release, "id" => $id, "original_language"=>$language, "genres" =>$genre]);
                }
                
            }
        }


}



    /**
     * @Route("/movies", name="movies")
     */
    public function index()
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }

       $this->makeRequest();

        $response =  $this->render('movies/index.html.twig', [
            "movies" => $this->movies, "poster" => $this->poster
        ]);
        return 
            $response;
    }
}
