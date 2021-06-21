<div class="comment-detail-student">
    <div class="avatar-wrap">
        <img src="{{ asset(config('image_path.images')) .'/'. $data['images'] }}" alt="">
    </div>
    <div class="comment-body">
        <div class="comment-body-content">
            <h5>{{ $data['users']}}</h5>
            <div class="comment-body-text">
                <span>{{ $data['content'] }}</span>
            </div>
        </div>
        <div class="comment-body-time">
            <p>
                <span>
                    <span>{{ trans('message.like') }}</span>
                </span>
                <span class="reply-comment">{{ trans('message.reply') }} . {{ $data['created_at']->diffForHumans() }}</span>
            </p>
        </div>
    </div>
</div>
