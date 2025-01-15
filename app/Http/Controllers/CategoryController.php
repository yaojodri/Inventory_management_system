<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $search = request()->query('search');
        $categories = Category::query();

        if ($search) {
            $categories->where('name', 'like', "%{$search}%");
        }

        $categories = $categories->orderBy('name', 'asc')->paginate(10);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('categories.create', [
            'action' => route('categories.store'),
            'edit' => false,
            'category' => null,
        ]);
    }
    

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories|max:100',
            'description' => 'required|max:100',
        ]);

        Category::create($data);

        return redirect()->route('categories.index')
            ->with('success', "Category '{$data['name']}' created successfully.");
    }

    /**
     * Show the form for editing the specified category.
     */
    /**
 * Display the specified category.
 */
public function show($id)
{
    $category = Category::findOrFail($id);

    return view('categories.show', compact('category'));
}


     public function edit($id)
     {
         //
         $category = Category::findOrFail($id);
         return view('categories.edit', compact('category'));
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, Category $category)
     {
         //
         $request->validate(['name'=>'required', 'description'=>'required']);
         $category->update($request->all());
         return redirect()->route('categories.index')->with('success', 'Category updated successfully');
     }


    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', "Category '{$category->name}' deleted successfully.");
    }
}

































































    // Display a listing of the students
//    public function index(){
//     return [
//         [
//             "name" => "Kofi",
//             "class" => 10,
//             "id" => 10001
//         ],
//         [
//             "name" => "Ama",
//             "class" => 10,
//             "id" => 10002
//         ],
//     ];
//    }

//    // Display the specified student
//    public function show($id){
//     // List of students
//     $student = [
//       1001 => [ "name" => "Kofi",
//         "class" => 10,
//         "id" => 10001
//       ],
//       1002 => [ "name" => "Ama",
//         "class" => 10,
//         "id" => 10002
//       ],
//     ];

//     // Check if the student exists
//     if(array_key_exists($id, $student)){
//         return $student[$id];
//     }else{
//         return response()->json(['error'=> 'Student not found'], 404);
//     }
   
//    }

//    // Show the form for creating a new student
//    public function create(){
//     $storeUrl = route('students.store');

//     return 
//     '<form method="post" action="'.$storeUrl.'" >
//         <input type="text" name="name" id="" placeholder="Enter name">
//         <br>
//         <input type="text" name="class" id="" placeholder="Enter class">
//         <br>
//         <input type="hidden" name="_token" value="'. csrf_token() .'" />
//          <input type="hidden" name="_token" value="PATCH" />
//         <input type="submit" value="Submit">
//     </form>';
//    }

//    // Store a newly created student in storage
//    public function store(Request $request){
//     // Return the submitted data
//     return "Stored student with name: ".$request->input('name'). " and class: ".$request->input('class');
//    }

//     // Show the form for editing the specified student.
//      public function edit($id)
//     {
//         // List of students
//         $students = [
//             10001 => [
//                 "name" => "Kofi",
//                 "class" => 10,
//                 "id" => 10001
//             ],
//             10002 => [
//                 "name" => "Ama",
//                 "class" => 10,
//                 "id" => 10002
//             ],
//         ];

//         if (array_key_exists($id, $students)) {
//             $student = $students[$id];
//             $updateUrl = route('students.update', $id);

//             return 
//             '<form method="post" action="' . $updateUrl . '" >
//                 <input type="text" name="name" value="' . $student['name'] . '" placeholder="Enter name">
//                 <br>
//                 <input type="text" name="class" value="' . $student['class'] . '" placeholder="Enter class">
//                 <br>
//                 <input type="hidden" name="_token" value="' . csrf_token() . '" />
//                 <input type="hidden" name="_method" value="PATCH" />
//                 <input type="submit" value="Update">
//             </form>';
//         } else {
//             return response()->json(['error' => 'Student not found'], 404);
//         }
//     }

//     // Update the specified student in storage.
//     public function update(Request $request, $id)
//     {
//         // List of students
//         $students = [
//             10001 => [
//                 "name" => "Kofi",
//                 "class" => 10,
//                 "id" => 10001
//             ],
//             10002 => [
//                 "name" => "Ama",
//                 "class" => 10,
//                 "id" => 10002
//             ],
//         ];

//         if (array_key_exists($id, $students)) {
//             $students[$id]['name'] = $request->input('name');
//             $students[$id]['class'] = $request->input('class');

//             return "Updated student with ID: $id to name: " . $students[$id]['name'] . " and class: " . $students[$id]['class'];
//         } else {
//             return response()->json(['error' => 'Student not found'], 404);
//         }
//     }

//   // Remove the specified student from storage
//   public function destroy($id)
// {
//     // List of students
//     $students = [
//         10001 => [
//             "name" => "Kofi",
//             "class" => 10,
//             "id" => 10001
//         ],
//         10002 => [
//             "name" => "Ama",
//             "class" => 10,
//             "id" => 10002
//         ],
//     ];

//     if (array_key_exists($id, $students)) {
//         unset($students[$id]);
//         return "Deleted student with ID: $id";
//     } else {
//         return response()->json(['error' => 'Student not found'], 404);
//     }
// }




















    // public function sayHello(){
    //     return "Hello from the student controller class";
    // }

    // public function sayHi(){
    //     return "Hi dear student from the controller class";
    // }

    // public function studentDetails(){
    //     return "<h1>Student: Abi</h1>";
    // }

    // public function index(){
    //     return [
    //         [
    //           "name" => "Bobs",
    //           "age" => 20,
    //           "DOB" => "20th July, 2004"
    //         ],

    //         [
    //          "name" => "Ama",
    //          "age" => 20,
    //          "DOB" => "21st July, 2004"
    //         ]
    //         ];
    // }

    // public function show(){
    //     return [
    //         [
    //             "name" => "Ama",
    //             "age" => 20,
    //             "DOB" => "21st July, 2004"   
    //         ]
    //     ];
    // }


    // public function create(){
    //     $storeUrl = route('students.update', ["id"=>1]);

    //     return 
    //     '<form method="post" action="'.$storeUrl.'">
    //         <input type="text" name="name" id="" placeholder="Enter name">
    //         <br>
    //         <input type="text" name="class" id="" placeholder="Enter class">

    //   <input type="hidden" name="_token" value="'. csrf_token() .'" />
    // <input type="hidden" name="_token" value="PATCH" />
    //         <br>
    //         <input type="submit" value="Submit">
    //     </form>';
    // }

    // public function store(){
    //     return "This is a store function";
    // }

    // public function edit(){
    //     return "This is an edit function";
    // }
    
    // public function update(){
    //     return "This is an update function";
    // }

    
