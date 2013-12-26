/*
Written by Aaron Thompson and Robert Chisholm

This javascript page changes the display value of a selected id
*/

function display(id, hideShow) {
/*
if the link says 'more details' then what needs to happen is the link needs to dissapear, the less link needs to appear and the hidden div needs to be shown, this is what this if statement does
*/
if (hideShow == 'more')
{
	document.getElementById("link"+id+"less").style.display = "inline";
	document.getElementById("div"+id).style.display = "inline";
	document.getElementById("link"+id).style.display = "none";
}

/*
If the div is bing displayed then to show less the opposite needs to happen to the show more
*/
if (hideShow == 'less')
{
	document.getElementById("link"+id+"less").style.display = "none";
	document.getElementById("div"+id).style.display = "none";
	document.getElementById("link"+id).style.display = "inline";
}
}