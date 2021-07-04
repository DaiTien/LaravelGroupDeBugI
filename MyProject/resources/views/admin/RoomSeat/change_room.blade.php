<div class="table-responsive">
    <h4>Sơ đồ phòng chiếu</h4>
    <hr>
    <table class="table w-50 table-borderless mx-auto">
        <thead>
        <tr>
            <th class="text-center">Dãy ghế</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="data">
        @foreach($data['name_seat'] as $name_seat)
            <tr>
                <th class="text-center ">
                    <a href="javascript:void(0)" id="{{$name_seat->id}}" class="row_seat active">{{$name_seat->name}}</a>
                </th>
                <td>
                    @foreach($data['seat'][$name_seat->name] as $seat)
                        <input type="checkbox" id="check_{{$seat->id}}" name="{{$name_seat->name.'_'.$seat->seat_number}}" value="{{$seat->id}}" style="display: none"/>
                        <a href="javascript:void(0)" onclick="changStatus({{$seat->id}})" id="{{$seat->id}}" name="{{$name_seat->name.'_'.$seat->seat_number}}" class="seat {{$seat->status ==0 ? "active":""}}">{{$seat->seat_number}}</a>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>