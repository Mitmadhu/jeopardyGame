function showCategory(btn) {
	const obj = $(btn);
	let url = './insert/' + obj.val();
	$("#questionForm").attr('action', url);

	$("#catName").html(obj.val());


}