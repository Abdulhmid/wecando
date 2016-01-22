<?php

class ImageUploadCampaign {

	public $request;
	public $width;
	public $height;
	public $folder;
	public $result;

	public function __construct($request, $width = 400, $height = 400, $folder = "images/campaign")
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

        return $this->name;
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
		for ($i=0; $i < 3 ; $i++) { 
			
            if ($i == '0') $namePicture = 'list_';
            if ($i == '1') $namePicture = 'active_';
            if ($i == '2') $namePicture = 'finish_';

            if ($i == '0') {
            	$width = 420; $height = 270;	
            } 
            if ($i == '1') {
            	$width = 80; $height = 85;	
            } 
            if ($i == '2') {
            	$width = 400; $height = 184;	
            }

			$path = $this->folder."/".$namePicture.$this->name;
			$file = \Image::make($this->request['image']);
			$file->fit($width, $height);
			$file->save($this->folder."/".$namePicture.$this->name);
			$this->result = $path;
		}
		$this->result = $this->name;
		return $this;
	}
}
