<div>
    <div class="w-full grid grid-cols-6">
        @foreach ($medias->take(2) as $key => $media)
            <div class=" col-span-3 ">
                @if ($media->type == 'image')
                    <img id="{{ $key }}"
                        class="h-60 "
                        src="{{ \App\Helpers\Gdrive::disk($media->file_id) }}"
                        alt="photo-{{ $key }}">
                @endif
            </div>
        @endforeach
    </div>
</div>
