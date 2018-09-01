var url="panier.php";
var timer= setInterval(getPanier,1000);
var commande= setInterval(getCommande,1000);
$(function(){
	$("#button").click(function(){
		var id= $("#idd").val();
		$.post(url,{action:"addPanier",id:id},function(data){
			if(data=="oui") {
				getPanier();
			} else alert(data);
		});
		return false;
	});


});
function getPanier() {

	$.post(url,{action:"getPanier"},function(data){
		$("#MP").empty().append(data);

	});
	return false;
}
function getCommande() {
	$.post(url,{action:"getCommande"},function(data){
		$(".detail_ligne").empty().append(data);

	});
	return false;
}
function deleteProduit(id){
	$(function(){
		$.post(url,{action:"deleteProduit",id:id},function(data){
			window.location.reload();
		});
	});
}