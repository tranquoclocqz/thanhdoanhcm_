@extends('frontend/layout/layout')
@section('content')
<?php
function removeNewLine($value){
	$string = preg_replace('@[\s]{2,}@',' ',$value);
	return trim(str_replace(array("/\n|\r/","\""),array("", "'"), $string));
}
?>
<style type="text/css">
.loader {
     border-top: 16px solid blue;
     border-bottom: 16px solid blue;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<script>
    function initMap() {
        var end = new google.maps.LatLng({{$diadiem->lat}}, {{$diadiem->lng}});//lấy trong cơ sở dữ liệu vị trí
        var start;//điểm bắt đầu: vị trí đang đứng của người dùng
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: end
        });

        var markerEND = new google.maps.Marker({
            position: end,
            map: map,
            lable: 'Điểm đến',
            title: 'Điểm đến'
        });

        var markerS = new google.maps.Marker({
            position: start,
            map: map,
            lable: 'Điểm đến B'
        });

        //popup content
        var contentString = '{!!$diadiem->popup!!}';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        //lay vi tri hien tai
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                start = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
        //popup
        markerEND.addListener('click', function () {
            infowindow.open(map, markerEND),

                // gọi hàm khi click vào marker
                calculateAndDisplayRoute(directionsService, directionsDisplay, start, end)
        });
        directionsDisplay.setMap(map);
        /*
         var onClickHandler = function () {
         calculateAndDisplayRoute(directionsService, directionsDisplay, start, end);
         };
         document.getElementById("cd").addEventListener('click', onClickHandler);
         */

    }
    //hiển thị vị trí hiện tại
    function showPosition(position) {
        document.getElementById("latx").value = position.coords.latitude;
        document.getElementById("lngx").value = position.coords.longitude;
    }
    //hiển thị đoạn đường, tính toán
    function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
        directionsService.route({
            origin: pointA,
            destination: pointB,
            travelMode: 'DRIVING'
        }, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }
</script>
<div class="banner">
	<div id="map" style="height: 450px;width:100%;position: relative;overflow: hidden;display:inline-block"></div>
</div>
<div class="info">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
                <div class="card">
    				<ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#lichsu" aria-controls="lichsu" role="tab" data-toggle="tab">Lịch sử</a></li>
                        <li role="presentation"><a href="#hinhanh" aria-controls="hinhanh" role="tab" data-toggle="tab">Hình ảnh</a></li>
                        <li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="lichsu">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                        <div role="tabpanel" class="tab-pane" id="hinhanh">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                        <div role="tabpanel" class="tab-pane" id="video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/1-4glE3S67Y" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
			</div>
			<div class="col-sm-3">                
				<div class="card">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a id="quan" role="tab" data-toggle="tab">Quận</a></li>
                        <li role="presentation"><a role="tab" id="phuong" data-toggle="tab">Phường</a></li>                        
                    </ul>
                    <div class="tab-content" id="result">
                        <div role="tabpanel" class="tab-pane active">
                        </div>
                    </div>
                </div>
			</div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#quan").click(function(){
                        $.ajax({
                            type:'GET',
                            url:'{{route('laydanhsachquan',['idquan'=>$diadiem->phuong->quan->id])}}',
                        });
                    });
                    $("#phuong").click(function(){
                        $.ajax({
                            type:'GET',
                            url:'{{route('laydanhsachphuong',['idphuong'=>$diadiem->phuong->id])}}',
                            data:{
                                idphuong:{{$diadiem->phuong->id}},
                            },
                            success:function(data){
                                $("#result div").html(data);
                            }
                        });
                    });
                });                
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#hinhanh img").addClass('img-responsive');
                    $("#video iframe").attr({width:'100%',height:'450px'});
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#loading-image').bind('ajaxStart', function(){
                        $(this).show();
                    }).bind('ajaxStop', function(){
                        $(this).hide();
                    });
                });
            </script>
		</div>
	</div>	
</div>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLoWQ4ObqS_qXXitlYYGWFCe_7moBcI6M&callback=initMap"></script>
@endsection