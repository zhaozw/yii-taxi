<?php

class HelperCommon
{

    public static function getBackUrl()
    {
       return Yii::app()->session['back_url'];
    }


    public static function findMaxPosition($table, $fieldPosition ='pos')
    {
      return Yii::app()->db->createCommand("SELECT MAX($fieldPosition) FROM $table")->queryScalar();
    }


    public static function getPhoto($subDirectory, $fileName)
    {
      $photoFile = Yii::getPathOfAlias('webroot.photo') .DIRECTORY_SEPARATOR.$subDirectory.DIRECTORY_SEPARATOR.$fileName;
      if(!file_exists($photoFile))
        return false;

      return Yii::app()->request->baseUrl .'/photo/'.$subDirectory .'/'.$fileName;
   
    } 
    
    public static function getPhotoSize($subDirectory, $fileName, $arParams)
    {
      $photoFile = Yii::getPathOfAlias('webroot.photo') .DIRECTORY_SEPARATOR.$subDirectory.DIRECTORY_SEPARATOR.$fileName;
   
      if(!file_exists($photoFile))
        return false;

      $imageSize = getimagesize($photoFile);
      $width   = $imageSize[0];  
      $heigth  = $imageSize[1];

      $numerator  = ($arParams['maxWidth'] < $arParams['maxHeight']) ? $arParams['maxWidth'] : $arParams['maxHeight'];
      $denominator = ($width > $heigth) ? $width : $heigth;

      $ratio =  $numerator / $denominator;      
      $newWidth  =  round($width * $ratio);
      $newHeight =  round($heigth * $ratio);
      return array('width'=>$newWidth, 'height'=>$newHeight);
    } 

}



?>