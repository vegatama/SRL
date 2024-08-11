<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\courses;
use App\profile;
use App\Post;
use App\Models\questions;
use App\Imports\QuestionsImport;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class MainController extends Controller
{
    public function sign_up()
    {
        return view('signup');
    }

    //signup function to send input data to database
    public function sign_up_action(Request $request)
    {
        User::create([
            'name' => $request->name,
            'level' => 'user',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'class' => $request->kelas,
            // 'id' => Str::random(60),
        ]);
        return view('/login');
    }

    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            // return redirect('/home');
            if (auth()->user()->level == "admin") {
                return redirect('/home-admin');
            } else {
                return redirect('/course');
            }
        }
    }

    public function logout_action(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerate();
        return view('login');
    }


    public function edit()
    {
        // return view
    }

    public function update_account(Request $request)
    {

        $request->validate([
            'full_name' => ['string', 'max:100', 'required'],
            'name' => ['required', 'alpha_num'],
            'email' => ['email', 'max:100', 'required'],
            'contact_number' => ['string', 'max:100', 'required'],
            'address' => ['string', 'max:250', 'required'],
            'image' => 'image|file|max:1024'
        ]);


        auth()->user()->update([
            'name' => $request->name,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'image' => $request->file('image')->store('images'),
        ]);

        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }
        // Post::update($validatedData);

        return back()->with('message', 'Your profile has been updated');
    }

    public function home_admin()
    {
        // mengambil data dari table
        $courses = DB::table('courses')->where('class', DB::table('users')->where('id', Auth::id())->value('class'))->get();
        $subject =  courses::distinct()->where('class', DB::table('users')->where('id', Auth::id())->value('class'))->get(['subject']);
        // mengirim data ke view 
        return view('admin/home-admin', ['courses' => $courses, 'subject' => $subject]);
    }

    public function add_course()
    {
        return view('admin/add_course');
    }

    public function store_course(Request $request)
    {
        // untuk validasi form
        $this->validate($request, [
            'subject' => 'required',
            'title' => 'required',
            'hours' => 'required',
        ]);
        // insert data ke table books
        DB::table('courses')->insert([
            'class' => DB::table('users')->where('id', Auth::id())->value('class'),
            'subject' => $request->subject,
            'title' => $request->title,
            'hours' => $request->hours,
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/home-admin')->with('status', 'Course Berhasil Ditambahkan');
    }

    public function edit_courses($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        // mengirim data ke view 
        return view('admin/edit_course', compact('course'));
    }

    public function update_course(Request $request)
    {
        // untuk validasi form
        $this->validate($request, [
            'subject' => 'required',
            'title' => 'required',
            'hours' => 'required',
        ]);

        // insert data ke table
        DB::table('courses')->where('id_course',  $request->id_course)->update([
            'subject' => $request->subject,
            'title' => $request->title,
            'hours' => $request->hours,
        ]);
        // alihkan halaman tambah buku ke halaman
        return redirect('/home-admin')->with('status', 'Course Berhasil Diupdate');
    }

    public function delete_course($id_course)
    {
        // menghapus data berdasarkan id yang dipilih
        DB::table('courses')->where('id_course', $id_course)->delete();
        // Alihkan ke halaman home
        return redirect('/home-admin')->with('status', 'Data course Berhasil DiHapus');
    }

    public function course()
    {
        // mengambil data dari table
        $courses = DB::table('courses')->where('class', DB::table('users')->where('id', Auth::id())->value('class'))->get();
        $subject =  courses::distinct()->where('class', DB::table('users')->where('id', Auth::id())->value('class'))->get(['subject']);
        // mengirim data ke view 
        return view('user/course', ['courses' => $courses, 'subject' => $subject]);
    }

    public function courses_detail_admin($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        // mengirim data ke view 
        return view('admin/coursedetail-admin', compact('course'),);
    }

    public function edit_video($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        // mengirim data ke view 
        return view('admin/edit_video', compact('course'),);
    }

    public function edit_audio($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        // mengirim data ke view 
        return view('admin/edit_audio', compact('course'),);
    }
    public function edit_text($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        // mengirim data ke view 
        return view('admin/edit_text', compact('course'),);
    }
    public function test_admin($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        $questions = DB::table('questions')->where('id_course', $course->id_course)->inRandomOrder()->limit(10)->get();

        // mengirim data ke view 
        return view('admin/test_admin', compact('course', 'questions'),);
    }

    public function update_summary(Request $request)
    {
        // untuk validasi form
        $this->validate($request, [
            'summary' => 'required',
        ]);

        // insert data ke table
        DB::table('courses')->where('id_course',  $request->id_course)->update([
            'summary' => $request->summary,
        ]);

        return back();
    }

    public function update_video(Request $request)
    {
        // untuk validasi form
        $this->validate($request, [
            'video' => 'required',
        ]);

        // insert data ke table
        DB::table('courses')->where('id_course',  $request->id_course)->update([
            'video' => $request->video,
        ]);

        return back();
    }

    public function update_audio(Request $request)
    {
        // untuk validasi form
        $this->validate($request, [
            'audio' => 'required',
        ]);

        // insert data ke table
        DB::table('courses')->where('id_course',  $request->id_course)->update([
            'audio' => $request->audio,
        ]);

        return back();
    }

    public function store_file(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
        ]);

        $fileName = 'Teks' . $request->id_course . '.' . $request->file->extension();

        $request->file->move(public_path('uploads'), $fileName);

        $path = 'uploads/' . $fileName;

        // Perform the database operation here
        DB::table('courses')->where('id_course',  $request->id_course)->update([
            'file' => $path,
        ]);

        return back();
    }
    // public function store_test(Request $request)
    // {
    //     $request->validate([
    //         'file.*' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800'
    //     ]);

    //     $fileName = 'Test' . $request->id_course . '.' . $request->file->extension();

    //     $request->file->move(public_path('test_uploads'), $fileName);

    //     $path = 'test_uploads/' . $fileName;

    //     // Perform the database operation here
    //     DB::table('courses')->where('id_course',  $request->id_course)->update([
    //         'test_file' => $path,
    //     ]);

    //     Excel::import(new QuestionsImport,
    // 				$request->file('file')->store('files'));
    // 	return redirect()->back();

    //     return back();
    // }

    public function store_test(Request $request)
    {
        Excel::import(new QuestionsImport(), $request->file('file'));
        return back();
    }

    public function courses_detail($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        // mengirim data ke view 
        return view('user/coursedetail', compact('course'),);
    }

    public function courses_content($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        // mengirim data ke view 
        return view('user/coursecontent', compact('course'),);
    }

    public function courses_test($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        // mengirim data ke view 
        return view('user/coursetest', compact('course'),);
    }

    public function test($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        $questions = DB::table('questions')->where('id_course', $course->id_course)->inRandomOrder()->limit(10)->get();
        // mengirim data ke view 
        return view('user/test', compact('course', 'questions'),);
    }

    public function store_test_result(Request $request)
    {
        $result = 0;

        foreach ($request->input('questions', []) as $key => $questions) {
            if (
                $request->input('answers.' . $questions) != null
                && strcmp($request->input('answers.' . $questions), $request->input('correct_answer.' . $questions)) == 0
            ) {
                $result++;
            }
        }

        DB::table('test_result')->insert([
            'user_id' => Auth::id(),
            'id_course' => $request->id_course,
            'result'  => $result,
            'created_at'  => now(),
        ]);

        // menambah poin user
        if ($result >= 7) {
            $poin = DB::table('users')->where('id', Auth::id())->value('point');
            $poin = $poin + 1;
            DB::table('users')->where('id', Auth::id())->update(['point' => $poin]);
        }

        return redirect("/results/{$request->id_course}");
    }

    public function result($id_course)
    {
        // mengambil data dari table
        $user = DB::table('users')->where('id', Auth::id())->first();
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        $questions = DB::table('questions')->where('id_course', $course->id_course)->inRandomOrder()->limit(10)->get();
        $results = DB::table('test_result')->where('id_course', $course->id_course)->where('user_id', $user->id)->get();
        // mengirim data ke view
        return view('user/results', compact('user', 'course', 'questions', 'results'),);
    }

    public function result_admin($id_course)
    {
        // mengambil data dari table
        $course = DB::table('courses')->where('id_course', $id_course)->first();
        $results = DB::table('test_result')->where('id_course', $id_course)->join('users', 'test_result.user_id', '=', 'users.id')->get();
        // mengirim data ke view 
        return view('admin/results_admin', compact('course', 'results'),);
    }

    public function leaderboard()
    {
        if (
            strcmp('admin', DB::table('users')->where('id', Auth::id())->value('level')) == 0
        ) {
            $level = 1;
        } else {
            $level = 0;
        }
        // mengambil data dari table
        $users = DB::table('users')->where('class', DB::table('users')->where('id', Auth::id())->value('class'))->where('level', DB::table('users')->where('id', Auth::id())->value('level'))->orderByDesc('point')->get();
        // mengirim data ke view 
        return view('/leaderboard', compact('users', 'level'),);
    }

    // public function import() 
    // {
    //     Excel::import(new QuestionsImport, 'users.xlsx');

    //     return redirect('/')->with('success', 'All good!');
    // }

    // public function import(Request $request){
    // 	Excel::import(new ImportUser,
    // 				$request->file('file')->store('files'));
    // 	return redirect()->back();
    // }
}
