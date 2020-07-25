
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
                console.log(url);
                window.location.href = url;
            }
        });
    });
})

function toastr(id) {
    $('#flash-message').remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',    
        url: '/add-to-cart?spId='+id,
        data: {
            id
        },
        dataType: 'json',
        success: function(result) {
            $('#cart_amount').text(result.length);
            console.log(result.length);
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
                    if(value.image == '') {
                        value.image = 'not_found.png';
                    }
                    $('#cart-box').append(
                        '<li><a href="#" class="photo"><img src="assets/images/products_image/' + value.image + '"' + 'class="cart-thumb" alt="" /></a>' +
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
        },
        complete: function() {
            $('#btn-add-to-cart-'+id).prop('disabled', false);
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


