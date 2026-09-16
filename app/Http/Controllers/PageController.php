<?php

namespace App\Http\Controllers;

use App\Models\Academia;
use App\Models\Announcement;
use App\Models\Articles;
use App\Models\Bibliophilia;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Crimes;
use App\Models\Expertise;
use App\Models\Exploration;
use App\Models\Forum;
use App\Models\Institut;
use App\Models\InternationalMeeting;
use App\Models\Journal;
use App\Models\Memorandum;
use App\Models\Message;
use App\Models\News;
use App\Models\Partner;
use App\Models\Photo;
use App\Models\Rahbariyat;
use App\Models\Research;
use App\Models\Resource;
use App\Models\Scholars;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    protected array $documentModels = [
        'research'     => Research::class,
        'bibliophilia' => Bibliophilia::class,
        'jurnal'       => Journal::class,
        'articles'     => Articles::class,
        'academia'     => Academia::class,
    ];

    public function viewDocument($type, $id)
    {
        abort_unless(array_key_exists($type, $this->documentModels), 404);

        $document = $this->documentModels[$type]::findOrFail($id);

        abort_unless($document->file_path && Storage::disk('public')->exists($document->file_path), 404);

        return Storage::disk('public')->response($document->file_path, null, [
            'Content-Disposition' => 'inline; filename="' . basename($document->file_path) . '"',
        ]);
    }

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

        $announcements = Announcement::with('photos')->active()->ordered()->get();

        return view('pages.main', compact('contacts', 'mnews', 'xnews', 'category1PartnersCount', 'category2PartnersCount', 'newscount', 'researchcount', 'inews','partners', 'announcements'));

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
        $boss = Rahbariyat::with('photos')->orderBy('id')->get();

        return view('pages.boshliq', compact('boss'));

    }

    public function instituteAddressMessage()
    {
        $chief = Rahbariyat::with('photos')->orderBy('id')->first();

        return view('pages.institute_address_message', compact('chief'));
    }

    public function institutStructure()
    {
        $branches = require resource_path('data/institute_structure.php');
        $branches = $branches['branches'];

        foreach ($branches as &$branch) {
            $branch['name'] = __('institute_structure.branches.' . $branch['key'] . '.name');
            $branch['role'] = __('institute_structure.branches.' . $branch['key'] . '.role');

            foreach ($branch['units'] as &$unitKey) {
                $unitKey = __('institute_structure.branches.' . $branch['key'] . '.units.' . $unitKey);
            }
            unset($unitKey);
        }
        unset($branch);

        return view('pages.institute_structure', compact('branches'));
    }

    public function stateReports()
    {
        return view('pages.davlat_hisobotlari');
    }

    public function videos()
    {
        $videos = Video::orderByDesc('id')->paginate(12);

        return view('pages.videos', compact('videos'));
    }

    public function videoShow($id)
    {
        $video = Video::findOrFail($id);
        $moreVideos = Video::where('id', '!=', $id)->orderByDesc('id')->take(6)->get();

        return view('pages.video_show', compact('video', 'moreVideos'));
    }

    public function localPartners()
    {
        $partners = require resource_path('data/local_partners.php');

        foreach ($partners as &$p) {
            $p['name'] = __('local_partners.partners.' . $p['key'] . '.name');
            $p['leader'] = __('local_partners.partners.' . $p['key'] . '.leader');
            $p['signed'] = __('local_partners.partners.' . $p['key'] . '.signed');
            $p['duration'] = __('local_partners.partners.' . $p['key'] . '.duration');
        }
        unset($p);

        return view('pages.local_partners', compact('partners'));
    }

    public function kriminologiyaKengashiAzolari()
    {
        $council = require resource_path('data/kriminologiya_kengashi.php');

        return view('pages.kriminologiya_kengashi', $council);
    }

    public function institutKengashlari()
    {
        $kengash = require resource_path('data/kriminologiya_kengashi.php');
        $ilmiyDaraja = require resource_path('data/ilmiy_darajalar_kengashi.php');

        return view('pages.institut_kengashlari', [
            'kengashMembersCount' => count($kengash['members']),
            'ilmiyDaraja' => $ilmiyDaraja,
        ]);
    }

    public function xalqaroEkspertlarKengashi()
    {
        return view('pages.xalqaro_ekspertlar_kengashi');
    }

    public function xalqaroEkspertlarKengashiAzolari()
    {
        $council = require resource_path('data/xalqaro_ekspertlar_kengashi_azolari.php');

        return view('pages.xalqaro_ekspertlar_kengashi_azolari', $council);
    }

    public function ilmiyKengashSeminar($specialty)
    {
        $ilmiyDaraja = require resource_path('data/ilmiy_darajalar_kengashi.php');
        $key = str_replace('-', '_', $specialty);
        $seminar = $ilmiyDaraja['seminars'][$key] ?? null;

        abort_unless($seminar, 404);

        return view('pages.ilmiy_kengash_seminar', [
            'seminar' => $seminar,
            'councilNumber' => $ilmiyDaraja['council_number'],
            'oakDecisionNumber' => $ilmiyDaraja['oak_decision_number'],
            'oakDecisionDate' => $ilmiyDaraja['oak_decision_date'],
        ]);
    }

    public function ilmiyKengashKiber()
    {
        $ilmiyDaraja = require resource_path('data/ilmiy_darajalar_kengashi.php');

        return view('pages.ilmiy_kengash_kiber', [
            'cyber' => $ilmiyDaraja['cyber'],
            'oakDecisionNumber' => $ilmiyDaraja['oak_decision_number'],
            'oakDecisionDate' => $ilmiyDaraja['oak_decision_date'],
        ]);
    }

    public function dissertationTopics()
    {
        $topics = require resource_path('data/dissertation_topics.php');

        return view('pages.dissertation_topics', $topics);
    }

    public function criminologyScholars()
    {
        $scholars = require resource_path('data/institute_scholars.php');

        return view('pages.institute_scholars', compact('scholars'));
    }

    public function scholarProfile($slug)
    {
        $scholars = require resource_path('data/institute_scholars.php');
        $scholar = collect($scholars)->firstWhere('slug', $slug);

        abort_unless($scholar, 404);

        return view('pages.' . $scholar['view'], compact('scholar'));
    }

    public function independentResearchers()
    {
        $groups = require resource_path('data/independent_researchers.php');

        return view('pages.independent_researchers', compact('groups'));
    }

    private function comingSoon(string $titleKey, string $parentKey)
    {
        return view('pages.coming_soon', compact('titleKey', 'parentKey'));
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

    public function researchNumbers()
    {
        return view('pages.research_numbers');
    }

    public function tashabbusProjects()
    {
        $projects = require resource_path('data/tashabbus_projects.php');

        foreach ($projects as &$project) {
            $project['title'] = __('tashabbus.projects.' . $project['key']);
        }
        unset($project);

        $completed = array_values(array_filter($projects, fn ($p) => $p['status'] === 'completed'));
        $ongoing = array_values(array_filter($projects, fn ($p) => $p['status'] === 'ongoing'));

        return view('pages.tashabbus_loyihalar', compact('completed', 'ongoing'));
    }

    public function buyurtmaProjects()
    {
        $projects = require resource_path('data/buyurtma_projects.php');

        foreach ($projects as &$project) {
            $project['title'] = __('buyurtma.projects.' . $project['key']);
            $project['client_name'] = __('buyurtma.clients.' . $project['client']);
        }
        unset($project);

        $completed = array_values(array_filter($projects, fn ($p) => $p['status'] === 'completed'));
        $ongoing = array_values(array_filter($projects, fn ($p) => $p['status'] === 'ongoing'));

        return view('pages.buyurtma_loyihalar', compact('completed', 'ongoing'));
    }

    public function davlatGrantiProjects()
    {
        $projects = require resource_path('data/davlat_granti_projects.php');

        foreach ($projects as &$project) {
            $project['title'] = __('davlat_granti.projects.' . $project['key']);
            $project['client_name'] = $project['client'] ? __('davlat_granti.clients.' . $project['client']) : null;
        }
        unset($project);

        $completed = array_values(array_filter($projects, fn ($p) => $p['status'] === 'completed'));
        $ongoing = array_values(array_filter($projects, fn ($p) => $p['status'] === 'ongoing'));

        return view('pages.davlat_granti_loyihalar', compact('completed', 'ongoing'));
    }

    public function xalqaroQoshmaProjects()
    {
        $projects = require resource_path('data/xalqaro_qoshma_projects.php');
        $partnerFlags = require resource_path('data/xalqaro_qoshma_partners.php');

        foreach ($projects as &$project) {
            $project['title'] = __('xalqaro_qoshma.projects.' . $project['key']);
            $project['partner_name'] = __('xalqaro_qoshma.partners.' . $project['partner']);
            $project['partner_flags'] = $partnerFlags[$project['partner']] ?? [];
        }
        unset($project);

        $completed = array_values(array_filter($projects, fn ($p) => $p['status'] === 'completed'));
        $ongoing = array_values(array_filter($projects, fn ($p) => $p['status'] === 'ongoing'));

        return view('pages.xalqaro_qoshma_loyihalar', compact('completed', 'ongoing'));
    }

    public function instituteAbout()
    {
        $timeline = require resource_path('data/institute_history_timeline.php');

        foreach ($timeline as &$step) {
            $step['period'] = __('institute_history.timeline.' . $step['key'] . '.period');
            $step['title'] = __('institute_history.timeline.' . $step['key'] . '.title');
            $step['text'] = __('institute_history.timeline.' . $step['key'] . '.text');
        }
        unset($step);

        $disciplines = require resource_path('data/institute_about_disciplines.php');
        $highlights = require resource_path('data/institute_about_highlights.php');
        $process = require resource_path('data/institute_about_process.php');

        foreach ($disciplines as &$item) {
            $item['label'] = __('institute_about.disciplines.' . $item['key']);
        }
        unset($item);

        foreach ($highlights as &$item) {
            $item['text'] = __('institute_about.highlights.' . $item['key']);
        }
        unset($item);

        foreach ($process as &$item) {
            $item['label'] = __('institute_about.process.' . $item['key']);
        }
        unset($item);

        $oldImages = \App\Models\SiteImage::group(\App\Models\SiteImage::GROUP_INSTITUTE_OLD)->get();
        $currentImages = \App\Models\SiteImage::group(\App\Models\SiteImage::GROUP_INSTITUTE_CURRENT)->get();

        return view('pages.institute_about', compact('timeline', 'disciplines', 'highlights', 'process', 'oldImages', 'currentImages'));
    }

    public function instituteStats()
    {
        $stats = require resource_path('data/institute_stats.php');
        $products = require resource_path('data/institute_stats_products.php');

        foreach ($stats as &$item) {
            $item['label'] = __('institute_stats.stats.' . $item['key'] . '.label');
            $item['text'] = __('institute_stats.stats.' . $item['key'] . '.text');

            if (!empty($item['breakdown'])) {
                foreach ($item['breakdown'] as &$part) {
                    $part['label'] = __('institute_stats.stats.' . $part['label_key']);
                }
                unset($part);
            }
        }
        unset($item);

        foreach ($products as &$product) {
            $product['label'] = __('institute_stats.products.' . $product['label_key']);
        }
        unset($product);

        return view('pages.institute_stats', compact('stats', 'products'));
    }

    public function instituteMission()
    {
        $tasks = require resource_path('data/institute_mission_tasks.php');
        $process = require resource_path('data/institute_mission_process.php');

        foreach ($tasks as &$item) {
            $item['title'] = __('institute_mission.tasks.' . $item['key'] . '.title');
            $item['text'] = __('institute_mission.tasks.' . $item['key'] . '.text');
        }
        unset($item);

        foreach ($process as &$step) {
            $step['label'] = __('institute_mission.process.' . $step['key']);
        }
        unset($step);

        return view('pages.institute_mission', compact('tasks', 'process'));
    }

    public function internationalCooperation()
    {
        $directions = require resource_path('data/international_cooperation_directions.php');

        foreach ($directions as &$item) {
            $item['title'] = __('international_cooperation.directions.' . $item['key'] . '.title');
            $item['text'] = __('international_cooperation.directions.' . $item['key'] . '.text');
        }
        unset($item);

        return view('pages.international_cooperation', compact('directions'));
    }

    public function internationalPartners()
    {
        $data = require resource_path('data/international_partners.php');

        foreach ($data['highlights'] as &$item) {
            $item['title'] = __('international_partners.highlights.' . $item['key'] . '.title');
            $item['text'] = __('international_partners.highlights.' . $item['key'] . '.text');
            $item['badge'] = __('international_partners.highlights.' . $item['key'] . '.badge');
        }
        unset($item);

        foreach ($data['specialized'] as &$item) {
            $item['country'] = __('international_partners.specialized.' . $item['key'] . '.country');
            $item['text'] = __('international_partners.specialized.' . $item['key'] . '.text');
        }
        unset($item);

        foreach ($data['agencies'] as &$item) {
            $item['name'] = __('international_partners.agencies.' . $item['key'] . '.name');
            $item['text'] = __('international_partners.agencies.' . $item['key'] . '.text');
        }
        unset($item);

        return view('pages.international_partners', $data);
    }

    public function memorandums()
    {
        $memorandums = Memorandum::with('photos')->orderByDesc('date')->get();

        $items = $memorandums->map(function ($memorandum) {
            return [
                'id' => $memorandum->id,
                'flag' => $memorandum->flag,
                'country' => $memorandum->country,
                'org' => $memorandum->org,
                'link' => $memorandum->link,
                'doc_type' => $memorandum->doc_type,
                'doc_type_label' => __('memorandums.doc_types.' . $memorandum->doc_type),
                'date_formatted' => $memorandum->date ? $memorandum->date->format('d.m.Y') : '',
                'photos' => $memorandum->photos,
            ];
        });

        return view('pages.memorandums', compact('items'));
    }

    public function internationalEvents()
    {
        $forums = Forum::with('photos')->orderByDesc('event_start_date')->get();
        $trips = require resource_path('data/international_events_trips.php');

        foreach ($trips as &$t) {
            $t['country'] = __('international_events.trips.' . $t['key'] . '.country');
            $t['event'] = __('international_events.trips.' . $t['key'] . '.event');
            $t['badge'] = __('international_events.trips.' . $t['key'] . '.badge');
        }
        unset($t);

        $meetings = InternationalMeeting::with('photos')->orderByDesc('event_date')->paginate(6);

        return view('pages.international_events', compact('forums', 'trips', 'meetings'));
    }

    public function internationalMeetingShow($id)
    {
        $meeting = InternationalMeeting::with('photos')->findOrFail($id);

        return view('pages.international_meeting_show', compact('meeting'));
    }

    public function cooperationContact()
    {
        $channels = require resource_path('data/cooperation_contact.php');

        foreach ($channels as &$c) {
            $c['label'] = __('cooperation_contact.labels.' . $c['key']);
        }
        unset($c);

        return view('pages.cooperation_contact', compact('channels'));
    }

    public function ilmiyTadqiqotNima()
    {
        $grid = require resource_path('data/ilmiy_tadqiqot_grid.php');
        $timeline = require resource_path('data/ilmiy_tadqiqot_timeline.php');
        $importance = require resource_path('data/ilmiy_tadqiqot_importance.php');
        $process = require resource_path('data/ilmiy_tadqiqot_process.php');

        foreach ($grid as &$item) {
            $item['title'] = __('ilmiy_tadqiqot.grid.' . $item['key'] . '.title');
            $item['text'] = __('ilmiy_tadqiqot.grid.' . $item['key'] . '.text');
        }
        unset($item);

        foreach ($timeline as &$step) {
            $step['period'] = __('ilmiy_tadqiqot.timeline.' . $step['key'] . '.period');
            $step['title'] = __('ilmiy_tadqiqot.timeline.' . $step['key'] . '.title');
            $step['text'] = __('ilmiy_tadqiqot.timeline.' . $step['key'] . '.text');
        }
        unset($step);

        foreach ($importance as &$item) {
            $item['text'] = __('ilmiy_tadqiqot.importance.' . $item['key']);
        }
        unset($item);

        foreach ($process as &$step) {
            $step['label'] = __('ilmiy_tadqiqot.process.' . $step['key']);
        }
        unset($step);

        return view('pages.ilmiy_tadqiqot', compact('grid', 'timeline', 'importance', 'process'));
    }

}
