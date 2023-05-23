@extends('frontend.design.master')
@section('meta')
    <meta name="keywords" content="{{ $lecture->keywords }}">
    <meta name="description" content="{{ $lecture->description }}">
    <meta name="author" content="{{ setting()->site_name }}">
    <meta property="og:title" content="{{ $lecture->name }}">
    <meta property="og:image" content="{{ $lecture->image->file_name === null ? asset('frontend/img/lectures.png') : asset('Files/image/Lectures/'.$lecture->name.'/'. $lecture->image->file_name) }}">
    <meta property="og:url" content="https://hamadalhajri.net/lectures/{{ $lecture->slug }}">
    <meta id="faceDes" property="og:description">
    <meta property="og:sitename" content="{{ setting()->site_name }}">
@endsection
@section('css')
@endsection
@section('title')
    {{ $lecture->name }}
@endsection
@section('content')
    <!-- start content -->
    <div class="content">
        <hr />
        <div class="allCont row m-0">
            <div class="col-lg-9 contentTopic">
                <div class="contentTitle">
                    <i class="fas fa-pen-square"></i>
                    <h1> {{ $lecture->name }} </h1>
                </div>
                <div class="contentDetails row m-0">
                    <div class="col-md-6">
                        <div class="filter mb-3">
                            <i style="transform: rotate(90deg);font-size: 20px;margin: 0 5px;"
                                class="fas fa-level-down-alt icon-path"></i>
                            <span>
                                <a style="color: var(--main-color);font-weight:bold;margin-left: 8px;"
                                    href="{{ route('frontend.lectures.all-lectures') }}"
                                    title="{{ trans('frontend.lectures') }}">{{ trans('frontend.lectures') }}</a>
                            </span>
                            <i class="far fa-window-minimize dash-icon"></i>
                            <span>
                                <a style="color: var(--main-color);font-weight:bold;"
                                    href="{{ route('frontend.lectures.category.lectures', $lecture->category->slug) }}"
                                    title="{{ $lecture->category->name }}">{{ $lecture->category->name }}</a>
                            </span>
                        </div>
                        <div class="publishDate d-flex">
                            <i class="fas fa-calendar"></i>
                            <p>
                                {{ trans('lectures.publish-date') }} :
                                <span>{{ $lecture->publish_date->format('Y-m-d') }}</span>
                            </p>
                        </div>
                        <div class="watchCount d-flex">
                            <i class="fas fa-eye"></i>
                            <p>
                                {{ trans('frontend.views-count') }}:
                                <span>{{ $lecture->view_count }}</span>
                            </p>
                        </div>
                        <div class="downCount d-flex">
                            <i class="fas fa-download"></i>
                            <p>
                                {{ trans('frontend.download-count') }}:
                                <span class="downloaders">{{ $lecture->download_count }}</span>
                            </p>
                        </div>
                        <div class="shareContent d-flex">
                            <i class="fas fa-share-alt-square"></i>
                            <p>{{ trans('frontend.share') }}</p>
                        </div>
                        <div class="col-11 socialShare">
                            <a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={{ route('frontend.lectures.lecture_content', $lecture->slug) }}&ct=1&title={{ $lecture->name }} &pco=tbxnj-1.0"
                                rel="nofollow" target="_blank"><i class="fab fa-facebook facebook"></i></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{ route('frontend.lectures.lecture_content', $lecture->slug) }}&ct=1&title={{ $lecture->name }} &pco=tbxnj-1.0"
                                rel="nofollow" target="_blank"><i class="fab fa-twitter twitter"></i></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/whatsapp/offer?url={{ route('frontend.lectures.lecture_content', $lecture->slug) }}&ct=1&title={{ $lecture->name }} &pco=tbxnj-1.0"
                                rel="nofollow" target="_blank"><i class="fab fa-whatsapp whatsapp"></i></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/messenger/offer?url={{ route('frontend.lectures.lecture_content', $lecture->slug) }}&ct=1&title={{ $lecture->name }} &pco=tbxnj-1.0"
                                rel="nofollow" target="_blank"><i class="fab fa-facebook-messenger messenger"></i></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/gmail/offer?url={{ route('frontend.lectures.lecture_content', $lecture->slug) }}&ct=1&title={{ $lecture->name }} &pco=tbxnj-1.0"
                                rel="nofollow" target="_blank"><i class="fas fa-envelope gmail"></i></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/telegram/offer?url={{ route('frontend.lectures.lecture_content', $lecture->slug) }}&ct=1&title={{ $lecture->name }} &pco=tbxnj-1.0"
                                rel="nofollow" target="_blank"><i class="fab fa-telegram-plane telegram"></i></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/viber/offer?url={{ route('frontend.lectures.lecture_content', $lecture->slug) }}&ct=1&title={{ $lecture->name }} &pco=tbxnj-1.0"
                                rel="nofollow" target="_blank"><i class="fab fa-viber viber"></i></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/lineme/offer?url={{ route('frontend.lectures.lecture_content', $lecture->slug) }}&ct=1&title={{ $lecture->name }} &pco=tbxnj-1.0"
                                rel="nofollow" target="_blank"><i class="fab fa-line line"></i></a>
                        </div>
                        <hr />
                        <div class="row m-0">
                            <div class="col-md-12 col-lg-6 downloadPdf d-flex">
                                <i class="fas fa-download"></i>
                                <button class="btnAllFiles">{{ trans('frontend.download') }}</button>
                                <ul class="allPdfFiles pdfListAction">
                                    @forelse ($lecture->attachments as $file)
                                        <li>
                                            <i class="fas fa-file-pdf"></i>
                                            <a id="download-numbers" download title="{{ $file->file_name }}"
                                                href="{{ asset('Files/Pdf-Files/Lectures/' . $lecture->name . '/' . $file->file_name) }}">
                                                {{ $file->file_name }}</a>
                                        </li>
                                    @empty
                                        <span class="noFiles">{{ trans('frontend.no-files') }}</span>
                                    @endforelse



                                </ul>
                            </div>
                            <?php
                            $client_id = auth()
                                ->guard('client')
                                ->id();
                            $check = App\Models\Wish::with('client')
                                ->where('client_id', $client_id)
                                ->where('wishable_type', 'App\Models\Lecture')
                                ->where('wishable_id', $lecture->id)
                                ->first();

                            ?>
                            <div class="col-md-12 col-lg-6 p-0 mb-2 loveContent d-flex">
                                @if ($check)
                                    <button class="addToWish like loveContent" data-id="{{ $lecture->id }}">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                @else
                                    <button class="addToWish loveContent" data-id="{{ $lecture->id }}">
                                        <i class="far fa-heart"></i>
                                    </button>
                                @endif

                                <span> {{ trans('frontend.add-wish') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 contentImg">
                        @if (!empty($lecture->image->file_name))
                            <img src="{{ asset('Files/image/Lectures/' . $lecture->name . '/' . $lecture->image->file_name) }}"
                                class="img-fluid" title="{{ $lecture->name }}" alt="{{ $lecture->name }}" />
                        @else
                            <img src="{{ asset('frontend/img/lectures.webp') }}" class="img-fluid" title="{{ $lecture->name }}"
                                alt="{{ $lecture->name }}" />
                        @endif
                    </div>
                    <hr class="mt-2" />
                    <!-- content -->
                    <div class="textEditor mt-4">
                        <p>
                            {!! $lecture->content !!}
                        </p>
                        <div class="audioFile mt-5">
                            @foreach ($lecture->audioes as $audio)
                                @if (!empty($audio->audio_file))
                                    <audio controls="" download="">
                                        <source
                                            src="{{ asset('Files/audioes/' . $lecture->name . '/' . $audio->audio_file) }}" />
                                    </audio>
                                @endif
                            @endforeach

                        </div>
                        <div class="vedioFile text-center">
                            @foreach ($lecture->videos as $video)
                            @if (!empty($video->video_file))
                            <video width="320" height="240" controls>
                                    <source
                                        src="{{ asset('Files/videos/' . $lecture->name . '/' . $video->video_file) }}" />
                                    </video>
                            @endif
                        @endforeach

                        </div>
                        <div class="embeedVideo">
                            @foreach ($lecture->audioes as $audio)
                                <?php
                                $url = getYoutubeId($audio->embed_link);
                                ?>
                                @if ($url)
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/{{ $url }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @endif
                            @endforeach
                        </div>
                        <div class="embeedAudio">
                            @foreach ($lecture->videos as $video)
                                @php
                                    $url = getYoutubeId($video->youtube_link);
                                @endphp
                                @if ($url)
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/{{ $url }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- start comment -->
                <hr />
                <div class="comments">
                    <h3 class="allCommentsHead">{{ trans('frontend.comments') }}</h3>
                    <div class="allCommentContent">
                        @forelse ($lecture->comments as $comment)
                            @if ($comment->status == 1)
                                <div class="commentBox">
                                    <i class="fas fa-user-circle"></i>
                                    <div class="comBox">
                                        <h5>{{ $comment->client->full_name }}</h5>
                                        <span>{{ $comment->created_at->format('Y-m-d') }}</span>
                                        <p>
                                            {{ $comment->message }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <span>{{ trans('frontend.no-comment') }}</span>
                        @endforelse
                    </div>
                    <hr />
                    <div class="addComment">
                        <h4 class="addCommentHead"> {{ trans('frontend.add-comment') }}</h4>
                        <form action="" method="">
                            @csrf
                            <input type="hidden" name='lecture_id' value={{ $lecture->id }}>
                            <textarea class="count-limit" name="message" id="textAreaContent" cols="30" rows="10"
                                placeholder="{{ trans('frontend.comment') }}"></textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="countLimit">
                                <button title=" {{ trans('frontend.send') }}"
                                    class="saveComment main-btns m-auto d-block mt-4 p-2 pe-3 ps-3" id="save_comment">
                                    {{ trans('frontend.send') }}
                                </button>
                                <p class="error-msg"> {{ trans('frontend.message-count') }} </p>
                                <p class="num-lim">
                                    <span class="counting">0</span>
                                    /
                                    <span class="limitVal"></span>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end comment -->
            </div>
            <!-- start side defult links  -->
            <div class="col-lg-3 sideDefultLinks">
                <h2> {{ trans('frontend.random-lecture') }}</h2>
                <div class="row m-0">
                    @forelse ($randomLectures->except($lecture->id) as $random)
                    @if ($random->lecture_category_id == $lecture->lecture_category_id)
                        <div class="col-12 categoriesCard">
                            <div class="card h-100">
                                @if (!empty($random->image->file_name))
                                    <img src="{{ asset('Files/image/Lectures/' . $random->name . '/' . $random->image->file_name) }}"
                                        class="card-img-top" title="{{ $random->name }}" alt="{{ $random->name }}" />
                                @else
                                    <img src="{{ asset('frontend/img/lectures.webp') }}" class="card-img-top"
                                        title="{{ $random->name }}" alt="{{ $lecture->name }}" />
                                @endif
                                <div class="card-body">
                                    <div class="d-inline-flex mt-3">
                                        <i class="fas fa-pen-square title-icon m-1 me-0"></i>
                                        <h6 class="card-title mt-2">
                                            {{ \Illuminate\Support\Str::limit($random->name, 25) }}
                                        </h6>
                                    </div>

                                    <div class="date-details">
                                        <i class="fas fa-calendar-alt date-icon m-1 me-0"></i>
                                        <span>{{ $random->publish_date->format('Y-m-d') }}</span>
                                    </div>
                                    <div class="card-text d-flex mt-2">
                                        <i class="fas fa-book-open book-icon m-1 me-0"></i>
                                        <p>يقدم ا.د حمد بن محمد الهاجرى محاضرة بعنوان
                                            {{ \Illuminate\Support\Str::limit($random->name, 30) }}
                                        </p>
                                    </div>
                                    <div class="text-center m-2">
                                        <a href="{{ route('frontend.lectures.lecture_content', $random->slug) }}"
                                            class="btn-card-more"
                                            title="{{ trans('frontend.more') }}">{{ trans('frontend.more') }}</a>
                                    </div>
                                    <p class="allWatch">
                                        <i class="fas fa-eye"></i>
                                        <span>{{ $random->view_count }}</span>
                                    </p>
                                    <p class="allDown">
                                        <i class="fas fa-download"></i>
                                        <span>{{ $random->download_count }}</span>
                                    </p>
                                </div>
                                <?php
                                $client_id = auth()
                                    ->guard('client')
                                    ->id();
                                $check = App\Models\Wish::with('client')
                                    ->where('client_id', $client_id)
                                    ->where('wishable_type', 'App\Models\Lecture')
                                    ->where('wishable_id', $random->id)
                                    ->first();

                                ?>
                                @if ($check)
                                    <button class="addToWish" data-id="{{ $random->id }}">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                @else
                                    <button class="addToWish" data-id="{{ $random->id }}">
                                        <i class="far fa-heart"></i>
                                    </button>
                                @endif

                            </div>
                        </div>
                        @else
                        <div class="col-12 categoriesCard">
                            <div class="card h-100">
                                @if (!empty($random->image->file_name))
                                    <img src="{{ asset('Files/image/Lectures/' . $random->name . '/' . $random->image->file_name) }}"
                                        class="card-img-top" title="{{ $random->name }}" alt="{{ $random->name }}" />
                                @else
                                    <img src="{{ asset('frontend/img/lectures.webp') }}" class="card-img-top"
                                        title="{{ $random->name }}" alt="{{ $lecture->name }}" />
                                @endif
                                <div class="card-body">
                                    <div class="d-inline-flex mt-3">
                                        <i class="fas fa-pen-square title-icon m-1 me-0"></i>
                                        <h6 class="card-title mt-2">
                                            {{ \Illuminate\Support\Str::limit($random->name, 25) }}
                                        </h6>
                                    </div>

                                    <div class="date-details">
                                        <i class="fas fa-calendar-alt date-icon m-1 me-0"></i>
                                        <span>{{ $random->publish_date->format('Y-m-d') }}</span>
                                    </div>
                                    <div class="card-text d-flex mt-2">
                                        <i class="fas fa-book-open book-icon m-1 me-0"></i>
                                        <p>يقدم ا.د حمد بن محمد الهاجرى محاضرة بعنوان
                                            {{ \Illuminate\Support\Str::limit($random->name, 30) }}
                                        </p>
                                    </div>
                                    <div class="text-center m-2">
                                        <a href="{{ route('frontend.lectures.lecture_content', $random->slug) }}"
                                            class="btn-card-more"
                                            title="{{ trans('frontend.more') }}">{{ trans('frontend.more') }}</a>
                                    </div>
                                    <p class="allWatch">
                                        <i class="fas fa-eye"></i>
                                        <span>{{ $random->view_count }}</span>
                                    </p>
                                    <p class="allDown">
                                        <i class="fas fa-download"></i>
                                        <span>{{ $random->download_count }}</span>
                                    </p>
                                </div>
                                <?php
                                $client_id = auth()
                                    ->guard('client')
                                    ->id();
                                $check = App\Models\Wish::with('client')
                                    ->where('client_id', $client_id)
                                    ->where('wishable_type', 'App\Models\Lecture')
                                    ->where('wishable_id', $random->id)
                                    ->first();

                                ?>
                                @if ($check)
                                    <button class="addToWish" data-id="{{ $random->id }}">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                @else
                                    <button class="addToWish" data-id="{{ $random->id }}">
                                        <i class="far fa-heart"></i>
                                    </button>
                                @endif

                            </div>
                        </div>
                        @endif
                    @empty

                        <span>{{ trans('frontend.no-random-lectures') }}</span>
                    @endforelse


                </div>
            </div>
            <!-- end side defult links  -->
        </div>
    </div>
    <hr />
    <!-- End content -->
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="{{ asset('frontend/js/allPages.js') }}"></script>
    <script defer src="{{ asset('frontend/js/contJs.js') }}"></script>

    {{-- add wishlist --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.addToWish').on('click', function() {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: " {{ url('/lectures/add/wishlist/') }}/" + id,
                        type: "GET",
                        datType: "json",
                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                $(".addToWish").html(`<i class="far fa-heart"></i>`);
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }
                        },
                    });
                }
            });
        });
    </script>
    {{-- add comment --}}
    <script>
        $(document).ready(function() {
            $('#save_comment').on('click', function(e) {

                e.preventDefault();

                $.ajax({
                    url: "{{ route('frontend.lectures.add.comment', $lecture->id) }}",
                    type: "POST",
                    datType: "json",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'client_id': "{{ Auth::guard('client')->id() }}",
                        'message': $("textarea[name='message']").val(),
                        'commentable_id': '{{ $lecture->id }}',
                        'commentable_type': 'App\Models\lecture',

                    },
                    success: function(data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.error
                            })
                        }
                    },

                });
                $("#textAreaContent").val("");

            });
        });
    </script>
    <script>
        // toggle show & hide pdf list download

        let btnDownLoad = document.querySelector('.allPdfFiles')
        let btnAllFiles = document.querySelector('.btnAllFiles')

        btnAllFiles.addEventListener('click', () => {
            btnDownLoad.classList.toggle('pdfListAction')
        })
    </script>
    <script>
        $(document).on('click', '#download-numbers', function() {
            var firstNum = $('.downloaders'),
                effect = $('.downloaders').text();
            effect++;
            $(firstNum).text(effect++);
            var newValue = $(firstNum).text();
            $.ajax({
                url: '{{ URL::current() }}',
                type: "get",
                dataType: "json",
                data: {
                    'download_count': newValue
                },
                success: function(data) {
                    console.log('done');
                }
            });
        });
    </script>
@endsection