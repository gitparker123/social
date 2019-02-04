var globe,
	globeCount = 0,
	newData = [];

function createGlobe(){

	globeCount++;
	$("#globe canvas").remove();

	newData = data.slice();

	globe = new ENCOM.Globe(window.innerWidth, window.innerHeight, {
		font: "Inconsolata",
		data: newData, // copy the data array
		tiles: grid.tiles,
		baseColor: 'yellow',
		markerColor: 'red',
		pinColor: 'orange',
		satelliteColor: 'brown',
		scale: parseFloat(1.0),
		dayLength: 1000 * parseFloat(28),
		introLinesDuration: parseFloat(2000),
		maxPins: parseFloat(500),
		maxMarkers: parseFloat(500),
		viewAngle: parseFloat(.1)
	});

	$("#globe").append(globe.domElement);
	globe.init(start);

}
function findnearestSpot(lat, lon){
	var titles = grid.tiles,  distance = 100, index = 0;
	for(var i = 0; i < titles.length; i++){
	var latdiff = Math.abs(titles[i].lat - lat);
	var lngdiff = Math.abs(titles[i].lon - lon);
	var temp = Math.sqrt(Math.pow(latdiff,2) + Math.pow(lngdiff,2));
	if(temp < distance){
		distance = temp ;
		index = i;
	}
	}
	return index;
}
function hightlightArea(lat, lon, pcolor){
	var index = findnearestSpot(lat, lon);
	globe.highlightspot(index, pcolor);
}
function mySpots(obj){
	var arr = [];
	for(var k = 0; k < obj.length; k++){
	var index = findnearestSpot(obj[k].lat, obj[k].lon);
	var newobj = {
		'index' : index,
		'color' : obj[k].value
	}
	arr.push(newobj);
	}
	return arr;
}

function onWindowResize(){
	globe.camera.aspect = window.innerWidth / window.innerHeight;
	globe.camera.updateProjectionMatrix();
	globe.renderer.setSize(window.innerWidth, window.innerHeight);

}

function roundNumber(num){
	return Math.round(num * 100)/100;
}

function projectionToLatLng(width, height, x,y){

	return {
		lat: 90 - 180*(y/height),
		lon: 360*(x/width)- 180,
	};

}

function animate(){

	if(globe){
		globe.tick();
	}

	lastTickTime = Date.now();

	requestAnimationFrame(animate);
}

function start(){

	// if(globeCount == 1){ // only do this for the first globe that's created. very messy
		animate();

		/* add pins at random locations */
		// setInterval(function(){
			
			
		// 	var lat = Math.random() * 180 - 90,
		// 	   lon = Math.random() * 360 - 180,
		// 	   name = "Test " + Math.floor(Math.random() * 100);

		// 	globe.addPin(lat,lon, name);

		// }, 5000);
	// }

		var dataStr = $("#newData").val();
		if(dataStr){
			var dataArray = dataStr.split("#");
			dataArray.forEach(function(item,index){
				var itemData = JSON.parse(item);
				globe.addPin(itemData.lat,itemData.lng, itemData.label);
			});
		}
		

	/* add 6 satellites in random locations */


//            setTimeout(function(){
//                var constellation = [];
//                var opts = {
//                    coreColor: 'green',
//                    numWaves: parseInt(10)
//                };
//                var alt =  1.3;
//
//                for(var i = 0; i< 2; i++){
//                    for(var j = 0; j< 3; j++){
//                         constellation.push({
//                            lat: 50 * i - 30 + 15 * Math.random(),
//                             lon: 120 * j - 120 + 30 * i,
//                             altitude: alt
//                             });
//                    }
//                }
//
//                globe.addConstellation(constellation, opts);
//            }, 3000);



}

