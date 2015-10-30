<?php

namespace Modules\Faveosms\Http\Controllers;

//define('STDIN',fopen("php://stdin","r"));

use Pingpong\Modules\Routing\Controller;
use Illuminate\Database\Schema\Blueprint;
use Modules\Faveosms\Console\PackageMigrationCommand;
use Illuminate\Container\Container;
use Modules\Faveosms\Entities\Sms;
use Modules\Faveosms\Entities\Provider;
use Illuminate\Http\Request;

class FaveoSmsController extends Controller {

    /**
     * Create a new controller instance.
     * @return Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (!\Schema::hasTable('sms')) {
            //copy('image1.jpg', 'del/image1.jpg');
            //return redirect()->back()->with('fails','Publish Migration and Tables');
            // Get array of all source files
            $files = scandir("code/modules/FaveoSms/Database/Migrations");
// Identify directories
            $source = "code/modules/FaveoSms/Database/Migrations/";
            $destination = "code/database/migrations/";
// Cycle through all source files
            foreach ($files as $file) {
                if (in_array($file, array(".", "..")))
                    continue;
                // If we copied this successfully, mark it for deletion
                if (copy($source . $file, $destination . $file)) {
                    $delete[] = $source . $file;
                }
            }
            \Artisan::call('migrate', array('--force' => true));
            Sms::create(['provider_id' => '1', 'name' => 'auth_key']);
            Sms::create(['provider_id' => '1', 'name' => 'sender_id']);
            Sms::create(['provider_id' => '1', 'name' => 'route']);
            Provider::create(array('name' => 'Msg91.com'));
        } else {
            $providers = new Provider;
            $providers = $providers->get();
            $sms = new Sms;
            $provider_id = $sms->where('id', '1')->first();
            $auth_key = $sms->where('name', 'auth_key')->first();
            $route = $sms->where('name', 'route')->first();
            $sender_id = $sms->where('name', 'sender_id')->first();
            //$provider_id = $sms->provider
            return view('faveosms::sms', compact('providers', 'provider_id', 'auth_key', 'route', 'sender_id'));
        }
    }

    public function PostSms(Sms $sms, Request $request) {
        $auth_key = $request->input('auth_key');
        $sender_id = $request->input('sender_id');
        $route = $request->input('route');
        //dd($route);
        $notify = $request->input('notification');
        $ticket = $request->input('ticket');
        $provider_id = $request->input('provider_id');

        //$sms->delete();
        \DB::table('sms')->delete();

        $sms->create(['provider_id' => $provider_id, 'name' => 'auth_key', 'value' => $auth_key]);
        $sms->create(['provider_id' => $provider_id, 'name' => 'sender_id', 'value' => $sender_id]);
        $sms->create(['provider_id' => $provider_id, 'name' => 'route', 'value' => $route]);





        return redirect()->back()->with('success', 'Settings updated Successfully');
    }

}
