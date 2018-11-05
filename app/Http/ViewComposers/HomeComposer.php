<?php

namespace App\Http\ViewComposers;

use App\Mading;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\School_info;

class HomeComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $school = School_info::where('id', Auth::user()->school_info_id)->first();
        $countPelajar = $school->users()->where('role', 0)->count();
        $countPengajar = $school->users()->where('role', 2)->count();
        $countNotif = Auth::user()->notifications()->count();
        $madingHigh = Mading::limit(6)->get();
        $view->with([
            'notifCount' => $countNotif,
            'pelajarCount' => $countPelajar,
            'pengajarCount' => $countPengajar,
            'madingHigh' => $madingHigh
        ]);
    }
}