<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class heroes extends Controller
{
    public $listHeroes = array(
        array(
            "id" => "ngu_doc",
            "name" => "Ngũ Độc",
            "image" => "main/images/at1.png",
            "link" => "heroDetails/ngu_doc",
            "noi_cong" => "Chưởng pháp hệ nội công, độc sát kinh hoàng dùng cổ độc trấn phái phong ấn sức mạnh kẻ địch",
            "ngoai_cong" => "Đao pháp hệ ngoại công, độc công toàn diện, chiêu thức không chế, ảnh hưởng mạnh mẽ",
        ),
        array(
            "id" => "nga_mi",
            "name" => "Nga Mi",
            "image" => "main/images/at2.png",
            "link" => "heroDetails/nga_mi",
            "noi_cong" => "Kiếm Pháp hệ nội công, thao tác nhanh gọn kiếm khách cơ động xuất quý nhập thần",
            "ngoai_cong" => "Phụ Trợ hệ nội công, thuần thục kiếm pháp. Chiêu thức hổ trợ mạnh mẽ, trị liệu, kháng hiệu ứng",
        ),
        array(
            "id" => "doan_thi",
            "name" => "Đoàn Thị",
            "image" => "main/images/at3.png",
            "link" => "heroDetails/doan_thi",
            "noi_cong" => "Khí Công hệ nội công, luyện thể cân bằng cố thể linh động chiến đầu cả xa và gắn",
            "ngoai_cong" => "Chi Pháp hệ ngoại công, chuyên gia cận chiến sức mạnh ngón tay uy lực khắc đá cất vàng",
        ),
        array(
            "id" => "minh_giao",
            "name" => "Minh Giáo",
            "image" => "main/images/at4.png",
            "link" => "heroDetails/minh_giao",
            "noi_cong" => "Kiếm Pháp hệ nội công, thao tác nhanh gọn kiếm khách cơ động xuất quý nhập thần",
            "ngoai_cong" => "Chùy Pháp hệ ngoại công, chú trọng thao tác, tần công mạnh mẽ dứt khoát",
        ),
        array(
            "id" => "vo_dang",
            "name" => "Võ Đang",
            "image" => "main/images/at5.png",
            "link" => "heroDetails/vo_dang",
            "noi_cong" => "heroDetails/nga_mi",
            "ngoai_cong" => "heroDetails/nga_mi",
        ),
        array(
            "id" => "thuy_yen",
            "name" => "Thúy Yên",
            "image" => "main/images/at6.png",
            "link" => "heroDetails/thuy_yen",
            "noi_cong" => "heroDetails/nga_mi",
            "ngoai_cong" => "heroDetails/nga_mi",
        ),
        array(
            "id" => "thieu_lam",
            "name" => "Thiếu Lâm",
            "image" => "main/images/at7.png",
            "link" => "heroDetails/thieu_lam",
            "noi_cong" => "Côn Pháp hệ ngoại công, thao tác phức tạp tinh thông tần công mạnh mẽ",
            "ngoai_cong" => "Đao Pháp hệ ngoại công, thao tác đơn giản, chiến pháp du kích, sát thương khó lường",
        ),
        array(
            "id" => "thien_vuong",
            "name" => "Thiên Vương",
            "image" => "main/images/at8.png",
            "link" => "heroDetails/thien_vuong",
            "noi_cong" => "Thương Pháp hệ ngoại công, thao tác dứt khoát, tần công mạnh mẽ uy lực",
            "ngoai_cong" => "Chùy Pháp hệ ngoại công, thao tác dứt khoát, giỏi phòng ngự, sinh lực bến bi",
        ),
        array(
            "id" => "cai_bang",
            "name" => "Cái Bang",
            "image" => "main/images/at9.png",
            "link" => "heroDetails/cai_bang",
            "noi_cong" => "Chưởng Pháp hệ nội công, bao tay làm vũ khí, tính thông Hàng Long Chưởng Pháp",
            "ngoai_cong" => "Bổng Pháp hệ ngoại công, lấy gậy làm vũ khí, tính thông tuyệt kỹ Đá Cẩu Bồng",
        ),
        array(
            "id" => "duong_mon",
            "name" => "Đường Môn",
            "image" => "main/images/at10.png",
            "link" => "heroDetails/duong_mon",
            "noi_cong" => "Tụ Tiễn hệ nội công, lẩy ám khí làm vũ khí, tần công tầm xa chú trọng thao tác",
            "ngoai_cong" => "Hãm Tỉnh hệ ngoại công, bộc thấy bảy thuật, tần công tấm xa kèm cạm bảy nguy hiểm",
        ),
        array(
            "id" => "thien_nhan",
            "name" => "Thiên Nhẫn",
            "image" => "main/images/at11.png",
            "link" => "heroDetails/thien_nhan",
            "noi_cong" => "Ma Nhẫn hệ nội công, trọng thao tác, có thể sử dụng nhiều loại dị thuật",
            "ngoai_cong" => "Chiến Nhân hệ ngoại công, trọng thao tác là ky binh hùng mạnh xung phong hãm trận",
        ),
        array(
            "id" => "con_lon",
            "name" => "Côn Lôn",
            "image" => "main/images/at12.png",
            "link" => "heroDetails/con_lon",
            "noi_cong" => "Kiểm Pháp hệ nội công, sở trường lối sát, tần công kiểm khí tung hoành",
            "ngoai_cong" => "Đao Phầp hệ ngoại công, số trưởng phong sát tấn công mạnh mẽ như vũ bão",
        ),
    );
    function getListHeroes(){
        $listHeroes = $this->listHeroes;
        return view('main.heroes',["listHeroes"=>$listHeroes]);
    }

    function getDetailHero($id){
        $listHeroes = $this->listHeroes;
        $return = array();
        foreach ($listHeroes as $hero){
            if($id == $hero["id"]){
                $return = $hero;
            }
        }
        return view('main.heroDetails',["hero"=>$return]);
    }
}
