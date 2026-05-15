<?php

namespace App\Http\Controllers;

use App\Models\Academia;
use App\Models\Articles;
use App\Models\Bibliophilia;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Crimes;
use App\Models\Expertise;
use App\Models\Exploration;
use App\Models\Institut;
use App\Models\Journal;
use App\Models\Message;
use App\Models\News;
use App\Models\Partner;
use App\Models\Photo;
use App\Models\Rahbariyat;
use App\Models\Research;
use App\Models\Resource;
use App\Models\Scholars;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function main()
    {
        $contacts = Contact::all();
        $mnews = News::with('photos')
            ->whereHas('categories', function ($query) {
                $query->where('name_uz', 'Mahalliy yangiliklar');
            })
            ->latest()
            ->take(6)
            ->get();
        $xnews = News::with('photos')
            ->whereHas('categories', function ($query) {
                $query->where('name_uz', 'Xorijiy Yangiliklar');
            })
            ->latest()
            ->take(6)
            ->get();
        $inews = News::with('photos')
            ->whereHas('categories', function ($query) {
                $query->where('name_uz', 'Xalqaro reyting va indekslar');
            })
            ->latest()
            ->take(6)
            ->get();
        $newscount = News::count();
        $researchcount = Articles::count();
        $category1Id = 20; // Birinchi kategoriya IDsi
        $category2Id = 21; // Ikkinchi kategoriya IDsi

// 1-kategoriya bo‘yicha hamkorlar soni
        $category1PartnersCount = Expertise::whereHas('categories', function ($query) {
            $query->where('name_uz', 'Mahalliy hamkorlar');
        })->count();

// 2-kategoriya bo‘yicha hamkorlar soni
        $category2PartnersCount = Expertise::whereHas('categories', function ($query) {
            $query->where('name_uz', 'Xorijiy hamkorlar');
        })->count();

        $partners = Partner::all();

        return view('pages.main', compact('contacts', 'mnews', 'xnews', 'category1PartnersCount', 'category2PartnersCount', 'newscount', 'researchcount', 'inews','partners'));

    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:50', 'regex:/^[0-9+()\-\s]{6,}$/'],
            'message' => ['required', 'string', 'min:5', 'max:5000'],
        ], [
            'name.required' => "Ism va familiyani kiriting.",
            'phone.required' => "Telefon raqamingizni kiriting.",
            'phone.regex' => "Telefon raqami noto'g'ri formatda.",
            'message.required' => "Xabar matnini kiriting.",
            'message.min' => "Xabar kamida 5 ta belgidan iborat bo'lishi kerak.",
        ]);

        Message::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'message' => $data['message'],
            'ip' => $request->ip(),
            'user_agent' => substr((string)$request->userAgent(), 0, 255),
        ]);

        return redirect()
            ->route('contact')
            ->with('contact_success', "Xabaringiz yuborildi. Tez orada siz bilan bog'lanamiz.")
            ->withFragment('contact-form');
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

            case 'academia':
                $news = Academia::with('photos')
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->latest()->paginate(9);

                return view('pages.news', compact('news', 'category', 'id'));
                break;

            case 'research':
                $categories = Category::forObjectType('research');

                $researchs = Research::with(['photos', 'categories'])
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->get();

                return view('pages.researchsCategory', compact('researchs', 'categories', 'category', 'id'));
                break;

            case 'bibliophilia':
                $categories = Category::forObjectType('bibliophilia');

                $researchs = Bibliophilia::with(['photos', 'categories'])
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->get();

                return view('pages.researchsCategory', compact('researchs', 'categories', 'category', 'id'));
                break;

            case 'crimes':
                $categories = Category::forObjectType('crimes');

                $news = Crimes::with('photos')
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->paginate(9);

                return view('pages.news', compact('news', 'categories', 'category', 'id'));
                break;

            case 'jurnal':
                $categories = Category::forObjectType('jurnal');

                return view('pages.journals', compact('categories', 'category', 'id'));
                break;

            case 'articles':
                $categories = Category::forObjectType('articles');

                $researchs = Articles::with(['photos', 'categories'])
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->get();

                return view('pages.researchsCategory', compact('researchs', 'categories', 'category', 'id'));
                break;

            case 'news':
                $news = News::with('photos')
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->latest()->paginate(9);

                return view('pages.news', compact('news', 'category', 'id'));
                break;

            case 'scholars':
                $news = Scholars::with('photos')
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->latest()->paginate(9);

                return view('pages.news', compact('news', 'category', 'id'));
                break;
            case 'expertise':
                $news = Expertise::with('photos')
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->latest()->paginate(12);

                return view('pages.partners', compact('news', 'category', 'id'));
                break;
            case 'exploration':
                $news = Exploration::with('photos')
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->latest()->paginate(9);

                return view('pages.news', compact('news', 'category', 'id'));
                break;

            case 'partner':
                $mah_hamkor = Partner::with('photos')
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->latest()->get();
                $text = Institut::find(7);


                return view('pages.mah_hamkor', compact('mah_hamkor', 'text', 'category', 'id'));
                break;

            case 'institut':
                $news = Institut::with('photos')
                    ->whereHas('categories', function ($query) use ($id) {
                        $query->where('category_id', $id);
                    })->latest()->paginate(9);

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
                $new = Crimes::with('photos')->find($id);

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
                $new = News::with('photos')->find($id);

                return view('pages.news_show', compact('new', 'category'));
                break;

            case 'scholars':
                $new = Scholars::with('photos')->find($id);

                return view('pages.news_show', compact('new', 'category'));
                break;

            case 'expertise':
                $new = Expertise::with('photos')->find($id);

                return view('pages.partner_show', compact('new', 'category'));
                break;

            case 'exploration':
                $new = Exploration::with('photos')->find($id);

                return view('pages.loyiha_show', compact('new', 'category'));
                break;

            case 'institut':
                $institut = Institut::find($id);

                return view('pages.texts', compact('institut', 'category'));
                break;
        }
    }

    public function boss()
    {
        $boss = Rahbariyat::with('photos')->get();

        return view('pages.boshliq', compact('boss'));

    }

    public function search(Request $request)
    {
        $q = $request->input('query');

        $like = function ($query) use ($q) {
            $query->where('name_uz', 'like', "%$q%")
                ->orWhere('name_ru', 'like', "%$q%")
                ->orWhere('name_en', 'like', "%$q%")
                ->orWhere('name_kr', 'like', "%$q%");
        };

        $academias = Academia::with('photos')->where($like)->limit(50)->get();
        $articles = Articles::with('photos')->where($like)->limit(50)->get();
        $crimes = Crimes::with('photos')->where($like)->limit(50)->get();
        $journals = Journal::with('photos')->where($like)->limit(50)->get();
        $news = News::with('photos')->where($like)->limit(50)->get();
        $bibliophilias = Bibliophilia::with('photos')->where($like)->limit(50)->get();
        $rahbariyats = Rahbariyat::with('photos')->where($like)->limit(50)->get();
        $researchs = Research::with('photos')->where($like)->limit(50)->get();
        $scholars = Scholars::with('photos')->where($like)->limit(50)->get();


        return view('pages.search', compact('articles', 'scholars', 'researchs',
            'rahbariyats', 'bibliophilias', 'news', 'journals', 'crimes', 'academias', 'q'));
    }

    public function hujjat()
    {
        $resources = Resource::latest()->paginate(10);
        return view('pages.ins_nor_hujjat', compact('resources'));
    }

    public function explorationCategories()
    {
        $categories = Category::forObjectType('exploration');

        return view('pages.loyiha_categories', compact('categories'));
    }

    public function gallery()
    {
        // Faqat News modeliga bog‘langan rasmlar
        $photos = Photo::with('model')
            ->where('model_type', News::class)
            ->latest()
            ->paginate(27);

        return view('pages.gallery', compact('photos'));
    }


}
