    <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />

<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<div style="text-align: center; background-color: white; height: 100%; display: flex; overflow: auto; flex-wrap: wrap;">
    <div style="margin: auto; max-width: 800px; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); background-color: #f5f5f5;">
        <style>
            .button-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }

            #button {
                margin: 5px;
                width: 300px;
                height: 50px;
                background: #0d6efd;
                border-radius: 40px;
                color: #fff;
                font-size: 16px;
                border: none;
                outline: none;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                cursor: pointer;
                transition: .3s ease-in-out;
            }

            #button:hover {
                background: #0056b3;
            }
        </style>

        <div class="button-container">
            @foreach($pages as $page)
                @if($page->editable == true)
                    <a href="{{ route('editPage', ['page' => $page->pageName]) }}" id="page">
                        <button id="button">{{ $page->pageName }}</button>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
