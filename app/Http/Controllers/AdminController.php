<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     public function  teacherindex(){
        $teacher = Teacher::with('user')->latest()->get();
        return view('admin.teachers.index', compact('teacher'));
    }
    public function teachercreate(){
        return view('admin.teachers.create');
    }

    public function teacherstore(Request $request){
             $request->validate([
                     'name' => 'required|max:255|unique:users,name',
                     'code' => 'required|max:255|unique:teachers,employee_code',
                     'phone' => 'required',
                     'adress' => 'required',
                     'date_of_joining' =>'required',
                     'email' => 'required|unique:users,email',
                     'password' => 'required',
             ]);
           $user =  User::create(array_merge(
                $request->only('name', 'email', 'password'),
                ['role' => 'teacher'] // Appends the default role
           ));

           Teacher::create([
    'user_id' => $user->id,
    'employee_code' => $request->code,
    'phone_number' => $request->phone,
    'adress' => $request->adress,
    'joining_date' => $request->date_of_joining,
]);
            return redirect('/admin/teachers')->with('success','Teacher Added Sucessfully');
           
    }
    public function teacheredit($id){
        $teacher = Teacher::findorFail($id);
        return view('admin.teachers.edit',compact('teacher'));
    }

     public function teacherupdate(Request $request,$id){
             $request->validate([
                     'name' => 'required|max:255|',
                     'code' => 'required|max:255|',
                     'phone' => 'required',
                     'adress' => 'required',
                     'date_of_joining' =>'required',
                     'email' => 'required|unique:users,email',
                     'password' => 'required',
             ]);

             $user = User::findorFail($id);
             $user->update($request->only('name','email','password'));
             $teacher = Teacher::findorFail($id);

             $teacher->update([
                'user_id' => $user->id,
      'employee_code' => $request->code,
      'phone_number' => $request->phone,
     'adress' => $request->adress,
      'date_of_joining' => $request->date_of_joining,
             ]);
             return redirect('/admin/teachers')->with('success','Teacher Updaed Sucessfully');
     }
        public function teacherdelete($id){
         $teacher = Teacher::findorFail($id);
         $teacher->delete();
         return redirect('/admin/teachers')->with('success','Teacher Deleted Sucessfully');
       }
             
       public function studentindex(){
          
          $students  = Student::with('schoolclass','user')->latest()->get();
          return view('admin.students.index',compact('students'));
       }
       public function studentcreate(){
        $class = SchoolClass::all();
         return view('admin.students.create',compact('class'));
       }

       public function studentstore(Request $request){
                      $request->validate([
                     'name' => 'required|max:25',
                     'email' => 'required',
                     'password' => 'required',
                     'parentname' => 'required|max:255|unique:students,parent_name',
                     'parentemail' => 'required',
                     'class_id' => 'required|exists:school_classes,id',
                     'rollnumber' => 'required',
                     'gender' => 'required',
                     'parentphone' => 'required',
                     'address' => 'required',
                     'date_of_birth' =>'required',
                      'phone' => 'required',
             ]);
               
               $user =  User::create(array_merge(
                $request->only('name', 'email', 'password'),
                ['role' => 'student'] // Appends the default role
           ));
                  
           Student::create([
                  'user_id' => $user->id,
                  'class_id' =>$request->class_id,
                  'roll_number' => $request->rollnumber,
                  'date_of_birth' => $request->date_of_birth,
                   'gender'  => $request->gender,
                   'phone' => $request->phone,
                   'address' => $request->address,
                   'parent_name' => $request->parentname,
                   'parent_phone' => $request->parentphone,
                   'parent_email' => $request->parentemail,
    
           ]);
           return redirect('/admin/students')->with('success','Student Added Sucessfully');

       }

       public function studentedit($id){
         $students = Student::findorFail($id);
         $class = SchoolClass::all();
           return view('admin.students.edit',compact('students','class'));
       }
       public function studentupdate(Request $request, $id){
                             $request->validate([
                     'name' => 'required|max:25',
                     'email' => 'required',
                     'password' => 'required',
                     'parentname' => 'required|max:255',
                     'parentemail' => 'required',
                     'class_id' => 'required',
                     'rollnumber' => 'required',
                     'gender' => 'required',
                     'parentphone' => 'required',
                     'address' => 'required',
                     'date_of_birth' =>'required',
                      'phone' => 'required',
             ]);
              $student = Student::findorFail($id);
                 $user = $student->user;
                 $user->update(array_merge(
                $request->only('name', 'email', 'password'),
                ['role' => 'student'] // Appends the default role
           ));
             
             
                   $student->update([
                  'user_id' => $user->id,
                  'class_id' =>$request->class_id,
                  'roll_number' => $request->rollnumber,
                  'date_of_birth' => $request->date_of_birth,
                   'gender'  => $request->gender,
                   'phone' => $request->phone,
                   'address' => $request->address,
                   'parent_name' => $request->parentname,
                   'parent_phone' => $request->parentphone,
                   'parent_email' => $request->parentemail,
    
           ]);
           return redirect('/admin/students')->with('success','Student Updated successfully');

       }
       public function studentdelete($id){
         $subject = Student::findorFail($id);
         $subject->delete();
         return redirect('/admin/students')->with('success','Student Deleted Sucessfully');
       }

}
 