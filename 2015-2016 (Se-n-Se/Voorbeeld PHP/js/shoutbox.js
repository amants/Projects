$(function(){
    var refreshButton = $('h1 img'),
        shoutboxForm = $('.shoutbox-form'),
        form = shoutboxForm.find('form'),
        closeForm = shoutboxForm.find('h2 span'),
        commentElement = form.find('#shoutbox-comment'),
        ul = $('ul.shoutbox-content');

	load();

	var canPostComment = true;

	form.submit(function(e){
        e.preventDefault();

        if(!canPostComment) {
			alert("You're flooding the chat!");
			return;
		}
        
        var comment = document.getElementById("shoutbox-comment").value;

        if(comment.length < 240) {
        
            publish(comment);

            // Prevent new shouts from being published

            canPostComment = false;

            // Allow a new comment to be posted after 3 seconds

            setTimeout(function(){
                canPostComment = true;
            }, 3000);

        }

    });

	setInterval(load,5000);

	 function publish(comment){
		 $.post('publish.php', {name: "name", comment: comment}, function(){
            commentElement.val("");
            load();
        }).done(function( msg ) {
		}).fail(function() {
			alert("failed");
		});
		 load();

    }

	function load(){
        $.getJSON('./load.php', function(data) {
            appendComments(data);
        });
    }

	function appendComments(data) {

        ul.empty();

        for (var i = 0; i < data.length; i++) {
			$('ul.shoutbox-content').append("<li> ["+data[i].posttime+"]" + data[i].uid + ": " + data[i].message + "</li>");	
		}
		

    }
});