<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Mail;
use App\Mail\NotifyCategoryMail   ;
use Illuminate\Mail\Mailable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$categories = Category::all();
    $categories = Category::latest()->get();

    return view("category.index", compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view("category.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name'          =>      'required|string|max:100',
                'description'   =>      'required|string',
            ]
        );

        $dataArray      =       array(
            "name"          => $request->name,
            "description"   => $request->description,
        );
        ///ddd($dataArray);
        $category =   Category::create($dataArray);
        
        if(!is_null($category)) {

            $data = array('name'=>$request->name, 'description'=>$request->description );
            //die();
            /*Mail::send('template.mail', $data, function($message) use ($contactEmail, $contactName)
            {   
                $message->from($contactEmail, $contactName);
                $message->to('info@aallouch.com', 'myName')
                ->subject('Mail via aallouch.com');
            }); */
            //echo  (new SendOtpEmail($data))->render();
            //ddd(Mail::to("jyoti.rani@neosoftmail.com")->send(new NotifyCategoryMail($data)));
      
            Mail::send('emails.categorycreated', ['category_name' => $request->name,'category_description' => $request->description], function ($message)
            {
                $message->from('vb.jyoti@gmail.com', 'Jyoti Rani Nwamba');
                $message->to('jyoti@gmail.com');
                $message->subject('OTP for login');
            });
            
    //dump (new SendOtpEmail($data)->render());
            if (Mail::failures()) {
            return back()->with("failed", "Alert! Succes to create category. Email cant be sent ");
                //return response()->Fail('Sorry! Please try again latter');
            }else{
                return redirect('/category')->with("success", "Success! category created. ");

                //return response()->success('Great! Successfully send in your mail');
              }
        }
        else {
            return back()->with("failed", "Alert! Failed to create category. ");
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'name'          =>      'required|string|max:100',
                'description'   =>      'required|string',
            ]
        );
        //ddd($request->all());

        $dataArray      =       array(
            "name"          => $request->name,
            "description"   => $request->description,
        );
        //$category =   Category::update($dataArray);
        
        if($category->update($dataArray)) {
            return redirect('/category')->with("success", "Success! category updated. ");
        }
        else {
            return back()->with("failed", "Alert! Failed to upadate category. ");
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
