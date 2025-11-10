<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function production() {
        return view('pages.production');
    }

    public function status() {
        return view('pages.status');
    }

    public function statistics() {
        return view('pages.statistics');
    }

    public function admin() {
        return view('pages.admin');
    }

    public function settings() {
        return view('pages.settings');
    }

}
