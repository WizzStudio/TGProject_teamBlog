<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

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
			$image = Image::make($this->file->path())->resize(150,150);
			$fileName = base64_encode(time());
			$filePath = $fileName.".".$fileExtension;
			$image->save(storage_path('app/public/').$filePath);
			return $filePath;
		} else {
			return false;
		}
	}
}