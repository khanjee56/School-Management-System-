<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\Notice;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
          $totalstudents = Student::count();
          $totalteachers = Teacher::count();
          $totalclasses = SchoolClass::count();
          $totalsubjects = Subject::count();
          $recentfivenotices = Notice::latest()->take(5)->count();
        return view('admin.dashboard',compact('totalstudents','totalteachers','totalclasses','totalsubjects','recentfivenotices'));
    }
    public function classesindex(){
        $classes = SchoolClass::withcount('student')->latest()->get();
        return view('admin.classes.index', compact('classes'));
    }
    public function createclass(){
        return view('admin.classes.create');
    }
    public function storeclass(Request $request){
        $request->validate([
             'name' => 'required|max:255',
             'section' => 'required|max:255',
             'capacity' => 'required|numeric',

        ]);
        // SchoolClass::create([
        //       'name' => '$request->name',
        //       'section' => '$request->section',
        //       'capacity' => '$request->capacity',
        // ]);
        SchoolClass::create($request->only('name','section','capacity'));
        return redirect('/admin/classes')->with('success','Class Added sucessfully');
    }

    public function editclass($id){

        $class = SchoolClass::findorFail($id);
        return view('admin.classes.edit',compact('class'));
    }

    public function updateclass(Request $request,$id){
           $class = SchoolClass::findorFail($id);
           $request->validate([
              'name' => 'required|max:255',
             'section' => 'required|max:255',
             'capacity' => 'required|numeric',
           ]);
           $class->update($request->only('name','section','capacity'));
           return redirect('/admin/classes')->with('success','Class Updated!');
    }
    public function destroyclass($id){
        $class = SchoolClass::findorFail($id);
        $class->delete();
        return redirect('/admin/classes')->with('success','Class Deleted Sucessfully');
    }
    public  function subjectindex(){

       $subject = Subject::with('schoolclass')->latest()->get();


           
        return view('admin.subjects.index',compact('subject'));
    }
    public function subjectcreate(){
        $classes = SchoolClass::all();
        return view('admin.subjects.create',compact('classes'));
    }
    
    public function subjectstore(Request $request){
         $request->validate([
              'name' => 'required|max:255',
             'code' => 'required|max:255',
             'class_id' => 'required|exists:school_classes,id',
         ]);
         Subject::create($request->only(
            'name','code','class_id',
         ));
         return redirect('/admin/subjects')->with('success','Subject Added Sucessfully');
    }

    public function subjectedit($id){
         $subject = Subject::findorFail($id);
        return view('admin.subjects.edit',compact('subject'));
    }
    public function subjectdelete($id){
        $subject = Subject::findorFail($id);
        $subject->delete();
        return redirect('/admin/subjects')->with('success','subject deleted sucessfully');
    }
    public function subjectupdate(Request $request, $id){
        $subject = Subject::findorFail($id);
        $request->validate([
               'name' => 'required|max:255',
             'code' => 'required|max:255',
             'class_id' => 'required',
        ]);
        $subject->update($request->only('name','code','class_id'));
        return redirect('/admin/subjects')->with('success','subject updated successfully');
    }



}
