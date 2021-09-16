@foreach ($notifications as $item)
    <a href="{{ route('singleCourseNotification', [$item->data['course_id'], $item->id]) }}" class="notification-link-course">
        <div class="notify-item">
            <div class="notify-img">
                <img src="{{ asset(config('image_path.images') .'/'. $item->data['images']) }}" alt="">
            </div>
            <div class="notify-info">
                <h6>{{ $item->data['user'] }}</h6>
                <p>{{ trans('message.left_comment') }} <strong>{{ $item->data['course_name'] }}</strong></p>
                <span>{{ $item->created_at->diffForHumans() }}</span>
            </div>
            @if ($item->read_at === null)
                <div class="dot">
                    <span></span>
                </div>
            @endif
        </div>
    </a>
@endforeach
