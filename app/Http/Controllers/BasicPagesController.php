<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\info;
use App\Models\Service;
use App\Models\Contact;
use App\Models\DestinationFaq;

use App\Models\DestinationKeyFact;

use App\Models\DestinationVisaProcess;
use App\Models\Achievement;
use App\Mail\AdminContactMail;
use App\Mail\AdminDestinationMail;
use App\Mail\UserDestinationMail;
use App\Mail\AdminUserMail;
use App\Mail\ContactPageMail;
use App\Mail\UserPageMail;
use App\Mail\ContactMail;
use App\Models\Destination;
use App\Models\Scholarship;
use App\Models\Page;
use App\Models\Package;

use App\Models\News;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Album;
use App\Models\Media;
use App\Models\Highlight;
use App\Models\City;
use App\Models\Questionaire;
use App\Models\EnglishTest;
use App\Models\LanguageTest;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Branch;
use App\Models\Slider;
use Mail;
use App\Mail\ContactAdmin;
use App\Models\Student;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Message;
use App\Models\Resource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class BasicPagesController extends Controller
{
    public function index(){
        
        $data['page'] = Page::where('slug', 'home')
                         ->with('pageContents')
                         ->first();

        $data['destinations'] = Destination::where('is_active',1)->get();     
        $data['courses'] = Course::where('is_active',1)->get();   
        $data['achievements'] = Achievement::all();   
        $data['testimonials'] = Testimonial::where('status',1)->get();  
        $data['events'] = Event::orderBy('created_at','DESC')->get();   
        $data['blogs'] = Blog::orderBy('created_at', 'desc')->take(3)->get();  
        $data['slider'] = Slider::latest()->take(2)->get();

               
    //    dd($data['slider']); 


        return view('basic_pages.index',$data);
        
    }


    public function about(){

        $data['page'] = Page::where('slug','about')->with('pageContents')->first();

        $data['testimonials'] = Testimonial::where('status',1)->get();  

        $data['achievements'] = Achievement::all();   

        $data['brands'] = Brand::all();
        
        return view('basic_pages.about',$data);
    }

    public function destination(){

        return view('basic_pages.destination');
    }

    public function registerContact(Request $request)
    {
        try{

            // dd($request->all());
          
        $admin_mail = DB::table('infos')->value('email');
        $company_name = DB::table('infos')->value('name');
        $company_logo = DB::table('infos')->value('logo');
        // dd($admin_mail);

        $validator = Validator::make($request->all(),[
                'first_name'=>'required|max:100',
                'last_name'=>'required|max:100',
                'email' => 'required|email',
                'subject' => 'nullable|max:500',
                'phone' => 'nullable|digits:10',
                'messege' =>'max:500',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $contact=Contact::create([

                'first_name'=>strip_tags($request->first_name),
                'last_name'=>strip_tags($request->last_name),
                'email' => strip_tags($request->email),
                'subject' => strip_tags($request->subject),
                'phone' => strip_tags($request->phone),
                'messege' =>strip_tags($request->messege),
            ]);

            $full_name = $contact->first_name . ' ' . $contact->last_name;

           
            if($admin_mail){
                Mail::to($admin_mail)->send(new AdminContactMail(
                                $full_name,
                                $contact->email,
                                $contact->subject,
                                $contact->messege,  // This is correct.
                                $contact->phone,
                                $company_name,
                                $company_logo,
                            ));
            }

            if($request->email){
                Mail::to($request->email)->send(new ContactMail(
                                $full_name,
                                $company_name,
                                $company_logo,
                            ));
            }
            return redirect()->back()->with('success','Thanks For Contacting.');

        } catch(Exception $e) {
             dd($e->getMessage());
            return redirect()->back()->with('error','Something missing.');
        }
    }


    public function contactUs(Request $request)
    {
        try{

            // dd($request->all());
          
        $admin_mail = DB::table('infos')->value('email');
        $company_name = DB::table('infos')->value('name');
        $company_logo = DB::table('infos')->value('logo');
        // dd($admin_mail);

        $validator = Validator::make($request->all(),[
                'name'=>'required|max:100',
               
                'email' => 'required|email',
                'phone' => 'nullable|digits:10',
                'subject' => 'nullable|max:500',
                
                'messege' =>'max:500',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $contact=Contact::create([

                'first_name'=>strip_tags($request->name),
                'test_id' => strip_tags($request->test_id),
                'email' => strip_tags($request->email),
                'phone' => strip_tags($request->phone),
                'subject' => strip_tags($request->subject),
                
                'messege' =>strip_tags($request->messege),
            ]);

          

           
            if($admin_mail){
                Mail::to($admin_mail)->send(new ContactPageMail(
                                $contact->first_name,
                                $contact->email,
                                $contact->subject,
                                $contact->messege,  // This is correct.
                              
                                $company_name,
                                $company_logo,
                            ));
            }

            if($request->email){
                Mail::to($request->email)->send(new UserPageMail(
                                $contact->first_name,
                                $company_name,
                                $company_logo,
                            ));
            }
            return redirect()->back()->with('success','Thanks For Contacting.');

        } catch(Exception $e) {
             dd($e->getMessage());
            return redirect()->back()->with('error','Something missing.');
        }
    }


    public static function generateMenu($parent_id=NULL){

        $menu='';
        if(is_null($parent_id)){
            $items=Menu::orderBy('order','asc')->where('parent_id',NULL)->get();
        
        }else{
            $items=Menu::orderBy('order','asc')->where('parent_id',$parent_id)->get();
        
        }
        //dd($items);
        foreach($items as $item){
            $childs=Menu::where('parent_id',$item->id)->get();
            
           
           
            if(!count($childs)){
            $menu.='<li><a class="nav-link "  href="/page/'.$item->slug.'" style="display: block;">'.strtoupper($item->title).'</a>';
            // $menu.='<ul class="dropdown">'.BasicPagesController::generateMenu($item->id).'</ul>';
            $menu.=BasicPagesController::generateMenu($item->id);
            $menu.='</li>';
            }else{
                $menu.='<li><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">'.strtoupper($item->title).' '.'<i class="fas fa-angle-down"></i>'.'</a>';
                $menu.='<ul class="dropdown-menu">'.BasicPagesController::generateMenu($item->id).'</ul>';
                // $menu.=BasicPagesController::generateMenu($item->id);
                $menu.='</li>';
            }

        }
        return $menu;
    }


     // EDIT HERE FOR SPECIAL PAGES
     public function view($title)
     {
         //dd($title);
        //$info=Menu::where('slug',$title)->first();
        
            if($title=='home'){
                return redirect()->route('index');
            }
            else if($title=='introduction'){
                return redirect()->route('introduction');
            }
            else if($title=='message-from-ceo'){
                return redirect()->route('chairman');
            }
            else if($title=='our-team'){
                return redirect()->route('team');
            }
            else if($title=='our-pride'){
                return redirect()->route('pride');
            }
            else if($title=='blog'){
                return redirect()->route('allblogs');
            }
            else if($title=='scholarship'){
                return redirect()->route('scholarship');
            }
            else if($title=='resources'){
                return redirect()->route('resources');
            }
             else if($title=='faqs'){
                return redirect()->route('faqs');
            }
            
        
        else{
            //find the page in table
            $menu=Menu::where('slug',$title)->first();
            $page_id=$menu->page_id;
            $page=Page::find($page_id);
            
            if($page_id!=NULL)
            
            
           // return redirect()->route('singlepage/{$page->id}');
            return view('basic_pages.Custompage')->with('title',$page->title)
                                                ->with('body',$page->body)
                                                ->with('image',$page->image)
                                                ->with('subcategory',$subcategory);
                        
        }
     }

     public function introduction(){
        
        $intro=Page::where('slug','introduction')->first();
        $Sintro=Page::where('slug','short-introduction')->first();
        $objecive=Page::where('slug','objectives')->first();
        $fop=Page::where('slug','facts-of-pride')->first();
        $bs=Page::where('slug','business-strategies')->first();
        $br=Page::where('slug','business-relationship')->first();
        $csr=Page::where('slug','corporate-social-responsibility-csr')->first();
       
        return view('basic_pages.introduction')->with('intro',$intro)
                                               ->with('objective',$objecive)
                                               ->with('fop',$fop)
                                               ->with('bs',$bs)
                                               ->with('br',$br)
                                               ->with('csr',$csr)
                                               ->with('si',$Sintro);
    } 

    public function intro_details($id)
    {
        $intro=Page::find($id)->first();
        return view('basic_pages.intro_details')->with('intro',$intro);
    }

    public function chairman(){
        $chairman=Page::where('slug','message-from-the-ceo')->first();
        //dd($chairman);
        return view('basic_pages.chairman')->with('chairman',$chairman);
    }

    public function team(){
        $head=Album::where('title','Head')->first();
        $ACADEMIC=Album::where('title','ACADEMIC ADVISOR')->first();
        $CREATIVE=Album::where('title','CREATIVE WRITING & RESEARCH EXPERTS')->first();
        $financial=Album::where('title','financial advisor')->first();
        
        return view('basic_pages.team')->with('head',$head)->with('academic',$ACADEMIC)
                                       ->with('creative',$CREATIVE)->with('financial',$financial);
    }

    public function pride()
    {
        $pride=Page::where('slug','our-pride')->first();
        $creativity=Page::where('slug','creativity')->first();
        $research=Page::where('slug','research')->first();
        $education=Page::where('slug','education')->first();
        $writing=Page::where('slug','writing')->first();
        return view('basic_pages.pride')->with('pride',$pride)->with('creativity',$creativity)
                                        ->with('research',$research)->with('education',$education)
                                        ->with('writing',$writing);
    }

    // public function destinationDetails($id)
    // {
    //     $destinations=Destination::where('slug',$id)->first();
    //     //dd($destinations);
        
    //     $highlight = null;
    //     $highlight=Highlight::where('destination_id',$destinations->id)->first();
    //     $city=City::where('destination_id',$destinations->id)->get();
    //     $questionaire=Questionaire::where('destination_id',$destinations->id)->get();
        
    //     //dd($city);
    //     $english=EnglishTest::all();
    //     //dd($english);

    //     return view('basic_pages.destination')->with('destinations',$destinations)->with('highlight',$highlight)
    //                                     ->with('city',$city)->with('questionaire',$questionaire)->with('english',$english);
    // }

    public function scholarship()
    {
        $data['page'] = Page::where('slug','scholarship')->first();

        $data['scholarships']=Scholarship::where('status','1')->get();

        $data['brands'] = Brand::all();

        return view('basic_pages.scholarship',$data);
    }

    public function scholarshipDetails($slug)
    { 
        $data['page'] = Page::where('slug', 'scholarship-details')->with('pageContents')->first();

        $data['scholarship']=Scholarship::where('slug',$slug)->first();
        
        return view('basic_pages.scholarshipDetails',$data);
    }

    public function allblogs()
    {
       $data['page'] = Page::where('slug', 'blog')->with('pageContents')->first();
      
       $data['blogs'] = Blog::orderBy('created_at', 'desc')->paginate(6);  

       $data['latest_blogs'] = Blog::orderBy('created_at', 'desc')->take(2)->get(); 

       $data['courses'] = Course::orderBy('created_at', 'desc')->take(2)->get();

        return view('basic_pages.blog',$data);
    }
    
    
    public function allnews()
    {
        $news=News::orderBy('created_at','desc')->get();
        
        return view('basic_pages.news')->with('news',$news);
    }
    
    public function allevents()
    {
        $events=Event::orderBy('created_at','desc')->get();
        
        return view('basic_pages.events')->with('events',$events);
    }

    public function eventDetails($slug)
    {
       $data['page'] = Page::where('slug', 'event-details')->with('pageContents')->first();

       $data['event']=Event::where('slug',$slug)->first();

       $data['blogs'] = Blog::orderBy('created_at', 'desc')->take(2)->get();

       $data['courses'] = Course::orderBy('created_at', 'desc')->take(2)->get();

        
        return view('basic_pages.event_details',$data);
    }


    

    public function english_test()
    {
        $data['page'] = Page::where('slug','test')->with('pageContents')->first();
        
        $data['test']=EnglishTest::orderBy('created_at','asc')->get(); 

        $data['brands'] = Brand::all();  

        return view('basic_pages.test',$data);
    }

    
    public function language_test()
    {
        $data['page'] = Page::where('slug','test')->with('pageContents')->first();

        $data['test']=LanguageTest::orderBy('created_at','asc')->get();   

        $data['brands'] = Brand::all();  

        return view('basic_pages.test',$data);
    }

    public function test_detail($title)
    {
        $page = Page::where('slug','details')->with('pageContents')->first();

        $details=EnglishTest::where('title',$title)->first();
        if($details == Null){
            $details=LanguageTest::where('title',$title)->first();
            $othertest=LanguageTest::all();


            return view('basic_pages.test_Details')->with('detail',$details)->with('others',$othertest)->with('page',$page);
        
        }
        $othertest=EnglishTest::all();

        
        return view('basic_pages.test_Details')->with('detail',$details)->with('others',$othertest)->with('page',$page);
    }

    public function allservices()
    {
        $service=Service::orderBy('created_at','asc')->get();
        return view('basic_pages.allservice')->with('s',$service);

    }

    public function service($slug)
    {
        $page = Page::where('slug','service')->with('pageContents')->first();

        $service = Service::where('slug',$slug)->first();

        $faqs = DestinationFaq::orderBy('created_at', 'DESC')->take(4)->get();
       
        return view('basic_pages.service')->with('s',$service)->with('q',$faqs)->with('page',$page);
    }



    public function destinationDetails($slug)
    {
        $data['page'] = Page::where('slug','destination-details')->with('pageContents')->first();

        $data['destination_single'] = Destination::where('slug',$slug)->with(['tests','costs','keyFacts','faqs','courses','univs','nation','visas','latestVisa','latestCost','majors','latestLivingCost','healths','latestScholarship','jobs'])->first();

        $data['inquiry_destination'] = Destination::where('is_active',1)->get();

    //    dd($data['destination_single']);
       
        return view('basic_pages.destination_details',$data);
    }


    public function blogDetails($slug)
    {
        $data['page'] = Page::where('slug', 'blog-details')->with('pageContents')->first();

        $data['blog'] = Blog::where('slug',$slug)->first();

        $data['blogs'] = Blog::orderBy('created_at', 'desc')->take(3)->get();

        $data['courses'] = Course::orderBy('created_at', 'desc')->take(2)->get();

        $data['blogs'] = Blog::orderBy('created_at', 'desc')->take(3)->get();  
        
        return view('basic_pages.blogDetails',$data);

    }

     public function searchBlogs(Request $request)
    {

        $data['page'] = Page::where('slug', 'blog')->with('pageContents')->first();
      
        $data['latest_blogs'] = Blog::orderBy('created_at', 'desc')->take(2)->get(); 

        $data['courses'] = Course::orderBy('created_at', 'desc')->take(2)->get();
       

        $query = Blog::query();

        if ($request->has('title') && !empty($request->title)) {

            $query->where('title', 'like', '%' . $request->title . '%');

            }

        $data['blogs'] = $query->orderBy('created_at', 'desc')->paginate(3); 

     

       
        
        return view('basic_pages.blog',$data);

    }


    public function courseDetails($slug)
    {
        $data['page'] = Page::where('slug', 'course-details')->with('pageContents')->first();

        $data['course'] = Course::where('slug',$slug)->first();

        $data['blogs'] = Blog::orderBy('created_at', 'desc')->take(3)->get();

        $data['courses'] = Course::orderBy('created_at', 'desc')->take(2)->get();
        
        return view('basic_pages.course_details',$data);

    }


    // public function sendContactMail(Request $request){
    //     //dd($request->all());
    //     if($request->phone)
    //     {
    //         $phone=$request->phone;
    //     }
    //     else{
    //         $phone=Null;
    //     }

    //     if($request->email)
    //     {
    //         $receiver=$request->email;
    //     }
    //     else{
    //         $receiver='info@discoveryedu.com.np';
    //     }

    //     if($request->subject)
    //     {
    //         $subject=$request->subject;
    //     }
    //     else{
    //         $subject='New Contact Message';
    //     }
        
    //     //dd($receiver);
    //     $contact =[
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'phone'=>$phone,
    //         'message'=>$request->message,
    //         'subject'=>$subject
    //         ];
    //         Message::create($contact);
    //      //to admin
    //     Mail::to($receiver)->send(new ContactAdmin($contact));
    //     return redirect()->back()->with('success','Mail Successfully sent!!!');
    // }



    public function sendContact(Request $request)
    {
        try{

            // dd($request->all());
          
        $admin_mail = DB::table('infos')->value('email');
        $company_name = DB::table('infos')->value('name');
        $company_logo = DB::table('infos')->value('logo');
        // dd($admin_mail);

        $validator = Validator::make($request->all(),[
                'name'=>'required|max:100',
                'destination_id' => 'nullable',
                'email' => 'required|email',
                'subject' => 'nullable|max:500',
                'phone' => 'nullable|digits:10',
                'message' =>'nullable',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $contact=Message::create([

                'name'=>strip_tags($request->name),
                'destination_id'=>strip_tags($request->destination_id),
                'email' => strip_tags($request->email),
                'subject' => strip_tags($request->subject),
                'phone' => strip_tags($request->phone),
                'message' =>strip_tags($request->message),
            ]);
              // Fetch the country name using the destination_id
             $destination = Destination::find($request->destination_id);
             $countryName = $destination ? $destination->nation->name : null;
            //  dd($countryName);

             $userMessage = strip_tags($request->message); 
     
               
            
           
            if($admin_mail){
                Mail::to($admin_mail)->send(new AdminDestinationMail(
                                $contact->name,
                                $contact->email,
                                $contact->subject,
                                $userMessage,  // This is correct.
                                $contact->phone,
                                $company_name,
                                $company_logo,
                                $countryName, 
                            ));
            }

            if($request->email){
                Mail::to($request->email)->send(new UserDestinationMail(
                                $contact->name,
                                $countryName, 
                                $company_name,
                                $company_logo,
                            ));
            }
            return redirect()->back()->with('success','Thanks For Contacting.');

        } catch(Exception $e) {
             dd($e->getMessage());
            return redirect()->back()->with('error','Something missing.');
        }
    }




    public function contact()
    {
        $data['page'] = Page::where('slug','contact')->with('pageContents')->first();

        $data['brands'] = Brand::all();
       
        return view('basic_pages.contact',$data);
    }

    public function registerCourse(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'dob'=>'required|date_format:Y-m-d',
            'nationality'=>'required|string',
            'state'=>'required|string',
            'address'=>'required|string',
            'post_code'=>'nullable|string',

            'course_id'=>'required|integer',
            'start_date'=>'required|date_format:Y-m-d',
            'package'=>'required|string',
            'comment'=>'nullable|string'
        ]);


        $student = Student::updateOrCreate(
            [
                'email' =>$request->email,
                'phone' => $request->phone
            ],
            [
                'name' =>$request->name,
                'dob' =>$request->dob,
                'nationality' =>$request->nationality,
                'state' =>$request->state,
                'address' =>$request->address,
                'post_code' =>$request->post_code
            ]);
        $booking = new Booking();
        $booking->student_id = $student->id;
        $booking->course_id = $request->course_id;
        $booking->start_date = $request->start_date;
        $booking->package_id = $request->package;
        $booking->comment = $request->comment;
        $booking->save();

        

        return Redirect::back()->withErrors(['success'=>'Registered Success, We will Contact You Soon.']);
    }
    
     public function allcategory($id)
    {   
        $cat=Category::where('slug',$id)->first();
        //dd($category->id);
        $allblogs=Blog::where('category_id',$cat->id)->get();
        $category=Category::all();
        //dd($category);
        $popular=Blog::where('featured','yes')->get();
        //dd($popular);
        return view('basic_pages.blog')->with('blogs',$allblogs)->with('category',$category)->with('popular',$popular);
        //dd($allblogs);
    }
    
    public function faq()
    {   
        
        $faq=Questionaire::where('destination_id','none')->where('service_id','none')->get();
        
        //dd($faq);
        
        return view('faq')->with('faq',$faq);
    }
    
    public function resource()
    {
        $resource=Resource::all();
        
        
        return view('basic_pages.resource')->with('resource',$resource);
    }
    
    public function coursesA()
    {
        $package = Package::select(['id', 'title'])
        ->where('title', 'like', "a%")
        ->orWhere('title', 'like', "b%")
        ->orWhere('title', 'like', "c%")
        ->orWhere('title', 'like', "d%")
        ->orderBy('title')
        ->get();
        
         $title="A-D";
        
        return view('basic_pages.allcourse')->with('package',$package)->with('title',$title);
        
    }
    
     public function coursesB()
    {
        $package = Package::select(['id', 'title'])
        ->where('title', 'like', "e%")
        ->orWhere('title', 'like', "f%")
        ->orWhere('title', 'like', "g%")
        ->orWhere('title', 'like', "h%")
        ->orWhere('title', 'like', "i%")
        ->orWhere('title', 'like', "j%")
        ->orWhere('title', 'like', "k%")
        ->orWhere('title', 'like', "l%")
        ->orderBy('title')
        ->get();
        
        $title="E-L";
        
        return view('basic_pages.allcourse')->with('package',$package)->with('title',$title);
        
    }
    
     public function coursesC()
    {
        $package = Package::select(['id', 'title'])
        ->where('title', 'like', "m%")
        ->orWhere('title', 'like', "n%")
        ->orWhere('title', 'like', "o%")
        ->orWhere('title', 'like', "p%")
        ->orWhere('title', 'like', "q%")
        ->orWhere('title', 'like', "r%")
        ->orWhere('title', 'like', "s%")
        ->orWhere('title', 'like', "t%")
        ->orWhere('title', 'like', "u%")
        ->orWhere('title', 'like', "v%")
        ->orWhere('title', 'like', "w%")
        ->orWhere('title', 'like', "x%")
        ->orWhere('title', 'like', "y%")
        ->orWhere('title', 'like', "z%")
        ->orderBy('title')
        ->get();
        
        $title="M-Z";
        
        return view('basic_pages.allcourse')->with('package',$package)->with('title',$title);
        
        
    }


    
}
