<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Image;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class GalleryController extends Controller
{

  //get all categories of images
  public function getGalleryCategory($slug)
  {

   $categories = GalleryCategory::Active()->orderBy('order_position','asc')->get();
   $category = GalleryCategory::whereSlug($slug)->orWhere('id', $slug)->Active()->first();

   if ($category) {
      $images = Image::whereHasMorph('imageable',[Gallery::class],
      function (Builder $query) use($category) {
              $query->Active()->ActiveCategory()->whereGalleryCategoryId($category->id);
          })->orderBy('order_position','asc')->paginate(12);

   }

   return view('frontend.gallery.images',compact('categories','images'));
  }

  public function gallery()
  {
      $categories = GalleryCategory::Active()->orderBy('order_position','asc')->get();

     $images = Image::whereHasMorph('imageable',[Gallery::class],
      function (Builder $query) {
              $query->Active()->ActiveCategory();
          })->orderBy('order_position','asc')->paginate(12);

      return view('frontend.gallery.images',compact('categories','images'));
  }



}