<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class BlogController extends Controller
{
        public function index() {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));

        }


    /// function blog landing page///
    public function blogging() {
        $data = Blog::latest()->get()->map(function ($blog) {
            $blog->description = strip_tags($blog->description);
            $blog->description = Str::limit($blog->description, 100, '...');
            return $blog;
        });

        return view('LandingPage.BlogPage', compact('data'));
    }

    public function edit ($id){
        $blog = Blog::findOrFail($id);
        return view('admin.blog.update_blog', compact('blog'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
        ]);
        $blog = Blog::findOrFail($id);
        if ($request->hasFile('gambar')){
            if($blog->images){
                Storage::disk('public')->delete($blog->images);
            }
            $blog->images = $request->file('gambar')->store('images', 'public');
        }
        $blog->title = $request->input('judul');
        $blog->description = $request->input('deskripsi');
        $blog->created_at = $request->input('tanggal');
        $blog->save();

        return redirect()->route('blogadmin.index')->with('success', 'Blog berhasil diperbarui!');
    }

    public function create(){
        return view ('admin.blog.create_blog');
    }

    public function store(Request $request) {
    $request->validate([
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'deskripsi' => 'required|string',
    ]);

    $imagePath = null;
    if ($request->hasFile('gambar')) {
        $imagePath = $request->file('gambar')->store('images', 'public');
    }

    Blog::create([
        'title' => $request->input('judul'),
        'description' => $request->input('deskripsi'),
        'images' => $imagePath,
        'created_at' => Carbon::createFromFormat('Y-m-d', $request->input('tanggal')),
    ]);


    return redirect()->route('blogadmin.index')->with('success', 'Blog berhasil ditambahkan!');
}

    public function destroy($id){
        $blog = Blog::findOrFail($id);
        if($blog->images){
            Storage::disk('public')->delete($blog->images);
        }
        $blog->delete();

        return redirect() ->route('blogadmin.index')->with('success', 'Blog berhasil dihapus');
    }

    public function detail($id){
        $blog =Blog::findOrFail($id);
        $blog->description = html_entity_decode($blog->description);
        return view('admin.blog.showBlog', compact('blog'));
    }

    public function search(Request $request) {
        $query = $request->input('query');

        $data = Blog::where('title', 'LIKE', "%$query%")->latest()->get()->map(function ($blog) {
            $blog->description = strip_tags($blog->description);
            $blog->description = Str::limit($blog->description, 150, '...');
            return $blog;
        });

        return view('LandingPage.BlogPage', compact('data'));
    }


}
