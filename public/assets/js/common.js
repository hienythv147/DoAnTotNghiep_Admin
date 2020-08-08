//delete comfirm
$(document).ready(function () {
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: 'Bạn có chắc muốn xóa?',
            text: "Dữ liệu sẽ bị xóa tạm thời!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: '/live-search',
        data: {},
        dataType: "json",
        success: function(result) {
            $('#search').keyup(function() {
                $('#result').html('');
                var searchField = $('#search').val();
                var expression = new RegExp(searchField, "i");
                if(searchField != '') {
                    $.each(result, function(key, value) {;
                        if(value.name.search(expression) != -1 || String(value.price).search(expression) != -1) {
                            var image = ''
                            var url = "http://"+window.location.hostname+":"+window.location.port+"/product/"+value.id;
                            if(value.image != '') {
                                image = "http://"+window.location.hostname+":"+window.location.port+"/assets/images/products_image/"+value.image;
                            } else {
                                image = "http://"+window.location.hostname+":"+window.location.port+"/assets/images/products_image/not_found.png";
                            }
                            $('#result').append('<li class="list-group-item" style="background: rgba(0, 0, 0, 0.5);" ><a href="'+url+'">' + 
                                '<img style="height: 50px; width: 50px" src="' + image + '"class="img-thumbnail"/>' +
                                '<span style="margin-left: 10px;  color:#fff !important;">' + value.name + ' - ' + value.price +' VND</span>' +
                            '</a></li>');
                        }
                    });
                }
            });
        },
        error: function(err) {
            console.log(err);
        }
    });
});

function toastr(id) {
    $('#flash-message').remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',    
        url: '/add-to-cart',
        data: {
            id
        },
        dataType: 'json',
        success: function(result) {
            $('#cart_amount').text(result.length);
            if(result.length != 0) {
                $('#cart-box').html('');
                var total = 0;
                $("body").append('<div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">' + 'Thêm thành công' + 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
                    '<span aria-hidden="true">&times;</span>'
                    + '</button>' +
                '</div>');
                $.each(result, function(key, value){
                    total += value.price * value.amount;
                    var image = ''
                    if(value.image != '') {
                        image = "http://"+window.location.hostname+":"+window.location.port+"/assets/images/products_image/"+value.image;
                    } else {
                        image = "http://"+window.location.hostname+":"+window.location.port+"/assets/images/products_image/not_found.png";
                    }
                    $('#cart-box').append(
                        '<li><a href="#" class="photo"><img src="' + image + '"' + 'class="cart-thumb" alt="" /></a>' +
                        '<h6><a href="#">' +  value.name + '</a></h6>' + 
                        '<p>' + value.amount + 'x - <span class="price">' + value.price + ' VNĐ</span></p>' + '</li>'
                    )
                });
                $('#cart-box').append(
                    '<li class="total"><a href="/cart" class="btn btn-default hvr-hover btn-cart">Xem</a>' +
                    '<span class="float-right"><strong>Total</strong>: <b>' + total + '</b> VNĐ</span>' + '</li>'
                )   
            }
        },
        error: function(err) {
            console.log(err);
        }
    })
    // set timeout for alert using ajax
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
}

// set timeout for alert
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);

//Load ảnh sau khi chọn
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

// call ajax get history order detail
function historyOrderDetail(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: '/history-order-detail/'+id,
        data: {
            id
        },
        success: function(result) {
            $('#table-content').html('');
            if(result.length != 0) {
                var content = '';
                var count = 1;
                result.forEach(element => {
                    content += "<tr style='font-weight: 1000'>" +
                                    "<td style='text-align: center'>" + count + "</td>" +
                                    "<td>" + element.name + "</td>" +
                                    "<td>" + element.price + "</td>" +
                                    "<td style='text-align: center'>" + element.amount + "</td>" +
                                "</tr>"
                    count++;
                });
                $('#table-content').append(content);
            }
        },
        error: function(err) {
            console.log(err);
        }
    })
}

function deleteRow(btn, id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    Swal.fire({
        title: 'Bạn có chắc muốn xóa sản phẩm này?',
        showCancelButton: true,
        cancelButtonColor: 'grey',
        confirmButtonColor: '#b0b435',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy bỏ'
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                type: 'GET',    
                url: '/remove-product',
                data: {
                    id
                },
                dataType: 'json',
                success: function(resultJson) {
                    // remove item in table
                    var row = btn.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                    // reset view cart
                    $('#cart_amount').text(resultJson.length);
                    $('#cart-box').html('');
                    if(resultJson.length >= 0) {
                        var total = 0;
                        $("body").append('<div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">' + 'Xóa thành công' + 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
                            '<span aria-hidden="true">&times;</span>'
                            + '</button>' +
                        '</div>');
                        $.each(resultJson, function(key, value){
                            total += value.price * value.amount;
                            var image = ''
                            if(value.image != '') {
                                image = "http://"+window.location.hostname+":"+window.location.port+"/assets/images/products_image/"+value.image;
                            } else {
                                image = "http://"+window.location.hostname+":"+window.location.port+"/assets/images/products_image/not_found.png";
                            }
                            $('#cart-box').append(
                                '<li><a href="#" class="photo"><img src="' + image + '"' + 'class="cart-thumb" alt="" /></a>' +
                                '<h6><a href="#">' +  value.name + '</a></h6>' + 
                                '<p>' + value.amount + 'x - <span class="price">' + value.price + ' VNĐ</span></p>' + '</li>'
                            )
                        });
                        $('#cart-box').append(
                            '<li class="total"><a href="/cart" class="btn btn-default hvr-hover btn-cart">Xem</a>' +
                            '<span class="float-right"><strong>Total</strong>: <b>' + total + '</b> VNĐ</span>' + '</li>'
                        )   
                    } else {
                        $('#cart-box').append(
                            '<li class="total"><a href="/cart" class="btn btn-default hvr-hover btn-cart">Xem</a>' +
                            '<span class="float-right"><strong>Total</strong>: <b>0</b> VNĐ</span>' + '</li>'
                        )
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    });
    // set timeout for alert using ajax
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
}

// lear search
function clearSearch() {
    $('#search').val('');
    $('#result').html('');
}

