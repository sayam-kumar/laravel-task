<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class TestController extends Controller
{
    public function arrayUnique(Request $request){
        $arrayList = ['a', 'a', 'b', 'b', 'd', 'e', 'e', 'c'];
        $arrayValue = array_count_values($arrayList);
        foreach($arrayList as $element){
            if($arrayValue[$element] == 1){
                return $element;
            }
        }
        return null;
    }

    public function interleaveStrings() {
        $string1 = "abcdef";
        $string2 = "123456";
        $output = '';
        for ($i = 0; $i < max(strlen($string1), strlen($string2)); $i++) {
            if ($i < strlen($string1)) {
                $output .= $string1[$i];
            }
            if ($i < strlen($string2)) {
                $output .= $string2[$i];
            }
        }
        echo $output;
    }

    public function imageUploadView(){
        return view('imageUploadView');
    }

    public function imageUpload(Request $request){
        $request->validate([
            'imagee' => 'required|mimes:jpeg,png,jpg,gif'
        ]);
    
        $file = $request->file('imagee')->getClientOriginalName();
        $path = $request->file('imagee')->store('public/images');

        $newImage = Image::create([
            'image' => $path
        ]);
        
        return redirect()->back()->with('success', 'Image upload successfully..');
    }

    public function strReverse(){
        $input = 'a-bC-dEf=ghlj!!';
        $chars = str_split($input);
        $specialChars = array();
        for ($i = 0; $i < count($chars); $i++) {
            if (!ctype_alpha($chars[$i])) {
            $specialChars[$i] = $chars[$i];
            }
        }
        $chars = array_filter($chars, function($char) {
            return ctype_alpha($char);
        });
        $reversedChars = array_reverse($chars);
        foreach ($specialChars as $position => $specialChar) {
            array_splice($reversedChars, $position, 0, $specialChar);
        }
        return implode('', $reversedChars);
    }
}
?>