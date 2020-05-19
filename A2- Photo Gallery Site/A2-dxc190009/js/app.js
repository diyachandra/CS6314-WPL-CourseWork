var res;


$(document).ready(function () {
    $.ajax({
        url: './js/data.json',
        crossDomain: true,
        dataType: "json",
        success: function (result) {
            console.log('successful load on data.json');
            //console.log(result);
            res = result;
            res.forEach(element => {
                populateImages(element);
            });
        },
        error: function (e) {
            // console.log(e);
        }
    });


    $(document).on('mouseenter', 'img', function (e) {
        $(this).addClass('gray');
        var img = res.find(e => {
            return e.title === $(this).attr('alt')
        });
        var bre = "<br />";
        $(document.body).append(
            '<div id="preview">' +  
            '<img src="' + $(this).attr('src').replace('square', 'medium') + '"' +
            ' alt = "' + $(this).attr('alt') + '"' + '> ' + 
            '<p>' + $(this).attr('alt') + bre + img.city + ' ' + img.country + ' ' + img.taken + '</p>' + 
            '</div>'
        );
        $('#preview').css({
            "left": e.pageX,
            "top": e.pageY
        });
        $('#preview').fadeIn(1000);
    });
    $(document).on('mouseleave', 'img', function () {
        // console.log('mouseleave event added');
        $(this).removeClass('gray');
        $('#preview').remove();
    });
    $(document).on('mousemove', document, function (e) {
        //console.log(e.pageX + '\t' + e.pageY );
        $('#preview').offset({
            left: e.pageX,
            top: e.pageY + 20
        });
    });
});

function populateImages(image) {
    // console.log(image);
    $('#imgContainer').append(
        '<img src="images/square/' + image['path'] + '"' + 
        ' alt = "' + image['title'] + '"' + '> '
    );
}