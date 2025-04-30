<?php

namespace App\Http\Controllers;

use App\Models\Academia;
use App\Models\Articles;
use App\Models\Bibliophilia;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Crimes;
use App\Models\Expertise;
use App\Models\Institut;
use App\Models\Journal;
use App\Models\News;
use App\Models\Partner;
use App\Models\Rahbariyat;
use App\Models\Research;
use App\Models\Scholars;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function main()
    {
        $contacts = Contact::all();
        $mnews = News::whereHas('categories', function ($query) {
            $query->where('name_uz', 'Mahalliy yangiliklar');
        })
            ->latest() // created_at bo'yicha eng yangilari
            ->take(6)
            ->get();
        $xnews = News::whereHas('categories', function ($query) {
            $query->where('name_uz', 'Xorijiy Yangiliklar');
        })
            ->latest()
            ->take(6)
            ->get();
        $newscount = News::count();
        $researchcount = Research::count();
        $category1Id = 20; // Birinchi kategoriya IDsi
        $category2Id = 21; // Ikkinchi kategoriya IDsi

// 1-kategoriya bo‘yicha hamkorlar soni
        $category1PartnersCount = Partner::whereHas('categories', function ($query) use ($category1Id) {
            $query->where('category_id', $category1Id);
        })->count();

// 2-kategoriya bo‘yicha hamkorlar soni
        $category2PartnersCount = Partner::whereHas('categories', function ($query) use ($category2Id) {
            $query->where('category_id', $category2Id);
        })->count();

        return view('pages.main', compact('contacts', 'mnews','xnews', 'category1PartnersCount', 'category2PartnersCount', 'newscount', 'researchcount'));

    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function test(Request $request)
    {
        $category_id = $request->input('category_id');
        $id = $request->input('id');
        $category = Category::find($category_id);

        switch ($category->object_type) {

            case 'institut':
                $institut = Institut::find($id);

                return view('pages.texts', compact('institut', 'category'));
                break;
        }
    }


    //1-guruh(junallar,kitobxonlik, tadqiqotlar,ilmiy kengash, maqola)
    public function categoryId($id)
    {
        $category = Category::find($id);

        switch ($category->object_type) {

            case 'research':
                $categories = Category::forObjectType('research');

                $researchs = Research::whereHas('categories', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                return view('pages.researchsCategory', compact('researchs', 'categories', 'category', 'id'));
                break;

            case 'bibliophilia':
                $categories = Category::forObjectType('bibliophilia');

                $researchs = Bibliophilia::whereHas('categories', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                return view('pages.researchsCategory', compact('researchs', 'categories', 'category', 'id'));
                break;

            case 'crimes':
                $categories = Category::forObjectType('crimes');

                $news = Crimes::whereHas('categories', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                return view('pages.news', compact('news', 'categories', 'category', 'id'));
                break;

            case 'jurnal':
                $categories = Category::forObjectType('jurnal');

                $researchs = Journal::whereHas('categories', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                return view('pages.researchsCategory', compact('researchs', 'categories', 'category', 'id'));
                break;

            case 'articles':
                $categories = Category::forObjectType('articles');

                $researchs = Articles::whereHas('categories', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                return view('pages.researchsCategory', compact('researchs', 'categories', 'category', 'id'));
                break;

            case 'news':
                $news = News::whereHas('categories', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                return view('pages.news', compact('news', 'category', 'id'));
                break;

            case 'scholars':
                $news = Scholars::whereHas('categories', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                return view('pages.news', compact('news', 'category', 'id'));
                break;
            case 'expertise':
                $news = Expertise::whereHas('categories', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                return view('pages.news', compact('news', 'category', 'id'));
                break;

        }


    }

    public function show(Request $request)
    {
        $category_id = $request->input('category_id');
        $id = $request->input('id');


        $category = Category::find($category_id);

        switch ($category->object_type) {

            case 'research':
                $research = Research::find($id);

                return view('pages.crimes', compact('research', 'category'));
                break;

            case 'bibliophilia':
                $research = Bibliophilia::find($id);

                return view('pages.crimes', compact('research', 'category'));
                break;


            case 'crimes':
                $new = Crimes::find($id);

                return view('pages.news_show', compact('new', 'category'));
                break;

            case 'jurnal':
                $research = Journal::find($id);

                return view('pages.crimes', compact('research', 'category'));
                break;

            case 'articles':
                $research = Articles::find($id);

                return view('pages.crimes', compact('research', 'category'));
                break;
            case 'academia':
                $research = Academia::find($id);

                return view('pages.crimes', compact('research', 'category'));
                break;

            case 'news':
                $new = News::find($id);

                return view('pages.news_show', compact('new', 'category'));
                break;

            case 'scholars':
                $new = Scholars::find($id);

                return view('pages.news_show', compact('new', 'category'));
                break;

            case 'expertise':
                $new = Expertise::find($id);

                return view('pages.news_show', compact('new', 'category'));
                break;

        }
    }

    public function boss()
    {
        $boss = Rahbariyat::all();

        return view('pages.boshliq', compact('boss'));

    }

    public function search(Request $request)
    {
        $q = $request->input('query');

        $academias = Academia::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();
        $articles = Articles::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();
        $crimes = Crimes::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();
        $journals = Journal::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();
        $news = News::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();
        $bibliophilias = Bibliophilia::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();
        $rahbariyats = Rahbariyat::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();
        $researchs = Research::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();
        $scholars = Scholars::where('name_uz', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_kr', 'like', "%$q%")
            ->get();


        return view('pages.search', compact('articles', 'scholars', 'researchs',
            'rahbariyats', 'bibliophilias', 'news', 'journals', 'crimes', 'academias', 'q'));
    }

    public function hujjat()
    {
        return view('pages.ins_nor_hujjat');
    }


}
