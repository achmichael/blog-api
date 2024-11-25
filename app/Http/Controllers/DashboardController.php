<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $user = session('user') ?? null;
            $token = session('token');

            if (!$token) {
                return redirect()->route('/')
                    ->with('error', 'Sesi Anda telah berakhir. Silakan login kembali.');
            }

            try {
                $blogs = Blog::all();
            } catch (\Exception $e) {
                Log::error('Failed to fetch blogs: ' . $e->getMessage());
            }
            
            return view('admin', [
                'user' => $user,
                'blogs' => $blogs
            ]);

        } catch (\Exception $e) {
            Log::error('Dashboard error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memuat dashboard.');
        }
    }

}
