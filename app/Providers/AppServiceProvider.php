<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
use App\Models\MailConfig;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $mailsetting = MailConfig::first();
        if($mailsetting){
            $data=[
                'driver'=>$mailsetting->mail_transport,
                'host'=>$mailsetting->mail_host,
                'port'=>$mailsetting->mail_port,
                'encryption'=>$mailsetting->mail_encryption,
                'username'=>$mailsetting->mail_username,
                'password'=>$mailsetting->mail_password,
                'from'=>[
                    'address'=>$mailsetting->mail_from,
                    'name'=>'Procurement System'
                ]

                ];
                Config::set('mail',$data);
        }


        Paginator::useBootstrapFive();
    }
}