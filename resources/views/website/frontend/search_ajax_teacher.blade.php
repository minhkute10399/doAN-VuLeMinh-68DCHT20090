@foreach ($data as $item)
<section class="section">
    <div class="subject">
        <div class="subject-class">
            <img src="{{ config('image_path.images') .'/'. $item['images'] }}" alt=""
                class="img-subject-class">
        </div>
        <div class="content-popular-class">
            <div class="title-popular-class">
                <h6>{{ $item['name'] }}</h6>
            </div>
            <p>{{ $item['email'] }}</p>
            <ul class="info-subject subject-teacher">
                <li class="type-teachers">
                    <a href="{{ route('lessons.show', $item['id']) }}">{{ trans('message.detail') }}</a>
                </li>
            </ul>
        </div>
    </div>
</section>
@endforeach
