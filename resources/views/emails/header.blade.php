<html>
    <head>
        <style>
             .header img{
                max-width: 20%;
                max-height: 20%;
            }
        </style>
    </head>
    <div class="header">
        <img src="{{ $message->embed(substr($emailLogo, 1)) }}" alt="Logo">
    </div>
</html>