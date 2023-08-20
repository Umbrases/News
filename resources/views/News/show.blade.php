<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div>
        <h5>{{ $news->title }}</h5>
        <p>{{ $news->description }}</p>
        <p>{{ $news->created_at }}</p>
        <p>{{ $news->updated_at }}</p>

    </div>

    <form action="{{ route('like.store', $news->id) }}" method="post">
        @csrf
        @auth()
            <button type="submit" class="border-0 bg-transparent">
                @if(auth()->user()->likedNews->contains($news->id))
                    <i class="bi bi-suit-heart-fill" style="color: red;"></i>{{$news->likesCount()}}
                @else
                    <i class="bi bi-heart"></i>{{$news->likesCount()}}
                @endif
            </button>
        @else
            <i class="bi bi-heart"></i>{{$news->likesCount()}}
        @endauth
    </form>


    <div>


        <div>
            <div class="card card-widget">
                @foreach($news->comments as $newscomments)

                    <div class="card-footer card-comments">
                        <div class="card-comment">
                            <div class="comment-text">
                    <span class="username">
                      {{$newscomments->user->name}}
                      <span class="text-muted float-right">{{$newscomments->created_at}}</span>
                    </span><!-- /.username -->
                                {{ $newscomments->message }}
                            </div>
                            <!-- /.comment-text -->
                        </div>

                    </div>

                @endforeach


                <div class="card-footer">

                    <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <form action="{{ route('news.comment.store', $news->id) }}" method="post">
                        @csrf
                        <div class="img-push">
                            <input type="text" class="form-control form-control-sm" id="message" name="message"
                                   placeholder="Press enter to post comment">
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="bi bi-caret-right"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
