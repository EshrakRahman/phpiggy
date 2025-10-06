<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;
use App\Config\Path;

class RecieptService
{

    public function __construct(private Database $db)
    {
    }

    public function validateFile(?array $file)
    {
        if (!$file || $file["error"] !== UPLOAD_ERR_OK)
        {
            throw new ValidationException([
                "receipt" => ["falied to upload file"]
            ]);
        }

        $maxFileSize = 3 * 1024 * 1024;
        if ($file["size"] > $maxFileSize)
        {
            throw new ValidationException([
                "receipt" => ["File is too large to upload"]
            ]);
        }

        $originalFileName = $file["name"];
        if (!preg_match('/^[A-za-z0-9\s._-]+$/', $originalFileName))
        {
            throw new ValidationException([
                "receipt" => ["Invalid file name"]
            ]);
        }

        $clientMimeType = $file["type"];
        $allowedMimeType = ["image/jpeg", "image/png", "application/pdf"];

        if (!in_array($clientMimeType, $allowedMimeType))
        {
            throw new ValidationException([
                "receipt" => ["Invalid file type"]
            ]);
        }
    }

    public function upload(array $file, int $transaction)
    {

        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFileName = bin2hex(random_bytes(16)) . "." . $fileExtension;

        $uploadPath = Path::STORAGE_UPLOADS . "/" . $newFileName;




        if (!move_uploaded_file($file["tmp_name"], $uploadPath))
        {
            throw new ValidationException([
                "receipt" => ["Falied to upload file"]
            ]);
        }

        $this->db->query("
            insert into receipts(transaction_id, original_filename, storage_filename,media_type) values
            (:transaction_id, :original_filename, :storage_filename, :media_type)
        ", [
            "transaction_id" => $transaction,
            "original_filename" => $file["name"],
            "storage_filename" => $newFileName,
            "media_type" => $file['type']
        ]);
    }

    public function getReceipt(string $id)
    {
        $reciept = $this->db->query("
           select * from receipts where id = :id 
        ", [
            "id" => $id
        ])->find();
    }
}
