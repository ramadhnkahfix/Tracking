<!DOCTYPE html>
<html>
<head>
	<title>Preview Dokumen</title>
 
</head>
<body>
<object data="{{$data}}" type="application/pdf" width="300" height="200">
   <embed src="{{$data}}" type="application/pdf">
 </object>
	<!-- <embed type="application/pdf" src="{{$data}}" width="500" height="400"></embed> -->
    <!-- <iframe src="{{$data}}" width="600" height="400"></iframe> -->
    <!-- <object data="{{$data}}" width="600" height="400"></object> -->
</body>
</html>