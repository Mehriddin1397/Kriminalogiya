<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exploration;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExplorationController extends Controller
{
    public function index()
    {
        $explorations = Exploration::latest()->get();
        $categories = Category::forObjectType('exploration');

        return view('admin.exploration.index', compact('explorations','categories'));
    }



    public function store(Request $request)
    {


        $request->validate([
            'name_uz'             => 'required|string|max:255',
            'name_ru'             => 'required|string|max:255',
            'name_en'             => 'required|string|max:255',
            'name_kr'             => 'required|string|max:255',

            'purpose_uz'          => 'required|string|max:10000',
            'purpose_ru'          => 'required|string|max:10000',
            'purpose_en'          => 'required|string|max:10000',
            'purpose_kr'          => 'required|string|max:10000',

            'tasks_uz'            => 'required|string|max:10000',
            'tasks_ru'            => 'required|string|max:10000',
            'tasks_en'            => 'required|string|max:10000',
            'tasks_kr'            => 'required|string|max:10000',

            'expected_results_uz' => 'required|string|max:10000',
            'expected_results_ru' => 'required|string|max:10000',
            'expected_results_en' => 'required|string|max:10000',
            'expected_results_kr' => 'required|string|max:10000',

            'leader_uz'           => 'required|string|max:255',
            'leader_ru'           => 'required|string|max:255',
            'leader_en'           => 'required|string|max:255',
            'leader_kr'           => 'required|string|max:255',

            'categories' => 'array',  // Kategoriyalar array bo‘lishi kerak
            'categories.*' => 'exists:categories,id',// Kategoriyalar faqat mavjud IDlar bo‘lishi kerak

        ]);


        $academia = Exploration::create([
            'name_uz'             => $request->name_uz ,
            'name_ru'             => $request->name_ru ,
            'name_en'             => $request->name_en,
            'name_kr'             => $request->name_kr,

            'purpose_uz'          => $request->purpose_uz,
            'purpose_ru'          => $request->purpose_ru,
            'purpose_en'          => $request->purpose_en,
            'purpose_kr'          => $request->purpose_kr,

            'tasks_uz'            => $request->tasks_uz,
            'tasks_ru'            => $request->tasks_ru,
            'tasks_en'            => $request->tasks_en,
            'tasks_kr'            => $request->tasks_kr,

            'expected_results_uz' => $request->expected_results_uz,
            'expected_results_ru' => $request->expected_results_ru,
            'expected_results_en' => $request->expected_results_en,
            'expected_results_kr' => $request->expected_results_kr,

            'leader_uz'           => $request->leader_uz,
            'leader_ru'           => $request->leader_ru,
            'leader_en'           => $request->leader_en,
            'leader_kr'           => $request->leader_kr,

        ]);



        if ($request->has('categories')) {
            $academia->categories()->attach($request->categories, ['categorizable_type' => Exploration::class]);
        }

        return redirect()
            ->route('explorations.index')
            ->with('success', 'Ma\'lumot qo‘shildi');
    }


    public function update(Request $request, $id)
    {
        $academia = Exploration::findOrFail($id);

        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',

            'purpose_uz' => 'required|string|max:10000',
            'purpose_ru' => 'required|string|max:10000',
            'purpose_en' => 'required|string|max:10000',
            'purpose_kr' => 'required|string|max:10000',

            'tasks_uz' => 'required|string|max:10000',
            'tasks_ru' => 'required|string|max:10000',
            'tasks_en' => 'required|string|max:10000',
            'tasks_kr' => 'required|string|max:10000',

            'expected_results_uz' => 'required|string|max:10000',
            'expected_results_ru' => 'required|string|max:10000',
            'expected_results_en' => 'required|string|max:10000',
            'expected_results_kr' => 'required|string|max:10000',

            'leader_uz' => 'required|string|max:255',
            'leader_ru' => 'required|string|max:255',
            'leader_en' => 'required|string|max:255',
            'leader_kr' => 'required|string|max:255',

            'categories' => 'array',  // Kategoriyalar array bo‘lishi kerak
            'categories.*' => 'exists:categories,id',// Kategoriyalar faqat mavjud IDlar bo‘lishi kerak

        ]);


        $academia->update($request->only([

            'name_uz',
            'name_ru'
 ,           'name_en'            ,
            'name_kr'            ,
            'purpose_uz'         ,
            'purpose_ru'         ,
            'purpose_en'         ,
            'purpose_kr'         ,
            'tasks_uz'           ,
            'tasks_ru'           ,
            'tasks_en'           ,
            'tasks_kr'           ,
            'expected_results_uz',
            'expected_results_ru',
            'expected_results_en',
            'expected_results_kr',
            'leader_uz'          ,
            'leader_ru'          ,
            'leader_en'          ,
            'leader_kr'          ,
        ]));

        // Kategoriyalarni yangilash (eski kategoriyalarni o‘chirib, yangilarini qo‘shish)
        if ($request->has('categories') && !empty($request->categories)) {

            $academia->categories()->sync($request->categories);
        } else {
            // Agar hech narsa tanlanmasa, barcha bog‘lanishlarni olib tashlaydi
            $academia->categories()->detach();
        }


        return redirect()
            ->route('explorations.index')
            ->with('success', 'Ma\'lumot yangilandi');
    }

    public function destroy(Exploration $exploration)
    {
        $exploration->delete();

        return back()->with('success', 'Ma\'lumot o‘chirildi');
    }
}
