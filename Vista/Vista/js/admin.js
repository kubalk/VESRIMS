function submitForm()
{
	$("#submitBtn").click();
}

function logout()
{
	$("#logout").click();
}

function addUser()
{
	$("#adduser").click();
}

function addItem()
{
	$("#additem").click();
}

function retireItem(itemID)
{
	$("#retireItem").val(itemID);
	$("#retireForm").submit();
}

function updateUserStatus(userID, stat)
{
	$("#User").val(userID);
	$("#userStatus").val(stat);
	$("#updateUserForm").submit();
}

function searchISBN()
{
	$.ajax({
		url: 'https://www.googleapis.com/books/v1/volumes?q=isbn:' + $('#ISBN').val().replace(/-/g,''),
		type: 'GET',
		success: function(data)
		{
			if(data.items[0] != null)
			{
				var book = data.items[0].volumeInfo;
				var publisher = book.publisher;
				var title = book.title;
				var author = book.authors[0].split(" ");
				var authFirst = author[0];
				var authLast = author.length == 3 ? author[2] : author[1];
				var isbn = book.industryIdentifiers[1].identifier;
				$('#title').val(title);
				$('#publisher').val(publisher);
				$('#ISBN1').val(isbn);
				$('#authFirst').val(authFirst);
				$('#authLast').val(authLast);
			}
		},
		error: function(data)
		{
			$('#divISBNData').html('Error retrieving book info.');
		}
	});
}

function getQueryString()
{
	location.queryString = {};
    var pairs = location.search.substr(1).split("&");
    $.each(pairs, function(index){
        if (pairs[index] === "") return;
    var parts = pairs[index].split("=");
	if(parts[0] == 'view')
		location.queryString[parts[0]] = decodeURIComponent(parts[1].replace(/\+/g, " "));
	});

}

function setNavImage()
{
	$('div#' + location.queryString['view'] + 'img').attr('class', 'navSelector');
}

$(document).ready(function(){
	getQueryString();
	setNavImage();
});
