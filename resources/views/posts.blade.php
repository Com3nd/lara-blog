<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">
    <title>My Blog</title>
</head>
<body>
{{-- $posts is passed through the Route to be accessable. Ref #1 in routes/web.php--}}
@foreach($posts as $post)
    <article>
        <a href="/posts/<?= $post->slug; ?>">
            <h1><?= $post->title ?></h1>
        </a>
        <div>
                <?= $post->excerpt ?>
        </div>
    </article>
@endforeach
</body>
</html>
