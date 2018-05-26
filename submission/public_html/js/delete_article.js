$(".delete_article").on( "click", function( event ) {
    $result = confirm("Are you sure you want to delete this article?");
    if($result === false){
        event.preventDefault();
    }
});
