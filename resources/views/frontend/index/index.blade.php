@extends('frontend/layout/layout')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/media/css/dataTables.responsive.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/media/css/dataTables.bootstrap.css">
@endsection
@section('script')

@endsection

@section('content')
<div class="banner">
		<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501715.80227723316!2d106.53618460851392!3d10.761072495283665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1499750701889" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
</div>
	<div class="banner-info">
	</div>
<div class="loc-lov">
	<div class="container">
		<div class="loc-left">
			<ul>
				@foreach($danhmuc as $dm)
					<li><button class="btn btn-primary" id='{{$dm->id}}'>{{$dm->tendanhmuc}}</button></li>
				@endforeach
				<!-- <li><a href="#"><i class="adm"></i></a></li>
				<li><a href="#"><i class="set"></i></a></li>
				<li><a href="#"><i class="str"></i></a></li>
				<li><a href="#"><i class="plc"></i></a></li>
				<li><a href="#"><i class="plus"></i></a></li> -->
					<div class="clearfix"> </div>
			</ul>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".loc-left ul li button").click(function(){
						$.ajax({
							type:'GET',
							url:'ajax/laythongtin/' + $(this).attr('id'),
							data:{
								id: $(this).attr('id'),
							},
							success: function(data){
								$(".loc-bottom").html(data);
							}
						});
					});
				});
			</script>
		</div>
		<div class="loc-right">	
			<div class="loc-bottom">
				@foreach($diadiem as $dd)
				<div>
					<li class="wicked"><a href="{{route('chitiet',['slug'=>$dd->slug,'id'=>$dd->id])}}">{{$dd->tendiadiem}}</a></li>
					<li class="mullet">{{$dd->diachi}}</li>
					<li class="st"><a href="#"><img src="images/star.png" class="img-responsive" alt=""></a></li>
					<li class="iew"><a href="#">Xem chi tiết</a></li>
				</div>
				@endforeach
			</div>
		</div>
			<div class="clearfix"></div>
	</div>
</div>
<!-- <script type="text/javascript" src="{{asset('frontend')}}/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="{{asset('frontend')}}/media/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
            $("#my_table").DataTable({
                responsive: true,
                "language":{
				    "sProcessing":   "Đang xử lý...",
				    "sLengthMenu":   "Xem _MENU_ mục",
				    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
				    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
				    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
				    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
				    "sInfoPostFix":  "",
				    "sSearch":       "Tìm:",
				    "sUrl":          "",
				    "oPaginate": {
				        "sFirst":    "Đầu",
				        "sPrevious": "Trước",
				        "sNext":     "Tiếp",
				        "sLast":     "Cuối"
				    }
				},
				'bSort':false,
            });
        });
	</script> -->

@endsection
	