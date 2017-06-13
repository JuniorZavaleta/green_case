<?php

namespace App\Services;

/**
 * Upload images for complaints and activities for atention
 * @author Takeshi Farro
 * @version 1.0
 */
use App\Models\Complaint;
use App\Models\ComplaintImage;

use Image;

use App\Persistences\Enrollment\EnrollmentPersistenceInterface;

class ImageUpload {

    public function saveImageComplaint($img_complaint, $complaint_id){
        $base_filename = $complaint_id.'-'.date('d-m-Y');

        $filename_image = $this->save($img_complaint, $base_filename);

        $complaint_image = ComplaintImage::create([
            'img'          => $filename_image,
            'complaint_id' => $complaint_id
        ]);

    }

    public function save($file_image, $image_name){
        $filename_image = $image_name.'.'.$file_image->getClientOriginalExtension();
        $path           = public_path('img'. DIRECTORY_SEPARATOR . 'complaints' . DIRECTORY_SEPARATOR . $filename_image);
        Image::make($file_image->getRealPath())->save($path);

        return $filename_image;
    }
}