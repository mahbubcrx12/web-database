$(function() {
$("#one").click(function(){
	$("#onetext").prop('name', 'answer');
	$("#twotext").prop('name', 'optionone');
	$("#threetext").prop('name', 'optiontwo');
	$("#fourtext").prop('name', 'optionthree');
});
$("#two").click(function(){
	$("#onetext").prop('name', 'optionone');
	$("#twotext").prop('name', 'answer');
	$("#threetext").prop('name', 'optiontwo');
	$("#fourtext").prop('name', 'optionthree');
});
$("#three").click(function(){
	$("#onetext").prop('name', 'optionone');
	$("#twotext").prop('name', 'optiontwo');
	$("#threetext").prop('name', 'answer');
	$("#fourtext").prop('name', 'optionthree');
});
$("#four").click(function(){
	$("#onetext").prop('name', 'optionone');
	$("#twotext").prop('name', 'optiontwo');
	$("#threetext").prop('name', 'optionthree');
	$("#fourtext").prop('name', 'answer');
});
});