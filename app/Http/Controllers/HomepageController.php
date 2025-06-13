<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\About;
use App\Models\Blog;
use App\Models\Education;
use App\Models\PersonalInfo;
use App\Models\Protfolio;
use App\Models\Service;
use App\Models\Skills;
use App\Models\Testimonium;
use App\Models\WorkingExperience;
use App\Models\WorkingProject;


class HomepageController extends Controller
{

    public function homepageindex()
    {
        $homedata = Homepage::get();
        return view('layouts.pages.homepage.index', compact('homedata'));
    }

    public function homepagestore(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            'long_text' => 'required|string',
            'cus_count' => 'required|numeric',
            'experience' => 'required|numeric',
            'com_project' => 'required|numeric',
            'team-member' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            // Handle image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path('homeimage'), $filename);
                $data['image'] = $filename;
            }

            // Create homepage record
            Homepage::create([
                'title' => $validatedData['title'],
                'long_title' => $validatedData['short_title'],
                'description' => $validatedData['long_text'],
                'cus_count' => $validatedData['cus_count'],
                'years_of_experience' => $validatedData['experience'],
                'complete_project' => $validatedData['com_project'],
                'team_member' => $validatedData['team-member'],
                'image' => $data['image'],
            ]);

            $notification = [
                'messege' => 'Data has been saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        } catch (\Exception $e) {

            Log::error('Error saving homepage data: ' . $e->getMessage());

            $notification = [
                'messege' => 'Error saving data: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification)->withInput();
        }
    }

    public function editHomepage(Request $request)
    {
        $id = $request->id;

        $homedata = Homepage::findOrFail($id);
        return response()->json($homedata);

    }

