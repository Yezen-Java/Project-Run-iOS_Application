<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	      
<!--	  IMGES STUFF-->

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">  
	  

	  
<!--	  IMAGES STUFF-->
	  
	  <link rel="stylesheet" href="css/style.css">
	  	  <link href="styles.css" rel="stylesheet">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	   	
	  <style type='text/css'>
				span {
					text-decoration:underline;
                	color:blue;
                	cursor:pointer;
					}
        </style>
	  
<script>
            // show the given page, hide the rest
            function show(elementID) {
                // try to find the requested page and alert if it's not found
                var element = document.getElementById(elementID);
                if (!element) {
                    alert("no such element");
                    return;
                }

                // get all pages, loop through them and hide them
                var pages = document.getElementsByClassName('page');
                for(var index = 0; index < pages.length; index++) {
                    pages[index].style.display = 'none';
                }

                // then show the requested page
                element.style.display = 'block';
            }
	
	var tourId ='';
			function moveToNextPage(){
		
				var myText = document.getElementById("tourText").value;
				$(function() {

       $.post('database/TourIdValidation.php',{TourId:myText}, function(data){
    		      if(data ==''){
    		      	alert("worng code");
    			    }else{
    			      tourId=myText;
    			   	  show('Page2');
    			   	  getDataForTour();

   					 }
 				});
       return false;
  });

	}
			function getDataForTour(){

               $.post( "database/GetTourData.php",{TourID:tourId},function(data) {
                     $('#justTheYellowButtons').html(data);
                  }
               );

			}


			
</script>
	  
<!-- Bootstrap -->
 <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="styles.css" rel="stylesheet">
	  
  </head>
 <body class="body">  
<!--
									////////////////////////////////
									///PASWORD TO LOGIN IS : 1234///
									////////////////////////////////	
-->
<!--=====================================FIRST PAGE START =============================================-->

	 
    <div id="Page1" class="page" style="">

		<div class="container">
    <div class="enterTextpage">
			
<!--			 Enter Tour Code : <input type="text" name="fname" id="tourText">	-->
			
			</div>

		 </div>
		
<!--		test code start -->

	<div>
		
			  <div class="topHeader">
   
	<center class="topHeader"><label class="topHospitalNameText" >Royal Brompton Hospital</label></center>


      </div>
	  
	  <form action="gallery.html">

</form>
	  
<div class="insideBodyButtons">
	<div class="container-fluid">
    	<div class="row-fluid">
      
		<div class="firstPageMainArea">
			
			<div class="container">
 
  				<form role="form">
   
    				<div class="form-group">
					
      					 <center class="centeredEnterTourCodeText"><label class="userNameText" for="usr">Enter Tour Code</label></center>
								<input type="text" class="form-control" id="tourText">
						<button type="button" class="btn btn-success"  onclick="moveToNextPage()">Enter</button>
    				</div>
  				</form>
			</div>
				
			
			
		</div>
       
      
    	</div>
	</div>
	  </div>

	</div>	

    </div>
	  
	  
<!--=====================================FIRST PAGE END ===============================================-->
	  

 		
  
<!--===================================SECOND PAGE START =============================================-->
    <div id="Page2" class="page" style="display:none">
		
  <div class="topHeader">
   
	<center class="topHeader"><label class="topHospitalNameText" >Royal Brompton Hospital</label></center>

      </div>
	  
	  <form action="gallery.html">

</form>

	  
<!--The show('Page') method can be used to show a specific page ie MRI pictures-->
<!--
At the moment it's only pointing at the gallery page , but we can have multiple gallery pages
	bellow, and all of them in one html document
-->
		
