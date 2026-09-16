<?php

namespace App\Http\Controllers;

use App\Models\SiteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteImageController extends Controller
{
    public function index()
    {
        $heroImages = SiteImage::group(SiteImage::GROUP_HERO_SLIDER)->get();
        $oldImages = SiteImage::group(SiteImage::GROUP_INSTITUTE_OLD)->get();
        $currentImages = SiteImage::group(SiteImage::GROUP_INSTITUTE_CURRENT)->get();

        return view('admin.site_images.index', compact('heroImages', 'oldImages', 'currentImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required|in:' . implode(',', SiteImage::GROUPS),
            'photos' => 'required|array|min:1',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:10240',
        ]);

        $nextOrder = (int) SiteImage::where('group', $request->group)->max('sort_order');

        foreach ($request->file('photos') as $photo) {
            $nextOrder++;
            $path = $photo->store('uploads/site_images', 'public');

            SiteImage::create([
                'group' => $request->group,
                'file_path' => $path,
                'sort_order' => $nextOrder,
            ]);
        }

        return redirect()->route('site-images.index')->with('success', "Rasm(lar) muvaffaqiyatli yuklandi.");
    }

    public function destroy($id)
    {
        $image = SiteImage::findOrFail($id);

        if ($image->file_path) {
            Storage::disk('public')->delete($image->file_path);
        }

        $image->delete();

        return redirect()->route('site-images.index')->with('success', "Rasm o'chirildi.");
    }
}
