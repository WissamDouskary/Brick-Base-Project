<?php

namespace App\Http\Controllers;

use App\Models\WorkerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkerProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:20',
            'last_name' => 'required|string|min:3|max:20',
            'bio' => 'required|string|min:40|max:255',
            'city' => 'required|string|max:255',
            'photos' => 'array|max:6',
            'photos.*' => 'image|max:10240',
            'price' => 'required|min:20|max:1000|numeric'
        ]);

        $worker = Auth::user();
        $worker->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'bio' => $request->input('bio'),
            'city' => $request->input('city'),
            'price' => $request->input('price')
        ]);

        if ($request->hasFile('photos')) {
            foreach ($worker->images as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        
            foreach ($request->file('photos') as $file) {
                $path = $file->store('worker_photos', 'public');
        
                WorkerImage::create([
                    'worker_id' => $worker->id,
                    'image_path' => $path,
                ]);
            }
        }

        return back()->with('success', 'Profile updated successfully.');
    }
}
