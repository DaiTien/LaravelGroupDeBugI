<div class="modal-body tab-content">
    <table class="table table_detail">
        <tbody>

        <tr>
            <th>Tổng ghế đặt:</th>
            <td>{{$data['detail']->total_seat}}</td>
        </tr>
        <tr>
            <th>Tổng tiền:</th>
            <td>{{$data['detail']->total_price}}</td>
        </tr>
        <tr>
            <th>Giảm giá:</th>
            <td>{{$data['detail']->discount}} VND</td>
        </tr>
        <tr>
            <th>Phòng đặt:</th>
            <td>{{$data['detail']->room_name}}</td>
        </tr>
        <tr>
            <th>Vị trí ghế đặt:</th>
            <td>
                @foreach($data['name_seat'] as $item)
                    {{$item->seat_name}}{{$item->seat_location}} &nbsp;
                @endforeach
            </td>
        </tr>

        </tbody>
    </table>
</div>
