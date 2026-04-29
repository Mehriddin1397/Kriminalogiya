<?php

namespace App\Http\Controllers;

use App\Models\Academia;
use App\Models\Articles;
use App\Models\Bibliophilia;
use App\Models\Crimes;
use App\Models\Journal;
use App\Models\News;
use App\Models\Research;
use App\Models\Scholars;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function article_show($id)
    {
        $research = Articles::with('categories')->find($id);
        $category = $research->categories->first();

        return view('pages.crimes', compact('research', 'category'));
    }
    public function bibliophilia_show($id)
    {
        $research = Bibliophilia::with('categories')->find($id);
        $category = $research->categories->first();

        return view('pages.crimes', compact('research', 'category'));
    }

    public function scholar_show($id)
    {
        $new = Scholars::with('categories')->find($id);
        $category = $new->categories->first();

        return view('pages.news_show', compact('new', 'category'));
    }
    public function research_show($id)
    {
        $research = Research::with('categories')->find($id);
        $category = $research->categories->first();

        return view('pages.crimes', compact('research', 'category'));
    }
    public function news_show($id)
    {
        $new = News::with('categories')->find($id);
        $category = $new->categories->first();

        return view('pages.news_show', compact('new', 'category'));
    }
    public function journal_show($id)
    {
        $research = Journal::with('categories')->find($id);
        $category = $research->categories->first();

        return view('pages.crimes', compact('research', 'category'));
    }
    public function crimes_show($id)
    {
        $research = Crimes::with('categories')->find($id);
        $category = $research->categories->first();

        return view('pages.crimes', compact('research', 'category'));
    }
    public function academia_show($id)
    {
        $new = Academia::with('categories')->find($id);
        $category = $new->categories->first();

        return view('pages.news_show', compact('new', 'category'));
    }

}
