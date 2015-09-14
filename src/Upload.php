<?php
/**
 * Created by PhpStorm.
 * User: anderson.mota
 * Date: 14/09/2015
 * Time: 14:35
 *
 * @author Anderson Mota <anderson.mota@lqdi.net>
 */

namespace App;


class Upload {

    private $storage_path;
    private $storage;
    public $file;

    public function __construct($storage_path, $file_name = 'file')
    {
        $this->storage_path = $storage_path;
        $this->storage = new \Upload\Storage\FileSystem($this->storage_path);
        $this->file = new \Upload\File($file_name, $this->storage);
        $this->file->setName(time() . '_' . uniqid());
    }

    public function imageValidation()
    {
        $this->file->addValidations([
            new \Upload\Validation\Mimetype(['image/png', 'image/jpeg', 'image/jpg']),
            new \Upload\Validation\Size('5M')
        ]);
    }

    /**
     * @return array
     */
    public function info()
    {
        return [
            'path'       => '/data/upload/' . $this->file->getNameWithExtension(),
            'name'       => $this->file->getNameWithExtension(),
            'extension'  => $this->file->getExtension(),
            'mime'       => $this->file->getMimetype(),
            'size'       => $this->file->getSize(),
            'md5'        => $this->file->getMd5(),
            'dimensions' => $this->file->getDimensions()
        ];
    }

    /**
     * @return bool
     */
    public function run()
    {
        return $this->file->upload();
    }
}