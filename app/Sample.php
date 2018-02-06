<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
	public static function ready($agent, $openType) {

        $properties = \Config::get('kakaopay.properties');

        $form_params = [];
        $form_params["cid"] = $properties['cid'];                       // 가맹점 코드
        $form_params["partner_order_id"] = "test12345";                 // 주문번호 : test12345  를 사용
        $form_params["partner_user_id"] = "1";                          // 회원 ID
        $form_params["item_name"] = "상품명";                           // 상품명
        $form_params["quantity"] = "1";                                 // 수량
        $form_params["total_amount"] = "1100";                          // 상품 총액
        $form_params["tax_free_amount"] = "0";                          // 상품 비과세 금액
        $form_params["vat_amount"] = "100";                             // 상품 부가세 금액

        $form_params["approval_url"] = $properties['sample_host']."/approve/$agent/$openType";  // 결제성공 redirect url
        $form_params["cancel_url"] = $properties['sample_host']."/cancel/$agent/$openType";     // 결제취소 redirect url
        $form_params["fail_url"] = $properties['sample_host']."/fail/$agent/$openType";         // 결제실패 redirect url

		$client = new \GuzzleHttp\Client();
        $readyResponse = $client->post('https://kapi.kakao.com/v1/payment/ready', [
            'headers' => [
                'Authorization' => 'KakaoAK '.$properties['kakao_api_admin_key'],
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => $form_params
        ]);

        return json_decode((string)$readyResponse->getBody());
	}
}