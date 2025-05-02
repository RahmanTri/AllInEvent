<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function show($nama_event)
    {
        $folder = str_replace(' ', '_', $nama_event); // Ubah spasi menjadi underscore (jika sesuai)
        $path = resource_path("views/user/pages/event/$folder/index.blade.php");

        if (file_exists($path)) {
            return view("user.pages.event.$folder.index");
        } else {
            abort(404, 'Halaman Event Tidak Ditemukan');
        }
    }
}