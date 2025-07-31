<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;

class AboutController extends Controller
{
    public function manage(Request $request)
    {
        $content = PageContent::where('page_name', 'about')->first();

        if ($request->isMethod('post')) {
            $request->validate([
                'content' => 'required',
            ]);

            if (!$content) {
                $content = new PageContent();
                $content->page_name = 'about';
            }

            $content->page_value = $request->input('content');
            $content->save();

            return redirect()->route('manage_about')->with('success', 'Konten berhasil diperbarui.');
        }

        return view('manage_about', compact('content'));
    }
}

