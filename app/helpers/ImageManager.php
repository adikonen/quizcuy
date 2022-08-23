<?php

class ImageManager 
{
    public ?array $acceptedImageFormats = ['jpg','png','jpeg'];
    private string $key, 
                  $targetDir,
                  $targetFile,
                  $imageFileType;

    private array $message = [];

    public int $maximumSize = 500000;
    public bool $canUpload = true;

    public ?string $imagePath;

    public function __construct(string $key, string $targetDir, ?string ...$acceptedImageFormats)
    {
        $this->key = $key;
        $this->targetDir = $targetDir;

        $this->acceptedImageFormats = $acceptedImageFormats;

        $this->targetFile = $this->targetDir . $_FILES[$this->key]["name"];
        $this->imageFileType = strtolower(pathinfo($this->targetFile,PATHINFO_EXTENSION));

        $this->imagePath = $this->isNull() ? null : $this->targetFile;
    }

    public function setMaximumSize(int $size)
    {
        $this->maximumSize = $size;
        return $this;
    }

    public function setFormat(string ...$formats)
    {
        $this->acceptedImageFormats = $formats;
    }

    public function mustImage()
    {
        $this->canUpload = getimagesize($_FILES[$this->key]["tmp_name"]) !== false;
        if(!$this->canUpload){
            $this->message['mustImage'] = "Mohon Masukan File Gambar!";
        }
        return $this;
    }

    public function mustNotExists()
    {
        $this->canUpload = !file_exists($this->targetFile);
        
        if(! $this->canUpload ){
            $this->message['mustNotExists'] = 'file anda sudah ada!';
        } 
        return $this;
    }
    
    public function mustAcceptedFormat()
    {
        foreach($this->acceptedImageFormats as $format)
        {
           if ($this->imageFileType === $format){
                $this->canUpload = true;
                return $this;
           } 
        }
        $this->canUpload = false;
        $this->message['formatError'] = "Tipe File Yang Diterima Hanyalah ". implode(",",$this->acceptedImageFormats);
        return $this;
    }

    public function upload()
    {
        if(! $this->canUpload ){
            $this->imagePath = "";
            throw new Exception(implode(',',$this->message));
        } 

        if(!move_uploaded_file($_FILES[$this->key]["tmp_name"],$this->targetFile)){
            $this->imagePath = "";
            throw new Exception("Kesalahan Terjadi Saat Mengupload Foto Anda!");
        }

        return $this;
    }

    public function isExists()
    {
        return file_exists($this->targetFile);
    }

    public function isNull()
    {
        return $_FILES[$this->key]['name'] == "";
    }

    public function uploadorChange(?string $previousPath)
    {
        if(file_exists($previousPath)){
            unlink($previousPath);
        }
        $this->upload();
        return true;
    }

    public function delete(string $previousPath)
    {
        if(file_exists($previousPath)){
            unlink($previousPath);
        }
        return true;
    }

    public function dump()
    {
        var_dump($this->targetDir, $this->targetFile, $this->imageFileType, $this->message);
        die;
    }
    
}