<?php

// app/Http/Controllers/HomeContentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;

class HomeContentController extends Controller
{
    public function manage(Request $request)
    {
        $content = PageContent::where('page_name', 'home')->first();

        if ($request->isMethod('post')) {
            $request->validate([
                'content' => 'required',
            ]);

            if (!$content) {
                $content = new PageContent();
                $content->page_name = 'home';
            }

            $content->page_value = $request->input('content');
            $content->save();

            return redirect()->route('manage_home')->with('success', 'Konten halaman utama berhasil diperbarui.');
        }

        return view('manage_home', compact('content'));
    }
}

