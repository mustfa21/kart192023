<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;
use Toastr;
use Image;
use File;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('dashboard.module_footer_page', 1);
        $this->route = 'admin.page';
        $this->view = 'admin.page';
        $this->path = 'page';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['rows'] = Page::orderBy('id', 'asc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        return view($this->view.'.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|unique:pages,title',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);


        // image upload, fit and store inside public folder
        if($request->hasFile('image')){
            //Upload New Image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->path.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (800 width, 500 height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file('image')->getRealPath())->fit(800, 500, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        // Get content with media file
        $content=$request->input('description');

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->encoding = 'utf-8';
        $dom->loadHtml(utf8_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
       // foreach <img> in the submited content
        foreach($images as $img){
            $src = $img->getAttribute('src');

            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)){
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid().'_'.time();

                //Crete Folder Location
                $path = public_path('uploads/media/');
                if (! File::exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $filepath = "/uploads/media/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                  // resize if required
                  //->resize(500, null)
                  ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                  ->encode($mimetype, 100)  // encode file to the specified mimetype
                  ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-


        // Insert Data
        $page = new Page;
        $page->title = $request->title;
        $page->slug = Str::slug($request->title, '-');
        $page->description = $request->description;
        $page->image_path = $fileNameToStore;
        $page->save();


        Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $page;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $page;

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|unique:pages,title,'.$page->id,
            'description' => 'required',
            'image' => 'nullable|image',
        ]);


        // image upload, fit and store inside public folder
        if($request->hasFile('image')){

            $file_path = public_path('uploads/'.$this->path.'/'.$page->image_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->path.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (800 width, 500 height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file('image')->getRealPath())->fit(800, 500, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{

            $fileNameToStore = $page->image_path;
        }


        // Get content with media file
        $content=$request->input('description');

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->encoding = 'utf-8';
        $dom->loadHtml(utf8_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
       // foreach <img> in the submited content
        foreach($images as $img){
            $src = $img->getAttribute('src');

            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)){
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid().'_'.time();

                //Crete Folder Location
                $path = public_path('uploads/media/');
                if (! File::exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $filepath = "/uploads/media/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                  // resize if required
                  //->resize(500, null)
                  ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                  ->encode($mimetype, 100)  // encode file to the specified mimetype
                  ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-


        // Update Data
        $page->title = $request->title;
        $page->slug = Str::slug($request->title, '-');
        $page->description = $request->description;
        $page->image_path = $fileNameToStore;
        $page->status = $request->status;
        $page->save();


        Toastr::success(__('dashboard.updated_successfully'), __('dashboard.success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        // Delete Data
        $image_path = public_path('uploads/'.$this->path.'/'.$page->image_path);
        if(File::isFile($image_path)){
            File::delete($image_path);
        }

        $page->delete();

        Toastr::success(__('dashboard.deleted_successfully'), __('dashboard.success'));

        return redirect()->back();
    }
}
