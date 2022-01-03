<?php

namespace App\Helpers;
    class Gdrive{

        public static function saveImages($images=[])
        {
            $folderId = '1FnE2tTm88ocCpb1kRZaH_8smm2DANFij';
            $temp_path =  [];
            $final_path = [];
            try {
               foreach ($images as $image) {
                    $uploadedImg = \Illuminate\Support\Facades\Storage::disk('google')->getAdapter()->write($folderId.'/' . $image->getClientOriginalName(), $image->readStream(), new \League\Flysystem\Config([]));
                    $temp_path[] = explode("/", $uploadedImg['path']);
                }

                foreach ($temp_path as $path) {
                    $final_path[] = $path[1];
                }
                 return $final_path;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public static function saveVideos($videos=[])
        {
            $folderId = '1tMcKhl_hMrQYBYqcUvnu8HjZMnk4wyeB';
            $temp_path =  [];
            $final_path = [];
            try {
               foreach ($videos as $video) {
                    $uploadedVideo = \Illuminate\Support\Facades\Storage::disk('google')->getAdapter()->write($folderId.'/' . $video->getClientOriginalName(), $video->readStream(), new \League\Flysystem\Config([]));
                    $temp_path[] = explode("/", $uploadedVideo['path']);
                }
                foreach ($temp_path as $path) {
                    $final_path[] = $path[1];
                }
                 return $final_path;
            } catch (\Throwable $th) {
                return false;
            }
        }
        
        public static function saveDocuments($documents=[])
        {
            $folderId = '1aISQqNNki298HbahAHQep9jHF4852_Jt';
            $temp_path =  [];
            $final_path = [];
            try {
               foreach ($documents as $document) {
                    $uploadedDoc = \Illuminate\Support\Facades\Storage::disk('google')->getAdapter()->write($folderId.'/' . $document->getClientOriginalName(), $document->readStream(), new \League\Flysystem\Config([]));
                    $temp_path[] = explode("/", $uploadedDoc['path']);
                }
                foreach ($temp_path as $path) {
                    $final_path[] = $path[1];
                }
                 return $final_path;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public static function disk($id)
        {
            return "https://drive.google.com/uc?export=view&id=".$id;
        }
        

        
        // public static function imagesFolder()
        // {
        //    $id = '1FnE2tTm88ocCpb1kRZaH_8smm2DANFij';
        //     return $url;
        // }

        // public static function documentsFolder()
        // {
        //     $id = '1aISQqNNki298HbahAHQep9jHF4852_Jt';
        //     return $url;
        // }

        // public static function videosFolder()
        // {
        //     $id = '1tMcKhl_hMrQYBYqcUvnu8HjZMnk4wyeB';
        //     return $url;
        // }

        // public static function previewLink($fileId)
        // {
        //     $url = 'https://drive.google.com/file/d/'. $fileId .'/preview?embedded=true';
        //     return $url;
        // }
        // public static function staticLink($fileId)
        // {
        //     $url = 'https://drive.google.com/uc?id='.$fileId;
        //     return $url;
        // }
    }