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
		$query = "SELECT DISTINCT ON (location.locationid) * from usertour, tour_res, location_res, location, media where usertour.tourid = $1 and usertour.tourid = tour_res.tourid and tour_res.locationid = location_res.locationid and location_res.username = usertour.username and location_res.locationid = location.locationid and location_res.mediaid = media.mediaid; ";

			$result = pg_prepare($dbconn,"TourData_query", $query);
			$result2 = pg_prepare($dbconn,"locationImagesQuery",$queryLocationMedia);
			$escaped = pg_escape_string($tourId);
			$result = pg_execute($dbconn, "TourData_query", array($escaped));
			
			if (pg_num_rows($result)>0) {
				while($rows=pg_fetch_array($result)){
					$name = $rows['lname'];
					$id = $rows['locationid'];
                    $imageSrc = $rows['link'];

					$htmlTage = $htmlTage."<div class='span2'>
			          <button onclick='getMediaTour($id);' value='$id' style='text-decoration: none' class='pageButtons btn-default btn-lg btn-block'>
			      		<span ><img class='imageButtons' img-block src='$imageSrc' width='200px'  align='left' ><p class='imgTextTop' align='left'>$name</p><p align='left' class='imgBottomText' >North Wing</p>
						    </span> 
					      </button> 
					    </div>";
				}
			}
			return $htmlTage;
	}



	public function getTourMedia($tourid,$locationid, $dbconn){
		$htmlTag='';

		$queryLocationMedia = "SELECT * from usertour, tour_res, location_res, media where usertour.tourid =$1 and usertour.tourid = tour_res.tourid and tour_res.locationid = location_res.locationid and location_res.mediaid = media.mediaid and location_res.username = usertour.username and location_res.locationid = $2;";
			$result = pg_prepare($dbconn,"locationImagesQuery",$queryLocationMedia);
			$result = pg_execute($dbconn,"locationImagesQuery",array($tourid,$locationid));
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
			      $Tag = "<video controls > <source";
			    $Close = "></video>";
			    }
			    //This where the php return the html code with the data from the database, 
			    //the description are in the $desdription variable, you need to display that description 
			    //when the user click and expand specific pic
			 $htmlTag = $htmlTag."<div id ='ImageGalleryDiv' class='mainGalleryBackground'>
				<a  href='$link' title='$description' data-gallery>
        		$Tag src='$link' alt='Orange' class='galleryPictures'$Close</a></div>";

         }

        return $htmlTag;
	}


	public function getLocationObjects($tourid,$dbconn){
		$query = "SELECT DISTINCT ON (location.locationid) * from usertour, tour_res, location_res, location, media where usertour.tourid = $1 and usertour.tourid = tour_res.tourid and tour_res.locationid = location_res.locationid and location_res.username = usertour.username and location_res.locationid = location.locationid and location_res.mediaid = media.mediaid;";
		$result = pg_prepare($dbconn,"TourData_query", $query);
		$result = pg_execute($dbconn, "TourData_query", array($tourid));
		$myArray = array();
		while ($rows = pg_fetch_array($result)) {
			//set up the nested associative arrays using literal array notation
			$firstArray = array("id" => $rows['locationid'], "latitude" => $rows['latitude'], "longitude"=> $rows['longitude'],"name"=> $rows['lname']);
			//push items onto main array with bracket notation (this will result in numbered indexes)
			array_push($myArray,$firstArray);
		}
		 $json = json_encode($myArray);
		return $json;
	}
	

}



?>