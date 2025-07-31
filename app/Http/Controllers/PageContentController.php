<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;

class PageContentController extends Controller
{
    public function manage($slug)
    {
        // Ganti 'page_key' jadi 'page_name'
        $pageContent = PageContent::where('page_name', $slug)->first();

        if (!$pageContent) {
            return redirect()->back()->with('error', 'Konten tidak ditemukan.');
        }

        return view('admin.manage_page', compact('pageContent'));
    }
}
