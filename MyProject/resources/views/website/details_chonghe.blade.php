<div class="tab-content">
    <div class="pricing-box-header">
        <div class="pricing-name">
            Chọn ghế
        </div>
    </div>
    <div class="pricing-box-content">
        <div class="chair__content">
            <div class="chair__content-sidebar">
                <ul class="list__sreen">
                    <li class="list__item">
                        <p class="list__color"></p>
                        <span class="list__title">Đang chọn</span>
                    </li>
                    <li class="list__item">
                        <p class="list__color"></p>
                        <span class="list__title">Đã được chọn</span>
                    </li>
                    <li class="list__item">
                        <p class="list__color"></p>
                        <span class="list__title">Có thế chọn</span>
                    </li>
                    <li class="list__item">
                        <p class="list__color"></p>
                        <span class="list__title">Không thể chọn </span>
                    </li>

                </ul>
                <h5 class="screen">
                    Màn hình
                </h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="text-left" colspan="5">Dãy ghế</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['name_seat'] as $name)
                        <tr>
                            <th class="text-left scope="><a href="javascript:void(0)" class="chair__link disabled"
                                                            tabindex="-1">{{$name->name}}</a></th>
                            @foreach ($data['seat'][$name->name] as $seat)
                                <td><a href="javascript:void(0)" id="{{$seat->id}}" onclick="choose_seat({{$seat->id}})"
                                       name="{{ $name->name . '' . $seat->seat_number}}"
                                       class="chair__link chair__link--active
                                       {{$seat->status ==1?'ghe_khongthechon':($seat->status ==2?'ghe_dachon':'')}}">{{ $seat->seat_number }}</a>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div hidden>
    <input id="txtDanhSachChecked" name="ds_id" type="text"/>
    <input id="txtCountChecked" name="count" type="text"/>
    <input id="txtDanhSachGhe" name="ds_id" type="text"/>
    <input id="txtCountSeat" name="count" type="text"/>
</div>

<script>
    $(document).ready(function () {
        $('a.btn_next').css('display', 'none')
        $('a.btn_tickket').css('display', 'block')
    });

    function choose_seat(id) {
        if ($('a#' + id).hasClass('ghe_dangchon')) {
            $('a#' + id).removeClass('ghe_dangchon');
        } else {
            $('a#' + id).addClass('ghe_dangchon');
        }
        var name_seat = $('a#' + id).attr('name');
        // console.log(name_seat)
        var arrValue = document.getElementById("txtDanhSachChecked").value;
        var arr = document.getElementById("txtDanhSachGhe").value;
        // console.log(arrValue)
        // console.log(arr)
        var array = JSON.parse("[" + arrValue + "]");
        var array2 = arr.split(',')
        // var arraySeat = [];
        var index = array.indexOf(id);
        var indexSeat = array2.indexOf(name_seat);
        if (index != -1) {
            array.splice(index, 1);
            array2.splice(indexSeat, 1);
            document.getElementById("txtDanhSachChecked").value = array;
            document.getElementById("txtDanhSachGhe").value = array2;
            document.getElementById("txtCountChecked").value = document.getElementById("txtCountChecked").value - 1;
            document.getElementById("txtCountSeat").value = document.getElementById("txtCountSeat").value - 1;
        } else {
            // arraySeat=arraySeat.push(name_seat);
            document.getElementById("txtCountChecked").value = array.push(id);
            document.getElementById("txtCountSeat").value = array2.push(name_seat);
            document.getElementById("txtDanhSachChecked").value = array;
            document.getElementById("txtDanhSachGhe").value = array2;
        }
        // console.log(arraySeat)
    }
</script>