    public function updateHomepage(Request $request)
    {


        try {
            $data = $request->all();

            $id = $request->id;

            $homepage = Homepage::findOrFail($id);

                    // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($homepage->image) {
                    $oldImagePath = public_path('homeimage/' . $homepage->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new image
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path('homeimage'), $filename);
                $data['image'] = $filename;
            }else {
                // If no new image is provided, keep the old image
                $data['image'] = $homepage->image;
            }

            // Update the homepage record
            $homepage->update([
                'title' => $data['title'],
                'long_title' => $data['short_title'],
                'description' => $data['long_text'],
                'cus_count' => $data['cus_count'],
                'years_of_experience' => $data['experience'],
                'complete_project' => $data['com_project'],
                'team_member' => $data['team-member'],
                'image' => isset($data['image']) ? $data['image'] : null,
            ]);

            $notification = [
            'messege' => 'Home page update saved successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

        } catch (\Exception $e) {

            Log::error('Error updating homepage data
            : ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error updating homepage data: ' . $e->getMessage()]);
        }
    }


    // about section function

    public function aboutsectionindex()
    {
        $aboutdata = About::latest()->get();
       return view('layouts.pages.aboutpage.index', compact('aboutdata'));
    }

    public function storeAboutsection(Request $request)
    {
        // Validate the request data
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'short_title' => 'required|string|max:255',
        //     'long_text' => 'required|string',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        try {
            $data = $request->all();



            // Handle image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path('aboutimage'), $filename);
                $data['image'] = $filename;
            }

            // Create about section record
            About::create([
                'name' => $data['name'],
                'desig' => $data['desig'],
                'phn_number' => $data['phn_number'],
                'short_text' => $data['short_title'],
                'gmail' => $data['email'],
                'address' => $data['address'],
                'fb_link' => $data['fb_link'],
                'twiter_link' => $data['twiter_link'],
                'linkdin_link' => $data['linkdin_link'],
                'github_link' => $data['Github_link'],
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $data['image'],
            ]);



            $notification = [
                'messege' => 'About section has been saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        } catch (\Exception $e) {

            Log::error('Error saving about section data: ' . $e->getMessage());

            $notification = [
                'messege' => 'Error saving data: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification)->withInput();
        }
    }

     public function editAboutpage(Request $request)
    {
        $id = $request->id;

        $aboutdata = About::findOrFail($id);

        return response()->json($aboutdata);

    }

     public function updateAboutsection(Request $request)
    {


        try {
            $data = $request->all();


            $id = $request->id;

            $aboutpage = About::findOrFail($id);


            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($aboutpage->image) {
                    $oldImagePath = public_path('aboutimage/' . $aboutpage->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new image
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path('aboutimage'), $filename);
                $data['image'] = $filename;
            }else {
                // If no new image is provided, keep the old image
                $data['image'] =  $aboutpage->image;
            }

            // Update the homepage record
             $aboutpage->update([
                'name' => $data['name'],
                'desig' => $data['desig'],
                'phn_number' => $data['phn_number'],
                'short_text' => $data['short_title'],
                'gmail' => $data['email'],
                'address' => $data['address'],
                'fb_link' => $data['fb_link'],
                'twiter_link' => $data['twiter_link'],
                'linkdin_link' => $data['linkdin_link'],
                'github_link' => $data['Github_link'],
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => isset($data['image']) ? $data['image'] : null,
            ]);

            $notification = [
            'messege' => 'About section update saved successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

        } catch (\Exception $e) {

            Log::error('Error updating homepage data
            : ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error updating aboutpage data: ' . $e->getMessage()]);
        }
    }



    // blog section function

    public function blogsectionindex()
    {
        $blogdata = Blog::latest()->get();
       return view('layouts.pages.blogpage.index', compact('blogdata'));
    }

    public function storeBlogsection(Request $request)
    {


        try {
            $data = $request->all();


            // Handle image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path('blogimage'), $filename);
                $data['image'] = $filename;
            }

            // Create homepage record
            Blog::create([
                'name' => $data['name'],
                'title' => $data['title'],
                'description' => $data['description'],
                'date' => $data['date'],
                'comments' => $data['comments'],
                'image' => $data['image'],
            ]);


            $notification = [
                'messege' => 'Data has been saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        } catch (\Exception $e) {

            Log::error('Error saving blogpage data: ' . $e->getMessage());

            $notification = [
                'messege' => 'Error saving data: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification)->withInput();
        }
    }



        public function editBlogpage(Request $request)
        {
            $id = $request->id;

            $blogdata = Blog::findOrFail($id);
            return response()->json($blogdata);

        }

         public function updateBlogsection(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $blogpage = Blog::findOrFail($id);

                        // Handle image upload if a new image is provided
                if ($request->hasFile('image')) {
                    // Delete the old image if it exists
                    if ($blogpage->image) {
                        $oldImagePath = public_path('blogimage/' . $blogpage->image);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    // Upload the new image
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('blogimage'), $filename);
                    $data['image'] = $filename;
                }else {
                    // If no new image is provided, keep the old image
                    $data['image'] = $blogpage->image;
                }

                // Update the homepage record
                $blogpage->update([
                    'name' => $data['name'],
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'date' => $data['date'],
                    'comments' => $data['comments'],
                    'image' => isset($data['image']) ? $data['image'] : null,
                ]);

                $notification = [
                'messege' => 'Blog page update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating blogpage data
                : ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating homepage data: ' . $e->getMessage()]);
            }
        }


        // education section function

         public function educationsectionindex()
        {
            $edudata = Education::latest()->get();
            return view('layouts.pages.edupage.index', compact('edudata'));
        }

         public function storeEdusection(Request $request)
        {


            try {
                $data = $request->all();


                // Create homepage record
                Education::create([
                    'edu_name' => $data['name'],
                    'inst_name' => $data['institute'],
                    'deft' => $data['department'],
                    'result' => $data['result'],
                    'board' => $data['board'],
                    'group' => $data['group'],
                    'pass_year' => $data['passyear'],
                ]);




                $notification = [
                    'messege' => 'Data has been saved successfully!',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error saving edupage data: ' . $e->getMessage());

                $notification = [
                    'messege' => 'Error saving data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification)->withInput();
            }
        }

         public function editEdupage(Request $request)
        {
            $id = $request->id;

            $edudata = Education::findOrFail($id);
            return response()->json($edudata);

        }

          public function updateEdusection(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $edupage = Education::findOrFail($id);

                // Update the homepage record
               $edupage->update([
                    'edu_name' => $data['name'],
                    'inst_name' => $data['institute'],
                    'deft' => $data['department'],
                    'result' => $data['result'],
                    'board' => $data['board'],
                    'group' => $data['group'],
                    'pass_year' => $data['passyear'],
                ]);

                $notification = [
                'messege' => 'Education page update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating education data
                : ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating education data: ' . $e->getMessage()]);
            }
        }


        // personal info section function

         public function personalinfoindex()
        {
            $PersonalInfo = PersonalInfo::latest()->get();
            return view('layouts.pages.personalinfo.index', compact('PersonalInfo'));
        }

         public function storePersonalinfo(Request $request)
        {


            try {
                $data = $request->all();
                // Create homepage record
                PersonalInfo::create([
                    'name' => $data['name'],
                    'dob' => $data['dob'],
                    'fa_name' => $data['father_name'],
                    'mo_name' => $data['mother_name'],
                    'height' => $data['height'],
                    'weight' => $data['weight'],
                    'presentAddress' => $data['presentaddress'],
                    'permanentAddress' => $data['parmanentaddress'],
                    'nationality' => $data['nationality'],
                    'religion' => $data['religion'],
                    'blodgroup' => $data['blodgroup'],
                    'cellno' => $data['cellno'],
                ]);
                $notification = [
                    'messege' => 'Data has been saved successfully!',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error saving personalinfo data: ' . $e->getMessage());

                $notification = [
                    'messege' => 'Error saving data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification)->withInput();
            }
        }


         public function editPersonalpage(Request $request)
        {
            $id = $request->id;

            $personalinfodata = PersonalInfo::findOrFail($id);
            return response()->json($personalinfodata);

        }

         public function updatePersonalinfo(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $personalpage = PersonalInfo::findOrFail($id);

                // Update the homepage record
               $personalpage->update([
                   'name' => $data['name'],
                    'dob' => $data['dob'],
                    'fa_name' => $data['father_name'],
                    'mo_name' => $data['mother_name'],
                    'height' => $data['height'],
                    'weight' => $data['weight'],
                    'presentAddress' => $data['presentaddress'],
                    'permanentAddress' => $data['parmanentaddress'],
                    'nationality' => $data['nationality'],
                    'religion' => $data['religion'],
                    'blodgroup' => $data['blodgroup'],
                    'cellno' => $data['cellno'],
                ]);

                $notification = [
                'messege' => 'personal info update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating personalinfo data: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating personalinfo data: ' . $e->getMessage()]);
            }
        }


        // protfolio function

         public function protfolioindex()
        {
            $Protfolio = Protfolio::latest()->get();
            return view('layouts.pages.protfolio.index', compact('Protfolio'));
        }

          public function storeProtfoliosection(Request $request)
        {


            try {
                $data = $request->all();

                 // Handle image upload
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('protfolioimage'), $filename);
                    $data['image'] = $filename;
                }
                // Create homepage record
                Protfolio::create([
                    'short_name' => $data['sname'],
                    'title' => $data['title'],
                    'image' => $data['image'],

                ]);
                $notification = [
                    'messege' => 'Data has been saved successfully!',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error saving protfolio data: ' . $e->getMessage());

                $notification = [
                    'messege' => 'Error saving data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification)->withInput();
            }
        }

         public function editProtfoliopage(Request $request)
        {
            $id = $request->id;

            $Protfolio = Protfolio::findOrFail($id);
            return response()->json($Protfolio);

        }

         public function updateProtfoliosection(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $Protfolio = Protfolio::findOrFail($id);

                        // Handle image upload if a new image is provided
                if ($request->hasFile('image')) {
                    // Delete the old image if it exists
                    if ($Protfolio->image) {
                        $oldImagePath = public_path('protfolioimage/' . $Protfolio->image);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    // Upload the new image
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('protfolioimage'), $filename);
                    $data['image'] = $filename;
                }else {
                    // If no new image is provided, keep the old image
                    $data['image'] = $Protfolio->image;
                }

                // Update the homepage record
                $Protfolio->update([
                    'short_name' => $data['sname'],
                    'title' => $data['title'],
                    'image' => isset($data['image']) ? $data['image'] : null,
                ]);

                $notification = [
                'messege' => 'protfolio page update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating protfolio data
                : ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating homepage data: ' . $e->getMessage()]);
            }
        }


        // service function

         public function serviceindex()
        {
            $Service = Service::latest()->get();
            return view('layouts.pages.service.index', compact('Service'));
        }

         public function storeServicesection(Request $request)
        {


            try {
                $data = $request->all();


                 // Handle image upload
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('serviceimage'), $filename);
                    $data['image'] = $filename;
                }
                // Create homepage record
                Service::create([
                    'description' => $data['des'],
                    'title' => $data['title'],
                    'image' => $data['image'],

                ]);


                $notification = [
                    'messege' => 'Data has been saved successfully!',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error saving service data: ' . $e->getMessage());

                $notification = [
                    'messege' => 'Error saving data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification)->withInput();
            }
        }

         public function editServicepage(Request $request)
        {
            $id = $request->id;

            $Service = Service::findOrFail($id);
            return response()->json($Service);

        }

         public function updateServicesection(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $Service = Service::findOrFail($id);

                        // Handle image upload if a new image is provided
                if ($request->hasFile('image')) {
                    // Delete the old image if it exists
                    if ($Service->image) {
                        $oldImagePath = public_path('serviceimage/' . $Service->image);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    // Upload the new image
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('serviceimage'), $filename);
                    $data['image'] = $filename;
                }else {
                    // If no new image is provided, keep the old image
                    $data['image'] = $Service->image;
                }

                // Update the homepage record
                $Service->update([

                     'description' => $data['des'],
                    'title' => $data['title'],
                    'image' => isset($data['image']) ? $data['image'] : null,
                ]);

                $notification = [
                'messege' => 'service page update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating service data
                : ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating homepage data: ' . $e->getMessage()]);
            }
        }


        // skill function

         public function skillindex()
        {
            $Skills = Skills::latest()->get();
            return view('layouts.pages.Skills.index', compact('Skills'));
        }

         public function storeSkillsection(Request $request)
        {


            try {
                $data = $request->all();


                 // Handle image upload
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('skillimage'), $filename);
                    $data['image'] = $filename;
                }
                // Create homepage record
                Skills::create([
                    'techname' => $data['tech'],
                    'image' => $data['image'],

                ]);


                $notification = [
                    'messege' => 'Data has been saved successfully!',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error saving skill data: ' . $e->getMessage());

                $notification = [
                    'messege' => 'Error skill data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification)->withInput();
            }
        }


          public function editSkillepage(Request $request)
        {
            $id = $request->id;

            $Skill = Skills::findOrFail($id);
            return response()->json($Skill);

        }


         public function updateSkillsection(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $Skills = Skills::findOrFail($id);

                        // Handle image upload if a new image is provided
                if ($request->hasFile('image')) {
                    // Delete the old image if it exists
                    if ($Skills->image) {
                        $oldImagePath = public_path('skillimage/' . $Skills->image);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    // Upload the new image
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('skillimage'), $filename);
                    $data['image'] = $filename;
                }else {
                    // If no new image is provided, keep the old image
                    $data['image'] = $Skills->image;
                }

                // Update the homepage record
                $Skills->update([

                     'techname' => $data['tech'],
                    'image' => isset($data['image']) ? $data['image'] : null,
                ]);

                $notification = [
                'messege' => 'skill page update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating skill data
                : ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating skillpage data: ' . $e->getMessage()]);
            }
        }

        // testimonia function


          public function testimoniaindex()
        {
            $Testimonium = Testimonium::latest()->get();
            return view('layouts.pages.Testimonium.index', compact('Testimonium'));
        }

         public function storeTestimoniumsection(Request $request)
        {


            try {
                $data = $request->all();


                 // Handle image upload
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('testimoniumimage'), $filename);
                    $data['image'] = $filename;
                }
                // Create homepage record
                Testimonium::create([
                    'description' => $data['des'],
                    'name' => $data['name'],
                    'image' => $data['image'],
                    'address' => $data['address'],

                ]);




                $notification = [
                    'messege' => 'Data has been saved successfully!',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error saving testimonium data: ' . $e->getMessage());

                $notification = [
                    'messege' => 'Error saving data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification)->withInput();
            }
        }

         public function editTestimoniumpage(Request $request)
        {
            $id = $request->id;

            $Testimonium = Testimonium::findOrFail($id);
            return response()->json($Testimonium);

        }

         public function updateTestimoniumsection(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $Testimonium = Testimonium::findOrFail($id);

                        // Handle image upload if a new image is provided
                if ($request->hasFile('image')) {
                    // Delete the old image if it exists
                    if ($Testimonium->image) {
                        $oldImagePath = public_path('testimoniumimage/' . $Testimonium->image);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    // Upload the new image
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('testimoniumimage'), $filename);
                    $data['image'] = $filename;
                }else {
                    // If no new image is provided, keep the old image
                    $data['image'] = $Testimonium->image;
                }

                // Update the homepage record
                $Testimonium->update([

                    'description' => $data['des'],
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'image' => isset($data['image']) ? $data['image'] : null,
                ]);

                $notification = [
                'messege' => 'Testimonium page update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating testimonium data
                : ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating testimonium data: ' . $e->getMessage()]);
            }
        }


        // exprience function

          public function exprienceindex()
        {
            $WorkingExperience = WorkingExperience::latest()->get();
            return view('layouts.pages.WorkingExperience.index', compact('WorkingExperience'));
        }

          public function storeExpriencesection(Request $request)
        {


            try {
                $data = $request->all();
                // Create homepage record
                WorkingExperience::create([
                    'com_name' => $data['name'],
                    'designation' => $data['desig'],
                    'yeartoyear' => $data['yty'],
                    'description' => $data['des'],

                ]);


                $notification = [
                    'messege' => 'Data has been saved successfully!',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error saving working exprience data: ' . $e->getMessage());

                $notification = [
                    'messege' => 'Error saving data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification)->withInput();
            }
        }


         public function editWorkingpage(Request $request)
        {
            $id = $request->id;

            $WorkingExperience = WorkingExperience::findOrFail($id);
            return response()->json($WorkingExperience);

        }

         public function updateExpriencesection(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $WorkingExperience = WorkingExperience::findOrFail($id);


                // Update the homepage record
                $WorkingExperience->update([

                     'com_name' => $data['name'],
                    'designation' => $data['desig'],
                    'yeartoyear' => $data['yty'],
                    'description' => $data['des'],
                ]);

                $notification = [
                'messege' => 'working page update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating working data
                : ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating working data: ' . $e->getMessage()]);
            }
        }

        // project function

          public function projectindex()
        {
            $Project = WorkingProject::latest()->get();
            return view('layouts.pages.Project.index', compact('Project'));
        }


          public function storeProjectsection(Request $request)
        {


            try {
                $data = $request->all();

                WorkingProject::create([
                    'project_name' => $data['name'],
                    'Category' => $data['category'],
                    'language' => $data['lang'],
                    'project_url' => $data['url'],

                ]);




                $notification = [
                    'messege' => 'Data has been saved successfully!',
                    'alert-type' => 'success'
                ];

                return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error saving project data: ' . $e->getMessage());

                $notification = [
                    'messege' => 'Error saving data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification)->withInput();
            }
        }

         public function editProjectpage(Request $request)
        {
            $id = $request->id;

            $WorkingProject = WorkingProject::findOrFail($id);
            return response()->json($WorkingProject);

        }

         public function updateProjectsection(Request $request)
        {


            try {
                $data = $request->all();

                $id = $request->id;

                $WorkingProject = WorkingProject::findOrFail($id);


                // Update the homepage record
                $WorkingProject->update([

                     'project_name' => $data['name'],
                    'Category' => $data['category'],
                    'language' => $data['lang'],
                    'project_url' => $data['url'],
                ]);

                $notification = [
                'messege' => 'project page update saved successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

            } catch (\Exception $e) {

                Log::error('Error updating project data
                : ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Error updating project data: ' . $e->getMessage()]);
            }
        }


        // all frontend api
        public function homeapifront()
        {
            $homepagedata = Homepage::all();
            return response()->json($homepagedata);
        }

         public function aboutapifront()
        {
            $Aboutpagedata = About::all();
            return response()->json($Aboutpagedata);
        }

        public function personalinfo()
        {
            $personalinfodata = PersonalInfo::all();
            return response()->json($personalinfodata);
        }

        public function workinginfo()
        {
            $workinginfodata = WorkingExperience::all();
            return response()->json($workinginfodata);
        }

        public function educationinfo()
        {
            $educationinfodata = Education::all();
            return response()->json($educationinfodata);
        }

        public function skill()
        {
            $skilldata = Skills::all();
            return response()->json($skilldata);
        }

        public function workingproject()
        {
            $workingprojectdata = WorkingProject::all();
            return response()->json($workingprojectdata);
        }
























































}
