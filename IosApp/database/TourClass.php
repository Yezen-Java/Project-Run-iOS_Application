<?php

/**
* 
*/
class TourClass 
{

	public function ValidateTourCode($tourId,$dbconn){
		$query = "SELECT * From tour where tourid = $1";
		$result = pg_prepare($dbconn,"Tour_query", $query);
	    $result = pg_execute($dbconn, "Tour_query", array($tourId));
		if(pg_num_rows($result)>0){
			$rows = pg_fetch_array($result);
			$tourIdPg = $rows['tourId'];
			return true;			
	    }
	    return false;

	}



	public function getTourLocation($tourId,$dbconn){
		$htmlTage = '';
		$query = "SELECT * from tour_res, location where tour_res.tourid = $1 and tour_res.locationid = location.locationid;";
		$queryLocationMedia = "SELECT * from location_res, media where location_res.locationid = $1 and location_res.mediaid = media.mediaid and media.media_type = 'image' LIMIT 1";

			$result = pg_prepare($dbconn,"TourData_query", $query);
			$result2 = pg_prepare($dbconn,"locationImagesQuery",$queryLocationMedia);
			$escaped = pg_escape_string($tourId);
			$result = pg_execute($dbconn, "TourData_query", array($escaped));
			if (pg_num_rows($result)>0) {
				while($rows=pg_fetch_array($result)){
					$name = $rows['lname'];
					$id = $rows['locationid'];
                    $result2 = pg_execute($dbconn,"locationImagesQuery",array($id));
                    $rowtwo =pg_fetch_array($result2);
                    $imageSrc = $rowtwo['link'];

					$htmlTage = $htmlTage."<div class='span2'>
			          <button onclick='getMediaTour($id);' value='$id' style='text-decoration: none' class='pageButtons btn-default btn-lg btn-block'>
			      		<span ><img class='imageButtons' img-block src='$imageSrc' width='600px' align='left' ><p class='imgTextTop' align='left'>$name</p><p align='left' class='imgBottomText' >North Wing</p>
						    </span> 
					      </button> 
					    </div>";
				}
			}

			return $htmlTage;
	}



	public function getTourMedia($locationid, $dbconn){
		$htmlTag='';

		$queryLocationMedia = "SELECT * from location_res, media where location_res.locationid = $1 and location_res.mediaid = media.mediaid";
			$result = pg_prepare($dbconn,"locationImagesQuery",$queryLocationMedia);
			$result = pg_execute($dbconn,"locationImagesQuery",array($locationid));
			$tag = '';
			$close = '';

			while($rows=pg_fetch_array($result)){
			$link = $rows['link'];
			$inBucketName = $rows['ext_name'];
			$description = $rows['description'];
            $imageFormates = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF");
            $ext = explode(".",$inBucketName);
				if (in_array($ext[1], $imageFormates)) {
				$Tag = "<img class='img-responsive'";
			    $Close = ">";
			      
			    }else{
			      $Tag = "<video controls> <source";
			    $Close = "></video>";
			    }
			    //This where the php return the html code with the data from the database, 
			    //the description are in the $desdription variable, you need to display that description 
			    //when the user click and expand specific pic
			 $htmlTag = $htmlTag."<div id ='ImageGalleryDiv' class='mainGalleryBackground'>
				<a  href='$link' title='$description' data-gallery>
        		<img src='$link' alt='Orange' class='galleryPictures'></a></div>";

         }

        return $htmlTag;
	}
	

}



?>