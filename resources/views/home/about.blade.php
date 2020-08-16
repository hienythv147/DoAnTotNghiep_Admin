@extends('layout_user')

@section('body')
<!-- Start All Title Box -->
{{-- <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Liên hệ</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<!-- End All Title Box -->

<!-- Start About Page  -->
<div class="about-box-main">
{{-- <div> --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-frame"> <img class="img-fluid" src="{{ asset('assets/images/about_us.jpg') }}" alt="" />
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="noo-sh-title-top">Chúng tôi là <span>Cafe SP</span></h2>
                <p>" Theo thói quen tìm kiếm và sử dụng dịch vụ của đại đa số người dùng hiện nay, trước khi đi đến một quán ăn, quán nước hay cửa hiệu nào đó, họ đều cũng sẽ tìm kiếm trên Internet trước khi đưa ra quyết định, điều này giúp họ tiết kiệm được thời gian đi lại, đồng thời dễ đưa ra các lựa chọn đúng, phù hợp với nhu cầu. Và việc truy cập các thiết kế website ẩm thực online, review quán ăn chuyên nghiệp chính là một cách để giúp họ làm điều đó. </p>
                <p>Ngay từ giai đoạn đầu, sẽ có một Quản lí giúp hổ trợ giữ mối liên hệ thường xuyên với khách hàng trong suốt thời gian thực hiện dự án xây dựng website. Quản lí sẽ sắp xếp một buổi tư vấn (trực tiếp hoặc qua điện thoại) để thảo luận về yêu cầu và xác định mục tiêu chính cho website. Khi hiểu rõ mục đích chủ yếu của khách hàng, đơn vị thiết kế website sẽ xác định gói thiết kế web phù hợp với yêu cầu của họ nhất. Quản lí sẽ cung cấp cho khách hàng một kế hoạch xây dựng website để giúp họ giải quyết tốt các yêu cầu cần thiết cho trang web. </p>
                <p>Việc thiết kế web bán đồ ăn vặt, thức ăn nhanh hỗ trợ mạnh mẽ cho các doanh nghiệp trong việc kinh doanh.</p>
                <a class="btn hvr-hover" href="{{ Route('home') }}">Tìm hiểu thêm</a>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>Đáng tin cậy</h3>
                    <p>Quy trình phát triển website chuẩn được mô phỏng theo mô hình thác nuớc, các giai đọan chủ chốt được chia thành các công đọan nhỏ hơn, cho phép thực hiện việc thiết kế web song song một lúc nhiều công đọan. Quy trình chuẩn có thể được chúng tôi thêm, bớt hoặc thay đổi để phù hợp với nhu cầu của dự án. </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>chuyên nghiệp</h3>
                    <p>Lấy thông tin yêu cầu của khách hàng và nghiên cứu tính khả thi. </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>Là chuyên gia</h3>
                    <p> Quy trình phát triển website chuẩn được mô phỏng theo mô hình thác nuớc, các giai đọan chủ chốt được chia thành các công đọan nhỏ hơn, cho phép thực hiện việc thiết kế web song song một lúc nhiều công đọan. Quy trình chuẩn có thể được chúng tôi thêm, bớt hoặc thay đổi để phù hợp với nhu cầu của dự án.</p>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
<!-- End About Page -->
@endsection