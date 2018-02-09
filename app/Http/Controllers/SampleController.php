<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample;

class SampleController extends Controller
{
    private $SampleService;

    function __construct() {
        // Sample 모델에서 return 받은 TID 를 approve 에서 이용할 수 있는 방법을 고민해야함.
        $this->SampleService = new Sample();
    }

    public function ready(Request $req, $agent, $opentype) {

        $readyResponse = $this->SampleService->ready($agent, $opentype);

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
        return \View::make("$agent.$opentype.ready")->with($data);
    }

    public function approve(Request $req, $agent, $opentype) {
        $approveResponse = $this->SampleService->approve($req['pgToken']);
        $data = [ 'response' => $approveResponse ];
        return \View::make("$agent.$opentype.approve")->with($data);
    }

    public function cancel(Request $req, $agent, $opentype) {
        return \View::make("$agent.$opentype.cancel");
    }

    public function fail(Request $req, $agent, $opentype) {
        return \View::make("$agent.$opentype.fail");
    }

    /*
   @GetMapping("/approve/{agent}/{openType}")
    public String approve(@PathVariable("agent") String agent, @PathVariable("openType") String openType, @RequestParam("pg_token") String pgToken, Model model) {
        String approveResponse = sampleService.approve(pgToken);
        model.addAttribute("response", approveResponse);
        return agent + "/" + openType + "/approve";
    }

    @GetMapping("/cancel/{agent}/{openType}")
    public String cancel(@PathVariable("agent") String agent, @PathVariable("openType") String openType) {
        // 주문건이 진짜 취소되었는지 확인 후 취소 처리
        // 결제내역조회(/v1/payment/status) api에서 status를 확인한다.
        // To prevent the unwanted request cancellation caused by attack,
        // the “show payment status” API is called and then check if the status is QUIT_PAYMENT before suspending the payment
        return agent + "/" + openType + "/cancel";
    }

    @GetMapping("/fail/{agent}/{openType}")
    public String fail(@PathVariable("agent") String agent, @PathVariable("openType") String openType) {
        // 주문건이 진짜 실패되었는지 확인 후 실패 처리
        // 결제내역조회(/v1/payment/status) api에서 status를 확인한다.
        // To prevent the unwanted request cancellation caused by attack,
        // the “show payment status” API is called and then check if the status is FAIL_PAYMENT before suspending the payment
        return agent + "/" + openType + "/fail";
    }
     */
}
