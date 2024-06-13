<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Heroes extends Controller
{
    public $listHeroes = array(
        array(
            "name" => "ngu_doc",
            "title" => "Ngũ Độc",
            "image" => "main/images/at1.png",
            "noi_cong" => "Chưởng pháp hệ nội công, độc sát kinh hoàng dùng cổ độc trấn phái phong ấn sức mạnh kẻ địch",
            "ngoai_cong" => "Đao pháp hệ ngoại công, độc công toàn diện, chiêu thức không chế, ảnh hưởng mạnh mẽ",
        ),
        array(
            "name" => "nga_mi",
            "title" => "Nga Mi",
            "image" => "main/images/at2.png",
            "noi_cong" => "Kiếm Pháp hệ nội công, thao tác nhanh gọn kiếm khách cơ động xuất quý nhập thần",
            "ngoai_cong" => "Phụ Trợ hệ nội công, thuần thục kiếm pháp. Chiêu thức hổ trợ mạnh mẽ, trị liệu, kháng hiệu ứng",
        ),
        array(
            "name" => "doan_thi",
            "title" => "Đoàn Thị",
            "image" => "main/images/at3.png",
            "noi_cong" => "Khí Công hệ nội công, luyện thể cân bằng cố thể linh động chiến đầu cả xa và gắn",
            "ngoai_cong" => "Chi Pháp hệ ngoại công, chuyên gia cận chiến sức mạnh ngón tay uy lực khắc đá cất vàng",
        ),
        array(
            "name" => "minh_giao",
            "title" => "Minh Giáo",
            "image" => "main/images/at4.png",
            "noi_cong" => "Kiếm Pháp hệ nội công, thao tác nhanh gọn kiếm khách cơ động xuất quý nhập thần",
            "ngoai_cong" => "Chùy Pháp hệ ngoại công, chú trọng thao tác, tần công mạnh mẽ dứt khoát",
        ),
        array(
            "name" => "vo_dang",
            "title" => "Võ Đang",
            "image" => "main/images/at5.png",
            "noi_cong" => "Khí Công hệ nội công, chú trọng thao tác, tinh thông ngự khí áp đảo kẻ thù",
            "ngoai_cong" => "Kiểm Pháp hệ ngoại công, nhân kiểm hợp nhất, kiếm đạo sát thương mạnh mẽ",
        ),
        array(
            "name" => "thuy_yen",
            "title" => "Thúy Yên",
            "image" => "main/images/at6.png",
            "noi_cong" => "Kiểm Pháp hệ nội công, ấn thân biển hóa, kiểm thuật xuất thần bất ngờ khó đoán",
            "ngoai_cong" => "Đao Pháp ngoại công, cực kỳ chú trọng thao tác, tinh thông ám sát và tập kích",
        ),
        array(
            "name" => "thieu_lam",
            "title" => "Thiếu Lâm",
            "image" => "main/images/at7.png",
            "noi_cong" => "Côn Pháp hệ ngoại công, thao tác phức tạp tinh thông tần công mạnh mẽ",
            "ngoai_cong" => "Đao Pháp hệ ngoại công, thao tác đơn giản, chiến pháp du kích, sát thương khó lường",
        ),
        array(
            "name" => "thien_vuong",
            "title" => "Thiên Vương",
            "image" => "main/images/at8.png",
            "noi_cong" => "Thương Pháp hệ ngoại công, thao tác dứt khoát, tần công mạnh mẽ uy lực",
            "ngoai_cong" => "Chùy Pháp hệ ngoại công, thao tác dứt khoát, giỏi phòng ngự, sinh lực bến bi",
        ),
        array(
            "name" => "cai_bang",
            "title" => "Cái Bang",
            "image" => "main/images/at9.png",
            "noi_cong" => "Chưởng Pháp hệ nội công, bao tay làm vũ khí, tính thông Hàng Long Chưởng Pháp",
            "ngoai_cong" => "Bổng Pháp hệ ngoại công, lấy gậy làm vũ khí, tính thông tuyệt kỹ Đá Cẩu Bồng",
        ),
        array(
            "name" => "duong_mon",
            "title" => "Đường Môn",
            "image" => "main/images/at10.png",
            "noi_cong" => "Tụ Tiễn hệ nội công, lẩy ám khí làm vũ khí, tần công tầm xa chú trọng thao tác",
            "ngoai_cong" => "Hãm Tỉnh hệ ngoại công, bộc thấy bảy thuật, tần công tấm xa kèm cạm bảy nguy hiểm",
        ),
        array(
            "name" => "thien_nhan",
            "title" => "Thiên Nhẫn",
            "image" => "main/images/at11.png",
            "noi_cong" => "Ma Nhẫn hệ nội công, trọng thao tác, có thể sử dụng nhiều loại dị thuật",
            "ngoai_cong" => "Chiến Nhân hệ ngoại công, trọng thao tác là ky binh hùng mạnh xung phong hãm trận",
        ),
        array(
            "name" => "con_lon",
            "title" => "Côn Lôn",
            "image" => "main/images/at12.png",
            "noi_cong" => "Kiểm Pháp hệ nội công, sở trường lối sát, tần công kiểm khí tung hoành",
            "ngoai_cong" => "Đao Phầp hệ ngoại công, số trưởng phong sát tấn công mạnh mẽ như vũ bão",
        ),
    );
    static public function getListHeroes(){
        $heroModel = new Heroes();
        $listHeroes = $heroModel->listHeroes;
        return $listHeroes;
    }
}
