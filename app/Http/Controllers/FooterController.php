<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;

class FooterController extends Controller
{
    public function manage(Request $request)
    {
        $content = PageContent::where('page_name', 'footer')->first();

        if ($request->isMethod('post')) {
            $request->validate([
                'content' => 'required',
            ]);

            if (!$content) {
                $content = new PageContent();
                $content->page_name = 'footer';
            }

            $content->page_value = $request->input('content');
            $content->save();

            return redirect()->route('manage_footer')->with('success', 'Konten footer berhasil diperbarui.');
        }

        return view('manage_footer', compact('content'));
    }
}

