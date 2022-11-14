<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function breakingNews()
    {
        $breakingNews = NewsCategory::find(1)->getNewsByCategory()->paginate(10);
        return view('backend.news.breakingNews' , compact('breakingNews'));
    }
    public function hotNews()
    {
        $hotNews = NewsCategory::find(2)->getNewsByCategory()->paginate(10);
        return view('backend.news.hotNews' , compact('hotNews'));
    }

    public function latestNews()
    {
        $latestNews = NewsCategory::find(3)->getNewsByCategory()->paginate(10);
        return view('backend.news.latestNews' , compact('latestNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadNews($cat_id)
    {
        
        return view('backend.news.upload' , compact('cat_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'title'    => 'required',
            'title_en' => 'required',
            'image'    => 'required|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:1024',
            'body'     => 'required',
            'body_en'  => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $image_file = $request->file('image');
            $image_name = uniqid().'_'.$image_file->getClientOriginalName();
            $image_file->move(public_path('/uploads/news/breaking/') , $image_name);

            News::create([
                'news_category_id' => $request->cat_id,
                'title' => $request->title,
                'title_en' => $request->title_en,
                'image' => $image_name,
                'body'  => $request->body,
                'body_en'  => $request->body_en,
            ]);
        }
         if($request->cat_id == 1){
            $returnView = 'news.breaking';
        }elseif($request->cat_id == 2){
            $returnView = 'news.hot';
        }else{
            $returnView = 'news.latest';
        }
        return redirect()->route($returnView)->withSuccess('Successfully uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewall($cat_id)
    {
        return $cat_id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'title' => 'required',
            'title_en' => 'required',
            'image' => 'mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:1024',
            'body'  => 'required',
            'body_en'  => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{

            if($request->hasFile('image')){
                $image_file = $request->file('image');
                $image_name = uniqid().'_'.$image_file->getClientOriginalName();
                $image_file->move(public_path('/uploads/news/breaking/') , $image_name);
            }else{
                $image_name = $request->old_image;
            }
            

            News::where('id' , $request->id)->update([
                'news_category_id' => $request->cat_id,
                'title' => $request->title,
                'title_en' => $request->title_en,
                'image' => $image_name,
                'body'  => $request->body,
                'body_en'  => $request->body_en,
            ]);
        }

        if($request->cat_id == 1){
            $returnView = 'news.breaking';
        }elseif($request->cat_id == 2){
            $returnView = 'news.hot';
        }else{
            $returnView = 'news.latest';
        }
        return redirect()->route($returnView)->withSuccess('Successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('news.breaking')->withSuccess('Successfully Deleted.');
    }
}
