<?php

namespace App;

use Illuminate\Http\UploadedFile;

/*
 * 图片处理类
 * Param UploadedFile
 * return filePath Or False
 * */


class ImgService
{
	private $file;

	public function __construct(UploadedFile $file)
	{
		$this->file = $file;
	}

	public function handle()
	{
		$extensionArray = ['jpg', 'png', 'jpeg'];
		$mimeTypeArray = ['image/png', 'image/jpeg'];
		$fileExtension = $this->file->extension();
		$fileMimeType = $this->file->getMimeType();
		if (in_array($fileExtension, $extensionArray) and in_array($fileMimeType, $mimeTypeArray)) {
			$fileName = base64_encode(time());
			$filePath = $fileName.".".$fileExtension;
			$this->file->storeAs('public', $filePath);
			return $filePath;
		} else {
			return false;
		}
	}
}