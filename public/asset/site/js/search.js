/**
 * Created by Saumya on 3/27/2016.
 */

//$("#twitter-search .typeahead").on("typeahead:selected typeahead:autocompleted", function(e,datum) {
//    console.log(datum.id);
//    $.ajax({
//            method: 'POST',
//            dataType: 'html',
//            url: window.constants.BASE_URL+'searchProduct',
//            data: {id: datum.id}
//        })
//        .success(function(response){
//            $('.product-result').empty();
//            $('.product-result').html(response);
//
//            $('#date').datepicker({
//                format: "dd/mm/yyyy",
//                daysOfWeekDisabled: "6",
//                daysOfWeekHighlighted: "0",
//                todayHighlight: true
//            });
//        })
//        .error(function(response){
//            console.log(response);
//        });
//});
//
//var substringMatcher = function(strs) {
//    return function findMatches(q, cb) {
//        var matches, substringRegex;
//
//        // an array that will be populated with substring matches
//        matches = [];
//
//        // regex used to determine if a string contains the substring `q`
//        substrRegex = new RegExp(q, 'i');
//
//        // iterate through the pool of strings and for any string that
//        // contains the substring `q`, add it to the `matches` array
//        $.each(strs, function(i, str) {
//            if (substrRegex.test(str.name)) {
//                var info = {
//                    id:str.id,
//                    name:str.name
//                };
//                matches.push(info);
//            }
//        });
//
//        cb(matches);
//    };
//};
//
//$('#twitter-search .typeahead').typeahead({
//        hint: true,
//        highlight: true,
//        minLength: 1
//    },
//    {
//        name: 'products',
//        source: substringMatcher(products),
//        displayKey: 'name',
//        templates: {
//            suggestion: function(data){
//                return '<p><strong>' + data.name + '</p>';
//            },
//            footer: function(){
//                return '<p style="padding: 3px 10px;"><strong>powered by agni</strong></p>'
//            }
//        }
//    });

function findDealer(){
    var district = $('#districtsSearch').val();
    var wheels = $('#wheelsSearch').val();
    $.ajax({
            method: 'POST',
            dataType: 'json',
            url: window.constants.BASE_URL+'find-dealer',
            data: {district: district, wheels: wheels}
        })
        .success(function(response){
            if(response.length<1){
                $('#dealerSearchResult').html("No Results Found");
                return 0;
            }
            for(i=0;i<response.length;i++){
                $('#dealerSearchResult').html('<div class="col-md-4">' +
                    '<div class="row">'+
                    '<div class="col-md-4 col-xs-4 col-sm-4"><img src="'+constants.BASE_URL+'img/checkinpng.png" width="100%" /></div>'+
                    '<div class="col-md-8 col-xs-8 col-sm-8">'+
                    '<p>'+response[i].name+'</p>' +
                    '<p>'+response[i].address+'</p>' +
                    '<p>Tel: '+response[i].phone+'</p>' +
                    '<p>Fax: '+response[i].fax+'</p>' +
                    '</div>'+
                    '</div>'+
                    '</div>');
            }
        })
        .error(function(response){
            console.log(response);
        });
}

function getProductDetail(){
    var id = $('#productsList').val();
    $.ajax({
            method: 'POST',
            dataType: 'html',
            url: window.constants.BASE_URL+'searchProduct',
            data: {id: id}
        })
        .success(function(response){
            $('.product-result').empty();
            $('.product-result').html(response);

            $('#date').datepicker({
                format: "dd-mm-yyyy",
                daysOfWeekDisabled: "6",
                daysOfWeekHighlighted: "0",
                todayHighlight: true
            });
        })
        .error(function(response){
            console.log(response);
        });
}

function getProductDetailBookVehicle(){
    var id = $('#productsListBookVehicle').val();
    $.ajax({
            method: 'POST',
            dataType: 'html',
            url: window.constants.BASE_URL+'searchProductBookVehicle',
            data: {id: id}
        })
        .success(function(response){
            $('.product-result').empty();
            $('.product-result').html(response);

            $('#date').datepicker({
                format: "dd-mm-yyyy",
                daysOfWeekDisabled: "6",
                daysOfWeekHighlighted: "0",
                todayHighlight: true
            });
        })
        .error(function(response){
            console.log(response);
        });
}

function getSingleProduct(id){

    $(this).css("color", "green");
    $.ajax({
            method: 'POST',
            dataType: 'html',
            url: window.constants.BASE_URL+'product',
            data: {id: id}
        })
        .success(function(response){
            $('.product-result').empty();
            $('.product-result').html(response);
            $('.car').addClass('car-show animated slideInLeft');
        })
        .error(function(response){
            console.log(response);
        });
}

$(document).ready(function(){
    $('.dealerSearchBtn').click(function(){
        findDealer();
    });

    $('#productsList').change(function(){
        getProductDetail();
    });

    $('#productsListBookVehicle').change(function(){
        getProductDetailBookVehicle();
    });

    $('#products').change(function(){
        var id = $('#products').val();
        getSingleProduct(id);
    });
});
