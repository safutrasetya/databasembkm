<?php

namespace App\Providers;

use App\Http\View\Composers\NotifikasiComposer;
use App\Http\View\Composers\NotifikasiDSNComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer(['profil','halkrs','halkhs','merdekabelajar','pengajuanmbkm','pengajuankonvnilai','ubahkrs'],NotifikasiComposer::class);
      View::composer([
        'profildsn',
        'daftarkonvnilai',
        'daftarmhsmbkm',
        'dashboarddosen',
        'detailmhsmbkm',
        'dkmndikirim',
        'errordsn',
        'mhsdibimbing',
        'pengumumanbuat',
        'pengumumandaftar',
        'pengumumanedit',
        'pengumumantampil',
        'permohonanmbkm',
        'prosesterimakonvnilai',
        'prosesterimambkm'
      ],NotifikasiDSNComposer::class);

    }
}