<div class="insideBodyButtons">
	<div class="container-fluid">
    	<div class="row-fluid">
      		<div id="justTheYellowButtons" class="justTheYellowButtons">
			<center class="SelectARoomText">Select a room</center>	
         <div class="span2">
			 
          <button onclick="show('Page3');" style="text-decoration: none"  class="pageButtons btn-default btn-lg btn-block" >
      		<span ><img class="imageButtons" img-block src="images/mriMachine.jpg" width="600px" align="left" ><p class="imgTextTop" align="left">Cardiac</p><p align="left" class="imgBottomText" >North Wing</p>
			</span> 
		  </button>
			 
		 </div>
		  <div class="span2">
			  
          <button onclick="show('Page3');" style="text-decoration: none"  class="pageButtons btn-default btn-lg btn-block">
      		<span ><img class="imageButtons" img-block src="images/hospitalPic.jpg" width="600px" align="left" ><p class="imgTextTop" align="left">Staff Room</p><p align="left" class="imgBottomText">Sydney Wing</p>
			</span> 
		  </button>
			  
		 </div>
		 <div class="span2">
			 
          <button onclick="show('Page3');" style="text-decoration: none"   class="pageButtons  btn-default btn-lg btn-block">
      		<span ><img class="imageButtons" img-block src="images/stethoscope.jpg" width="600px" align="left" ><p class="imgTextTop" align="left">Reception</p><p align="left" class="imgBottomText">Main Building</p>
			</span> 
		  </button>
			 
		 </div>
		 <div class="span2">
			 
          <button onclick="show('Page3');"  style="text-decoration: none" class="pageButtons  btn-default btn-lg btn-block">
      		<span ><img class="imageButtons" img-block src="images//NuclearMedicine.jpg" width="600px" align="left" ><p class="imgTextTop" align="left">ER</p><p align="left" class="imgBottomText">North Wing</p>
			</span> 
		  </button>
			 
		 </div>
		 <div class="span2">
			 
          <button onclick="show('Page3');" style="text-decoration: none" class="pageButtons  btn-default btn-lg btn-block">
      		<span ><img class="imageButtons" img-block src="images/doctors.jpg" width="600px" align="left" ><p class="imgTextTop" align="left">Radiology</p><p align="left" class="imgBottomText">Sydney Wing</p>
			</span> 
		  </button>
			 
		 </div>
		 <div class="span2">
			 
          <button onclick="show('Page3');"  style="text-decoration: none" class="pageButtons  btn-default btn-lg btn-block">
      		<span><img class="imageButtons" img-block src="images/toilet-sign.svg" width="600px" align="left" ><p class="imgTextTop" align="left">Toilet</p><p align="left" class="imgBottomText">Sydney Wing</p>
			</span> 
		  </button>
			 
		 </div>
	
		

      		</div>
    	</div>
	</div>
</div>	
					
		
<!--		end of buttons page
       
		
		//Gallery page 
		
<!--		start of gallery page -->
		<button onclick="show('Page1');">Take me to First page</button>
	
<!--		end of gallery page -->
		
    </div>
<!--=======================================SECOND PAGE END ============================================--><!--======================================THIRD PAGE START ============================================-->
 <div id="Page3" class="page" style="display:none">
	 <div class="topHeader">
   
<center class="topHeader"><label class="topHospitalNameText" >Royal Brompton Hospital</label></center>

      </div>  


        
		
		<!--	  The picture stuff start-->

<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>


	
	
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>	  
	  


<!-- populating the pictures here  -->
<center>
	
	<ul class="listOfPictures">
	
	
	<div class="mainGalleryBackground">
		<center class="galleryTopText">Picture Gallery</center>
			
		<a  href="images/NuclearMedicine.jpg" title="Nuclear Medicine" data-gallery>
			<img src="images/NuclearMedicine.jpg" alt="Orange" class="galleryPictures"></a>	
		<a  href="images/stethoscope.jpg" title="Stethoscope" data-gallery>
			<img src="images/mriMachine.jpg" alt="Orange" class="galleryPictures"></a>	 
		<a  href="images/nulearMedgood.jpg" title="New nuclear machine" data-gallery>
			<img src="images/nulearMedgood.jpg" alt="Orange" class="galleryPictures"></a>
		<a  href="images/doctors.jpg" title="Doctors" data-gallery>
			<img src="images/doctors.jpg" alt="Orange" class="galleryPictures"></a>
		<a  href="images/newMriPicture.jpg" title="Using an MRI" data-gallery>
			<img src="images/newMriPicture.jpg" alt="Orange" class="galleryPictures"></a>
		<a  href="images/hospitalPic.jpg" title="Hospital" data-gallery>
			<img src="images/hospitalPic.jpg" alt="Orange" class="galleryPictures"></a>
		<a  href="images/stethoscope.jpg" title="Stethoscope" data-gallery>
        	<img src="images/stethoscope.jpg" alt="Orange" class="galleryPictures"></a>
		
		</div>	  
	</ul>	
	
</center>		   
				 
<!--		generic home button for navigating back		   -->
	<div class="span2">
          <a style="text-decoration: none" class="pageButtons  btn-default btn-lg btn-block">
      		<span  onclick="show('Page1');"><img class="imageButtons" img-block src="images/home.png" width="600px" align="left" ><p class="imgTextTop" align="left">Home</p><p align="left" class="imgBottomText">Go back</p>
			</span> 
		  </a>
	</div>


<!--	  The picture stuff end-->

    </div> 
	 

<!--=======================================THIRD PAGE  END ============================================-->  
	  
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	 <script src="jquery.js"></script>
	 


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	 <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	 <script src="js/bootstrap-image-gallery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
	     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->

  </body>
</html>












































TEST STUFF ===============================================================================================
	  
	  		<!--		dynamic button for website start-->
<!--
<div class="input_fields_wrap">
    <button class="add_field_button">Add More Locations</button>
    <div><input type="text" name="mytext[]"></div>
</div>		
-->
		  
		  
<!--
		 <div>
		   <a><button class="circleButtonX">X</button></a>
		  
		  <p>Abdi</p>
		  </div>
-->

<!--		dynamic button for website end-->

<!--

	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});	
-->


<!--
		<button onclick="show('Page2')" class="btnEnter">Enter</button>
				<button onclick="moveToNextPage()" class="btnEnter">Enter</button>
-->

TEST STUFF END=========================================================================================