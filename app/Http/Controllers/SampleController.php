<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample;

class SampleController extends Controller
{
    public function ready(Request $req, $agent, $opentype) {

		$readyResponse = Sample::ready($agent, $opentype);

        $data = [];

		if ($agent == 'mobile') {
            // 모바일은 결제대기 화면으로 redirect 한다.
            // In mobile, redirect to payment stand-by screen
            return \Redirect::to($readyResponse->next_redirect_mobile_url);
		}

		if ($agent == 'app') {
            // 앱에서 결제대기 화면을 올리는 webview 스킴
            // In app, webview app scheme for payment stand-by screen
            $data = [ "webviewUrl" => "app://webview?url=".$readyResponse->next_redirect_app_url ];
            return \View::make('app.webview.ready')->with($data);
		}

        // pc
        $data = [ 'response' => $readyResponse ];
        return \View::make('pc.layer.ready')->with($data);
    }
}
