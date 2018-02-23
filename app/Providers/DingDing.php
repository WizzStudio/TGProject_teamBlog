<?php
/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/2/23
 * Time: 下午1:55
 */

namespace App\Providers;


class DingDing
{
	protected $hook, $curl;
	public function __construct($hook)
	{
		$this->hook = $hook;
		$this->curl = curl_init();
	}

	public function send($data)
	{
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_HEADER, 0);
		curl_setopt($this->curl, CURLOPT_URL, $this->hook);	//设置url
		curl_setopt($this->curl, CURLOPT_POST, true);	//post
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_HTTPHEADER, array ('Content-Type: application/json;charset=utf-8'));
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($this->curl, CURLOPT_TIMEOUT, 5);	//timeout,默认为5
		curl_exec($this->curl);
	}
}