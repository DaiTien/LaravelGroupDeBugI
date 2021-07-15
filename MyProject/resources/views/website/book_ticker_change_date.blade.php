<div class="pricing-box-content">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active">
            @if(count($data)>0)
                @foreach($data as $item)
                    <div class="xuatchieu">
                        <div class="title__room">
                            <h4>{{$item->showTimeRoom->name}}</h4>
                        </div>
                        <ul class="time__list">
                            <li class="time__item">
                                <a href="javascript:void(0)" id="{{$item->id}}"
                                   class="time__link btn_showtime">{{$item->time_start}}
                                    - {{$item->time_end}}</a>
                            </li>
                        </ul>
                    </div>
                @endforeach
            @else
                <p>Chưa có lịch chiếu cho ngày này. Xin cám ơn.</p>
            @endif
        </div>
    </div>
    <input type="text" name="show_id" hidden>
</div>
<script>
    $(document).on('click', 'a.btn_showtime', function () {
        $show_time_id = $(this).attr('id');
        // alert($show_time_id);
        $(this).addClass('showtime_active');
        $(this).removeClass('time__link');
        $("input[name*='show_id']").val('');
        $("input[name*='show_id']").val($show_time_id);
        $("a.btn_next").removeClass('disable_btn_next');
        $("a.btn_next").attr('disabled', false);

    });
    $(document).ready(function () {
        $("a.btn_next").attr('disabled', true);
        $("a.btn_next").addClass('disable_btn_next');
    })
</script>
