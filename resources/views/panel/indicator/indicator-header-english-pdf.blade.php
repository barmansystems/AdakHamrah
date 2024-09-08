<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <style>
        .div-indicator {
            position: absolute;
            top: 16rem;
            padding: 2.3rem !important;
        }

        .date {
            position: absolute;
            top: 6rem;
            right: 2.5rem;
            font-size: 1.4rem;

        }

        .number {
            position: absolute;
            top: 9rem;
            right: 2.2rem;
            font-size: 1.3rem;
            width: 8rem;
            text-align: center;
        }

        .attachment {
            position: absolute;
            top: 11.5rem;
            right: .5rem;
            font-size: 1.4rem;
            width: 8rem;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="date">
        {{\Hekmatinasser\Verta\Verta::parse($date)->toCarbon()->format('Y-m-d')}}
    </div>
    <div class="number">
        {{$number}}
    </div>
    <div class="attachment">
        {{$attachment}}
    </div>



<div class="div-indicator">
    {!! $text !!}
</div>
</body>
</html>
