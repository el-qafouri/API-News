<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // از دیتابیس 10 تا آخرین خبر را بخوانید
        $newsdata = News::query()->orderBy('created_at', 'desc')->take(10)->get();

        return view('news', compact('newsdata'));
    }


    public function storeNewsFromApi(Request $request)
    {
        $newskey = env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $newskey);

        $apiData = $response->json();

        // چک کنید که آرایه دارای کلید "articles" باشد
        if (isset($apiData['articles']) && count($apiData['articles']) > 0) {
            $articles = $apiData['articles'];

            foreach (array_slice($articles, -10) as $article) {
                // تبدیل تاریخ به فرمت معتبر MySQL
                $publishedAt = Carbon::parse($article['publishedAt'])->toDateTimeString();

                // چک کردن وجود مقاله با همین عنوان
                News::query()->updateOrCreate(
                    ['title' => $article['title']],
                    [
                        'source' => $article['source']['name'] ?? null,
                        'author' => $article['author'] ?? 'Unknown',
                        'description' => $article['description'] ?? '',
                        'urlToImage' => $article['urlToImage'] ?? '',
                        'url' => $article['url'] ?? '',
                        'publishedAt' => $publishedAt,
                        'content' => $article['content'] ?? '',
                    ]
                );
            }
            return response()->json(['message' => 'اطلاعات با موفقیت ذخیره شد.']);
        } else {
            return response()->json(['message' => 'داده‌های معتبر از API دریافت نشد.']);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public
    function show(News $news)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(News $news)
    {
        //
    }
}
