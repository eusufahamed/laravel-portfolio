<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller{
  // Auth middleWare
  public function __construct(){
    $this->middleware('auth');
  }


  // Get Category
  public function categoryListsView(){
    $getCategory = Category::get();
    return view('admin.category.categoryListsView')->with('categories', $getCategory);
  }


  // Viewing Category Form to Add Category
  public function addCategory(){
    return view('admin.category.addCategory');
  }


  // Storing the Category in the Database
  public function storeCategory(Request $request){
    //Validation Part
    $request->validate([
      'categoryName' => 'required|unique:categories,name|max:50',
    ]);

    // Object of Category Class
    $storeCategory = new Category;

    //Taking the input data from form and storing the data in the instance variable
    $storeCategory->name = $request->categoryName;

    // Saving the data
    $storeCategory->save();

    // Success message
    session()->flash('success', 'Category Added Successfully.');

    return redirect()->route('categoryListsView');
  }


  // Category Editing form
  public function editCategory($requestId){
    $editedCategory = Category::where('id', $requestId)->first();
    return view('admin.category.editCategory')->with('category', $editedCategory);
  }


  // Updating the Category in the Database
  public function updatedCategory(Request $request, $requestId){
    //Validation Part
    $request->validate([
      'categoryName' => 'required|max:50',
    ]);

    $updatedCategory = Category::where('id', $requestId)->first();

    $updatedCategory->name = $request->categoryName;

    $updatedCategory->save();

    // Success message
    session()->flash('success', 'Category Updated Successfully.');

    return redirect()->route('categoryListsView');
  }


  // Delete the Category
  public function deleteCategory($requestId){
    $deleteCategory = Category::where('id', $requestId)->first();

    if(!is_null($deleteCategory)){
      $deleteCategory->delete();
    }

    return back();
  }
}
