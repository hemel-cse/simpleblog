<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use Carbon\Carbon;
use Auth;
use App\Http\Requests;
use DB;

class pageController extends Controller
{

  //  Constructing auth view

  public function __construct()
  {
     $this->middleware('auth',  ['except' => ['show']]);
  }


    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest('published_at')->published()->get();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created page in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = new Page($request->all());

        $page->slug = str_slug("$page->title", "-");

        Auth::user()->page()->save($page);

        return redirect('/admin/page');
    }

    /**
     * Display the specified page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  $page = Page::findOrFail($id);
       $page = DB::table('pages')
                          ->where('slug',$id)
                          ->first();
       return view('page', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = DB::table('pages')
                           ->where('slug',$id)
                           ->first();
        $page = Page::findOrFail($query->id);
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $query = DB::table('pages')
                           ->where('slug',$id)
                           ->first();
        $page = Page::findOrFail($query->id);
        $page->update($request->all());
        return redirect('/admin/page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // $page = Page::findOrFail($id);
         $page = DB::table('pages')
                            ->where('slug',$id)
                            ->delete();
          return redirect('/admin/page');
    }
}
