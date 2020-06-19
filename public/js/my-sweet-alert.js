$(document).ready(function () {
    $('.xoa_linh_vuc').click(function () {
        Swal.fire({
            title: 'Bạn có muốn xóa không?',
            text: 'Dữ liệu sẽ bị xóa tạm thời!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Xóa thành công!',
                    'Đã xóa lĩnh vực',
                    'success'
                ).then((result) => {
                    if (result.value) {
                        window.location.href = $(this).data('href')
                    };
                });
            };
        });
    });
    $('.xoa_cau_hoi').click(function () {
        Swal.fire({
            title: 'Bạn có muốn xóa không?',
            text: 'Dữ liệu sẽ bị xóa tạm thời!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Xóa thành công!',
                    'Đã xóa câu hỏi',
                    'success'
                ).then((result) => {
                    if (result.value) {
                        window.location.href = $(this).data('href')
                    };
                });
            };
        });
    });
});
//
