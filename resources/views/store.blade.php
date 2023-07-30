<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notebook Box Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .notebooks-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .notebook-card {
            width: calc(25% - 20px);
            margin-bottom: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .notebook-card img {
            width: 100%;
            height: auto;
            display: block;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .notebook-card .info {
            padding: 10px;
        }

        .notebook-card h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .notebook-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #007bff;
        }

        .notebook-card .previous-price {
            text-decoration: line-through;
            color: #777;
        }

        .notebook-card .discount {
            font-size: 14px;
            color: green;
        }

        @media screen and (max-width: 1200px) {
            .notebook-card {
                width: calc(33.33% - 20px);
            }
        }

        @media screen and (max-width: 800px) {
            .notebook-card {
                width: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 600px) {
            .notebook-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="notebooks-container">
        @foreach ($notebooks as $notebook)
        <div class="notebook-card">
            <img src="{{ $notebook->img_url }}" alt="{{ $notebook->model }}">
            <div class="info">
                <h3>{{ $notebook->model }}</h3>
                <p>{{ $notebook->price }}</p>
                @if ($notebook->previous_price)
                    <p class="previous-price">{{ $notebook->previous_price }}</p>
                    <p class="discount">Discount: {{ $notebook->discount }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {!! $notebooks->links() !!}
    </div>
</body>
</html>
