<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    public static function alllisting() {
        $listings = self::all();
        return $listings;
    }
    public static function find($id) {
        $listings = self::all();
        foreach($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }

}
