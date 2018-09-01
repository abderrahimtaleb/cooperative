$(document).ready(function () {
	var url="pan.php";
	$.post(url,{action:"getPanier"},function(data){
			$("#MP").empty().append(data);
	});

	$("#button").click(function () {
		var id = $("#idd").val();
		$.post(url,{action:"addPanier",id:id},function(data){
			$("#MP").empty().append(data);
		});
	})

	$(".qtte").change(function () {
		var qtte = $(this).val();
		var id = $(this).attr("id");
		$.post(url,{action:"updateQtt",qtte:qtte,id:id},function(data){
			$("#MP").empty().append(data);
		});
	});

	$(".dlt").click(function () {
		var id = $(this).attr("id");
		alert(id);
	$.post(url,{action:"deleteProduit",id:id},function(data){
			window.location.reload();
		});

	});

});