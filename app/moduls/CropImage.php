<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\moduls;

/**
 * Description of Upload
 *
 * @author masfu
 */
class CropImage {

    private $source_image;
    private $destination_filename;
    private $width = 200;
    private $height = 200;
    private $quality = 70;
    private $crop = true;

    public function __construct($source_image, $destination_filename, $width = 200, $height = 200, $quality = 70, $crop = true) {
        $this->source_image = $source_image;
        $this->destination_filename = $destination_filename;
        $this->width = $width;
        $this->height = $height;
        $this->quality = $quality;
        $this->crop = $crop;
    }

    public function resize_image() {

        if (!$image_data = getimagesize($this->source_image)) {
            return false;
        }

        switch ($image_data['mime']) {
            case 'image/gif':
                $get_func = 'imagecreatefromgif';
                $suffix = ".gif";
                break;
            case 'image/jpeg';
                $get_func = 'imagecreatefromjpeg';
                $suffix = ".jpg";
                break;
            case 'image/png':
                $get_func = 'imagecreatefrompng';
                $suffix = ".png";
                break;
        }

        $img_original = call_user_func($get_func, $this->source_image);
        $old_width = $image_data[0];
        $old_height = $image_data[1];
        $new_width = $this->width;
        $new_height = $this->height;
        $src_x = 0;
        $src_y = 0;
        $current_ratio = round($old_width / $old_height, 2);
        $desired_ratio_after = round($this->width / $this->height, 2);
        $desired_ratio_before = round($this->height / $this->width, 2);

        if ($old_width < $this->width || $old_height < $this->height) {
            /**
             * The desired image size is bigger than the original image. 
             * Best not to do anything at all really.
             */
            return false;
        }


        /**
         * If the crop option is left on, it will take an image and best fit it
         * so it will always come out the exact specified size.
         */
        if ($this->crop) {
            /**
             * create empty image of the specified size
             */
            $new_image = imagecreatetruecolor($this->width, $this->height);

            /**
             * Landscape Image
             */
            if ($current_ratio > $desired_ratio_after) {
                $new_width = $old_width * $this->height / $old_height;
            }

            /**
             * Nearly square ratio image.
             */
            if ($current_ratio > $desired_ratio_before && $current_ratio < $desired_ratio_after) {
                if ($old_width > $old_height) {
                    $new_height = max($this->width, $this->height);
                    $new_width = $old_width * $new_height / $old_height;
                } else {
                    $new_height = $old_height * $this->width / $old_width;
                }
            }

            /**
             * Portrait sized image
             */
            if ($current_ratio < $desired_ratio_before) {
                $new_height = $old_height * $this->width / $old_width;
            }

            /**
             * Find out the ratio of the original photo to it's new, thumbnail-based size
             * for both the width and the height. It's used to find out where to crop.
             */
            $this->width_ratio = $old_width / $new_width;
            $this->height_ratio = $old_height / $new_height;

            /**
             * Calculate where to crop based on the center of the image
             */
            $src_x = floor(( ( $new_width - $this->width ) / 2 ) * $this->width_ratio);
            $src_y = round(( ( $new_height - $this->height ) / 2 ) * $this->height_ratio);
        }
        /**
         * Don't crop the image, just resize it proportionally
         */ else {
            if ($old_width > $old_height) {
                $ratio = max($old_width, $old_height) / max($this->width, $this->height);
            } else {
                $ratio = max($old_width, $old_height) / min($this->width, $this->height);
            }

            $new_width = $old_width / $ratio;
            $new_height = $old_height / $ratio;

            $new_image = imagecreatetruecolor($new_width, $new_height);
        }

        /**
         * Where all the real magic happens
         */
        imagecopyresampled($new_image, $img_original, 0, 0, $src_x, $src_y, $new_width, $new_height, $old_width, $old_height);

        /**
         * Save it as a JPG File with our $this->destination_filename param.
         */
        imagejpeg($new_image, $this->destination_filename, $this->quality);

        /**
         * Destroy the evidence!
         */
        imagedestroy($new_image);
        imagedestroy($img_original);

        /**
         * Return true because it worked and we're happy. Let the dancing commence!
         */
        return true;
    }

}
