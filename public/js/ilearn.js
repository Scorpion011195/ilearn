/**
 * Created by silverhawk on 11/06/2017.
 */
$( document ).ready(function () {
    $( '#nav-form-login' ).on('submit', function (event) {
        $this = $ ( this );
       event.preventDefault();
        if($( '.nav-login' ).hasClass('in')) {
            $( '.nav-login').removeClass('in');
            $this.find( "input[type=submit]" ).removeClass('btn-success');
        }
        else {
            $( '.nav-login').addClass('in');
            $this.find( "input[name='username']" ).focus();
            $this.find( "input[type=submit]" ).addClass('btn-success');
        }
    });

    var createDictIndexes = [];
    $( document ).on('click', '.create-dict-add', function (event) {
        event.preventDefault();
        var index;
        if(createDictIndexes.length == 0)
            index = 1;
        else
            index = createDictIndexes.length + 1;
        var url = window.location.origin+'/getAddCreateDictMeaning/'+index;
        $.ajax({
            method: "GET",
            url: url,
            success: function (data) {
                $( '.create-dict-add ').addClass("hidden");
                $( '.create-dict-remove ').removeClass("hidden");
                $( '.create-dict-input').append(data);
                createDictIndexes.push(index);
            }
        });
    });

    $( document ).on('click', '.create-dict-remove', function (event) {
        event.preventDefault();
        var $this = $( this );
        var $group = $this.closest( '.create-dict-meaning-group' );
        var $index = $group.attr('id');
        $group.detach();
        for(var i in createDictIndexes) {
            if(createDictIndexes[i] == $index) {
                createDictIndexes.splice(i, 1);
                break;
            }
        }
        console.log(createDictIndexes);
    })

});

// Set class active for left-sidebar
$(document).ready(function(){
    var selector = '.sidebar-menu li';
    $(selector).on('click', function(){
        $(selector).removeClass('active');
        $(this).addClass('active');
    });
});