$(function() {
	var open = false;
	if(!Detector.webgl)
	{
		Detector.addGetWebGLMessage({parent: document.getElementById("container")});
		return;
	}
	window.addEventListener( 'resize', onWindowResize, false );

	var docHeight = $(document).height();

	WebFontConfig = {
		google: {
				families: ['Inconsolata']
		},
		active: function(){
			/* don't start the globe until the font has been loaded */
			$("#options").css({
				"visibility": "visible",
				"top": docHeight/2,
				"bottom": docHeight/2
				}).animate({
				"top": 0,
				"bottom": 0,
				"padding-top": 46
				},800,function complete(){
					setTimeout(function(){
						open = true;

					}, 3000);

					createGlobe();

				});
		}
	};


	/* Webgl stuff */


	/* web font stuff*/
	var wf = document.createElement('script');
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		'://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);

});


$(document).ready(function(){
	
	function fn_warning(id_label){
		$(id_label).css({
			'border-color': 'red'
		});
	}
	$('#lat').on('focus', function(){
		$(this).css({
			'border-color': '#DDDDDD'
		});
	})
	$('#lng').on('focus', function(){
		$(this).css({
			'border-color': '#DDDDDD'
		});
	})
	var temp = "";
	$('#pincolor').on('keyup',function(){
		temp = $(this).val();
		if(temp == '-' || temp > 99){
			fn_warning('#pincolor');
			$('#color_alert').fadeIn(1000);
			setTimeout(function(){
			$('#color_alert').fadeOut(1000);
			},2000);
		}else{
			$(this).css({
				'border-color': '#DDDDDD'
			});
		}
	});

	$('#saveData').on('click',function(){
		resetAlert();
		var lat = $('#lat').val();
		var lng = $('#lng').val();
		// console.log("lat:"+lat+". lng:"+lng);
		var pincolor = $('#pincolor').val();
//            var label = $('#label').val();
		var result = true;
		// if(!lat){
		// 	result = false;
		// 	fn_warning('#lat');
		// }
		// if(!lng){
		// 	result = false;
		// 	fn_warning('#lng');
		// }
		// if(!pincolor){
		// 	result  = false;
		// 	fn_warning('#pincolor');
		// }
		if(result ==  true){
			var addData = {
				lat:lat,lng:lng,color:pincolor
			}
			data.push(addData);
			console.log(data);
			$('#basicExampleModal').modal('toggle');
			globe.addPin(lat, lng, "pincolor");
			// hightlightArea(lat, lng, pincolor);
			initdata()

		}
	});

	$(document).on("click", "#add_globe", function(e){    
        e.preventDefault();
        var userName = $("#inviteForm input[name='friend_name']").val();

        var userList = '';
        for(var i = 0; i < $("#friend_list option").length; i++){
            userList += $("#friend_list option:eq("+i+")").attr('value') + ",";
        }

        if(userName == ''){
            alert("Please Input Friend Name");
            return false;
		}
		
        var userArray = userList.split(',');
        // console.log(friendArray);
        if(userArray.indexOf(userName) == -1){
            alert("Please Choose Registered User");
            return false;
        }
		var url = "getlocationinfo";
        var data = {'userName':userName};
        sendRequest(url,data);
		// var addData = {
		// 	lat:lat,lng:lng,color:pincolor
		// }
		// data.push(addData);
		// console.log(data);

		// var lat = Math.random() * 180 - 90,
		//    lon = Math.random() * 360 - 180,
		//    name = "Test " + Math.floor(Math.random() * 100);

		// globe.addPin(lat,lon, name);

		// hightlightArea(lat, lng, pincolor);
		initdata()

        $('#btn-3').click();
    });

	function resetAlert(){
		$('#lat').css({
			'border-color': '#DDDDDD'
		});
		$('#pincolor').css({
				'border-color': '#DDDDDD'
		});
		$('#lng').css({
			'border-color': '#DDDDDD'
		});
	}

	function initdata(){
		resetAlert();
		$('#lat').val('');
		$('#lng').val('');
//            $('#label').val('');
	}
})