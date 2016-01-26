<?php

class ImageUpload {

	public $request;
	public $width;
	public $height;
	public $folder;
	public $result;

	public function __construct($request, $width = 400, $height = 400, $folder = "images")
	{
		$this->request = $request;
		$this->width = $width;
		$this->height = $height;
		$this->folder = $folder;
	}

	/*
	* Fungsi Utama
	 */
	public function upload()
	{
        $this->checkFolder()->nameFile()->uploadImage();

        return $this->result;
	}
	protected function checkFolder()
	{
		$folder = public_path()."/".$this->folder;
		if (!file_exists($folder)) {
		    mkdir($folder, 0777, true);
		}

		return $this;
	}

	protected function nameFile()
	{
		$extension =  $this->request['image']->getClientOriginalExtension();
		$originName = $this->request['image']->getClientOriginalName();
		$this->name = str_slug($originName).".".$extension;
		return $this;
	}

	protected function uploadImage()
	{
		$path = $this->folder."/".$this->name;
		$file = \Image::make($this->request['image']);
		$file->fit($this->width, $this->height);
		$file->save($this->folder."/".$this->name);
		$this->result = $path;
		return $this;
	}
}
