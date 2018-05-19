$(".delete").on( "click", function( event ) {
    $result = confirm("Are you sure you want to delete this user?");
    if($result === false){
        event.preventDefault();
    }
});