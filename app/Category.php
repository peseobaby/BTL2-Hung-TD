<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id' ,'user_id', 
    ];

    public static function store($data)
    {	
    	$categoryParent = Category::where('name', $data['parent'])->first();
    	$category = new Category;
    	$category->name = $data['name'];
    	$category->parent_id = $categoryParent->id;
    	$category->user_id = Auth::id();
        $category->save();
    	return $category;
    }

     public static function updateCategory($data, $id)
    {	
    	$parentId = Category::where('name', $data['parent'])->first();
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->parent_id = $parentId->id;
        $category->save();
        return $category;
    }
}
