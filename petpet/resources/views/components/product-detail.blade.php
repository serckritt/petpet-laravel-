@props(['category'])

<div id="menu1">
    <div class="box1">유의사항</div>
    <div class="box5">
        - 본 제품은 반려동물을 위한 상품으로, 이외의 사용을 금합니다.<br>
        - 아이가 안전하게 사용 할 수 있도록 보호자의 관찰이 필요합니다.<br>
        ※ 교환/반품 시 포장의 훼손없이 받으신 그대로 포장해주셔야 합니다.
    </div>
    <div class="box1">상품설명</div>
    <div class=" tablebox">
        <table class="atable">
            @switch($category)
                @case(1)
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">품명</td>
                        <td colspan = "4"class="table3"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">용량</td>
                        <td colspan = "4"class="table3"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">유통기한</td>
                        <td colspan = "4" class="table3">용기 측면 별도 표시일까지</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="table1" style="width:300px;height:50px; text-align:center; ">성분량</td>
                        <td class="table4">단백질</td>
                        <td class="table4">수분</td>
                        <td class="table4">지방</td>
                        <td class="table4">칼슘</td>
                    </tr>
                    <tr>
                        <td class="table4"></td>
                        <td class="table4"></td>
                        <td class="table4"></td>
                        <td class="table4"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px;height:50px; text-align:center; ">원산지</td>
                        <td colspan = "4"class="table3">국내산</td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">고객센터</td>
                        <td colspan = "4" class="table3">031 - 740 - 1114</td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">교환/반품 주소</td>
                        <td colspan = "4"class="table3">경기도 성남시 신구대학교</td>
                    </tr>
                    @break
                @case(2)
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">품명</td>
                        <td class="table3"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">용량</td>
                        <td class="table3"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">유통기한</td>
                        <td  class="table3">용기 측면 별도 표시일까지</td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px;height:50px; text-align:center; ">효능</td>
                        <td class="table4"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px;height:50px; text-align:center; ">원산지</td>
                        <td class="table3">국내산</td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">고객센터</td>
                        <td  class="table3">031 - 740 - 1114</td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">교환/반품 주소</td>
                        <td class="table3">경기도 성남시 신구대학교</td>
                    </tr>
                    @break
                @case(3)
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">품명</td>
                        <td class="table3"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">색상</td>
                        <td class="table3"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">사이즈</td>
                        <td class="table3"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px;height:50px; text-align:center; ">재질</td>
                        <td class="table3"></td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px;height:50px; text-align:center; ">원산지</td>
                        <td class="table3">국내산</td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">고객센터</td>
                        <td class="table3">031 - 740 - 1114</td>
                    </tr>
                    <tr>
                        <td class="table1" style="width:300px; height:50px; text-align:center; ">교환/반품 주소</td>
                        <td class="table3">경기도 성남시 신구대학교</td>
                    </tr>
                    @break
            @endswitch
        </table>
    </div>
</div>