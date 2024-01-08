<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function uploadToServer(Request $request)
    {
       
        if ($request->isMethod('delete')) {
            $filepond = $request->json()->all();
            $folder = $filepond['folder'];
            $tempFile = Files::query()->where('folder', $folder)->first();
            $path = storage_path('app/orders/temp/' . $folder);
            if (is_dir($path) && $tempFile) {
                DB::beginTransaction();

                try {
                    unlink($path . '/' . $tempFile->filename);
                    rmdir($path);
                    $tempFile->delete();
                    DB::commit();

                    return response()->json(['message' => 'success']);
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::error('Error deleting directory: ' . $e->getMessage());
                    return response()->json(['message' => 'failed'], 500);
                }
            }
            return response()->json(['message' => 'failed'], 500);
        }
        if ($request->hasFile('filepond')) {
            $files = $request->file('filepond');
            foreach ($files as $key => $file) {
                $filename = $file->getClientOriginalName();
                $folder = uniqid() . '-' . time();
                $file->storeAs('orders/temp/' . $folder, $filename);
                Files::query()->create(['folder' => $folder, 'filename' => $filename]);
                // Arr::add($folders, $key, $folder);
                return response()->json(['folder' => $folder], 200);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Files $files)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Files $files)
    {
        //
    }

    
    public function list(Files $files, Request $request)
    {
        // Agar name parametri mavjud bo'lsa, shu nomga mos keladigan moderatorlarni qidirish
        if ($request) {
            $murojatlar = $files->where('filename', 'like', '%' . $request->name . '%')
                ->orderBy("created_at", 'desc')
                ->paginate(20);               
        } else {
            // Agar name parametri mavjud bo'lmasa, barcha moderatorlarni tartib bilan olish
            $murojatlar = $files->orderBy("created_at", 'desc')->paginate(20);
        }
        IndexController::calculateOperatorsPoints($murojatlar);

        // Natijani ko'rsatish uchun ko'rinishni qaytarish
        return view('reyting.dashboard.murojatlar-list', compact('murojatlar'));
    }


}
