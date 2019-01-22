function myLove($id){
	var love = "love" + $id;
	var heart=document.getElementById(love);
	var state=heart.getAttribute("src");
	if (state=="images/emptyheart.jpg"){
		heart.setAttribute("src", "images/fullheart.jpg");
	}
	else if (state=="images/fullheart.jpg") {
		heart.setAttribute("src", "images/emptyheart.jpg");	
	}
}