<?php
namespace App\Http;

use GuzzleHttp\Client;

class BC
{
	public static function notify($content)
	{
		$client = new Client();
		if (!env('BearyChatHook')) {
			return ;
		}
		$data = [];
		$data['text'] = "博客新文章发布";
		$data['attachments'][] = [
			'title' => "文章标题 : ".$content['title'],
			'text' => "作者 : ".$content['user'],
			'url' => "http://tgblog.helloyzy.cn/",
		];
		$client->request('POST', env('BearyChatHook'), [
			'form_params' => ['payload' => json_encode($data)]
		]);
	}
}