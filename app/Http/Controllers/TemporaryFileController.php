<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TemporaryFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {      
       
        $validator = Validator::make($request->all(), [
            'document' => 'required|mimes:png,pdf,doc,docx,zip,rar,jpeg,jpg|max:5048',
        ]);

        if ($validator->fails()) {
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $file->storeAs('vaqtincha/tmp', $file->getClientOriginalName());
                Storage::delete(storage_path('app/vaqtincha/tmp/' . $file->getClientOriginalName()));
            }

            throw new ValidationException($validator);
        }


        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $destinationPath = '/upload/files'; // Yuklash uchun yangi yo'l
        
            $randomNumber = random_int(10000000000000000, 99999999999999999); // 10 xonali unikal raqam
            $filename = $randomNumber . '.' . $file->getClientOriginalExtension(); // Kengaytmani saqlab qolish bilan birga yangi fayl nomi 
        
            $file->storeAs($destinationPath, $filename); // Faylni yangi yo'l va yangi nom bilan saqlash

            // if($request->position == "Professor"){
            //     TemporaryFile::create([
            //         'folder' => $destinationPath,
            //         'filename' => $filename,              
            //         'professor_id' => $request->user_id
            //     ]);
            // }if ($request->position == "Moderator") {
            //     TemporaryFile::create([
            //         'folder' => $destinationPath,
            //         'filename' => $filename,              
            //         'moderator_id' => $request->user_id
            //     ]);
            // } else {
            //     TemporaryFile::create([
            //         'folder' => $destinationPath,
            //         'filename' => $filename,              
            //         'operator_id' => $request->user_id
            //     ]);
            // }

            TemporaryFile::create([
                        'folder' => $destinationPath,
                        'filename' => $filename  
                    ]);
            
          
        
            return $filename; // Saqlangan faylni to'liq yo'li bilan qaytaring
        }
    }
}
